@include('web.includes.header')
@include('web.includes.subheader')
<div class="container">
    <div id="mainHeader">
    <div class="card card-body ">
        <div id="hoverAnchor" class="row py-auto  ">
            <div class="col-md ">
                <div class="row d-flex justify-content-center">
                <a  href="{{route('designScreen')}}">
                <div class="row">
                  <p>
                <i  class="fa fa-edit "></i>
           
                New Campaign</p>
                </div>
                </a>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                  <a href="{{route('designScreen')}}">
                    <div class="row">
                      <p>
                <i  class="fa fa-photo "></i>
                
                Visit Design Gallery</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center align-middle py-auto my-auto">
                  <p>
                <i  class="fa fa-user "></i>
                
                Refer A Friend</p>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                  <a href="{{route('homeScreen')}}">
                    <div class="row">
                      <p>
                <i  class="fa fa-shopping-bag "></i>
               
                Visit Store</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                  <p>
                <i  class="fa fa-question-circle "></i>
         
                Help</p>
                </div>
            </div>
        </div>
      </div><!-- card -->
    </div>

    <h4 style="    font-weight: bold;
    color: #84a0ac;" >OPEN ODERS:</h4>


    <div id="activeOrdersCard">
    <div class="card card-body ">
        <div id="BodyCard" >                         
            <table class="table table-responsive d-md-table" style=" margin-top: 10px;">
                <thead>
                  <tr> 
                    <th scope="col">CAMPAIGN</th>
                    <th scope="col">UPDATED AT</th>
                    <th scope="col">STATUS</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($activeCampaigns as $activeCampaign)
                        
                    
                  <tr>
                    <th class="new" scope="row">
                        <form action="{{ route ('campaignScreen',$activeCampaign->id) }}" >
                            {{ csrf_field() }}
                        <button type="submit" class="btn my-btn">{{$activeCampaign->id}}</button>   
                        <a href="{{ route ('campaignScreen',$activeCampaign->id) }}">
                          {{$activeCampaign->name}}
                        </a>
                        
                    </form>
                    </th>
                    <th class="new t-font">{{$activeCampaign->updated_at}}</th>
                    
                    <th class="new t-font">
                      @if($activeCampaign->status==1)
                              Design Awaiting
                              @elseif($activeCampaign->status==2)
                              Design In Process
                              @elseif($activeCampaign->status==3)
                              Design Approved
                              @elseif($activeCampaign->status==4)
                              In Process
                              @elseif($activeCampaign->status==5)
                              Campaign Approved
                              @endif
                        {{-- {{$activeCampaign->status == 1 ? 'STATUS_AWAITING':'N/A'}} --}}
                    </th>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div><!-- card -->
    </div>

    <h4 style="    font-weight: bold;
    color: #84a0ac;"  >CLOSED ODERS:</h4>


    <div id="activeOrdersCard">
    <div id="colsedOrders" class="card card-body ">
        <div id="BodyCard" >                         
            <table class="table table-responsive d-md-table" style=" margin-top: 10px;">
                <thead>
                  <tr> 
                    <th scope="col">CAMPAIGN</th>
                    <th scope="col">UPDATED AT</th>
                    <th scope="col">VIEW TOTAL ORDERS</th>
                    <th scope="col">DELIVERY DATE</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach ($closedCampaigns as $closedCampaign)
                  <tr>
                    <th class="new" scope="row">
                      <form action="{{ route ('campaignScreen',$activeCampaign->id) }}" >
                        {{ csrf_field() }}
                        <button type="submit" class="btn my-btn">{{$closedCampaign->id}}</button>
                        <a href="{{ route ('campaignScreen',$activeCampaign->id) }}">   
                        {{$closedCampaign->name}}
                        </a>
                      </form>
                    </th>
                    <th class="new t-font">{{$closedCampaign->updated_at}}</th>
                    <th class="new t-font">View Total Ordered</th>
                    <th class="new t-font">{{$closedCampaign->deliveryDate}}</th>
                  </tr>
                  @endforeach
                 
                    
                </tbody>
              </table>
        </div>
    </div><!-- card -->
    </div>













</div>
@include('web.includes.subfooter')
@include('web.includes.footer')
<style>
  #BodyCard a {
    color: #898989 !important;
  }
  #BodyCard a:hover{
    color: #5E7179  !important;
    text-decoration: none;
  }
  /* #colsedOrders a {
    color: #84a0bf !important;
  }
  #colsedOrders a:hover{
    color: #1c2e42 !important;
    text-decoration: none;
  } */
  #hoverAnchor a:hover{
    text-decoration: none;
    color: ;
  }
  #hoverAnchor p {
    color: #84a0ac;
  }
  #hoverAnchor p:hover {
    color: #5E7179;
  }
  #hoverAnchor p:hover i {
    color: #5E7179;
  }
  /* #mainHeader i:hover {
    font-size: 1.3rem !important;
    color: #1c2e42;
  
} */
  </style>
<script>
   $(document).ready(function(){
       
      //  $("#messages").click(function(){
    //    var selected = $(this).children("option:selected").val();
    // alert('Hi');
    //   console.log(selected);
    //   $.ajax({
    //        url: 'allPrintTypeFaqs/'+selected,
    //        type: 'get',
    //        success: function(response){
               
    //            console.log(response);
    //            $('#faqs').html(response);
               
    //        }
    //    });
  //  });
   }); 
</script>
@include('web.includes.endfile')