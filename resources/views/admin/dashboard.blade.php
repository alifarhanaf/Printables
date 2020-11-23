@include('admin.includes.header')
@include('admin.includes.sidebar')

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
            @if($messageCount == 0)
            <style>.az-header-notification > a.new::before { display: none;}</style>
            @endif
          <a href="" class="new"><i class="typcn typcn-messages"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Messages</h6>
            <div class="az-notification-list">
                {{-- <p>{{$messages[0]['campaignName']}}</p> --}}
                @foreach($messages as $msg)
                
                {{-- <P>{{$notification['campaignName']}}<p> --}}
                
                    @if($msg['created_at'])
              <a href="{{ route('campaignScreenAdmin1',$msg['campaignId']) }}">
              <div class="media new">
                <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                <div class="media-body">
                  <p>New Message From <strong>{{$msg['from']}}</strong> against Campaign {{$msg['campaignName']}} </p>
                <span>{{$msg['created_at']}}</span>
                </div>
              </div>
              </a>
              @endif
              
              @endforeach
              <p> No New Messages Available</p>
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Messages</a></div>
          </div><!-- dropdown-menu -->
        </div>
        <!-- End Notification Bell-->
        
        <div class="dropdown az-header-notification">
            @if(count($notifications) < 0)
            <style>.az-header-notification > a.new::before { display: none;}</style>
            @endif
          <a href="" class="new"><i class="typcn typcn-bell"></i></a>
          <div class="dropdown-menu">
            <div class="az-dropdown-header mg-b-20 d-sm-none">
              <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
            </div>
            <h6 class="az-notification-title">Notifications</h6>
            <div class="az-notification-list">
                {{-- <p>{{$messages[0]['campaignName']}}</p> --}}
                @foreach($notifications as $notify)
                
                {{-- <P>{{$notification['campaignName']}}<p> --}}
                
                @if($notify['type'] == 'App\Notifications\DesignApprovalNotification')
               
              <a href="{{ route('campaignScreenAdmin2',['id'=>$notify['data']['id'],'bid'=>$notify['id']]) }}"  >
              <div class="media new">
                <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                <div class="media-body">
                    
                    <p>User Approved Design for 
                        <strong> {{$notify['data']['id']}} {{$notify['data']['name'] }}</strong>
                         . </p>
                  <span>{{$notify['created_at']}}</span>

                   
                </div>
              </div>
            </a>
            
           
              @elseif($notify['type'] == 'App\Notifications\CampaignSubmissionNotification')
            
              <a href="{{ route('campaignScreenAdmin2',['id'=>$notify['data']['id'],'bid'=>$notify['id']]) }}" >
              <div class="media new">
                <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
                <div class="media-body">
                    
                    <p>New Campaign 
                        <strong> {{$notify['data']['id']}} {{$notify['data']['name'] }}</strong>
                         has been Submitted. </p>
                  <span>{{$notify['created_at']}}</span>
                   
                </div>
              </div>
            </a>
              
              @endif
              @endforeach
            </div><!-- az-notification-list -->
            <div class="dropdown-footer"><a href="">View All Notifications</a></div>
          </div><!-- dropdown-menu -->
        </div>


        {{-- End Messages --}}


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



{{-- End Here --}}

    <div class="row row-sm">
        <div class="col-md">
<form class="d-flex justify-content-end mb-3" method="GET" action="{{ route('dashboard') }}">
    <input type="search" name="datefilter" style="border:1px solid #3366ff" value="" class="" placeholder="Select date.."/>
    <button class="btn btn-primary ml-2">Apply</button>
</form>
        </div>
    </div>
<div class="row row-sm">
    <div class="col-md">
      <div class="card card-body bg-gray-200 bd-0" style="    border-left: 5px solid #5b47fb;">
          <h5>TOTAL USERS</h5>
        <p class="card-text">{{$userCount}}</p>
      </div><!-- card -->
    </div><!-- col -->
    <div class="col-md mg-t-20 mg-md-t-0">
      <div class="card card-body bg-gray-200 bd-0" style="    border-left: 5px solid #5b47fb;">
        <h5 >TOTAL CAMPAIGNS</h5>
        <p class="card-text">{{$campaignCount}}</p>
    </div><!-- card -->
    </div><!-- col -->
    <div class="col-md mg-t-20 mg-md-t-0">
      <div class="card card-body bg-gray-200  bd-0" style="    border-left: 5px solid #5b47fb;">
        <h5>PENDING CAMPAIGNS</h5>
        <p class="card-text">{{$pendingCampaigns}}</p>
    </div><!-- card -->
    </div><!-- col -->
    <div class="col-md mg-t-20 mg-md-t-0">
        <div class="card card-body bg-gray-200  bd-0" style="    border-left: 5px solid #5b47fb;">
          <h5>COMPLETED CAMPAIGNS</h5>
          <p class="card-text">{{$completedCampaigns}}</p>
      </div><!-- card -->
      </div><!-- col -->
  </div><!-- row -->

@include('admin.includes.footer')
<script>
$('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
        cancelLabel: 'Clear'
    }
});
$('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
    $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
});
$('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
    $(this).val('');
});
</script>