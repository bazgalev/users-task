<?php

declare(strict_types=1);

namespace App\Repositories;


use App\Contracts\CitiesRepositoryInterface;
use App\Contracts\CityEntityInterface;
use App\Eloquent\CityEloquent;
use App\Entities\City;

class CitiesRepository extends Repository implements CitiesRepositoryInterface
{
    public function getById(int $cityId): CityEntityInterface
    {
        $model = $this->getCityEloquent($cityId);

        return $this->makeFromEloquentModel($model);
    }

    private function getCityEloquent(int $cityId): CityEloquent
    {
        return CityEloquent::whereId($$cityId);
    }

    private function makeFromEloquentModel(CityEloquent $model): City
    {
        return new City($model->id, $model->name);
    }
}
