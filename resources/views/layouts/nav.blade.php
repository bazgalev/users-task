<?php
/** @var App\City[] $cities */
/** @var \App\Http\Requests\UsersIndexRequest $request */
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('users.index')}}">Пользователи <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Города</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" id="search-form">
            <select name="cityId" form="search-form" class="custom-select form-control mr-sm-2"
                    aria-label="City-select">

                @if(is_null($request->cityId))
                    <option selected value="">Не указано</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                    @endforeach
                @else
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
    </div>
</nav>
