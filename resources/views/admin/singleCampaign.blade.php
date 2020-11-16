    @include('admin.includes.header')
    @include('admin.includes.sidebar')


    <div class="container-fluid">

        <div class="row" id="startrow" style="width: 100% !important;">
            <div id="tabs" style="width: 100%">
                <div class="card card-body " style="margin-bottom: 0.5%; margin-top:0.5%; ">
                    <div id="cardInsideCard">
                        <div class="row " style="width: 100% !important;">
                            <div class="col-md-4 my-auto mid">
                                <button type="button" class="btn btn-primary">{{ $campaign->id }}</button>
                            </div>
                            <div class="col-md-4  my-auto mid" id="HeadaingP" data-id="{{ $campaign->users[0]->id }}">
                                <h5 class="card-title my-auto">{{ $campaign->name }}</h5>
                            </div>
                            <div class="col-md-4  my-auto mid" id="HeadaingZ">
                            </div>
                        </div>
                    </div>
                </div><!-- card -->
            </div>

            <div id="tabs" style="width: 100%">
                <div class="card card-body " style="margin-top:0.5%;margin-bottom:0.5%;padding:0px;border-radius:0px !important;">
                        <div id="cardInsideCard">
                        <div class="row mx-auto " style="width: 100% !important; text-align:right;margin:0px;">
                        
                            
                        <div class="text-right mx" style="    display: flex;
                        justify-content: flex-end;
                        width: 100%;">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-id="1" data-target="#exampleModal1" style="width:120px !important; font-size:0.50rem; margin-right:15px;">SUGGEST DESIGN</button>

                                 <!-- Modal -->
                                 
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mx-auto modal-dialog-centered model_custom_width">
            <div class="modal-content">
            <div class="modal-body my_custom_model">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <div class="row ">
                    <div id="tabs" style="width: 100%">
                        <div class="card card-body " style="margin-bottom: 0.5%; margin-top:0.5%;height:100%;padding: 10px;background:#4130c5; ">
                            <div id="">
                                <div class="row " style="width: 100% !important;">
                                   
                                        <h5 class="card-title my-auto" style="color:whitesmoke">SUGGEST DESIGN</h5>
                                        
                                    
                                </div>
                            </div>
                        </div><!-- card -->
                    </div>
                </div>
                    <div class="container-fluid mg-t-20">
                       
                         
                        <div class="panel panel-default" style="width:100%">
                          <div class="panel-body">
                              @if($campaign->status == 3 || $campaign->status == 4 || $campaign->status == 5)
                              <p style="color: black !important; text-align: center ;font-size: 1.0rem !important;font-weight:500 !important; padding-top:20px;" > Design Already Approved</p>
                              @else
                            <form   style="text-align: center" method="POST" action="{{ route('campaign.upload_image',$campaign->id) }}" enctype="multipart/form-data">
                                {{-- <input type="file" name="file" /> --}}
                              @csrf
                              <div class="d-flex flex-column wd-md-100% ">
                                
                                <label class="form-label " style="text-align: left"><b>Enter Design Name:</b></label>
                                <div class="form-group">
                                  
                                  <input name="SuggestedDesignName" type="text" class="form-control"placeholder="Enter Name"value="">
                                  
                                </div>
                              </div>
                              <div class="d-flex flex-column wd-md-100%  ">

                                <label class="form-label " style="text-align:left"><b>Enter Brief Description:</b></label>
                                <div class="form-group">
                                  
                                  <input name="SuggestedDesignDescription" type="text" class="form-control"placeholder="Enter Description"value="">
                                  
                                </div>
                              </div>
                              <label class="form-label mg-b-10 pd-l-5" style="text-align:left"><b>Choose Image:</b></label>
                                <div class="form-group row row-sm " style="text-align:left">
                                    <div class="col-sm-7 col-md-6 col-lg-4">
                                    <div class="custom-file">
                                        <input name="images[]" type="file" class="custom-file-input" multiple="multiple" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    </div>
                                </div>
                              
                            <div align="center">
                              <button type="submit" style="width: 100%; background:#4130c5;" class="btn btn-info" id="submit-all">Submit</button>
                            </div>
                        </form>
                        @endif
                          </div>
                        </div>
                          
                      
                      
                       
                      </div>
                    
                    
                
            </div>
            </div>
        </div>
    </div>
        {{-- End Modal --}}



                            </div>

                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-id="2" data-target="#exampleModal2" style="width:120px !important; font-size:0.50rem;margin-right:15px;">APPROVE CAMPAIGN</button>  
                                 <!-- Modal -->
                                 
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg mx-auto modal-dialog-centered model_custom_width">
            <div class="modal-content">
            <div class="modal-body my_custom_model">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                <div class="row ">
                    <div id="tabs" style="width: 100%">
                        <div class="card card-body " style="margin-bottom: 0.5%; margin-top:0.5%;height:100%;padding: 10px;background:#4130c5; ">
                            <div id="">
                                <div class="row " style="width: 100% !important;">
                                   
                                        <h5 class="card-title my-auto" style="color:whitesmoke">APPROVE CAMPAIGN</h5>
                                        
                                    
                                </div>
                            </div>
                        </div><!-- card -->
                    </div>
                </div>
                    <div class="container-fluid mg-t-20">
                       
                         
                        <div class="panel panel-default" style="width:100%">
                          <div class="panel-body">
                              @if($campaign->status == 3)
                                <form   style="text-align: center" method="POST" action="{{ route('approve.campaign',$campaign->id) }}" >
                                    {{-- <input type="file" name="file" /> --}}
                                  @csrf
                                  <div class="d-flex flex-column wd-md-100% ">
                                    
                                    <label class="form-label " style="text-align: left"><b>Enter Campaign Price:</b></label>
                                    <div class="form-group">
                                      
                                      <input name="CampaignPrice" type="text" class="form-control"placeholder="Enter Price"value="">
                                      
                                    </div>
                                  </div>
                                  
                                  
                                  
                                <div align="center">
                                  <button type="submit" style="width: 100%; background:#4130c5;" class="btn btn-info" id="submit-all">Submit</button>
                                </div>
                            </form>

                              @elseif($campaign->status == 4)
                              <p style="color: black !important; text-align: center ;font-size: 1.0rem !important;font-weight:500 !important; padding-top:20px;" > Proposal Sent For Approval To User</p> 
                              @else
                              <p style="color: black !important; text-align: center ;font-size: 1.0rem !important;font-weight:500 !important; padding-top:20px;" > Design Not Approved Yet</p> 
                              @endif
                          </div>
                        </div>
                          
                      
                      
                       
                      </div>
                    
                    
                
            </div>
            </div>
        </div>
        </div>
        {{-- End Modal --}}                          
                            </div>
                            
                        </div> 
                            
                        </div>
                        </div>
                
                </div><!-- card -->
            </div>

            <div class="col-md-9">
                <div id="tabss">
                    <div class="card card-body " style="border-radius: 10px;">
                        <div class="card-header " style="border-radius: 10px;">
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" data-id="{{ $campaign->users[0]->id }}"
                                        id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                        aria-controls="nav-home" aria-selected="true">Messages</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">Products</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                        role="tab" aria-controls="nav-contact" aria-selected="false">Description</a>
                                </div>
                            </nav>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="container">
                                <div class="row" style="width: 100% !important; margin-left:0px;">
                                    <div class="col-md-12 " style="padding: 0px;">

                                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                            <div class="tab-pane fade show active"
                                                style="padding-left: 15px; padding-right:15px" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">

                                                {{-- Start Here--}}
                                        <div id="messages" data-id="{{$campaign->id}}">

                                                </div>
                                                {{-- End Here --}}

                                            </div>

                                            <div class="tab-pane fade" style="padding-left: 15px; padding-right:15px"
                                                id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div id="BodyCard">
                                                    <table class="table table-responsive d-md-table"
                                                        style="margin-bottom: 100px; margin-top: 10px;">
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
                                                                    <th class="new" scope="row">{{ $product->name }}
                                                                    </th>
                                                                    <th class="new">{{ $product->categories[0]->name }}
                                                                    </th>
                                                                    <th class="new">6030</th>
                                                                    <th class="new">{{ $campaign->product_color }}</th>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                                aria-labelledby="nav-contact-tab">
                                                <div id="BodyCard">
                                                    <table style=" margin-bottom: 5%; margin-top: 10px;"
                                                        class="table table-responsive d-md-table">
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
                                                                <th class="new">{{$campaign->answers[0]->answers}}</th>
                                                                <th class="new">University of Houston</th>
                                                                <th class="new">Alpha Chi Omega</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <div id="cardLayer">
                                                    @if ($campaign->suggestions)
                                                        @if ($campaign->suggestions[0]->frontSuggestion)
                                                            <div class="card card-body  ">
                                                                <div class="row d-flex justify-content-between  my-auto">
                                                                    <p class="my-auto">FRONT OF SHIRT </p>
                                                                    @if ($campaign->suggestions[0]->frontColors)
                                                                    <p class="card-text my-auto"># OF COLORS: {{$campaign->suggestions[0]->frontColors}}</p>
                                                                    @else
                                                                    <p class="card-text"># OF COLORS: #</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <p style="padding-left: 2%; padding-top:2%; color:#031b4e !important;">
                                                                {{ $campaign->suggestions[0]->frontSuggestion }}
                                                            </p>
                                                        @endif
                                                        @if ($campaign->suggestions[0]->backSuggestion)
                                                            <div class="card card-body  ">
                                                                <div class="row d-flex justify-content-between  my-auto">
                                                                    <p class="my-auto">BACK OF SHIRT </p>
                                                                    @if ($campaign->suggestions[0]->backColors)
                                                                        <p class="card-text "># OF COLORS: {{$campaign->suggestions[0]->backColors}}</p>
                                                                    @else
                                                                        <p class="card-text"># OF COLORS: #</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <p
                                                                style="padding-left: 2%; padding-top:2%; color:#031b4e !important;">
                                                                {{ $campaign->suggestions[0]->backSuggestion }}
                                                            </p>
                                                        @endif
                                                        @if ($campaign->suggestions[0]->pocketSuggestion)
                                                            <div class="card card-body  ">
                                                                <div class="row d-flex justify-content-between  my-auto">
                                                                    <p class="my-auto">POCKET OF SHIRT </p>
                                                                    @if ($campaign->suggestions[0]->pocketColors)
                                                                <p class="card-text"># OF COLORS: {{$campaign->suggestions[0]->pocketColors}}</p>
                                                                    @else
                                                                        <p class="card-text"># OF COLORS: #</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <p style="padding-left: 2%; padding-top:2%; color:#031b4e !important;">
                                                                {{ $campaign->suggestions[0]->pocketSuggestion }}
                                                            </p>
                                                        @endif
                                                        @if ($campaign->suggestions[0]->sleevesSuggestion)
                                                            <div class="card card-body  ">
                                                                <div class="row d-flex justify-content-between  my-auto">
                                                                    <p class="my-auto">SLEEVES OF SHIRT </p>
                                                                    @if ($campaign->suggestions[0]->sleevesColors)
                                                                <p class="card-text"># OF COLORS: {{$campaign->suggestions[0]->sleevesColors}}</p>
                                                                    @else
                                                                        <p class="card-text"># OF COLORS: #</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <p style="padding-left: 2%; padding-top:2%; color:#031b4e !important;">
                                                                {{ $campaign->suggestions[0]->sleevesSuggestion }}
                                                            </p>
                                                        @endif
                                                    @endif
                                                    <div class="card card-body  ">
                                                        <div class="row d-flex justify-content-between  my-auto">
                                                            <p class="my-auto">SELECTED DESIGNS</p>
                                                            <p class="card-text"></p>
                                                        </div>
                                                    </div>
                                                    @if ($campaign->designs)
                                                        <div style="margin: 2%;">
                                                            <img src="{{ $campaign->designs[0]->images[0]->url }}" alt=""
                                                                class="img-fluid" style="width:20%;height:20%;">
                                                        </div>

                                                    @endif
                                                    <div class="card card-body  ">
                                                        <div class="row d-flex justify-content-between  my-auto">
                                                            <p class="my-auto">USER CUSTOM DESIGNS</p>
                                                            <p class="card-text"></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        @if ($campaign->images)
                                                            @foreach ($campaign->images as $image)

                                                                <img src="{{ $image->url }}" alt="" class="img-fluid"
                                                                    style="width:20%;height:20%; margin:2%;">

                                                            @endforeach
                                                        @else
                                                        <p> No Custom Design Found</p>
                                                        @endif
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
            <div class="col-md-3">
                <div id="sidebar">
                    
                    {{-- <div class="card" style="">
                        <div class="card-body" style="padding: 0px;!important">
                            <h5 class="card-title text-center" style="padding-top:5%;padding-bottom:5%; margin-bottom:0px;margin-inline-start:0px !important;  ">SUGGEST NEW DESIGN</h5>
                            

                        </div>
                    </div> --}}
                    

                    <div class="card">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">

                                <h5 class="card-title">IMPORTANT DATES</h5>

                                <div style="padding-right: 5%">
                                    <i class="fa fa-edit "></i>
                                </div>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item"><span style="font-weight: 500">RUSH DELIVERY:</span> NO</li>
                                <li class="list-group-item"><span style="font-weight: 500">DELIVERY DATE:</span>
                                    {{ $campaign->deliveryDate }}
                                </li>
                                <li class="list-group-item"><span style="font-weight: 500">FINALIZE DESIGN BY:</span>
                                    N/A</li>

                            </ul>


                        </div>
                    </div>

                    <div class="card" style="">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">

                                <h5 class="card-title">SHIPPING ADDRESS</h5>

                                <div style="padding-right: 5%">
                                    <i class="fa fa-edit "></i>
                                </div>

                            </div>
                            @foreach ($campaign->addresses as $address)


                                <p class="large">NAME</p>
                                <p class="smallp">{{ $address->firstName . '  ' . $address->lastName }} </p>
                                <p class="large">ADDRESS</p>
                                <p class="smallp" style="margin-bottom: 0px !important">{{ $address->addressLine1 }}</p>
                                <p class="smallp">{{ $address->addressLine2 }}</p>
                                <p class="large">CITY</p>
                                <p class="smallp">{{ $address->city }}</p>
                                <p class="large">STATE</p>
                                <p class="smallp">{{ $address->state }}</p>
                                <p class="large">ZIP CODE</p>
                                <p class="smallp">{{ $address->zipCode }}</p>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    @include('admin.includes.footer')
    <script type="text/javascript">
    	
 
        // Dropzone.options.dropzoneForm = {
        //   autoProcessQueue : false,
        //   acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
        //   parallelUploads: 10,
        //   init:function(){
        //     var submitButton = document.querySelector("#submit-all");
        //     myDropzone = this;
       
        //     submitButton.addEventListener('click', function(){
                

        //       myDropzone.processQueue();
        //       console.log($('input[name=file]').prop('files'));
        //     });
       
        //     this.on("complete", function(){
        //       if(this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0)
        //       {
        //         var _this = this;
        //         _this.removeAllFiles();
        //       }
        //     });
       
        //   }
       
        // };
       
      </script>
    <script>
        var receiver_id = '';
        var my_id = "{{ Auth::id() }}";
        $(document).ready(function() {
            // $('#hello').imageuploadify();
            // $('.dz-hidden-input').attr('name','mutiple_files[]');
            $('#nav-home-tab').click(function() {
                receiver_id = $(this).data('id');
                console.log(receiver_id);
                $.ajax({
                    type: "get",
                    url: "/messages/" + receiver_id, // need to create this route
                    success: function(data) {
                        $('#messages').html(data);
                        scrollToBottomFunc();
                    }
                });
            });


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
            console.log(pusher);

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                // alert(JSON.stringify(data));
                if (my_id == data.from) {
                    $('#nav-home-tab').click();
                } else if (my_id == data.to) {
                    $('#nav-home-tab').click();
                }

            });





            //Sending Message
            $(document).on('keypress', '.input-text input', function(e) {
                // check if enter key is pressed and message is not null also receiver is selected
                if (e.keyCode === 13 && message != '') {
                    var receiver_id = $('#nav-home-tab').data('id');
                    var message = $(this).val();
                    var campaign_id = $('#messages').data('id');
                console.log(campaign_id);

                    // console.log(receiver_id);
                    //   alert(message);
                    $(this).val(''); // while pressed enter text box will be empty

                    var datastr = "receiver_id=" + receiver_id + "&message=" + message + "&campaign_id=" + campaign_id;
                    $.ajax({
                        type: "post",
                        url: "/message", // need to create this post route
                        data: datastr,
                        cache: false,
                        success: function(data) {
                            // alert(data);
                            // $('#nav-home-tab').click();
                        },
                        error: function(jqXHR, status, err) {},
                        complete: function() {
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
