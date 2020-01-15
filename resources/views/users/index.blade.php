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
            <th scope="col"></th>
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
                <td>
                    <div class="d-flex">

                    <a href="{{route('users.show',$user->id)}}">
                        <i class="px-1 fas fa-eye"></i>
                    </a>
                    <a href="{{route('users.edit',$user->id)}}">
                        <i class="px-1 fas fa-pen"></i>
                    </a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn p-0 px-1 btn-link "><i class="fas fa-trash-alt"></i></button>
                    </form>
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $pagination->links() }}
@endsection

