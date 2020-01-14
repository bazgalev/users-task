<?php


namespace App\Http\Services;


use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
