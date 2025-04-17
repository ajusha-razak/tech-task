<?php

namespace App\Domains\User\Services;

use App\Domains\Country\Services\CountryService;
use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array data
     * @return UserEntity
     */
    public function createUser(array $data): UserEntity
    {
        $this->validateUserFormData($data);
        $userEntity = $this->prepareUserEntity($data);
        return $this->userRepository->create($userEntity);
    }

    public function listUsers(CountryService $countryService)
    {
        $users = $this->userRepository->findAll();
        $countryIds = array_column($users->toArray()['data'] ?? [], 'country_id');

        if ($countryIds) {
            $countryData = $this->getCountryData($countryIds, $countryService);
            foreach ($users as $user) {
                $user->country_name = $countryData[$user->country_id]['name'] ?? '-';
            }
        }
        return $users;
    }

    private function getCountryData(array $countryIds, CountryService $countryService): array
    {
        $countryData = [];
        if ($countryIds) {
            $countryDetails = $countryService->findByIds(array_unique($countryIds));
            foreach ($countryDetails->toArray() as $country) {
                $countryData[$country['id']] = $country;
            }
        }
        return $countryData;
    }

    public function findById(int $id): ?UserEntity
    {
        return $this->userRepository->findById($id);
    }

    public function getUserFullDetails(int $id, CountryService $countryService): ?UserEntity
    {
        $user = $this->findById($id);
        $countryData = $this->getCountryData([$user->getCountryId()], $countryService);
        $user->setCountryName($countryData[$user->getCountryId()]['name'] ?? '-');
        return $user;
    }


    private function validateUserFormData(array $data, int $id = 0): array
    {
        $rules = [
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'country' => 'required',
            'gender' => 'required',
            'phone' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
        ];
        if (!$id) {
            $rules['password'] = 'required|string|min:6|max:8|confirmed:confirm_password';
        }
        return validator($data, $rules)->validate();
    }

    /**
     * @param array data
     * @return UserEntity
     */
    public function updateUser(array $data, int $id): UserEntity
    {
        $user = $this->findById($id);
        if (empty($user)) {
            return null;
        }
        $this->validateUserFormData($data, $id);
        $updateUserEntity = $this->prepareUserEntity($data, $user->getId());
        return $this->userRepository->update($updateUserEntity);
    }

    private function prepareUserEntity(array $data, int $userId = 0)
    {
        $userEntity = new UserEntity(
            $userId,
            $data['name'],
            $data['surname'],
            $data['email'],
            '',
            $data['gender'],
            $data['country'],
            $data['phone']
        );
        if (!empty($data['image'])) {
            $userEntity->setProfilePicture($data['image']->store('images', 'public'));
        }
        if (!empty($data['password'])) {
            $userEntity->setPassword($data['password']);
        }
        return $userEntity;
    }

    public function deleteUser(int $id): bool
    {
        $user = $this->findById($id);
        if (empty($user)) {
            return false;
        }
        $this->userRepository->delete($user);
        return true;
    }
}
