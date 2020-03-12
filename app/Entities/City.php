<?php

declare(strict_types=1);

namespace App\Entities;


use App\Contracts\CityEntityInterface;

class City implements CityEntityInterface
{
    /**
     * @var int
     */
    private int $cityId;
    /**
     * @var string
     */
    private string $name;

    public function __construct(int $cityId, string $name)
    {
        $this->cityId = $cityId;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->cityId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
