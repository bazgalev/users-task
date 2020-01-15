<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <a class="navbar-brand" href="{{route('users.index')}}">SuperCRM</a>
            <li class="nav-item {{ (request()->routeIs('users.index'))?'active':''  }}">
                <a class="nav-link" href="{{route('users.index')}}">Пользователи <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ !(request()->routeIs('users.index'))?'active':''  }}"
                   href="{{route('users.create')}}">Добавить <span class="sr-only">(current)</span></a>
            </li>
        </ul>

        @yield('filter')

    </div>
</nav>
