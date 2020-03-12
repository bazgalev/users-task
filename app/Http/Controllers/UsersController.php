<?php

namespace App\Http\Controllers;

use App\Eloquent\CityEloquent;
use App\Http\Requests\StoreUserRequest as StoreUserRequestAlias;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsersIndexRequest;
use App\Services\UserManageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    /**
     * @var UserManageService
     */
    protected UserManageService $service;

    public function __construct(UserManageService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param UsersIndexRequest $request
     * @return View
     */
    public function index(UsersIndexRequest $request)
    {
        $pagination = $this->service->getAll($request->getDto());
        $cities = CityEloquent::all();

        return view('users.index', [
            'pagination' => $pagination,
            'cities' => $cities,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        $cities = CityEloquent::all();
        return view('users.create', [
            'cities' => $cities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequestAlias $request
     * @return Response
     */
    public function store(StoreUserRequestAlias $request)
    {
        $user = $this->service->create($request->getDto());

        //TODO: view user details

        return redirect(route('users.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->service->one($id);
        $cities = CityEloquent::all();

        return view('users.edit', [
            'user' => $user,
            'cities' => $cities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->service->update($request, $id);

        //TODO: display operation info

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = $this->service->destroy($id);

        //TODO: display operation info

        return redirect(route('users.index'));
    }
}
