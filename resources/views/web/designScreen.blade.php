@include('web.includes.header')
@include('web.includes.subheader')

<section class="Second_main_section">
    <div class="container">
        <div class="second_all">
            <div class="main_heading">
                <h1 class="text-center">Design Gallery</h1>
            </div>
            <div class="main_paragraph text-center">
                <p style="font-weight: 500;">10,000+ Customizable Designs</p>
                <p style="font-weight: 500;">Have Your Own Idea? Request It <a style="color: #5f8fa5" href="{{ route('productScreen') }}">Here</a>.</p>
            </div>
            {{-- <div class="input_search_field">
                <div class="form-group">    
                    <form method="get" action="{{ route('designScreen') }}">          
                    <input placeholder="Search for like social rush, bid day, dog, etc...." type="search" name="search" value="@if(isset($search)){{$search}}@endif" class="form-control" id="exampleFormControlFile1" onchange="saveValue(this);" >
                    </form>
                </div>
            </div> --}}
            
        </div>
        <div class="row">
            <div class="col-md-3">
                {{-- Start --}}
                <div id="left-nav" class="sideBarSearch">
                    <div class="sticky-top">
                        <div class="">
                            <div>
                                <div>
                                    <div data-v-26752785="" class="form-group has-search mt-3 pt-5">
                                        <span data-v-26752785="" class="text-center form-control-feedback"></span>
                                        <form method="get" action="{{ route('designScreen') }}">          
                                            <input placeholder="Search for like social rush, bid day, dog, etc...." type="search" name="search" value="@if(isset($search)){{$search}}@endif" class="form-control" id="exampleFormControlFile1" onchange="saveValue(this);" >
                                            </form>
                                         {{-- <input data-v-26752785="" type="text" name="search" placeholder="Search Designs" title="Use comma to search for multiple designs." data-toggle="tooltip" class="search-field form-control"> --}}
                                        </div>
                                    </div>
                                     <div data-v-e6af0ca4="" class="mt-n3">
                                       
                                         {{-- <form data-v-e6af0ca4="" id="design-search" action="https://greekhouse.org/design-gallery" method="GET"> 
                                            <input data-v-e6af0ca4="" type="hidden" id="q" name="tags">
                                        </form>  --}}
                                        <div data-v-e6af0ca4="" class="mt-2">
                                            <span data-v-e6af0ca4="" class="text-sm font-weight-semi-bold color-slate d-none">Filter By:</span>
                                             <span data-v-e6af0ca4="" class="clear-filter badge badge-light p-2 mr-1 align-middle my-1 text-white float-right d-none">
                    Clear Filters
                </span> </div> <div data-v-e6af0ca4="" class="mt-2"><div data-v-e6af0ca4="" class="text-center d-md-none"><button data-v-e6af0ca4="" type="button" data-toggle="collapse" data-target="#accordion-container" aria-expanded="false" aria-controls="accordion-container" class="btn btn-sm btn-block btn-dark mb-2">
                        FILTER BY
                    </button>
                </div>
                 <div data-v-e6af0ca4="" id="accordion-container" class="collapse d-md-block">
                     <div data-v-e6af0ca4="" id="accordion" aria-multiselectable="true" class="accordion indicator-chevron">
                         <div data-v-e6af0ca4="" class="m-b-0">
                             <div data-v-e6af0ca4="" role="tab" id="sort-by-heading" href="#sort-by-collapse" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="sort-by-collapse" class="card-header">
                             <a data-v-e6af0ca4="" class="text-xs">Sort By</a>
                            </div>
                            {{-- Start --}}
                            <div data-v-e6af0ca4="" id="sort-by-collapse" role="tabpanel" aria-labelledby="sort-by-heading" class="collapse show">
                            <div id="navPillsId" style="height: 100%; overflow-y:auto">
                            <ul class="nav nav-pills my-tabs_btns" style="width:100%;height: 100%;display:block;" id="pills-tab" role="tablist">
                            <li class="nav-item active" role="presentation" style="width: 50%">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="text-transform: capitalize;font-size:1.5rem;font-weight:500;color:#898989;">Popular</a>
                            </li>
                            <li class="nav-item" role="presentation" style="width: 50%">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="text-transform: capitalize;font-size:1.5rem;font-weight:500;color:#898989;">Recent</a>
                            </li>
                            </ul>
                            </div>
                            </div>
                            {{-- End --}}
                             {{-- <div data-v-e6af0ca4="" id="sort-by-collapse" role="tabpanel" aria-labelledby="sort-by-heading" class="collapse show">
                                 <div data-v-e6af0ca4="" class="card-body border-bottom pl-5">
                                     <div data-v-e6af0ca4="" class="custom-control custom-radio form-control-sm">
                                     
                                     <input data-v-e6af0ca4="" type="radio" name="sortyBy"  class="custom-control-input" value="popularity" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> 
                                     <label data-v-e6af0ca4="" for="pills-home-tab" class="custom-control-label">Popular</label>
                                    </div>
                                    <div data-v-e6af0ca4="" class="custom-control custom-radio form-control-sm">
                                        <input data-v-e6af0ca4="" type="radio" name="sortyBy"  class="custom-control-input" value="recency" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> 
                                        <label data-v-e6af0ca4="" for="pills-profile-tab" class="custom-control-label">Recent</label>
                                    </div>
                                </div>
                            </div> --}}
                             <div data-v-e6af0ca4="" role="tab" id="primary-event-heading" href="#primary-event-collapse" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="primary-event-collapse" class="card-header collapsed" >
                                 <a data-v-e6af0ca4="" class="card-title text-sm">Primary Event</a>
                                </div>
                                 <div data-v-e6af0ca4="" id="primary-event-collapse" role="tabpanel" aria-labelledby="primary-event-heading" class="collapse show" 
                                 >
                                 <div style="height: 150px; overflow-y:auto; 
                                 border-top: none;">
                                     <div data-v-e6af0ca4="" class="card-body border-bottom pl-5">
                                         @foreach($primaryEvents as $pevents)
                                         {{-- <form method="get" action="{{ route('designScreen') }}">          
                                            <button type="submit"> --}}
                                           
                                            
                                         <div data-v-e6af0ca4="" class="custom-control custom-checkbox form-control-sm" id="priEvents">
                                             <input data-v-e6af0ca4="" type="checkbox" id="{{$pevents->name}}" name="tags[]" class="custom-control-input" value="{{$pevents->name}}">
                                              <label data-v-e6af0ca4="" for="{{$pevents->name}}" class="custom-control-label">{{$pevents->name}}</label>
                                            </div>
                                        </button>
                                        {{-- </form> --}}
                                            @endforeach
                                              
                                        </div>
                                 </div>
                                    </div> 
                                    <div data-v-e6af0ca4="" role="tab" id="event-heading" href="#event-collapse" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="event-collapse" class="card-header collapsed">
                                        <a data-v-e6af0ca4="" class="card-title text-sm">Event</a>
                                    </div>
                                        <div data-v-e6af0ca4="" id="event-collapse" role="tabpanel" aria-labelledby="event-heading" class="collapse show" style="">
                                            <div style="height: 150px; overflow-y:auto;
                                            border-top: none;">
                                        <div data-v-e6af0ca4="" class="card-body border-bottom pl-5">
                                            @foreach($events as $event)
                                            <div data-v-e6af0ca4="" class="custom-control custom-checkbox form-control-sm" id="EventsMain">
                                                <input data-v-e6af0ca4="" type="checkbox" id="{{$event->name}}" name="tags[]" class="custom-control-input" value="{{$event->name}}"> 
                                            <label data-v-e6af0ca4="" for="{{$event->name}}" class="custom-control-label">{{$event->name}}</label>
                                        </div>
                                        @endforeach

                                            </div>
                                        </div>
                                        </div>
                                            <div data-v-e6af0ca4="" role="tab" id="organization-heading" href="#organization-collapse" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="organization-collapse" class="card-header">
                                                <a data-v-e6af0ca4="" class="card-title text-sm">Organization</a>
                                            </div>
                                                <div data-v-e6af0ca4="" id="organization-collapse" role="tabpanel" aria-labelledby="organization-heading" class="collapse show" style="">
                                                <div style="height: 150px; overflow-y:auto; 
                                                border-top: none;">
                                                    <div data-v-e6af0ca4="" class="card-body border-bottom pl-5">
                                                        @foreach ($organizations as $og)
                                                            
                                                    
                                                        <div data-v-e6af0ca4="" class="custom-control custom-checkbox form-control-sm" id="orgMain">
                                                            <input data-v-e6af0ca4="" type="checkbox" id="{{$og->name}}" name="tags[]" class="custom-control-input" value="{{$og->name}}"> 
                                                            <label data-v-e6af0ca4="" for="{{$og->name}}" class="custom-control-label">{{$og->name}}</label>
                                                        </div>
                                                        @endforeach
                                                        
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

                {{-- End --}}
            </div>
            <div class="col-md-9" >
                <div id="render">
            
        <div class="all_my_content" style="padding-top: 1.5rem">
            {{-- <ul class="nav nav-pills my-tabs_btns" style="width:100%" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation" style="width: 50%">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">POPULAR</a>
                </li>
                <li class="nav-item" role="presentation" style="width: 50%">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">RECENT</a>
                </li>
                </ul> --}}
            <div class="tab-content  pt-4" id="pills-tabContent"  >
                <div class="tab-pane fade show active" id="pills-home"  role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="my_all_content">
                        <div class="my_flex_main">
                            @foreach ($designs as $design)
                            <div class="flex_child">
                                <div class="chlidren_spacing">
                                    <button type="button" id="modalBtn{{$design->id}}" data-toggle="modal" data-id="{{$design->id}}" data-target="#exampleModal{{$design->id}}">
                                        <div class="popup_header">
                                            <div class="img_parent">

                                                <div class="hovereffect">
                                                    <img src="{{ asset($design->images[0]->url)}}" alt="design" id="designID" data-id="{{$design->id}}" class="img-fluid">
                                                        <div class="overlay">
                                                            <h2 id="productOverlayButtonHeading">{{$design->name}}</h2>
                                                            <p id="productOverlayButton" style="margin-top:30% ;">
                                                                <a class="btn my-btn" style="padding: 1rem; text-transform:uppercase;" >Customise Product</a>
                                                            </p>
                                                        </div>
                                                </div>
                                                {{-- //End --}}
                                                
                                            </div>
                                        </div>
                                    </button>
                                    {{-- Modal 1 Start --}}
                                    <div class="modal fade" id="exampleModal{{$design->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered model_custom_width">
                                            <div class="modal-content">
                                                <div class="modal-body my_custom_model">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <div id="modalContent{{$design->id}}">
                                                        <div id="loader">
                                                            <div class="container">
                                                                <div class="circle circle-1"></div>
                                                                <div class="circle circle-2"></div>
                                                                <div class="circle circle-3"></div>
                                                                <div class="circle circle-4"></div>
                                                                <div class="circle circle-5"></div>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal 1 end --}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="my_all_content">
                        <div class="my_flex_main">
                            @foreach ($recents as $recent)
                            <div class="flex_child">
                                <div class="chlidren_spacing">
                                    <button type="button" id="modalBtnRecent{{$recent->id}}" data-toggle="modal" data-id="{{$recent->id}}"  data-target="#exampleModalRecent{{$recent->id}}">
                                        <div class="popup_header">
                                            <div class="img_parent">
                                                <div class="hovereffect">
                                                    <img src="{{ asset($recent->images[0]->url)}}" alt="design" id="recentID" data-id="{{$recent->id}}" class="img-fluid">
                                                        <div class="overlay">
                                                            <h2>{{$recent->name}}</h2>
                                                            <p style="margin-top:50% !important;">
                                                                <a >Customize On a Product</a>
                                                            </p>
                                                        </div>
                                                </div>

                                                </div>
                                        </div>
                                    </button>
                                    {{-- Modal 2 Start --}}
                                    <div class="modal fade" id="exampleModalRecent{{$recent->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered model_custom_width">
                                            <div class="modal-content">
                                            <div class="modal-body my_custom_model">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                <div id="modalContentRecent{{$recent->id}}">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Modal 2 End--}}
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                </div>
        </div>
                </div>

    </div>
