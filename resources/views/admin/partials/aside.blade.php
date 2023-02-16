<?php
    use App\Helpers\GlobalHelpers;
?>
<div class="pt-5" id="nav-aside">
    <ul class="m-0 list-unstyled">
        <li class="ps-3">
            <a href=" {{ route('admin.users.index') }} "
                class=" {{ (Route::CurrentRouteName() === 'admin.profile.index') |  (Route::CurrentRouteName() === 'admin.profile.edit')  ? 'active' : '' }} ">
                <i class="fa-solid fa-user"></i> Profile</a>
        </li>
        {{-- SE L'UTENTE NON HA UN RISTORANTE REGISTRATO NON PUO' ACCEDERE A QUESTA FUNZIONE --}}
        @if (GlobalHelpers::checkRestaurant())
            <li class="ps-3">
                <a href=" {{ route('admin.dashboard') }} "
                    class=" {{ Route::CurrentRouteName() === 'admin.dashboard' ? 'active' : '' }} ">
                    <i class="fa-solid fa-chart-simple"></i> DASHBOARD
                </a>
            </li>
        @endif

        {{-- SE L'UTENTE NON HA UN RISTORANTE REGISTRATO NON PUO' ACCEDERE A QUESTA FUNZIONE --}}
        @if (GlobalHelpers::checkRestaurant())
            <li class="ps-3">
                <a href=" {{ route('admin.food.index') }} "
                    class=" {{ (Route::CurrentRouteName() === 'admin.food.index') | (Route::CurrentRouteName() === 'admin.food.show') | (Route::CurrentRouteName() === 'admin.food.edit') | (Route::CurrentRouteName() === 'admin.food.create') ? 'active' : '' }} ">
                    <i class="fa-solid fa-utensils"></i>
                    FOODS</a>
            </li>
        @endif

        <li class="ps-3">
            <a href=" {{ route('admin.order.index') }} ">
                <i class="fa-solid fa-building-user"></i>
                Ordini
            </a>
        </li>
        <li class="ps-3">
            <a href=" {{ route('admin.restaurants.index') }} "
                class=" {{ (Route::CurrentRouteName() === 'admin.restaurants.index') | (Route::CurrentRouteName() === 'admin.restaurants.show') | (Route::CurrentRouteName() === 'admin.restaurants.edit') | (Route::CurrentRouteName() === 'admin.restaurants.create') ? 'active' : '' }} ">
                <i class="fa-solid fa-building-user"></i>
                Restaurant
            </a>
        </li>
    </ul>
</div>
