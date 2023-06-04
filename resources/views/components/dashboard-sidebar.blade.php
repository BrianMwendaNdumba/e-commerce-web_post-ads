<div class="col-xxl-3 col-xl-3 col-lg-4 col-md-5">

    <div class="accountSidebar d-none d-md-block">
        <ul class="listing listScroll">

            <li class="listItem">
                <a href="{{ route('dashboard.index') }}" @class(['items', 'active' => request()->routeIs('dashboard.index')])> <i
                        class="lar la-user-circle icon"></i>
                    My Account</a>
            </li>

            <li class="listItem">
                <a href="{{ route('dashboard.create') }}" @class(['items', 'active' => request()->routeIs('dashboard.create')])><i
                        class="las la-address-card icon"></i>
                    Post Free Ad</a>
            </li>

            <li class="listItem">
                <a href="{{ route('dashboard.featured') }}" @class([
                    'items',
                    'active' => request()->routeIs('dashboard.featured'),
                ])><i class="las la-ad icon"></i>
                    Featured Ads</a>
            </li>

            <li class="listItem">
                <a href="{{ route('dashboard.favourites') }}" @class([
                    'items',
                    'active' => request()->routeIs('dashboard.favourites'),
                ])> <i
                        class="lar la-heart icon"></i>
                    Favourites</a>
            </li>

            {{-- <li class="listItem">
                <a href="{{ route('dashboard.reviews') }}" @class(['items', 'active' => request()->routeIs('dashboard.reviews')])> <i
                        class="las la-certificate icon"></i>
                    Reviews</a>
            </li> --}}

            <li class="listItem">
                <a href="{{ route('dashboard.profile') }}" @class(['items', 'active' => request()->routeIs('dashboard.profile')])> <i
                        class="las la-user-cog icon"></i>
                    Profile</a>
            </li>

            <li class="listItem">
                <a href="{{ route('dashboard.security') }}" @class([
                    'items',
                    'active' => request()->routeIs('dashboard.security'),
                ])> <i
                        class="las la-user-cog icon"></i>
                    Security</a>
            </li>

            <li class="listItem">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="items" href="route('logout')"
                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        <i class="las la-sign-out-alt icon"></i> {{ __('Log Out') }}
                    </a>
                </form>
            </li>
        </ul>

    </div>

    <ul class="custom_resp_nav d-md-none nav nav-pills nav-fill ">

        <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.index'),
            ])> <i
                    class="lar la-user-circle icon"></i>
                My Account</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dashboard.create') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.create'),
            ])><i
                    class="las la-address-card icon"></i>
                Post Free Ad</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dashboard.featured') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.featured'),
            ])><i class="las la-ad icon"></i>
                Featured Ads</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dashboard.favourites') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.favourites'),
            ])> <i
                    class="lar la-heart icon"></i>
                Favourites</a>
        </li>

        {{-- <li class="nav-item">
            <a href="{{ route('dashboard.reviews') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.reviews'),
            ])> <i
                    class="las la-certificate icon"></i>
                Reviews</a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ route('dashboard.profile') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.profile'),
            ])> <i
                    class="las la-user-cog icon"></i>
                Profile</a>
        </li>

        <li class="nav-item">
            <a href="{{ route('dashboard.security') }}" @class([
                'nav-link',
                'active' => request()->routeIs('dashboard.security'),
            ])> <i
                    class="las la-user-cog icon"></i>
                Security</a>
        </li>

        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <i class="las la-sign-out-alt icon"></i> {{ __('Log Out') }}
                </a>
            </form>
        </li>

    </ul>

</div>
