<?php

namespace App\Domains\Country\Services;

use App\Domains\Country\Entities\CountryEntity;
use App\Domains\Country\Repositories\CountryRepository;
use Illuminate\Database\Eloquent\Collection;

class CountryService
{
    private CountryRepository $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * getCountries
     *
     * @return Collection
     */
    public function getCountries(): Collection
    {
        return $this->countryRepository->findAll();
    }

    /**
     * findById
     *
     * @param int id
     *
     * @return CountryEntity
     */
    public function findById(int $id): ?CountryEntity
    {
        return $this->countryRepository->findById($id);
    }

    /**
     * findByIds
     *
     * @param array ids
     *
     * @return Collection
     */
    public function findByIds(array $ids): Collection
    {
        return $this->countryRepository->findByIds($ids);
    }
}
