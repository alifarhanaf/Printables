@include('web.includes.header')
@include('web.includes.subheader')
@include('admin.includes.headerbar')
<div class="container-fluid">
    
        <div class="row">
            <div class="col-md-3">
                <div id="sidebar">
                    <div class="card" style="">
                        <div class="card-body">
                            <div class="row d-flex justify-content-between">

                                <h5 class="card-title">IMPORTANT DATES</h5>

                                <div style="padding-right: 5%">
                                    <i class="fa fa-edit "></i>
                                </div>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item"><span style="font-weight: 500">RUSH DELIVERY:</span> NO</li>
                                <li class="list-group-item"><span style="font-weight: 500">DELIVERY DUE DATE:</span>
                                    {{ $campaign->deliveryDate }}</li>
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
            <div class="col-md-9">
                <div id="tabs">
                    <div class="card card-body ">
                        <div id="cardInsideCard">
                            <div class="row ">
                                <div class="col-md-4 my-auto mid">



                                    <button type="button" class="btn btn-primary">{{ $campaign->id }}</button>
                                </div>
                            <div class="col-md-4  my-auto mid" id="HeadaingP" data-id="{{$campaign->users[0]->id}}">
                                    <p>{{ $campaign->name }}</p>
                                </div>
                                <div class="col-md-4  my-auto mid" id="HeadaingZ">
                                    <p>STATUS: {{ $campaign->status == 1 ? 'STATUS_AWAITING' : 'N/A' }}</p>
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
                                    <a class="nav-item nav-link active" data-id="{{$campaign->users[0]->id}}" id="nav-home-tab" data-toggle="tab"
                                        href="#nav-home" role="tab" aria-controls="nav-home"
                                        aria-selected="true">Messages</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                        href="#nav-profile" role="tab" aria-controls="nav-profile"
                                        aria-selected="false">Products</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"
                                        href="#nav-contact" role="tab" aria-controls="nav-contact"
                                        aria-selected="false">Description</a>

                                </div>
                            </nav>
                        </div><!-- card-header -->
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 " style="padding: 0px;">

                                        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                            <div class="tab-pane fade show active"
                                                style="padding-left: 15px; padding-right:15px" id="nav-home"
                                                role="tabpanel" aria-labelledby="nav-home-tab">

                                                {{-- Start Here
                                                --}}
                                                <div id="messages">

                                                </div>
                                                {{-- End Here
                                                --}}

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


                                                    <table
                                                        style="margin-left: 15px; margin-right:15px; margin-bottom: 5%; margin-top: 10px;"
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
                                                                <th class="new">24-47</th>
                                                                <th class="new">University of Houston</th>
                                                                <th class="new">Alpha Chi Omega</th>
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
                                <p class="card-text"># OF COLORS: 2</p>
                                </div>
                              </div>
                              <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">{{$campaign->suggestions[0]->frontSuggestion}}</p>
                              @endif
                              @if($campaign->suggestions[0]->backSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" >
                                <p >BACK OF SHIRT </p>
                                @if($campaign->suggestions[0]->backColors)
                                <p class="card-text"># OF COLORS: 2</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">{{$campaign->suggestions[0]->backSuggestion}}</p>
                              @endif
                              @if($campaign->suggestions[0]->pocketSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" >
                                <p >POCKET OF SHIRT </p>
                                @if($campaign->suggestions[0]->pocketColors)
                                <p class="card-text"># OF COLORS: 2</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">{{$campaign->suggestions[0]->pocketSuggestion}}</p>
                              @endif
                              @if($campaign->suggestions[0]->sleevesSuggestion)
                              <div class="card card-body  ">
                                <div class="row d-flex justify-content-between  my-auto" >
                                <p >SLEEVES OF SHIRT </p>
                                @if($campaign->suggestions[0]->sleevesColors)
                                <p class="card-text"># OF COLORS: 2</p>
                                @else
                                <p class="card-text"># OF COLORS: #</p>
                                @endif
                                </div>
                              </div>
                            <p style="padding-left: 2%; padding-top:2%; color:#84a0bf !important;">{{$campaign->suggestions[0]->sleevesSuggestion}}</p>
                              @endif
                              @endif
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >SELECTED DESIGNS</p>
                              <p class="card-text"></p>
                              </div>
                            </div>
                            @if($campaign->designs)
                            <img src="{{$campaign->designs[0]->images[0]->url}}" alt="" class="img-fluid" style="width:20%;height:20%;">
                  
                
                            @endif
                            <div class="card card-body  ">
                              <div class="row d-flex justify-content-between  my-auto" >
                              <p >USER CUSTOM DESIGNS</p>
                              <p class="card-text"></p>
                              </div>
                            </div>
                            @if($campaign->images)
                            @foreach ($campaign->images as $image)
                            <img src="{{$image->url}}" alt="" class="img-fluid" style="width:20%;height:20%;">    
                            @endforeach
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
</div>
</div>
@include('web.includes.subfooter')
@include('web.includes.footer')
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function() {

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
                
                // console.log(receiver_id);
                //   alert(message);
                $(this).val(''); // while pressed enter text box will be empty

                var datastr = "receiver_id=" + receiver_id + "&message=" + message;
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
@include('web.includes.endfile')
