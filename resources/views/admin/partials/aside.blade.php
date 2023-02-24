<?php
    use App\Helpers\GlobalHelpers;
?>
<div class="pt-5 bg-dark border-gray w-50 ps-4" id="nav-aside">
    <ul class="m-0 list-unstyled">
        <li>
            <a href=" {{ route('admin.users.index') }} "
                class=" {{ (Route::CurrentRouteName() === 'admin.users.index') |  (Route::CurrentRouteName() === 'admin.users.edit')  ? 'active' : '' }} ">
                <i class="fa-solid fa-user"></i> UTENTE </a>
        </li>
        {{-- SE L'UTENTE NON HA UN RISTORANTE REGISTRATO NON PUO' ACCEDERE A QUESTA FUNZIONE --}}
        @if (GlobalHelpers::checkRestaurant())
            <li>
                <a href=" {{ route('admin.dashboard') }} "
                    class=" {{ Route::CurrentRouteName() === 'admin.dashboard' ? 'active' : '' }} ">
                    <i class="fa-solid fa-chart-simple"></i> DASHBOARD
                </a>
            </li>
        @endif

        {{-- SE L'UTENTE NON HA UN RISTORANTE REGISTRATO NON PUO' ACCEDERE A QUESTA FUNZIONE --}}
        @if (GlobalHelpers::checkRestaurant())
            <li>
                <a href=" {{ route('admin.food.index') }} "
                    class=" {{ (Route::CurrentRouteName() === 'admin.food.index') | (Route::CurrentRouteName() === 'admin.food.show') | (Route::CurrentRouteName() === 'admin.food.edit') | (Route::CurrentRouteName() === 'admin.food.create') ? 'active' : '' }} ">
                    <i class="fa-solid fa-pizza-slice"></i>
                    PIATTI</a>
            </li>
        @endif
        @if (GlobalHelpers::checkRestaurant())
            <li>
                <a href=" {{ route('admin.order.index') }} " class=" {{ (Route::CurrentRouteName() === 'admin.order.index')  ? 'active' : '' }} ">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                    ORDINI
                </a>
            </li>
        @endif
        <li>
            <a href=" {{ route('admin.restaurants.index') }} "
                class=" {{ (Route::CurrentRouteName() === 'admin.restaurants.index') | (Route::CurrentRouteName() === 'admin.restaurants.show') | (Route::CurrentRouteName() === 'admin.restaurants.edit') | (Route::CurrentRouteName() === 'admin.restaurants.create') ? 'active' : '' }} ">
                <i class="fa-solid fa-building-user"></i>
                RISTORANTE
            </a>
        </li>
    </ul>
</div>
