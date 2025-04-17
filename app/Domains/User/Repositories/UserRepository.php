<?php

namespace App\Domains\User\Repositories;

use App\Domains\User\Entities\UserEntity;
use App\Domains\User\Interfaces\UserRepositoryInterface;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserEntity $userEntity): UserEntity
    {
        $user = UserModel::create([
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'surname' => $userEntity->getSurName(),
            'country_id' => $userEntity->getCountryId(),
            'phone' => $userEntity->getPhone(),
            'gender' => $userEntity->getGender(),
            'password' => Hash::make($userEntity->getPassword()),
            'profile_picture' => $userEntity->getProfilePicture(),
        ]);
        $userEntity->setId($user->id);
        return $userEntity;
    }

    public function update(UserEntity $userEntity): UserEntity
    {
        $updateData = [
            'name' => $userEntity->getName(),
            'email' => $userEntity->getEmail(),
            'surname' => $userEntity->getSurName(),
            'country_id' => $userEntity->getCountryId(),
            'phone' => $userEntity->getPhone(),
            'gender' => $userEntity->getGender(),
        ];
        if (!empty($userEntity->getProfilePicture())) {
            $updateData['profile_picture'] = $userEntity->getProfilePicture();
        }
        UserModel::find($userEntity->getId())->update($updateData);
        return $userEntity;
    }

    public function delete(UserEntity $userEntity): void
    {
        UserModel::find($userEntity->getId())->delete();
    }

    public function findAll()
    {
        return UserModel::orderBy('id', 'desc')->paginate(10);
    }

    public function findById(int $id): ?UserEntity
    {
        $user = UserModel::find($id);
        if (!$user) {
            return null;
        }
        return new UserEntity(
            $user->id,
            $user->name,
            $user->surname,
            $user->email,
            $user->password,
            $user->gender,
            $user->country_id,
            $user->phone,
            $user->profile_picture,
        );
    }
}
