<?php

declare(strict_types=1);

namespace App\Contracts;


interface CitiesRepositoryInterface
{
    public function getById(int $cityId): ?CityEntityInterface;
}
