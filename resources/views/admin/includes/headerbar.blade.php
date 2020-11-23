<div class="az-header az-header-dashboard-nine">
    <div class="container-fluid">
      <div class="az-header-left">
        <a href="" id="azSidebarToggle" class="az-header-menu-icon"><span></span></a>
      </div><!-- az-header-left -->
      <div class="az-header-center">
        {{-- <input type="search" class="form-control" placeholder="Search for anything..."> --}}
        {{-- <button class="btn"><i class="fas fa-search"></i></button> --}}
        <a href="{{ route('dashboard') }}" class="az-logo "> Geneologie</a>
      </div><!-- az-header-center -->
      <div class="az-header-right">
        
       
        
        @guest
        {{-- <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> Log In</a> --}}
        @if (Route::has('register'))
        {{-- <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Sign Up </a> --}}
        @endif
        @else
         {{-- Message Header --}}
        {{-- <div class="az-header-message">
          <a href="app-chat.html"><i class="typcn typcn-messages"></i></a>
        </div> --}}
        <!-- End Message Header -->


        {{-- Notification Header --}}
        {{-- <div class="dropdown az-header-notification">
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <div class="az-notification-list">
              <div class="media new">
                <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                <div class="media-body">
                  <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                  <span>Mar 15 12:32pm</span>
                </div>
              </div>
            

              
              
              
            </div>
            
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div>
        
        </div> --}}
        <!-- End Notification Header-->


        <div class="dropdown az-profile-menu">
          <a href="" class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <div class="az-header-profile">
              <div class="az-img-user">
                <img src="https://via.placeholder.com/500" alt="">
              </div><!-- az-img-user -->
              <h6>Farhan Ali</h6>
              <span>Admin Member</span>
            </div><!-- az-header-profile -->

            
            {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form> --}}
            <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
              <i class="typcn typcn-power-outline"></i> Sign Out</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div><!-- dropdown-menu -->
        </div>
        @endguest
      </div><!-- az-header-right -->
    </div><!-- container -->
  </div><!-- az-header -->