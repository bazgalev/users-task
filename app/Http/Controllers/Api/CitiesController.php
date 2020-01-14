<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CitiesController extends Controller
{
    public function index()
    {
        return new JsonResponse(City::all());
    }
}
