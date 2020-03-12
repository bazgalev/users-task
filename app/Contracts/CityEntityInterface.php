<?php


namespace App\Contracts;


interface CityEntityInterface
{
    /**
     * @return int
     */
    public function getCityId(): int;

    /**
     * @return string
     */
    public function getName(): string;

}
