<?php

namespace App\Domains\Country\Interfaces;

use App\Domains\Country\Entities\CountryEntity;
use Illuminate\Database\Eloquent\Collection;

interface CountryRepositoryInterface
{
    /**
     * findAll
     *
     * @return Collection
     */
    public function findAll(): Collection;

    /**
     * findById
     *
     * @param int id
     *
     * @return null|CountryEntity
     */
    public function findById(int $id): ?CountryEntity;

    /**
     * findByIds
     *
     * @param array ids
     *
     * @return Collection
     */
    public function findByIds(array $ids): Collection;
}
