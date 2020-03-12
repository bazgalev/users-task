<?php

namespace App\Http\Controllers\Api;

use App\Eloquent\CityEloquent;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CitiesController extends Controller
{
    public function index()
    {
        return new JsonResponse(CityEloquent::all());
    }
}
