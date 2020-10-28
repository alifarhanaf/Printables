@include('web.includes.header')
@include('web.includes.subheader')
@foreach ($designs as $design)
<form action="{{ route('setCookie') }}" method="POST" >
@endforeach

   
<input type="hidden" id="designID" name="designID" value="{{$design->id}}">
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
                    <input placeholder="Search for like social rush, bid day, dog, etc...." type="search" class="form-control" id="exampleFormControlFile1">
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
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="my_all_content">
                        <div class="my_flex_main">
                            @foreach ($designs as $design)
                            
                            @foreach ($design->images as $image)
                            
                                
                            
                            <div class="flex_child">
                                <div class="chlidren_spacing">
                                <button type="button" class="designInfo" data-toggle="modal" data-id="{{$design->id}}" data-target="#exampleModal">
                                    
                                        <div class="popup_header">
                                            <div class="img_parent">
                                                <img src="{{ asset($image->url)}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                </button>

                                

                                    



                                </div>
                            </div>



                             

                            @endforeach  
                            
                            
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                {{-- //Start Here --}}
                <div class="my_all_content">
                    <div class="my_flex_main">
                        @foreach ($recents as $recent)
                            @foreach ($recent->images as $image)
                                
                            
                            <div class="flex_child">
                                <div class="chlidren_spacing">
                                <button type="button" class="designInfo"   data-toggle="modal" data-target="#exampleModal">
                                        <div class="popup_header">
                                            <div class="img_parent">
                                                <img src="{{ asset($image->url)}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>

                            



                            @endforeach    
                            @endforeach
                       
                        
                    </div>
                </div>
                {{-- Ends Here --}}
                </div>
                </div>
        </div>
    
    
    
    
        <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered model_custom_width">
        <div class="modal-content">
        <div class="modal-body my_custom_model">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            <div class="row">
                <div class="col-lg-7 col-md-6 col-12 d-block">
                    <div class="my__all_images">
                        <div class="all__small_images">
                            <div class="slickInni">
                                <div class="images_all">
                                    <div class="main_img_div">
                                        <div class="image_spacing_main_box">
                                            <div  class="image__main">
                                                <img id="img" src="{{  asset('storage/images/home/4.png')}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="images_all">
                                    <div class="main_img_div">
                                        <div class="image_spacing_main_box">
                                            <div  class="image__main">
                                                <img id="img1" src="{{  asset('storage/images/home/4.png')}}" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all__big_images">
                            <div class="slick_big_inni">
                                <div class="main_bigImages">
                                    <div class="spacing_main">
                                        <img id="img2" src="{{  asset('storage/images/home/4.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="main_bigImages">
                                    <div class="spacing_main">
                                        <img id="img3" src="{{  asset('storage/images/home/4.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-12 d-block mx-auto">
                    <div class="model_main_section_textt">
                        <div class="main_heading_collection">
                            <h1 id="title">university of flwrida - fraternity row</h1>
                        </div>
                        <div class="button_main_section">
                            <a href="" class="btn my-btn">compaign # 42790</a>
                        </div>
                        <div class="main_section_para_collection">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quaerat ratione facere, ea nisi sequi? Omnis excepturi necessitatibus iusto ad?</p>
                        </div>
                        <div class="button_model_collection">
                           
                                <button type="submit">
                            <a  class="btn my-btn w-100">
                                
                                   
                                    
                                    Customize on a product
                                {{ csrf_field() }}
                               
                            </a>
                        </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    {{-- End Modal --}}

    

    </div>
    </section>
    
    
    
@include('web.includes.subfooter')    
@include('web.includes.footer')
<script>
    $(document).ready(function(){
        $('.designInfo').click(function(){

            var designid = $(this).data('id');
            console.log(designid);
            // AJAX request
            $.ajax({
            url: 'designByID/'+designid,
            type: 'get',
            success: function(response){ 
            // Add response in Modal body
        //    console.log(response);
            // console.log(response.design[0].id);
            // $("#title").html(response.design[0].name);
            $("#img").attr("src", response.designImages[0].url);
            $("#img1").attr("src", response.designImages[0].url);
            $("#img2").attr("src", response.designImages[0].url);
            $("#img3").attr("src", response.designImages[0].url);
            $("#designID").val(response.design[0].id);
            // $('.modal-body').html(response);

            // Display Modal
            $('#exampleModal').modal('show'); 
    }
  });

        });
    });

</script>
@include('web.includes.endfile')