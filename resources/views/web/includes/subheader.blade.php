<header>
    <nav class="navbar navbar-expand-lg  py-1 my-0">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01">
                <i class="fa fa-bars"></i>
            </button>
            <a href="{{ route('homeScreen') }}" class="navbar-brand py-0 my-0">
                <img src="{{ asset('storage/images/home/logo.png') }}" alt="logo" class="img-fluid">
            </a>
            <div class="cart_main d-inline-block mr-4 d-lg-none d-block">
                <div class="cart_div">
                    <a href="" class="cart_font">
                        <img src="{{ asset('storage/images/SVGS/5.svg') }}">
                        <div class="number_div">
                            <span>1</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : ''}} mx-3 ">
                        <a class="nav-link" href="{{ route('homeScreen') }}">
                            {{-- <img src="{{ asset('storage/images/SVGS/6.svg') }}" class="img-fluid"> --}}
                            <i class="fa fa-shopping-bag"></i>
                            shop</a>
                    </li>
                    <li class="nav-item {{ request()->is('joinOurHouse') ? 'active' : ''}} mx-2 text-capitalize">
                        <a class="nav-link" href="{{ route('JoinOurHouse') }}">
                            {{-- <img src="{{ asset('storage/images/SVGS/4.svg') }}"
                                class="img-fluid"> --}}
                                <i class="fa fa-home"></i>
                                join our house</a> 
                    </li>
                    <li class="nav-item {{ request()->is('designs') ? 'active' : ''}} mx-2 text-capitalize">
                        <a class="nav-link" href="{{ route('designScreen') }}">
                            {{-- <img
                                src="{{ asset('storage/images/SVGS/2.svg') }}" class="img-fluid"> --}}
                                <i class="fa fa-star"> </i>
                                 Designs</a>
                    </li> 
                    <li class="nav-item {{ request()->is('aboutUs') ? 'active' : ''}} mx-2 text-capitalize">
                        <a class="nav-link" href="{{ route('aboutUsScreen') }}">
                            {{-- <img
                                src="{{ asset('storage/images/SVGS/1.svg') }}" class="img-fluid"> --}}
                            <i class="fa fa-info "> </i>     About</a>
                    </li>
                    @if (Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item {{ request()->is('allCampaigns') ? 'active' : ''}}  mx-2 text-capitalize">
                            <a class="nav-link" href="{{ route('allCampaigns') }}">
                                {{-- <img
                                    src="{{ asset('storage/images/SVGS/1.svg') }}" class="img-fluid"> --}}
                                <i class="fa fa-list-alt"></i>
                                Campaigns</a>
                        </li>
                    @endif
                </ul>
                <div class="buttons_main  my-2 my-lg-0 my-2 my-lg-0 text-lg-left text-center">
                    <a href="{{ route('designScreen') }}" class="btn my-btn">START HERE</a>

                    @if (Illuminate\Support\Facades\Auth::check())
                        <div class="ml-3 d-inline-block mx-4">
                            <a class="signoutText" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out mr-1"></i>
                                LOGOUT
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    @else
                        <div class="ml-3 d-inline-block mx-4">
                            <a class="signoutText" href="{{ route('login') }}">
                                <i class="fa fa-user mr-1"></i>
                                LogIn
                            </a>

                        </div>
                    @endif
                    <div class="cart_main mr-4 d-lg-inline-block d-none">
                        <div class="cart_div">
                            <a href="" class="cart_font">
                                <img src="{{ asset('storage/images/SVGS/5.svg') }}" alt="" class="img-fluid">
                                <div class="number_div">
                                    <span>1</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
