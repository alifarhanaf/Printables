<div class="row">
    <div class="col-lg-7 col-md-6 col-12 d-block">
        <div class="my__all_images">
            <div class="all__small_images">
                <div class="slickInni">
                    @foreach($designGroup->suggested_images as $image)
                    <div class="images_all">
                        <div class="main_img_div">
                            <div class="image_spacing_main_box">
                                <div  class="image__main">
                                    <img id="img1" src="{{ asset($image->url)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   
                </div>
            </div>
            <div class="all__big_images">
                <div class="slick_big_inni">
                    @foreach($designGroup->suggested_images as $image)
                    <div class="main_bigImages">
                        <div class="spacing_main">
                            <img id="img3" src="{{ asset($image->url)}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-12 d-block mx-auto">
        <div class="model_main_section_textt">
            <div class="main_heading_collection">
                <h1 id="title">{{$designGroup->Name}}</h1>
            </div>
            <div class="button_main_section">
            <a href="" class="btn my-btn">{{$designGroup->campaigns[0]->name}} # {{$designGroup->campaigns[0]->id}}</a>
            </div>
            <div class="main_section_para_collection">
                <p style="color:black !important;">{{$designGroup->description}}</p>
            </div>
            <div class="button_model_collection">
                <form action="{{ route('approveDesign',['id'=> $designGroup->campaigns[0]->id, 'bid'=>$designGroup->id]) }}"  >
                    {{-- <input type="hidden" id="designID" name="designID" value="{{$design->id}}"> --}}
                    {{ csrf_field() }}
                    <button type="submit" style="border:none;">
                <a   class="btn my-btn w-100">
                     
                        Liked It? Approve Design
                    
                   
                </a>
            </button>
            </form>
            </div>
        </div>
    </div>
</div>