<?php

declare(strict_types=1);

namespace App\Entities;


use App\Contracts\CityEntityInterface;
use App\Contracts\UserEntityInterface;

class User implements UserEntityInterface
{
    /**
     * @var CityEntityInterface
     */
    private CityEntityInterface $city;
    /**
     * @var int
     */
    private ?int $id;
    /**
     * @var string
     */
    private string $firstName;

    /**
     * @var string
     */
    private string $lastName;
    /**
     * @var string
     */
    private string $patronymic;
    /**
     * @var string
     */
    private string $email;

    /**
     * User constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $patronymic
     * @param string $email
     * @param CityEntityInterface $city
     */
    public function __construct(?int $id, string $firstName, string $lastName, string $patronymic, string $email, CityEntityInterface $city)
    {
        $this->city = $city;
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->patronymic = $patronymic;
        $this->email = $email;
    }

    /**
     * @return CityEntityInterface
     */
    public function getCity(): CityEntityInterface
    {
        return $this->city;
    }


    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
