<?php


namespace App\Http\Services;


use App\Http\Requests\UsersIndexRequest;
use App\User;

class UserManageService
{
    /**
     * @param UsersIndexRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll(UsersIndexRequest $request)
    {
        $query = User::query();
        if (isset($request->name)) {
            $condition = 'CONCAT(first_name," ",last_name," ",patronymic) LIKE ?';
            $query->whereRaw($condition, ["%$request->name%"]);
        }

        if (isset($request->cityId)) {
            $query->where('city_id', $request->cityId);
        }

        return $query->with('city')->paginate(30);
    }
}
