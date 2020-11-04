@include('web.includes.header')
@include('web.includes.subheader')
<div class="container-fluid">
    <div id="mainHeader">
    <div class="card card-body ">
        <div class="row py-auto  ">
            <div class="col-md ">
                <div class="row d-flex justify-content-center">
                
                <i  class="fa fa-edit "></i>
                &nbsp &nbsp
                <p>NEW CAMPAIGN</p>
                </div>
            </div>
            <div class="col-md">
                <div class="row d-flex justify-content-center">
                <i  class="fa fa-photo "></i>
                &nbsp &nbsp
                <p>VISIT DESIGN GALLERY</p>
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
                <i  class="fa fa-shopping-bag "></i>
                &nbsp &nbsp
                <p>VISIT STORE</p>
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

    <h4 style="margin-inline-start: 5%" >OPEN ODERS:</h4>


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
                        {{$activeCampaign->name}}
                    </form>
                    </th>
                    <th class="new">{{$activeCampaign->updated_at}}</th>
                    
                    <th class="new">
                        {{$activeCampaign->is_draft == 1 ? 'STATUS_AWAITING':'N/A'}}
                    </th>
                   
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div><!-- card -->
    </div>

    <h4 style="margin-inline-start: 5%" >CLOSED ODERS:</h4>


    <div id="activeOrdersCard">
    <div class="card card-body ">
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
                        {{$closedCampaign->name}}
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
   });
   }); 
</script>
@include('web.includes.endfile')