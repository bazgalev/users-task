<?php


namespace App\Services;


use App\Contracts\UserEntityInterface;
use App\Contracts\UsersRepositoryInterface;
use App\Dto\UsersIndexDto;
use App\Factories\UserFactory;
use App\Http\Requests\StoreUserDto;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Eloquent\UserEloquent;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserManageService
{
    /**
     * @var UserFactory
     */
    private UserFactory $factory;
    /**
     * @var UsersRepositoryInterface
     */
    private UsersRepositoryInterface $usersRepository;

    public function __construct(UserFactory $factory, UsersRepositoryInterface $usersRepository)
    {
        $this->factory = $factory;
        $this->usersRepository = $usersRepository;
    }

    /**
     * @param UsersIndexDto $request
     * @return LengthAwarePaginator
     */
    public function getAll(UsersIndexDto $request): LengthAwarePaginator
    {
        $query = UserEloquent::query();

        if ($request->getName()) {
            $condition = 'CONCAT(first_name," ",last_name," ",patronymic) LIKE ?';
            $query->whereRaw($condition, ["%{$request->getName()}%"]);
        }

        if ($request->getCityId()) {
            $query->where('city_id', $request->getCityId());
        }

        return $query->with('city')->paginate(15);
    }

    /**
     * @param int $userId
     * @return UserEloquent|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model
     */
    public function one(int $userId)
    {
        return UserEloquent::with('city')
            ->findOrFail($userId);
    }

    /**
     * @param StoreUserDto $request
     * @return UserEntityInterface
     */
    public function create(StoreUserDto $request): UserEntityInterface
    {
        $user = $this->factory->make($request);
        $this->usersRepository->save($user);

        return $user;
    }

    /**
     * @param int $userId
     * @return UserEloquent
     * @throws \Exception
     */
    public function destroy(int $userId): UserEloquent
    {
        $user = $this->one($userId);
        $user->delete();

        return $user;
    }

    public function update(UpdateUserRequest $request, int $userId): UserEloquent
    {
        $user = UserEloquent::findOrFail($userId);
        $user->fill($request->all());
        $user->save();

        return $user->load('city');
    }

}
