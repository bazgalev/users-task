<?php

declare(strict_types=1);

namespace App\Dto;


class UsersIndexDto
{
    /**
     * @var string|null
     */
    private ?string $name;

    /**
     * @var int|null
     */
    private ?int $cityId;

    public function __construct(?string $name, ?int $cityId)
    {
        $this->name = $name;
        $this->cityId = $cityId;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getCityId(): ?int
    {
        return $this->cityId;
    }
}
