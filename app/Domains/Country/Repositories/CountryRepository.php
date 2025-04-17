<?php

namespace App\Domains\Country\Repositories;

use App\Domains\Country\Entities\CountryEntity;
use App\Domains\Country\Interfaces\CountryRepositoryInterface;
use App\Models\Country as CountryModel;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository implements CountryRepositoryInterface
{
    /**
     * findAll
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return CountryModel::orderBy('id', 'desc')->get();
    }

    /**
     * findById
     *
     * @param int id
     *
     * @return null|CountryEntity
     */
    public function findById(int $id): ?CountryEntity
    {
        $country = CountryModel::find($id);
        if (!$country) {
            return null;
        }
        return new CountryEntity(
            $country->id,
            $country->name
        );
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
        return CountryModel::whereIn('id', $ids)->get();
    }
}
