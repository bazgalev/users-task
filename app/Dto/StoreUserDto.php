<?php

declare(strict_types=1);

namespace App\Http\Requests;


class StoreUserDto
{
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
     * @var int
     */
    private int $cityId;

    public function __construct(string $firstName, string $lastName, string $patronymic, string $email, int $cityId)
    {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->patronymic = $patronymic;
        $this->email = $email;
        $this->cityId = $cityId;
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

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }
}
