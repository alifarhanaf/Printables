<header>
    <nav class="navbar navbar-expand-lg  py-1 my-0">
      <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01">
        <i class="fa fa-bars"></i>
      </button>
      <a href="{{ route('homeScreen')}}" class="navbar-brand py-0 my-0">
        <img src="{{ asset('storage/images/home/logo.png')}}" alt="logo" class="img-fluid">
      </a>
      <div class="cart_main d-inline-block mr-4 d-lg-none d-block">
        <div class="cart_div">
          <a href=""  class="cart_font">
            <img src="images/SVGS/5.svg">
            <div class="number_div">
                <span>1</span>
            </div>
          </a>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 mx-auto">
          <li class="nav-item active mx-3 ">
            <a class="nav-link" href="#"><img src="{{ asset('storage/images/SVGS/6.svg')}}" class="img-fluid">shop</a>
          </li>
          <li class="nav-item mx-2 text-capitalize">
            <a class="nav-link" href="#"><img src="{{ asset('storage/images/SVGS/4.svg')}}" class="img-fluid">join our house</a>
          </li>
          <li class="nav-item mx-2 text-capitalize">
            <a class="nav-link" href="collection.html"><img src="{{ asset('storage/images/SVGS/2.svg')}}" class="img-fluid">design our house</a>
          </li>
          <li class="nav-item mx-2 text-capitalize">
            <a class="nav-link" href="{{route('aboutUsScreen') }}"><img src="{{ asset('storage/images/SVGS/1.svg')}}" class="img-fluid"></i>about</a>
          </li>
        </ul>
        <div class="buttons_main  my-2 my-lg-0 my-2 my-lg-0 text-lg-left text-center">
            <a href="{{ route('designScreen') }}" class="btn my-btn">START HERE</a>
            <div class="ml-3 d-inline-block mx-4">
              {{-- //START
              <a class="dropdown-item" >
                  <i class="typcn typcn-power-outline"></i> Sign Out</a>
                  
              //End --}}
              <a  class="signoutText" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out mr-1"></i>
                Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </div>
            <div class="cart_main mr-4 d-lg-inline-block d-none">
              <div class="cart_div">
                <a href=""  class="cart_font">
                  <img src="{{ asset('storage/images/SVGS/5.svg')}}" alt="" class="img-fluid">
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