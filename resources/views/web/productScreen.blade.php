@include('web.includes.header')
@include('web.includes.subheader')

<section class="header_beneath">
    <div class="container">
        <div class="my_nav first_underLine_section">
            <div class="row under_nav ">
                <div class="col-lg-2 col-12 d-block m-auto" data-toggle="modal" data-target="#exampleModal">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>1</span>
                            </div>
                            Chose a product
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="" class="">
                            <div class="span_round">
                                <span>2</span>
                            </div>
                            Design Description
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>3</span>
                            </div>
                            Print Type
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>4</span>
                            </div>
                            Delivery
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>5</span>
                            </div>
                            Review
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="row all_dropDown">
            <div class="col-md-4 col-12 d-block m-md-auto  mb-md-0 mb-2 my_divs">
                <div class="under_Dropdown">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select name="brand" class="custom-select mr-sm-2 form_class" id="inlineFormBrandFilter">
                            <option selected disabled>Filter By Brand</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 d-block m-md-auto  mb-md-0 mb-2 my_divs">
                <div class="under_Dropdown">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2 form_class" id="inlineFormCategoryFilter">
                            <option selected disabled>Filter By Style</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 d-block m-md-auto  mb-md-0 mb-2 my_divs text-center">
                <div class="under_Dropdown">
                    <div class="col-auto my-1">
                        <input id="searchBox" type="search" class="form-control form_class" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>


       
        <div id="main_all_produts_section" class="main_all_produts_section">
            <div class="main_prduct " style="text-align: center;">
                <h1>Slected Design </h1>
                <div class="image_selected">
                    <div class="image_spacing">
                        <img src="{{ asset($design[0]->images[0]->url) }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            <div class="all_products__main">
                <div class="main_under_product_spacing">
                    <div class="row">
                        @foreach ($products as $product)


                            <div class="col-md-3 col-sm-6 col-10 m-auto d-block">
                                <div class="my_main_product_text" data-toggle="modal"
                                    data-target="#exampleModal{{ $product->id }}">
                                    <div class="product_underimg">
                                        <div class="roduct_imgage text-center">
                                            <img src="{{ asset($product->images[0]->url) }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="product_text_under text-center">
                                        <div class="small_text">
                                            <span>{{ $product->name }}</span>
                                        </div>
                                        <div class="main_heading_product">
                                            <h4 class="title">{{ $product->categories[0]->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Model is start from here -->
                            <div class="modal fade image_model" id="exampleModal{{ $product->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ $product->name }}
                                                {{ $product->categories[0]->name }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        {{-- Ending Modal Header
                                        --}}
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 col-10 d-block m-auto image_product">
                                                    <div class="main_image_class">
                                                        <div class="image_mainm_spacing text-center">
                                                            <img src="{{ $product->images[0]->url }}" alt=""
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Ending First Column
                                                --}}
                                                <div class="col-md-6 col-10 d-block main_product_section">
                                                    <form action="{{ route('setProductCookie') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <div class="main_image_discrition">
                                                            <div class="main_spacing_all">
                                                                <div class="color_one">
                                                                    {{-- Ye 3 divs missing
                                                                    hein uper wali --}}
                                                                    <h6>Choose a Color:</h6>
                                                                    <div class="All_Colors" style="padding-right: 20%;">
                                                                        @foreach ($colors as $color)
                                                                            <div class="main_colors">
                                                                                <input type="radio" name="color"
                                                                                    value="{{ $color->hexcode }}">
                                                                                <label
                                                                                    style="background-color:{{ $color->hexcode }};"></label>
                                                                            </div>
                                                                        @endforeach


                                                                    </div>
                                                                    <div class="size_brand">
                                                                        <h6>Size:</h6>
                                                                        <ul class="size_all">
                                                                            @php
                                                                            $arr = (explode(",",$product->sizes));
                                                                            @endphp
                                                                            @for ($i = 0; $i < count($arr); $i++)
                                                                                <li>{{ $arr[$i] }}</li>

                                                                            @endfor

                                                                        </ul>
                                                                    </div>
                                                                    <div class="Price">
                                                                        <h6>Price</h6>
                                                                        <span>{{ $product->price }}$</span>
                                                                    </div>
                                                                    <div class="selected_image">
                                                                        <h6>Selected Design</h6>
                                                                        <div class="slected_image">
                                                                            <div class="image_select_spacing">
                                                                                <img src="{{ $design[0]->images[0]->url }}"
                                                                                    class="img-fluid" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="product_discription">
                                                                            <p>Lorem ipsum dolor sit amet consectetur
                                                                                adipisicing elit. Doloremque ut itaque
                                                                                iste nesciunt, consequatur cupiditate in
                                                                                officiis reiciendis voluptatem totam
                                                                                commodi cum obcaecati libero, incidunt
                                                                                ipsa, nostrum sit delectus tempora.</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="my__buttons">
                                                                        <div class="row">
                                                                            <div class="col-6 text-center button_div">
                                                                                <button
                                                                                    class="btn w-100 my-btn close___button"
                                                                                    data-dismiss="modal">Close</button>
                                                                            </div>
                                                                            <div class="col-6 text-center">

                                                                                <input type="hidden" id="productID"
                                                                                    name="productID"
                                                                                    value="{{ $product->id }}">
                                                                                <button type="submit"
                                                                                    style="border-radius: 0.5rem;">
                                                                                    <a
                                                                                        class="btn w-100 my-btn next_buttonn">Next</a>

                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        {{-- Row Closed
                                                                        --}}
                                                                    </div>
                                                                    {{-- My Buttons Closed
                                                                    --}}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- 3 divs add kr di
                                        --}}
                                    </div>
                                    {{-- Ending 2nd Column
                                    --}}
                                </div>
                                {{-- Ending Row --}}
                            </div>
                            {{-- Ending Modal Internal Body
                            --}}
                    </div>
                    {{-- //Ending Model Content --}}
                </div>
                {{-- //Ending Model Dialogue --}}

            </div>
            {{-- //Ending Model Body --}}
            @endforeach
        </div>
   
    </div>
    
    {{-- Ending Modal --}}










</section>











@include('web.includes.subfooter')
@include('web.includes.footer')
<script>
  $('.All_Colors label').click(function(event) {
      $(this).parents('.All_Colors').find('label').removeAttr('data-active', false)
      $(this).parents('.All_Colors').find('input').removeAttr('checked', false)
      $(this).attr('data-active', true)
      $(this).parent('.main_colors').find('input[type="radio"]').attr('checked', 'checked')
  })

</script>
<script>
    $(document).ready(function() {

        $("#inlineFormBrandFilter").change(function() {
            var brandID = $(this).children("option:selected").val();
            var categoryID = $("#inlineFormCategoryFilter").children("option:selected").val();
            console.log(brandID);
            if(categoryID>0){
              $.ajax({
                url: 'productsByBrandAndCategoryID/'+brandID+'/'+categoryID,
                type: 'get',
                success: function(response) {

                    console.log(response);
                    $('#main_all_produts_section').html(response);

                }
            });

            }else{
              $.ajax({
                url: 'productsByBrandID/' + brandID,
                type: 'get',
                success: function(response) {

                    console.log(response);
                    $('#main_all_produts_section').html(response);

                }
            });
            }
            
            

        });
        $("#inlineFormCategoryFilter").change(function() {
            var categoryID = $(this).children("option:selected").val();
            var brandID = $("#inlineFormBrandFilter").children("option:selected").val();
            console.log(brandID);
            console.log(categoryID);
            if(brandID>0){
              $.ajax({
                url: 'productsByBrandAndCategoryID/'+brandID+'/'+categoryID,
                type: 'get',
                success: function(response) {

                    console.log(response);
                    $('#main_all_produts_section').html(response);

                }
            });
            }else{
              $.ajax({
                url: 'productsByCategoryID/'+categoryID,
                type: 'get',
                success: function(response) {

                    console.log(response);
                    $('#main_all_produts_section').html(response);

                }
            });


            }
            


        });
        var input = document.getElementById("searchBox");
        input.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                var searchword = input.value;
                var categoryID = $("#inlineFormCategoryFilter").children("option:selected").val();
                var brandID = $("#inlineFormBrandFilter").children("option:selected").val();
                console.log(brandID);
                console.log(categoryID);
                console.log(searchword);
                $.ajax({
                url: 'productsSearchWithBrandAndCategoryID/'+brandID+'/'+categoryID+'/'+searchword,
                type: 'get',
                success: function(response) {

                    console.log(response);
                    $('#main_all_produts_section').html(response);

                }
            });

            }
        });

    });

</script>

@include('web.includes.endfile')
