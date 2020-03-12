<?php


namespace App\Factories;


use App\Contracts\CitiesRepositoryInterface;
use App\Contracts\UserEntityInterface;
use App\Entities\User;
use App\Http\Requests\StoreUserDto;

class UserFactory
{
    /**
     * @var CitiesRepositoryInterface
     */
    private CitiesRepositoryInterface $citiesRepository;

    public function __construct(CitiesRepositoryInterface $citiesRepository)
    {
        $this->citiesRepository = $citiesRepository;
    }

    public function make(StoreUserDto $dto): UserEntityInterface
    {
        $city = $this->citiesRepository->getById($dto->getCityId());

        return new User(
            null,
            $dto->getFirstName(),
            $dto->getLastName(),
            $dto->getPatronymic(),
            $dto->getEmail(),
            $city
        );
    }
}
