<?php


namespace App\Contracts;


interface UserEntityInterface
{
    /**
     * @return int
     */
    public function getId(): ?int;

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @return string
     */
    public function getPatronymic(): string;

    /**
     * @return string
     */
    public function getEmail(): string;

    /**
     * @return CityEntityInterface
     */
    public function getCity(): CityEntityInterface;
}
