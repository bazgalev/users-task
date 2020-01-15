<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\StoreUserRequest as StoreUserRequestAlias;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UsersIndexRequest;
use App\Http\Services\UserManageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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
        $pagination = $this->service->getAll($request);
        $cities = City::all();

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
        $cities = City::all();
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
        var_dump($request->validationData());die;
        $user = $this->service->create($request);

        return redirect(route('users.show', $user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->service->one($id);

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->service->update($request, $id);

        return view('users.show', ['user' => $user]);
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

        return view('users.index');
    }
}
