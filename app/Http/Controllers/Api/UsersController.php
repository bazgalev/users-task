<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UsersIndexRequest;
use App\Services\UserManageService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        $users = $this->service->getAll($request->name, $request->cityId);

        return new JsonResponse($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

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
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
