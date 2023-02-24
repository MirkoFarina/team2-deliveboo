<?php
    use App\Helpers\GlobalHelpers;
?>



<header id="admin-header">
    <nav class="navbar h-100 shadow px-5">

        <a class="d-none d-sm-none d-md-none d-lg-block navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <div class="logo_laravel">
                DeliveBoo
            </div>
        </a>

        <div class="d-block d-lg-none dropdown">
            <button class="btn btn-secondary dropdown-toggle bg-dark" type="button" data-bs-toggle="dropdown">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="dropdown-menu bg-dark p-3 list-unstyled">
                <li class="py-1">
                    <a  href=" {{ route('admin.users.index') }} "
                        class=" {{ (Route::CurrentRouteName() === 'admin.users.index') |  (Route::CurrentRouteName() === 'admin.users.edit')  ? 'active' : '' }} dropddown-item ">
                        <i class="fa-solid fa-user"></i> UTENTE </a>
                </li>
                {{-- SE L'UTENTE NON HA UN RISTORANTE REGISTRATO NON PUO' ACCEDERE A QUESTA FUNZIONE --}}
                @if (GlobalHelpers::checkRestaurant())
                    <li class="py-1">
                        <a href=" {{ route('admin.dashboard') }} "
                            class=" {{ Route::CurrentRouteName() === 'admin.dashboard' ? 'active' : '' }} dropddown-item ">
                            <i class="fa-solid fa-chart-simple"></i> DASHBOARD
                        </a>
                    </li>
                @endif

            {{-- SE L'UTENTE NON HA UN RISTORANTE REGISTRATO NON PUO' ACCEDERE A QUESTA FUNZIONE --}}
            @if (GlobalHelpers::checkRestaurant())
                <li class="py-2">
                    <a href=" {{ route('admin.food.index') }} "
                        class=" {{ (Route::CurrentRouteName() === 'admin.food.index') | (Route::CurrentRouteName() === 'admin.food.show') | (Route::CurrentRouteName() === 'admin.food.edit') | (Route::CurrentRouteName() === 'admin.food.create') ? 'active' : '' }} dropddown-item">
                        <i class="fa-solid fa-pizza-slice"></i>
                        PIATTI</a>
                </li>
            @endif
            @if (GlobalHelpers::checkRestaurant())
                <li class="py-2">
                    <a href=" {{ route('admin.order.index') }} " class=" {{ (Route::CurrentRouteName() === 'admin.order.index')  ? 'active' : '' }} dropddown-item">
                        <i class="fa-solid fa-money-bill-transfer"></i>
                        ORDINI
                    </a>
                </li>
            @endif
            <li>
                <a href=" {{ route('admin.restaurants.index') }} "
                    class=" {{ (Route::CurrentRouteName() === 'admin.restaurants.index') | (Route::CurrentRouteName() === 'admin.restaurants.show') | (Route::CurrentRouteName() === 'admin.restaurants.edit') | (Route::CurrentRouteName() === 'admin.restaurants.create') ? 'active' : '' }} dropddown-item">
                    <i class="fa-solid fa-building-user"></i>
                    RISTORANTE
                </a>
            </li>
        </ul>
    </div>

    <a class="d-block d-lg-none navbar-brand d-flex align-items-center" href="{{ route('home') }}">
        <div class="logo_laravel">
            <i class="fa-solid fa-earth-americas"></i>
        </div>
    </a>
            <div class="d-flex" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto d-flex flex-row">
                    <!-- Authentication Links -->
                    @guest
                        <li>
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="ms-3">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                LOGOUT <i class="fa-solid fa-right-from-bracket"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
        </div>

    </nav>
</header>
