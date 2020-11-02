<body class="az-body az-body-sidebar az-body-dashboard-nine">

    <div class="az-sidebar az-sidebar-sticky az-sidebar-indigo-dark">
      {{-- <div class="az-sidebar-header">
        <a href="../template/index.html" class="az-logo">Geneologie</a>
      </div><!-- az-sidebar-header --> --}}
      <div class="az-sidebar-loggedin mg-t-20">
        <div class="az-img-user online"><img src="https://via.placeholder.com/500" alt=""></div>
        <div class="media-body">
          <h6>Farhan</h6>
          <span>Admin Role </span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <li class="nav-item active show">
            <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Product</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('product.form') }}" class="nav-sub-link">Add Product</a></li>
              <li class="nav-sub-item"><a href="{{ route('product.grid') }}"  class="nav-sub-link">Products Grid</a></li>
              {{-- <li class="nav-sub-item"><a href="dashboard-three.html" class="nav-sub-link">Ad Campaign</a></li>
              <li class="nav-sub-item"><a href="dashboard-four.html" class="nav-sub-link">Event Management</a></li>
              <li class="nav-sub-item"><a href="dashboard-five.html" class="nav-sub-link">Helpdesk Management</a></li>
              <li class="nav-sub-item"><a href="dashboard-six.html" class="nav-sub-link">Finance Monitoring</a></li>
              <li class="nav-sub-item"><a href="dashboard-seven.html" class="nav-sub-link">Cryptocurrency</a></li>
              <li class="nav-sub-item"><a href="dashboard-eight.html" class="nav-sub-link">Executive / SaaS</a></li>
              <li class="nav-sub-item active"><a href="dashboard-nine.html" class="nav-sub-link">Campaign Monitoring</a></li>
              <li class="nav-sub-item"><a href="dashboard-ten.html" class="nav-sub-link">Product Management</a></li> --}}
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Brands</a>
            <ul class="nav-sub">
              <li class="nav-sub-item">
                <a href="{{ route('brand.form') }}" class="nav-sub-link">Add Brand</a>
              </li>
              <li class="nav-sub-item">
                <a href="{{ route('brand.grid') }}" class="nav-sub-link">Brand Grid</a>
              </li>
              {{-- <li class="nav-sub-item">
                <a href="app-calendar.html" class="nav-sub-link">Calendar</a>
              </li>
              <li class="nav-sub-item">
                <a href="app-contacts.html" class="nav-sub-link">Contacts</a>
              </li>
              <li class="nav-sub-item"><a href="page-profile.html" class="nav-sub-link">Profile</a></li>
              <li class="nav-sub-item"><a href="page-invoice.html" class="nav-sub-link">Invoice</a></li>
              <li class="nav-sub-item"><a href="page-signin.html" class="nav-sub-link">Sign In</a></li>
              <li class="nav-sub-item"><a href="page-signup.html" class="nav-sub-link">Sign Up</a></li>
              <li class="nav-sub-item"><a href="page-404.html" class="nav-sub-link">Page 404</a></li> --}}
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-book"></i>Designs</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('design.form') }}"  class="nav-sub-link">Add Design</a></li>
              <li class="nav-sub-item"><a href="{{ route('design.grid') }}" class="nav-sub-link">Design Grid</a></li>
              {{-- <li class="nav-sub-item"><a href="elem-avatar.html" class="nav-sub-link">Avatar</a></li>
              <li class="nav-sub-item"><a href="elem-badge.html" class="nav-sub-link">Badge</a></li>
              <li class="nav-sub-item"><a href="elem-breadcrumbs.html" class="nav-sub-link">Breadcrumbs</a></li>
              <li class="nav-sub-item"><a href="elem-buttons.html" class="nav-sub-link">Buttons</a></li>
              <li class="nav-sub-item"><a href="elem-cards.html" class="nav-sub-link">Cards</a></li>
              <li class="nav-sub-item"><a href="elem-carousel.html" class="nav-sub-link">Carousel</a></li>
              <li class="nav-sub-item"><a href="elem-collapse.html" class="nav-sub-link">Collapse</a></li>
              <li class="nav-sub-item"><a href="elem-dropdown.html" class="nav-sub-link">Dropdown</a></li>
              <li class="nav-sub-item"><a href="elem-icons.html" class="nav-sub-link">Icons</a></li>
              <li class="nav-sub-item"><a href="elem-images.html" class="nav-sub-link">Images</a></li>
              <li class="nav-sub-item"><a href="elem-list-group.html" class="nav-sub-link">List Group</a></li>
              <li class="nav-sub-item"><a href="elem-media-object.html" class="nav-sub-link">Media Object</a></li>
              <li class="nav-sub-item"><a href="elem-modals.html" class="nav-sub-link">Modals</a></li>
              <li class="nav-sub-item"><a href="elem-navigation.html" class="nav-sub-link">Navigation</a></li>
              <li class="nav-sub-item"><a href="elem-pagination.html" class="nav-sub-link">Pagination</a></li>
              <li class="nav-sub-item"><a href="elem-popover.html" class="nav-sub-link">Popover</a></li>
              <li class="nav-sub-item"><a href="elem-progress.html" class="nav-sub-link">Progress</a></li>
              <li class="nav-sub-item"><a href="elem-spinners.html" class="nav-sub-link">Spinners</a></li>
              <li class="nav-sub-item"><a href="elem-toast.html" class="nav-sub-link">Toast</a></li>
              <li class="nav-sub-item"><a href="elem-tooltip.html" class="nav-sub-link">Tooltip</a></li> --}}
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-edit"></i>Groups</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a  href="{{ route('group.form') }}" class="nav-sub-link">Add Group</a></li>
              <li class="nav-sub-item"><a  href="{{ route('group.grid') }}" class="nav-sub-link">Groups Grid</a></li>
              <li class="nav-sub-item"><a  href="{{ route('printType.form') }}" class="nav-sub-link">Add Print Types</a></li>
              {{-- <li class="nav-sub-item"><a href="form-validation.html" class="nav-sub-link">Form Validation</a></li>
              <li class="nav-sub-item"><a href="form-wizards.html" class="nav-sub-link">Form Wizards</a></li>
              <li class="nav-sub-item"><a href="form-editor.html" class="nav-sub-link">WYSIWYG Editor</a></li> --}}
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-bar-outline"></i>Categories</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('category.form') }}" class="nav-sub-link">Add Categories</a></li>
              <li class="nav-sub-item"><a href="{{ route('category.grid') }}" class="nav-sub-link">Categories Grid</a></li>
              {{-- <li class="nav-sub-item"><a href="chart-chartjs.html" class="nav-sub-link">ChartJS</a></li>
              <li class="nav-sub-item"><a href="chart-sparkline.html" class="nav-sub-link">Sparkline</a></li>
              <li class="nav-sub-item"><a href="chart-peity.html" class="nav-sub-link">Peity</a></li> --}}
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-map"></i>Misc</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('faq.form') }}" class="nav-sub-link">Add FAQS</a></li>
              <li class="nav-sub-item"><a href="{{ route('printType.form') }}" class="nav-sub-link">Add Print Types</a></li>
              <li class="nav-sub-item"><a href="{{ route('printLocation.form') }}" class="nav-sub-link">Add Print Locations</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-tabs-outline"></i>Misc Grids</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('faq.grid') }}" class="nav-sub-link">FAQs Grid</a></li>
              <li class="nav-sub-item"><a href="table-data.html" class="nav-sub-link">Data Tables</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-archive"></i>Utilities</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="util-background.html" class="nav-sub-link">Background</a></li>
              {{-- <li class="nav-sub-item"><a href="util-border.html" class="nav-sub-link">Border</a></li>
              <li class="nav-sub-item"><a href="util-display.html" class="nav-sub-link">Display</a></li>
              <li class="nav-sub-item"><a href="util-flex.html" class="nav-sub-link">Flex</a></li>
              <li class="nav-sub-item"><a href="util-height.html" class="nav-sub-link">Height</a></li>
              <li class="nav-sub-item"><a href="util-margin.html" class="nav-sub-link">Margin</a></li>
              <li class="nav-sub-item"><a href="util-padding.html" class="nav-sub-link">Padding</a></li>
              <li class="nav-sub-item"><a href="util-position.html" class="nav-sub-link">Position</a></li>
              <li class="nav-sub-item"><a href="util-typography.html" class="nav-sub-link">Typography</a></li> --}}
              <li class="nav-sub-item"><a href="util-width.html" class="nav-sub-link">Width</a></li>
              <li class="nav-sub-item"><a href="util-extras.html" class="nav-sub-link">Extras</a></li>
            </ul>
          </li><!-- nav-item -->
        </ul><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div><!-- az-sidebar -->
    <div class="az-content az-content-dashboard-nine">
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
            <div class="dropdown az-header-notification">
              <a href="" class="new"><i class="typcn typcn-bell"></i></a>
              <div class="dropdown-menu">
                <div class="az-dropdown-header mg-b-20 d-sm-none">
                  <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                </div>
                <h6 class="az-notification-title">Notifications</h6>
                <p class="az-notification-text">You have 2 unread notification</p>
                <div class="az-notification-list">
                  <div class="media new">
                    <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                    <div class="media-body">
                      <p>Congratulate <strong>Socrates Itumay</strong> for work anniversaries</p>
                      <span>Mar 15 12:32pm</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media new">
                    <div class="az-img-user online"><img src="https://via.placeholder.com/500" alt=""></div>
                    <div class="media-body">
                      <p><strong>Joyce Chua</strong> just created a new blog post</p>
                      <span>Mar 13 04:16am</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                    <div class="media-body">
                      <p><strong>Althea Cabardo</strong> just created a new blog post</p>
                      <span>Mar 13 02:56am</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                  <div class="media">
                    <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                    <div class="media-body">
                      <p><strong>Adrian Monino</strong> added new comment on your photo</p>
                      <span>Mar 12 10:40pm</span>
                    </div><!-- media-body -->
                  </div><!-- media -->
                </div><!-- az-notification-list -->
                <div class="dropdown-footer"><a href="">View All Notifications</a></div>
              </div><!-- dropdown-menu -->
            </div>
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

                <a href="" class="dropdown-item"><i class="typcn typcn-user-outline"></i> My Profile</a>
                <a href="" class="dropdown-item"><i class="typcn typcn-edit"></i> Edit Profile</a>
                <a href="" class="dropdown-item"><i class="typcn typcn-time"></i> Activity Logs</a>
                <a href="" class="dropdown-item"><i class="typcn typcn-cog-outline"></i> Account Settings</a>
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
      {{-- <div class="az-content-header">
        <div>
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Hi, welcome back!</h2>
          <p class="mg-b-0">Your campaign monitoring dashboard template.</p>
        </div>
      </div><!-- az-content-header --> --}}
      <div class="az-content-body">