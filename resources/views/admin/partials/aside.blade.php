<div class="pt-5" id="nav-aside">
    <ul class="m-0 list-unstyled">
        <li class="ps-3">
               USER: {{ Auth::user()->name }}
        </li>
        <li class="ps-3">
            <a href=" {{ route('admin.dashboard') }} "
                class=" {{ Route::CurrentRouteName() === 'admin.dashboard' ? 'active' : '' }} ">
                <i class="fa-solid fa-chart-simple"></i> DASHBOARD
            </a>
        </li>
        @if (Auth::getIdRestaurant())
            <li class="ps-3">
                <a href=" {{route('admin.food.index' )}} " class=" {{ Route::CurrentRouteName() === 'admin.food.index' | Route::CurrentRouteName() === 'admin.food.show' | Route::CurrentRouteName() === 'admin.food.edit' | Route::CurrentRouteName() === 'admin.food.create' ? 'active' : '' }} ">
                    <i class="fa-solid fa-utensils"></i>
                    FOODS</a>
            </li>
        @endif
        <li class="ps-3">
            <a href=" {{route('admin.restaurants.index' )}} " class=" {{ Route::CurrentRouteName() === 'admin.restaurants.index' | Route::CurrentRouteName() === 'admin.restaurants.show' | Route::CurrentRouteName() === 'admin.restaurants.edit' | Route::CurrentRouteName() === 'admin.restaurants.create' ? 'active' : '' }} ">
                <i class="fa-solid fa-building-user"></i>
                 Restaurant
                </a>
        </li>
    </ul>
</div>
