@include('web.includes.header')
@include('web.includes.subheader')
<div class="container-fluid">
  @foreach ($campaigns as $campaign)
    <div class="row">
        <div class="col-md-3">
            <div id="sidebar">
            <div  class="card" style="">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                       
                            <h5 class="card-title">IMPORTANT DATES</h5>
                        
                        <div style="padding-right: 5%">
                            <i  class="fa fa-edit "></i>
                            </div>
                    </div>
                  
                  <ul class="list-group">
                    <li class="list-group-item"><span style="font-weight: 500">RUSH DELIVERY:</span> NO</li>
                    <li class="list-group-item"><span style="font-weight: 500">DELIVERY DUE DATE:</span>    {{$campaign->deliveryDate}}</li>
                    <li class="list-group-item"><span style="font-weight: 500">FINALIZE DESIGN BY:</span>   N/A</li>
                   
                  </ul>
                  
                 
                </div>
              </div>

              <div class="card" style="">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        
                            <h5 class="card-title">SHIPPING ADDRESS</h5>
                        
                            <div style="padding-right: 5%">
                            <i  class="fa fa-edit "></i>
                            </div>
                       
                    </div>
                 @foreach ($campaign->addresses as $address)
                     
                 
                    <p class="large">NAME</p>
                    <p class="smallp">{{$address->firstName. '  ' .$address->lastName }} </p>
                    <p class="large">ADDRESS</p>
                    <p class="smallp" style="margin-bottom: 0px !important">{{$address->addressLine1 }}</p>
                    <p class="smallp" >{{$address->addressLine2 }}</p>
                    <p class="large">CITY</p>
                    <p class="smallp">{{$address->city }}</p>
                    <p class="large">STATE</p>
                    <p class="smallp">{{$address->state }}</p>
                    <p class="large">ZIP CODE</p>
                    <p class="smallp">{{$address->zipCode }}</p>
                  
                  @endforeach
                   
                  
                  
                 
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-9">
            <div id="tabs">
            <div class="card card-body ">
                <div id="cardInsideCard">
                    <div class="row ">
                        <div class="col-md-4 my-auto mid"> 
                          
                              
                          
                            <button type="button" class="btn btn-primary">{{$campaign->id}}</button>     
                        </div>                            
                        <div class="col-md-4  my-auto mid"  id="HeadaingP">
                            <p>{{$campaign->name}}</p>
                        </div>
                        <div class="col-md-4  my-auto mid"  id="HeadaingZ">
                            <p>STATUS: {{$campaign->is_draft == 1 ? 'STATUS_AWAITING':'N/A'}}</p>
                        </div>
                    </div>
                </div>
                </div><!-- card -->
            </div>
             


                    <div id="tabss">
                    <div class="card card-body ">
                        <div class="card-header ">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Messages</a>
                                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Products</a>
                                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Description</a>
                                  
                                </div>
                              </nav>
                          </div><!-- card-header -->
                          <div class="card-body">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12 " style="padding: 0px;">
                               
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                  <div class="tab-pane fade show active" style="padding-left: 15px; padding-right:15px" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      <p style="margin-bottom: 50px; margin-top:20px">
                                    Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                                      </p>
                                </div>

                                  <div class="tab-pane fade" style="padding-left: 15px; padding-right:15px" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div id="BodyCard" >  
                                        
                                            
                                            <table class="table table-responsive d-md-table" style="margin-bottom: 100px; margin-top: 10px;">
                                                <thead>
                                                  <tr>
                                                      
                                                    <th scope="col">GARMENT INFO</th>
                                                    <th scope="col">GARMENT STYLE</th>
                                                    <th scope="col">STYLE NUMBER</th>
                                                    <th scope="col">COLOR</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  @foreach ($campaign->products as $product)
                                                  <tr>
                                                    <th class="new" scope="row">{{$product->name}}</th>
                                                    <th class="new">{{$product->categories[0]->name}} </th>
                                                    <th class="new">6030</th>
                                                    <th class="new">{{$campaign->product_color}}</th>
                                                  </tr>
                                                  @endforeach
                                                  
                                                </tbody>
                                              </table>
                                            
                                            
                                         
                                        
                                  </div>
                                  </div>

                                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                    <div id="BodyCard" >  
                                        
                                            
                                      <table style="margin-left: 15px; margin-right:15px; margin-bottom: 5%; margin-top: 10px;" class="table table-responsive d-md-table" >
                                          <thead>
                                            <tr>
                                                
                                              <th scope="col">DESIGNER</th>
                                              <th scope="col">ESTIMATED QTY</th>
                                              <th scope="col">UNIVERSITY</th>
                                              <th scope="col">CHAPTER</th>
                                                
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <th class="new" scope="row">Juliana Wil</th>
                                              <th class="new">24-47</th>
                                              <th class="new">University of Houston</th>
                                              <th class="new">Alpha Chi Omega</th>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      
                                      </div>
                            <div id="cardLayer">
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >POCKET OF SHIRT </p>
                              <p class="card-text"># OF COLORS: 2</p>
                              </div>
                            </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">Please Make it Centered</p>
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >BACK OF SHIRT </p>
                              <p class="card-text"># OF COLORS: 2</p>
                              </div>
                            </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">Please Make it Centered</p>
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >Sleeves OF SHIRT </p>
                              <p class="card-text"># OF COLORS: 2</p>
                              </div>
                            </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">Please Make it Centered</p>
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >References</p>
                              <p class="card-text"></p>
                              </div>
                            </div>
                            <img src="http://127.0.0.1:8000/storage/images/home/4.png" alt="" class="img-fluid" style="width:40%;height:40%;">
                             
                          
                          </div>
                            
                            </div>
                        
                                </div>
                                  
                                </div>
                              
                              </div>
                            </div>
                      </div>
                    </div>
                    </div>
                    </div>
              
              
                       





                


            
        </div>
    </div>
    @endforeach
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