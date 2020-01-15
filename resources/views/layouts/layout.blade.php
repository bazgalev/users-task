<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<body>

<div class="container">
    @include('layouts.nav',[
    'cities'=>$cities,
    'request'=>$request
    ])
    @yield('content')
</div>
</body>
</html>
