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
    </ul>
</div>
