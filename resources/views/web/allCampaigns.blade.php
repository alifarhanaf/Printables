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
                <i  class="fa fa-edit "></i>
                &nbsp &nbsp
                <p>NEW CAMPAIGN</p>
                </div>
                </a>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                  <a href="{{route('designScreen')}}">
                    <div class="row">
                <i  class="fa fa-photo "></i>
                &nbsp &nbsp 
                <p>VISIT DESIGN GALLERY</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center align-middle py-auto my-auto">
                <i  class="fa fa-user "></i>
                &nbsp &nbsp
                <p>REFER A FRIEND</p>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                  <a href="{{route('homeScreen')}}">
                    <div class="row">
                <i  class="fa fa-shopping-bag "></i>
                &nbsp &nbsp
                <p>VISIT STORE</p>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                <i  class="fa fa-question-circle "></i>
                &nbsp &nbsp
                <p>HELP</p>
                </div>
            </div>
        </div>
      </div><!-- card -->
    </div>

    <h4  >OPEN ODERS:</h4>


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
                        <button type="submit" class="btn btn-primary">{{$activeCampaign->id}}</button>   
                        <a href="{{ route ('campaignScreen',$activeCampaign->id) }}">
                          {{$activeCampaign->name}}
                        </a>
                        
                    </form>
                    </th>
                    <th class="new">{{$activeCampaign->updated_at}}</th>
                    
                    <th class="new">
                      @if($activeCampaign->status==1)
                              DESIGN AWAITING
                              @elseif($activeCampaign->status==2)
                              DESIGN IN PROCESS
                              @elseif($activeCampaign->status==3)
                              DESIGN APPROVED
                              @elseif($activeCampaign->status==4)
                              IN PROCESS
                              @elseif($activeCampaign->status==5)
                              CAMPAIGN APPROVED
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

    <h4  >CLOSED ODERS:</h4>


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
                        <button type="button" class="btn btn-primary">{{$closedCampaign->id}}</button>
                        <a href="{{ route ('campaignScreen',$activeCampaign->id) }}">   
                        {{$closedCampaign->name}}
                        </a>
                    </th>
                    <th class="new">{{$closedCampaign->updated_at}}</th>
                    <th class="new">View Total Ordered</th>
                    <th class="new">{{$closedCampaign->deliveryDate}}</th>
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
    color: #84a0bf !important;
  }
  #BodyCard a:hover{
    color: #1c2e42 !important;
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
    color: #84a0bf;
  }
  #hoverAnchor p:hover {
    color: #1c2e42;
  }
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