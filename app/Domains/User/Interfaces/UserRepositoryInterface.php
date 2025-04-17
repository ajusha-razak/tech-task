<?php

namespace App\Domains\User\Interfaces;

use App\Domains\User\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function create(UserEntity $userEntity): UserEntity;

    public function update(UserEntity $userEntity): UserEntity;

    public function delete(UserEntity $userEntity): void;

    public function findById(int $id): ?UserEntity;

    public function findAll();
}
