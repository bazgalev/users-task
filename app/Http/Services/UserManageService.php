<?php


namespace App\Http\Services;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsersIndexRequest;
use App\User;

class UserManageService
{
    /**
     * @param UsersIndexRequest $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll(UsersIndexRequest $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = User::query();
        if (isset($request->name)) {
            $condition = 'CONCAT(first_name," ",last_name," ",patronymic) LIKE ?';
            $query->whereRaw($condition, ["%$request->name%"]);
        }

        if (isset($request->cityId)) {
            $query->where('city_id', $request->cityId);
        }

        return $query->with('city')->paginate(15);
    }

    /**
     * @param int $userId
     * @return User|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function one(int $userId)
    {
        return User::with('city')
            ->findOrFail($userId);
    }

    /**
     * @param StoreUserRequest $request
     * @return User
     */
    public function create(StoreUserRequest $request): User
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'patronymic' => $request->patronymic,
            'email' => $request->email,
            'city_id' => $request->city_id
        ]);

        return $user->load('city');;
    }

    /**
     * @param int $userId
     * @return User
     * @throws \Exception
     */
    public function destroy(int $userId): User
    {
        $user = $this->one($userId);
        $user->delete();

        return $user;
    }

    public function update(UpdateUserRequest $request, int $userId): User
    {
        $user = User::findOrFail($userId);
        $user->fill($request->all());
        $user->save();

        return $user->load('city');
    }

}
