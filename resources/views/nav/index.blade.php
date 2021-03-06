@extends('nav.main')

@section('filter')
    <form class="form-inline my-2 my-lg-0" method="GET" id="search-form">
        @csrf
        <select name="cityId" form="search-form" class="custom-select form-control mr-sm-2"
                aria-label="City-select">

            @if(is_null($request->cityId))
                <option selected value="">Не указано</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            @else
                <option selected value="">Не указано</option>
                @foreach($cities as $city)
                    @if($city->id == $request->cityId)
                        <option selected value="{{$city->id}}">{{$city->name}}</option>
                    @else
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endif
                @endforeach
            @endif

        </select>

        @if(is_null($request->name))
            <input name="name" class="form-control mr-sm-2" type="search" placeholder="Поиск по ФИО"
                   aria-label="Search">
        @else
            <input name="name" class="form-control mr-sm-2" type="search" placeholder="Поиск по ФИО"
                   aria-label="Search" value="{{$request->name}}">
        @endif

        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
    </form>

@endsection
