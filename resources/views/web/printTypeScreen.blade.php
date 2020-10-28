@include('web.includes.header')
@include('web.includes.subheader')


<section class="header_beneath single__product_selected_print">
    <div class="container" >
        <div class="my_nav">
            <div class="row under_nav">
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
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
                        <a href="" class="main">
                            <div class="span_round">
                                <span>2</span>
                            </div>
                            Design Description
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-block m-auto">
                    <div class="my_link">
                        <a href="" class="main">
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
        <div class="row main_printed_product">
            <div class="col-lg-6 col-md-10 d-block mx-auto no_padding_marg">
                <div class="all_selected_products_print">
                    <div class="print_product_all">
                        <ul class="all_selected_prod">
                            <li class="view_product">
                                <div class="spacing_product">
                                    <div class="product_head_select">
                                       <div class="d-flex">
                                           <div class="image_flex_spacing">
                                               <img src="{{ $product[0]->images[0]->url}}" alt="" class="img-fluid">
                                           </div>
                                           <div class="product_tielt-print">
                                               <h5 class="text-capitalize">Comfort Colors pocket t-shit - royal carribe</h5>
                                           </div>
                                       </div>
                                       <div class="main_delete_this">
                                           <button class="delete" data-hide="true">
                                               <img src="{{ asset('storage/images/wizard 3/icon-basket.png')}}" alt="" class="img-fluid">
                                           </button>
                                       </div> 
                                    </div>
                                    <div class="product_foot_select">
                                        <div class="main__footer_selcet">
                                            <div class="main_all_colors">
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="main__image_color">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="view_product">
                                <div class="spacing_product">
                                    <div class="product_head_select">
                                       <div class="d-flex">
                                           <div class="image_flex_spacing">
                                               <img src="{{ $product[0]->images[0]->url}}" alt="" class="img-fluid">
                                           </div>
                                           <div class="product_tielt-print">
                                               <h5 class="text-capitalize">Comfort Colors pocket t-shit - royal carribe</h5>
                                           </div>
                                       </div>
                                       <div class="main_delete_this">
                                           <button class="delete" data-hide="true">
                                               <img src="{{ asset('storage/images/wizard 3/icon-basket.png')}}" alt="" class="img-fluid">
                                           </button>
                                       </div> 
                                    </div>
                                    <div class="product_foot_select">
                                        <div class="main__footer_selcet">
                                            <div class="main_all_colors">
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="colors_parent_div">
                                                    <div class="color_main"></div>
                                                </div>
                                                <div class="main__image_color">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <div class="add_Products_Msg">
                                <div class="product_spacing text-center">
                                    <p>You Can add upto 4 apperel options.</p>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 d-block m-auto ">
                <div class="print_info">
                    <div class="all_info_under_spacing">
                        <div class="print_type spacing_bottom">
                            <label for="Print_type">
                                Print Type
                            </label>
                            <select name="print_type" id="Print_type" class="form_class form-control w-50">
                                @foreach ($product[0]->groups[0]->print_types as $printTypes)
                                <option value=""> {{$printTypes->name}} </option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="Order_price spacing_bottom">
                            <label for="Order_price">
                                Print Type
                            </label>
                            <select name="Order_price" id="Order_price" class="form_class form-control">
                                <option value="">24-27</option>
                            </select>
                        </div>
                        <div class="main__paragraph spacing_bottom">
                            <div class="main_paraSpacing">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est ab nemo delectus suscipit maxime natus assumenda sunt iure alias enim deserunt, quibusdam deleniti, saepe dolore culpa dolores ducimus ipsa explicabo.</p>
                            </div>
                        </div>
                        <div class="shoping__option spacing_bottom">
                            <label for="shoping__option">
                                Shipping Option
                            </label>
                            <select name="shoping__option" id="shoping__option" class="form-control form_class">
                                <option value="">Grop Sharing Free</option>
                            </select>
                        </div>
                        <div class="main__paragraph spacing_bottom">
                            <div class="main_paraSpacing">
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est ab nemo delectus suscipit maxime natus assumenda sunt iure alias enim deserunt, quibusdam deleniti, saepe dolore culpa dolores ducimus ipsa explicabo.</p>
                            </div>
                        </div>
                        <div class="BaseTag spacing_bottom">
                            <label for="BaseTag">
                                Shipping Option
                            </label>
                            <select name="BaseTag" id="BaseTag" class="form-control form_class">
                                <option value="">Yes</option>
                            </select>
                        </div>
                        <div class="main__paragraph spacing_bottom">
                            <div class="main_paraSpacing">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, adipisci.</p>
                            </div>
                        </div>
                        <div class="next__btn spacing_bottom">
                        <a href="{{ route('deliveryAddressScreen')}}" class="btn my-btn">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include('web.includes.subfooter')
@include('web.includes.footer')
@include('web.includes.endfile')