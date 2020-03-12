<?php

declare(strict_types=1);

namespace App\Repositories;


use App\Contracts\CitiesRepositoryInterface;
use App\Contracts\UserEntityInterface;
use App\Contracts\UsersRepositoryInterface;
use App\Eloquent\UserEloquent;
use App\Entities\City;
use App\Entities\User;
use Illuminate\Support\Collection;

class UsersRepository implements UsersRepositoryInterface
{
    /**
     * @var CitiesRepositoryInterface
     */
    private CitiesRepositoryInterface $citiesRepository;

    public function __construct(CitiesRepositoryInterface $citiesRepository)
    {
        $this->citiesRepository = $citiesRepository;
    }

    public function getById(int $userId): ?UserEntityInterface
    {
        $eloquentModel = $this->getUserEloquent($userId);

        if (!$eloquentModel) {
            return null;
        }

        $city = new City($eloquentModel->city_id, $eloquentModel->city->name);

        return new User(
            $eloquentModel->id,
            $eloquentModel->first_name,
            $eloquentModel->last_name,
            $eloquentModel->patronymic,
            $eloquentModel->email,
            $city
        );

    }

    public function save(UserEntityInterface $user): void
    {
        UserEloquent::create([
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
            'patronymic' => $user->getPatronymic(),
            'email' => $user->getEmail(),
            'city_id' => $user->getCity()->getCityId(),
        ]);
    }

    private function getUserEloquent(int $userId): ?UserEloquent
    {
        return UserEloquent::with('city')->where('id', $userId)->first();
    }
}
