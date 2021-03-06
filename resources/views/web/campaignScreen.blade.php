@include('web.includes.header')
@include('web.includes.subheader')
<div class="container">

 
    <div class="row">
        <div class="col-md-3">
            <div id="sidebar">
            <div  class="card" style="">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                       
                            <h5 style="font-weight: bold;line-height: 2.2rem;" class="card-title">Important Dates</h5>
                        
                        <div style="padding-right: 5%">
                          <a href="#exampleModalCenter" data-toggle="modal" data-target="#exampleModalCenter">
                            
                            <i  class="fa fa-edit "></i>
                          </a>
                            </div>
                    </div>
                  
                  <ul class="list-group">
                    <li class="list-group-item" style="padding: .25rem 0rem;"><span style="font-weight: 500;color:#84a0ac;">Rush Delivery:</span> {{ ($campaign->rush_delivery == 0) ? 'No' : 'Yes' }}</li>
                    <li class="list-group-item" style="padding: .25rem 0rem;"><span style="font-weight: 500;color:#84a0ac;">Delivery Due Date:</span>    {{$campaign->deliveryDate}}</li>
                    <li class="list-group-item"style="padding: .25rem 0rem;" ><span style="font-weight: 500;color:#84a0ac;">Finalize Design By:</span>   N/A</li>
                   
                  </ul>
                  
                 
                </div>
              </div>
                {{-- //Start --}}
                  


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog " role="document">
    
    <form action="{{ route('rushDelivery',$campaign->id) }}" method="POST" >
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title my-auto" id="exampleModalLabel" style="text-transform: capitalize;
        color: #84a0ac;
        text-align: center;
        font-size: 1.5rem;
        padding-left: 2%;
        font-weight: bold;">Edit Delivery Date</h5>
        <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBodyContent">
        {{-- Body Start --}}
          <div class="form-group col-md-12">
            <label class="modalLabels" for="addcheck">Rush Delivery</label>
            <select id="addcheck" name="rushDelivery" class="form-control form_class">
              <option value="1" >Yes</option>
              <option value="0">No</option>
              
            </select>
          </div>
         
            <div class="form-group col-md-12">
              <label class="modalLabels" >Change Delivery Date</label>
              <input type="date" class="form-control form_class" value="{{$campaign->deliveryDate}}" name="deliveryDate" id="dd">
                
            </div>
        {{-- BodyEnd --}}
        
      </div>
      <div class="modal-footer" id="footer-button">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn my-btn">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
                            {{-- //End --}}

              <div class="card" style="">
                <div class="card-body">
                    <div class="row d-flex justify-content-between">
                        
                            <h5 style="font-weight: bold;line-height: 2.2rem;" class="card-title">Shipping Address</h5>
                        
                            <div style="padding-right: 5%">
                              <a href="#exampleModalCenter1" data-toggle="modal" data-target="#exampleModalCenter1">
                            <i  class="fa fa-edit "></i>
                              </a>
                            </div>
                       
                    </div>
                 @foreach ($campaign->addresses as $address)
                     
                 
                    <p class="large" style="font-weight: 500;">Name</p>
                    <p class="smallp">{{$address->firstName. '  ' .$address->lastName }} </p>
                    <p class="large" style="font-weight: 500;">Address</p>
                    <p class="smallp" style="margin-bottom: 0px !important">{{$address->addressLine1 }}</p>
                    <p class="smallp" >{{$address->addressLine2 }}</p>
                    <p class="large" style="font-weight: 500;">City</p>
                    <p class="smallp">{{$address->city }}</p>
                    <p class="large" style="font-weight: 500;">State</p>
                    <p class="smallp">{{$address->state }}</p>
                    <p class="large" style="font-weight: 500;">Zip Code</p>
                    <p class="smallp">{{$address->zipCode }}</p>


                     {{-- //Start --}}
                  


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1Title" aria-hidden="true">
  <div class="modal-dialog " role="document">
    
    <form action="{{ route('editAddress',$address->id) }}" method="POST" >
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title my-auto" id="exampleModalLabel" style="text-transform: capitalize;
        color: #84a0ac;
        text-align: center;
        font-size: 2rem;
        padding-left: 2%;
        font-weight: bold;">Edit Shipping Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBodyContent">
        {{-- Body Start --}}
          {{-- <div class="form-group col-md-12">
            <label for="addcheck">Rush Delivery</label>
            <select id="addcheck" name="rushDelivery" class="form-control form_class">
              <option value="1" >Yes</option>
              <option value="0">No</option>
              
            </select>
          </div> --}}
         
          <div class="form-group col-md-12" >
            <label class="modalLabels" >Address Name</label>
            <input type="text" class="form-control form_class" name="addressName"  value="{{$address->addressName }}" >
              
          </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >First Name</label>
              <input type="text" class="form-control form_class" name="firstName"  value="{{$address->firstName }}" >
                
            </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >Last Name</label>
              <input type="text" class="form-control form_class" name="lastName"  value="{{$address->lastName }}" >
                
            </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >Address Line 1</label>
              <input type="text" class="form-control form_class" name="addressLine1" value="{{$address->addressLine1 }}"  >
                
            </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >Address Line 2</label>
              <input type="text" class="form-control form_class" name="addressLine2"  value="{{$address->addressLine2 }}" >
                
            </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >City</label>
              <input type="text" class="form-control form_class" name="city"  value="{{$address->city }}" >
                
            </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >State</label>
              <input type="text" class="form-control form_class" name="state"  value="{{$address->state }}" >
                
            </div>
            <div class="form-group col-md-12">
              <label class="modalLabels" >Zip Code</label>
              <input type="text" class="form-control form_class" name="zipCode"  value="{{$address->zipCode }}" >
                
            </div>
        {{-- BodyEnd --}}
        
      </div>
      <div class="modal-footer" id="footer-button">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn my-btn">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
                            {{-- //End --}}

                  
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
                        <div class="col-md-4 my-auto mid" id="cpbtn"> 
                          
                              
                          
                            <button style="width: 100px" type="button" class="btn my-btn">{{$campaign->id}}</button>     
                        </div>                            
                        <div class="col-md-4  my-auto mid"  id="HeadaingP">
                            <p>{{$campaign->name}}</p>
                        </div>
                        <div class="col-md-4  my-auto mid"  id="HeadaingZ">
                            <p>Status: 
                              @if($campaign->status==1)
                              Design Awaiting
                              @elseif($campaign->status==2)
                              Design In Process
                              @elseif($campaign->status==3)
                              Design Approved
                              @elseif($campaign->status==4)
                              IN Process
                              @elseif($campaign->status==5)
                              Campaign Approved
                              @endif
                            </p>
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
                                  {{-- <div class="row">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                  </div> --}}
                                 
                                  <a class=" nav-item nav-link active " id="nav-home-tab" data-id="1" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Messages</a>
                                
                                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Products</a>
                                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Description</a>
                                  @if(isset($campaign->suggested_design_groups))
                                  <a class="nav-item nav-link" id="nav-design-tab" data-toggle="tab" href="#nav-design" role="tab" aria-controls="nav-design" aria-selected="false">Proposed Designs</a>
                                  @endif
                                  
                                  
                                </div>
                              </nav>
                          </div><!-- card-header -->
                          <div class="card-body">
                        <div class="container">
                            <div class="row">
                              <div class="col-md-12 " style="padding: 0px;">
                    
                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                  <div class="tab-pane fade show active" style="padding-left: 15px; padding-right:15px" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                      
                                    {{-- Start Here --}}
                                  <div id="messages" data-id="{{$campaign->id}}">
                                    {{-- <div class="message-wrapper">
                                      <ul class="messages">
                                          @foreach($messages as $message)
                                              <li class="message clearfix">
                                                  
                                                  <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }}">
                                                      <p>{{$message->message}}</p>
                                                      <p class="date">{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
                                                  </div>
                                              </li>
                                              @endforeach
                                              
                                          
                                      </ul>
                                  </div>
                                  
                                  <div class="input-text">
                                      <input type="text" name="message" class="submit">
                                  </div> --}}
                                    </div>
                                    {{-- End Here --}}

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
                                                    <th class="new t-font" scope="row">{{$product->name}}</th>
                                                    <th class="new t-font">{{$product->categories[0]->name}} </th>
                                                    <th class="new t-font">6030</th>
                                                    <th class="new t-font">{{$campaign->product_color}}</th>
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
                                              <th class="new t-font" scope="row">Juliana Wil</th>
                                              <th class="new t-font">{{$campaign->answers[0]->answers}}</th>
                                              <th class="new t-font">University of Houston</th>
                                              <th class="new t-font">Alpha Chi Omega</th>
                                            </tr>
                                            
                                          </tbody>
                                        </table>
                                      
                                      </div>
                            <div id="cardLayer">
                              @if($campaign->suggestions)
                              @if($campaign->suggestions[0]->frontSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" >
                                <p >FRONT OF SHIRT </p>
                                @if($campaign->suggestions[0]->frontColors)
                                <p class="card-text"># OF COLORS: {{$campaign->suggestions[0]->frontColors}}</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                              <p style="padding-left: 2%; padding-top:2%; color:#898989 !important;">{{$campaign->suggestions[0]->frontSuggestion}}</p>
                              @endif
                              @if($campaign->suggestions[0]->backSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" id="flexDynamic" >
                                <p >BACK OF SHIRT </p>
                                @if($campaign->suggestions[0]->backColors)
                                <p class="card-text"># OF COLORS: {{$campaign->suggestions[0]->backColors}}</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#898989 !important;">{{$campaign->suggestions[0]->backSuggestion}}</p>
                              @endif
                              @if($campaign->suggestions[0]->pocketSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" >
                                <p >POCKET OF SHIRT </p>
                                @if($campaign->suggestions[0]->pocketColors)
                                <p class="card-text"># OF COLORS: {{$campaign->suggestions[0]->pocketColors}}</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#898989 !important;">{{$campaign->suggestions[0]->pocketSuggestion}}</p>
                              @endif
                              @if($campaign->suggestions[0]->sleevesSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" >
                                <p >SLEEVE OF SHIRT </p>
                                @if($campaign->suggestions[0]->sleevesColors)
                                <p class="card-text"># OF COLORS: {{$campaign->suggestions[0]->sleevesColors}}</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#898989 !important;">{{$campaign->suggestions[0]->sleevesSuggestion}}</p>
                              @endif
                              @endif
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >SELECTED DESIGNS</p>
                              <p class="card-text"></p>
                              </div>
                            </div>
                            @if($campaign->designs)
                            <img src="{{$campaign->designs[0]->images[0]->url}}" alt="" class="img-fluid" style="width:20%;height:20%;padding: 2rem;">
                  
                
                            @endif
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >USER CUSTOM DESIGNS</p>
                              <p class="card-text"></p>
                              </div>
                            </div>
                            @if($campaign->images)
                            @foreach ($campaign->images as $image)
                            <img src="{{$image->url}}" alt="" class="img-fluid" style="width:20%;height:20%;padding: 2rem;">    
                            @endforeach
                            

                            @endif
                            
                          
                          </div>
                            
                            </div>

                            {{-- Start Here --}}

                            <div class="tab-pane fade" id="nav-design" role="tabpanel" aria-labelledby="nav-design-tab">
                              
                      <div id="cardLayer">
                      
                      <div class="card card-body  ">
                        <div class="row d-flex justify-content-between  my-auto" >
                        <p >SUGGESTED DESIGNS</p>
                        <p class="card-text"></p>
                        </div>
                      </div>
                      @if(isset($campaign->suggested_design_groups))
                      <div class="row" >

                      @foreach ($campaign->suggested_design_groups as $image)
                      {{-- Start Here --}}
                     
                       
                      
                         <div class="col-md-3" >
                           <div style="max-width: 200px;
                           margin: auto;">
                           
                      <a href="#exampleModal{{$image->id}}" id="modalBtn{{$image->id}}"  data-toggle="modal" data-id="{{$image->id}}" data-target="">
                              <img src="{{$image->suggested_images[0]->url}}" alt="" class="img-fluid" style=" padding:2%;">
                      </a>
                     
                      </div>
                         </div>
                   
                     

                  <!-- Modal -->
                 
<div class="modal fade" id="exampleModal{{$image->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered model_custom_width">
<div class="modal-content">
<div class="modal-body my_custom_model">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    <div id="modalContent{{$image->id}}">
    </div>

</div>
</div>
</div>
</div>
{{-- End Modal --}}

                      
                      {{--End Here --}}
                      @endforeach
                    </div>
                      @endif
                      
                      
                      
                    
                    </div>
                      
                      </div>
                            

                            {{-- End Here --}}
                        
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
@include('web.includes.subfooter')
@include('web.includes.footer')
<script type="text/javascript">
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";


    
   $(document).ready(function(){

    receiver_id = $('#nav-home-tab').data('id');
            // console.log(receiver_id);
            $.ajax({
                type: "get",
                url: "/messages/" + receiver_id, // need to create this route
                success: function (data) {
                  // console.log(data);
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });





    var campaign_id = $('#messages').data('id');
    
    // console.log(campaign_id);
    $.ajax({
            url: '/allSuggestedDesignGroups/'+campaign_id,
            type: 'get',
            success: function(data){
              for (var i = 0, l = data.suggestedDesigns.length; i < l; i++) {
                var group_id = $('.group_id'+data.suggestedDesigns[i].id).data('id');
                
                // var hello = data.suggestedDesigns[i].id;
              $('#modalBtn'+data.suggestedDesigns[i].id).click(function(e){
                var id  = $(this).data('id');
                
     
      
      $.ajax({
      url: '/smallBigImagesSuggested/'+id,
      type: 'get',
      success: function(response){
        // console.log(response);
        for(var j=0 , k =data.suggestedDesigns.length; j < k; j++ ){
                                $('#modalContent'+data.suggestedDesigns[j].id).html(response);
                                }

                                $('.slick_big_inni').slick({
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: false,
                                fade: false,
                                asNavFor: '.slickInni'
                                });
                                $('.slickInni').slick({
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                asNavFor: '.slick_big_inni',
                                dots: false,
                                focusOnSelect: true,
                                vertical: true,
                                verticalSwiping: true,
                                infinite:false,
                                arrows: false
                                });    
                                }
      });        
                            
                        });
              }
            }
    });
    

   
                    

    // $.ajax({
    //         url: 'allDesigns/',
    //         type: 'get',
    //         success: function(response){
    //             for (var i = 0, l = response.designs.length; i < l; i++) {
    //                 $('#modalBtn'+response.designs[i].id).click(function(e){
    //                     var id = $('#designID').data('id');
    //                 $.ajax({
    //                         url: 'smallBigImages/'+id,
    //                         type: 'get',
    //                         success: function(data){
    //                             for(var j=0 , k =response.designs.length; j < k; j++ ){
    //                             $('#modalContent'+response.designs[j].id).html(data);
    //                             }
    //                             $('.slick_big_inni').slick({
    //                             slidesToShow: 1,
    //                             slidesToScroll: 1,
    //                             arrows: false,
    //                             fade: false,
    //                             asNavFor: '.slickInni'
    //                             });
    //                             $('.slickInni').slick({
    //                             slidesToShow: 4,
    //                             slidesToScroll: 1,
    //                             asNavFor: '.slick_big_inni',
    //                             dots: false,
    //                             focusOnSelect: true,
    //                             vertical: true,
    //                             verticalSwiping: true,
    //                             infinite:false,
    //                             arrows: false
    //                             });            
    //                         }
    //                     });
    //                 });
    //             }
    //         }
    //     });

        //End Here





    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('629eecc55450630967da', {
    cluster: 'ap2',
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function (data) {
      // alert(JSON.stringify(data));
      if (my_id == data.from) {
            $('#nav-home-tab').click();
            }else if(my_id == data.to){
              $('#nav-home-tab').click();
            }
            // receiver_id = data.to;
            // $.ajax({
            //     type: "get",
            //     url: "/messages/" + receiver_id, // need to create this route
            //     success: function (data) {
            //         $('#messages').html(data);
            //         scrollToBottomFunc();
            //     }
            // });
    // alert(JSON.stringify(data));
    
});

$('#nav-home-tab').click(function () {
            receiver_id = $(this).data('id');
            // console.log(receiver_id);
            $.ajax({
                type: "get",
                url: "/messages/" + receiver_id, // need to create this route
                success: function (data) {
                  // console.log(data);
                    $('#messages').html(data);
                    scrollToBottomFunc();
                }
            });
        });
        


       
        //Sending Message
        $(document).on('keypress', '.input-text input', function (e) {
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode === 13 && message != '') {
              
              var message = $(this).val();
              
                $(this).val(''); // while pressed enter text box will be empty
                var campaign_id = $('#messages').data('id');
                console.log(campaign_id);

                var datastr = "receiver_id=" + 1 + "&message=" + message +"&campaign_id=" + campaign_id;
                $.ajax({
                    type: "post",
                    url: "/message", // need to create this post route
                    data: datastr,
                    cache: false,
                    success: function (data) {
                      // alert(JSON.stringify(data));
                      // alert(data);
                      // $('#nav-home-tab').click();

                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        });
        


        // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50);
    }
  
   }); 
</script>
<script>
  $(document).ready(function(){
        // 1st carousel, main
        // $('.slick_big_inni').flickity({
        //     prevNextButtons: false,pageDots: false,groupCells:1
        // });
        // // 2nd carousel, navigation
        // $('.slickInni').flickity({
        // asNavFor: '.slick_big_inni',
        // contain: true,
        // pageDots: false,
        // prevNextButtons: false,
        // groupCells:3
        // });
    });
</script>
@include('web.includes.endfile')