</div>
    
    
    
    
         
    
    </div>
    </section>
    
@include('web.includes.subfooter')    
@include('web.includes.footer')
<script>
$(document).ready(function(){

    $(".nav-item").on("click", function(e) {
    $(".nav-item").removeClass("active");
    $(this).addClass("active");

    });




    $.ajax({
            url: 'allDesigns/',
            type: 'get',
            success: function(response){
                for (var i = 0, l = response.designs.length; i < l; i++) {
                    // $(document).on('click','#modalBtn'+response.designs[i].id , function(){
                     
                    $('#modalBtn'+response.designs[i].id).click(function(e){
                        // var id = $('#designID').data('id');
                        var id  = $(this).data('id');
                    $.ajax({
                            url: 'smallBigImages/'+id,
                            type: 'get',
                            success: function(data){
                                $('#loader').hide();
                                
                                for(var j=0 , k =response.designs.length; j < k; j++ ){

                                $('#modalContent'+response.designs[j].id).html(data);
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
                    //Start
                    $('#modalBtnRecent'+response.designs[i].id).click(function(e){
                        // var id = $('#designID').data('id');
                        var id  = $(this).data('id');
                    $.ajax({
                            url: 'smallBigImages/'+id,
                            type: 'get',
                            success: function(data){
                                for(var j=0 , k =response.designs.length; j < k; j++ ){
                                $('#modalContentRecent'+response.designs[j].id).html(data);
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
                    //End
                }
            }
        });
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        var checkboxElems = document.querySelectorAll("input[type='checkbox']");
                for (var i = 0; i < checkboxElems.length; i++) {
                checkboxElems[i].addEventListener("click", function(){
                    // alert('Hi');
                    let array = [];
                    
                    $('.custom-control-input:checked').each(function () {
                    array.push($(this).val());
                   
                });
                console.log(array);
                $.ajax({
                url: 'updatedDesigns',
                type: 'post',
                contentType: 'application/json',
                data: JSON.stringify(array),
                success: function(response){
                    // console.log(response);
                    $('#render').html(response);
                    $.ajax({
            url: 'allDesigns/',
            type: 'get',
            success: function(response){
                for (var i = 0, l = response.designs.length; i < l; i++) {
                    // $(document).on('click','#modalBtn'+response.designs[i].id , function(){
                     
                    $('#modalBtn'+response.designs[i].id).click(function(e){
                        // var id = $('#designID').data('id');
                        var id  = $(this).data('id');
                    $.ajax({
                            url: 'smallBigImages/'+id,
                            type: 'get',
                            success: function(data){
                                for(var j=0 , k =response.designs.length; j < k; j++ ){
                                $('#modalContent'+response.designs[j].id).html(data);
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
                    //Start
                    $('#modalBtnRecent'+response.designs[i].id).click(function(e){
                        // var id = $('#designID').data('id');
                        var id  = $(this).data('id');
                    $.ajax({
                            url: 'smallBigImages/'+id,
                            type: 'get',
                            success: function(data){
                                for(var j=0 , k =response.designs.length; j < k; j++ ){
                                $('#modalContentRecent'+response.designs[j].id).html(data);
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
                    //End
                }
            }
        });
                }
                });
                // console.log(array);
                });
                
                
                };
               
                
       
    });


    


   



//     $(document).ready(function(){
//         $('.designInfo').click(function(){

//             var designid = $(this).data('id');
//             console.log(designid);
//             // AJAX request
//             $.ajax({
//             url: 'designByID/'+designid,
//             type: 'get',
//             success: function(response){ 
//             // Add response in Modal body
//         //    console.log(response);
//             // console.log(response.design[0].id);
//             // $("#title").html(response.design[0].name);
//             $("#img").attr("src", response.designImages[0].url);
//             $("#img1").attr("src", response.designImages[0].url);
//             $("#img2").attr("src", response.designImages[0].url);
//             $("#img3").attr("src", response.designImages[0].url);
//             $("#designID").val(response.design[0].id);
//             // $('.modal-body').html(response);

//             // Display Modal
//             $('#exampleModal').modal('show'); 
//     }
//   });

//         });
//     });

</script>
@include('web.includes.endfile')