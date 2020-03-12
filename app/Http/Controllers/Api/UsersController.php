<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsersIndexRequest;
use App\Services\UserManageService;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    protected UserManageService $service;

    public function __construct(UserManageService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param UsersIndexRequest $request
     * @return JsonResponse
     */
    public function index(UsersIndexRequest $request)
    {
        $users = $this->service->getAll($request);

        return new JsonResponse($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->service->create($request);

        return new JsonResponse($user);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|void
     */
    public function show($id)
    {
        $user = $this->service->one($id);

        return new JsonResponse($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->service->update($request, $id);
        return new JsonResponse($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $this->service->destroy($id);
        return new JsonResponse(null, 204);
    }
}
