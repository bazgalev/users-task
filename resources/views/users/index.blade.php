<?php
/** @var \Illuminate\Contracts\Pagination\LengthAwarePaginator $pagination */
?>
@extends('layouts.layout')

@section('title','Пользователи')
@section('content')
    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Имя</th>
            <th scope="col">Отчество</th>
            <th scope="col">E-mail</th>
            <th scope="col">Город</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pagination as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->patronymic}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->city->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $pagination->links() }}
@endsection

