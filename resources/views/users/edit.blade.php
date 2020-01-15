<?php
/** @var \App\Entities\City[] $cities */
/** @var \App\Entities\User $user */
?>

@extends('layouts.main')

@section('content')
    @include('nav.main')

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Редактирование пользователя</h4>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('users.update',$user->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="last_name" class="col-4 col-form-label">Фамилия</label>
                                <div class="col-8">
                                    <input id="last_name" name="last_name" placeholder="Фамилия"
                                           class="form-control here" type="text" required="required"
                                           value="{{$user->last_name}}"
                                    >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name" class="col-4 col-form-label">Имя</label>
                                <div class="col-8">
                                    <input id="first_name" name="first_name" placeholder="Имя" class="form-control here"
                                           type="text" required="required" value="{{$user->first_name}}">
                                </div>
                            </div>
                            <div class=" form-group row">
                                <label for="patronymic" class="col-4 col-form-label">Отчество</label>
                                <div class="col-8">
                                    <input id="patronymic" name="patronymic" placeholder="Отчество"
                                           class="form-control here" type="text" required="required"
                                           value="{{$user->patronymic}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email*</label>
                                <div class="col-8">
                                    <input id="email" name="email" placeholder="Email" class="form-control here"
                                           required="required" type="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cityId" class="col-4 col-form-label">Город</label>
                                <div class="col-8">
                                    <select name="city_id" class="custom-select"
                                            aria-label="City-select">

                                        <option value="{{$user->city->id}}">{{$user->city->name}}</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Редактировать
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
