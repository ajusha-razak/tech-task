<?php

namespace App\Domains\User\Entities;

class UserEntity
{
    private int $id;
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private int $gender;
    private int $countryId;
    private int $phone;
    private ?string $countryName;
    private ?string $profilePicture;

    public function __construct(
        int $id,
        string $name,
        string $surname,
        string $email,
        string $password,
        int $gender,
        int $countryId,
        int $phone,
        ?string $profilePicture = null
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->gender = $gender;
        $this->countryId = $countryId;
        $this->phone = $phone;
        $this->profilePicture = $profilePicture;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurName(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getCountryId(): string
    {
        return $this->countryId;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getProfilePicture(): ?string
    {
        return $this->profilePicture;
    }
    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setGender(int $gender): void
    {
        $this->gender = $gender;
    }

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function setPhone(int $phone): void
    {
        $this->phone = $phone;
    }

    public function setProfilePicture(string $profilePicture): void
    {
        $this->profilePicture = $profilePicture;
    }

    public function setCountryName(string $countryName): void
    {
        $this->countryName = $countryName;
    }
}
