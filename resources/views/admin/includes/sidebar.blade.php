<body class="az-body az-body-sidebar az-body-dashboard-nine">
    <div class="az-sidebar az-sidebar-sticky az-sidebar-indigo-dark">
      <div class="az-sidebar-loggedin mg-t-20">
        <div class="az-img-user online"><img src="https://via.placeholder.com/500" alt=""></div>
        <div class="media-body">
          <h6>Admin 1</h6>
          <span>Admin Role </span>
        </div><!-- media-body -->
      </div><!-- az-sidebar-loggedin -->
      <div class="az-sidebar-body">
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <li class="nav-item active show">
            <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Dashboard</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('dashboard') }}" class="nav-sub-link">Dashboard</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item ">
            <a href="index.html" class="nav-link with-sub"><i class="typcn typcn-clipboard"></i>Product</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('product.form') }}" class="nav-sub-link">Add Product</a></li>
              <li class="nav-sub-item"><a href="{{ route('product.grid') }}"  class="nav-sub-link">All Products</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-document"></i>Brands</a>
            <ul class="nav-sub">
              <li class="nav-sub-item">
                <a href="{{ route('brand.form') }}" class="nav-sub-link">Add Brand</a>
              </li>
              <li class="nav-sub-item">
                <a href="{{ route('brand.grid') }}" class="nav-sub-link">All Brands</a>
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
              <li class="nav-sub-item"><a href="{{ route('design.grid') }}" class="nav-sub-link">All Designs</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-edit"></i>Groups</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a  href="{{ route('group.form') }}" class="nav-sub-link">Add Group</a></li>
              <li class="nav-sub-item"><a  href="{{ route('group.grid') }}" class="nav-sub-link">All Groups</a></li>
              <li class="nav-sub-item"><a  href="{{ route('printType.form') }}" class="nav-sub-link">Add Print Types</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-chart-bar-outline"></i>Categories</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('category.form') }}" class="nav-sub-link">Add Categories</a></li>
              <li class="nav-sub-item"><a href="{{ route('category.grid') }}" class="nav-sub-link">All Categories</a></li>
              
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
              <li class="nav-sub-item"><a href="{{ route('faq.grid') }}" class="nav-sub-link">All FAQs</a></li>
            </ul>
          </li><!-- nav-item -->
          <li class="nav-item">
            <a href="" class="nav-link with-sub"><i class="typcn typcn-tabs-outline"></i>Campaigns</a>
            <ul class="nav-sub">
              <li class="nav-sub-item"><a href="{{ route('allCampaignsAdmin') }}" class="nav-sub-link">All Campaigns</a></li>
            </ul>
          </li><!-- nav-item -->
          
        </ul><!-- nav -->
      </div><!-- az-sidebar-body -->
    </div><!-- az-sidebar -->
    <div class="az-content az-content-dashboard-nine">
      
      {{-- <div class="az-content-header">
        <div>
          <h2 class="az-content-title mg-b-5 mg-b-lg-8">Hi, welcome back!</h2>
          <p class="mg-b-0">Your campaign monitoring dashboard template.</p>
        </div>
      </div><!-- az-content-header --> --}}
      <div class="az-content-body">
