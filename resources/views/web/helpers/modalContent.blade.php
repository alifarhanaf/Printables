<div class="row">
    <div class="col-lg-7 col-md-6 col-12 d-block">
        <div class="my__all_images">
            <div class="all__small_images">
                <div class="slickInni">
                    @foreach($design->images as $image)
                    <div class="images_all">
                        <div class="main_img_div">
                            <div class="image_spacing_main_box">
                                <div class="image__main">
                                    <img src="{{ asset($image->url)}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="images_all">
                        <div class="main_img_div">
                            <div class="image_spacing_main_box">
                                <div class="image__main">
                                    <img src="https://www.earthslab.com/wp-content/uploads/2019/01/q_P1KBUJ_400x400.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="all__big_images">
                <div class="slick_big_inni">
                    @foreach($design->images as $image)
                    <div class="main_bigImages">
                        <div class="spacing_main">
                            <img src="{{ asset($image->url)}}" alt="" class="img-fluid">
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="main_bigImages">
                        <div class="spacing_main">
                            <img src="https://www.earthslab.com/wp-content/uploads/2019/01/q_P1KBUJ_400x400.jpg" alt="" class="img-fluid">
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-12 d-block mx-auto">
        <div class="model_main_section_textt">
            <div class="main_heading_collection" id="designModalHeading">
                <h1>university of flwrida - fraternity row</h1>
            </div>
            <div class="button_main_section">
                <a href="" class="btn my-btn">Campaign # 42790</a>
            </div>
            <div class="main_section_para_collection">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quaerat ratione facere, ea nisi sequi? Omnis excepturi necessitatibus iusto ad?</p>
            </div>
            <div class="button_model_collection" id="customizeonProduct">
                <form action="{{ route('setCookie') }}" method="POST" >
                    <input type="hidden" id="designID" name="designID" value="{{$design->id}}">
                    {{ csrf_field() }}
                    <button type="submit" style="border:none;">
                <a  class="btn my-btn w-100">Customize on a product</a>
            </button>
            </form>
            </div>
        </div>
    </div>
</div>