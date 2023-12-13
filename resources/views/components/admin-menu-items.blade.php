<div>
    <ul class="nav flex-column">
        @foreach ($routes as $route)
            @if (Route::has($route->route_name))
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName() == $route->route_name ) active @endif" aria-current="page" href="{{ route($route->route_name) }}">
                        <span data-feather="{{ $route->data_feather }}" class="align-text-bottom"></span>
                        {{ $route->menu_name }}
                    </a>
                </li> 
            @endif  
        @endforeach      
    </ul>
</div>