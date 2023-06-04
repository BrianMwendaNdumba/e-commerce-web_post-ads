<header>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body mt-20 mb-20">
                    <form action="{{ route('search.form') }}" method="POST" class="d-flex" role="search">
                        @csrf
                        <input required class="form-control me-2" name="q" type="search"
                            placeholder="What are you looking for..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid header_top_bar">
        <div class="header_items_wrapper">
            <div class="logo_wrapper">
                <a href="{{ route('index') }}">
                    <img src="/assets/img/logo/logo_2.jpg" alt="Kahustle Logo">
                </a>
            </div>

            <form action="{{ route('search.form') }}" method="POST" class="header_search_bar" role="search">
                @csrf
                <input required class="form-control" type="search" name="q"
                    placeholder="What are you looking for..." aria-label="Search">
                <button type="submit"><i class="las la-search"></i></button>
            </form>

            <div class="header_buttons">
                <a href="{{ route('dashboard.create') }}" class="btn_item"><i class="las la-plus-square"></i> Post Free
                    Ad</a>
                <a href="{{ route('dashboard.featured') }}" class="btn_item"><i class="las la-bullhorn"></i> Featured
                    Ad</a>
                <div>
                    @guest
                        <a href="{{ route('register') }}" class="link"><i class="las la-user-alt"></i>
                            Register
                        </a> | <a href="{{ route('login') }}" class="link">
                            Login
                        </a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard.index') }}" class="link"><i class="las la-user-alt"></i>
                            My Account
                        </a>
                    @endauth
                </div>
            </div>

        </div>
    </div>

    <div class="headerBg2 px-4 py-3 d-flex justify-content-between d-lg-none" title="menu">

        <button data-trigger="navbar_main" class="btn nav_button_toggler" aria-label="Toggle navigation"
            type="button"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>

        <div class="mobile_header_links">
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="las la-search"></i>
                Search</a>
            <a href="{{ route('dashboard.create') }}"><i class="las la-plus-square"></i> Post Free Ad</a>
        </div>

    </div>

    <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-area headerBg2">
        <div class="container-fluid nav_container">

            <div class="offcanvas-header">
                <button class="btn-close float-end close_btn"></button>
            </div>

            <ul class="navbar-nav nav_list ps-lg-5 d-lg-none">
                <li class="nav-item">
                    <h4 class="mobile_nav_heading nav-link">Account</h4>
                </li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register
                        </a></li>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login
                        </a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index') }}">My account
                        </a></li>
                    </li>
                @endauth
            </ul>

            <ul class="navbar-nav nav_list ps-lg-5">
                <li class="nav-item d-lg-none">
                    <h4 class="mobile_nav_heading nav-link">Categories</h4>
                </li>

                @foreach ($categories->take(8) as $category)
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('category', ['slug' => $category->slug]) }}">{{ $category->title }}
                        </a>
                    </li>
                @endforeach

                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('ads') }}">All Categories
                    </a></li> --}}

                <li class="nav-item mb-2 d-lg-none">
                    <h4 class="nav-link mobile_nav_heading">Post Free</h4>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="{{ route('dashboard.create') }}" class="mobile_nav_buttons"><i
                            class="las la-plus-square"></i>
                        Post Free Ad</a>
                </li>
                <li class="nav-item d-lg-none">
                    <a href="{{ route('dashboard.featured') }}" class="mobile_nav_buttons"><i
                            class="las la-bullhorn"></i>
                        Featured Ad</a>
                </li>
            </ul>
            {{-- <ul class="navbar-nav nav_list ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i
                            class="lar la-heart icon"></i> Favourites
                    </a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i
                            class="las la-plus-square"></i> Post Free Ad
                    </a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="las la-user-alt"></i>
                        Login/Register
                    </a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">My Account </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"> Submenu item 1</a></li>
                        <li><a class="dropdown-item" href="#"> Submenu item 2 </a></li>
                    </ul>
                </li>
            </ul> --}}

        </div> <!-- container-fluid.// -->
    </nav>

</header>
