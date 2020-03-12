<?php

declare(strict_types=1);

namespace App\Contracts;


interface UsersRepositoryInterface
{
    public function getById(int $userId): ?UserEntityInterface;

    public function save(UserEntityInterface $user): void;
}
