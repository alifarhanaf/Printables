@include('web.includes.header')
@include('web.includes.subheader')

<section class="Second_main_section">
    <div class="container">
        <div class="second_all">
            <div class="main_heading">
                <h1 class="text-center">DESIGN GALLERY</h1>
            </div>
            <div class="main_paragraph text-center">
                <p>All Design Can be customize for your oragination</p>
            </div>
            <div class="input_search_field">
                <div class="form-group">    
                    <form method="get" action="{{ route('designScreen') }}">          
                    <input placeholder="Search for like social rush, bid day, dog, etc...." type="search" name="search" value="@if(isset($search)){{$search}}@endif" class="form-control" id="exampleFormControlFile1" onchange="saveValue(this);" >
                    </form>
                </div>
            </div>
            
        </div>
        <div class="all_my_content">
            <ul class="nav nav-pills my-tabs_btns" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">POPULAR</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">RECENT</a>
                </li>
                </ul>
            <div class="tab-content" id="pills-tabContent" >
                <div class="tab-pane fade show active" id="pills-home"  role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="my_all_content">
                        <div class="my_flex_main">
                            @foreach ($designs as $design)
                            <div class="flex_child">
                                <div class="chlidren_spacing">
                                    <button type="button" id="modalBtn{{$design->id}}" data-toggle="modal" data-id="{{$design->id}}" data-target="#exampleModal{{$design->id}}">
                                        <div class="popup_header">
                                            <div class="img_parent">
                                                <img src="{{ asset($design->images[0]->url)}}" alt="design" id="designID" data-id="{{$design->id}}" class="img-fluid">
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
                                                <img src="{{ asset($recent->images[0]->url)}}" alt="design" class="img-fluid">
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
    </section>
    
@include('web.includes.subfooter')    
@include('web.includes.footer')
<script>
$(document).ready(function(){
    $.ajax({
            url: 'allDesigns/',
            type: 'get',
            success: function(response){
                for (var i = 0, l = response.designs.length; i < l; i++) {
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