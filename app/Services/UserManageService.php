<?php


namespace App\Services;


use App\User;

class UserManageService
{
    /**
     * @param string|null $name
     * @param int|null $cityId
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(?string $name, ?int $cityId): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = User::query();
        if (isset($name)) {
            $condition = 'CONCAT(first_name," ",last_name," ",patronymic) LIKE ?';
            $query->whereRaw($condition, ["%$name%"]);
        }

        if (isset($cityId)) {
            $query->where('city_id', $cityId);
        }

        return $query->with('city')->paginate(30);
    }

    public function one(int $userId): User
    {
        return User::query()->with('city')->findOrFail($userId);
    }
}
