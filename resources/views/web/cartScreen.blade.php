@include('web.includes.header')
@include('web.includes.subheader')


<section class="header_beneath cart__page_main">
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
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
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
                        <a href="" class="main">
                            <div class="span_round">
                                <span>4</span>
                            </div>
                            Delivery
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-block m-auto">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>5</span>
                            </div>
                            Review
                        </a>
                    </div>
                </div>
            </div>   
        </div>
        
        <div class="main_cart_Page">
            <div class="main_page_spacing">
                <div class="main_heading text-center">
                    <h1>Your Cart</h1>
                </div>
                <div class="main_Cart_section_product">
                    <div class="main_header_section">
                        <div class="d-flex">
                            <div class="main_product_title">
                                <span>Product</span>
                            </div>
                            <div class="Price_title text-right">
                                <span>Price</span>
                            </div>
                            <div class="Quantity_div text-right">
                                <span>Quantity</span>
                            </div>
                            <div class="total_div text-right">
                                <span>Total</span>
                            </div>
                        </div>

                        

                    </div>

                    

                    <ul class="all_prodcuts_cart">
                        <li>
                            <div class="d-flex">
                                <div class="main_product_title">
                                    <div class="product_main_section">
                                        <div class="d-flex">
                                            <div class="product_image_cart">
                                                <img src="{{($product[0]->images[0]->url)}}" alt="" class="img-fluid">
                                            </div>
                                            <div class="product-main_section">
                                                <div class="product_title-cart">
                                                <h4>{{$product[0]->name}}</h4>
                                                </div>
                                                <div class="Product__main_varants">
                                                    <div class="product__pricees">
                                                    <span>Price:</span><span> {{$product[0]->price}}$</span>
                                                    </div> 
                                                    <div class="tags_base">
                                                        <span>Bag & tag:</span><span>
                                                            {{ Cookie::get('bagAndTag') }}
                                                            {{-- @if({{ Cookie::get('bagAndTag') }} == 1)
                                                             Yes
                                                             @else
                                                             No
                                                             @endif --}}
                                                            </span>
                                                    </div>
                                                    <div class="size">
                                                        <span>Size:</span><span>{{$product[0]->sizes}}</span>
                                                    </div>
                                                    <div class="Color_cart">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                               <span>Colors:</span>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div style="width: 10px; height:10px; margin-top:6px; background-color:#000;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                   
                                                </div>
                                                <div class="All_buttongs_cart">
                                                    <div class="cart_buttons d-flex">
                                                        <div class="edit_buttons">
                                                            <button>EDIT</button>
                                                        </div>
                                                        <div class="delete_buttons">
                                                            <button>DELETE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Price_title text-right">
                                    <span>{{$product[0]->price}}$</span>
                                </div>
                                <div class="Quantity_div text-right">
                                    <input type="number"  value="1" min="1" name="Quantity_cart" id="Quantity_cart" class="form-control my-1 mr-sm-2">
                                </div>
                                <div class="total_div text-right">
                                    <span>{{$product[0]->price}}$</span>
                                </div>
                            </div>


                            <!-- mobile_preview Cart -->

                            

                        </li>
                    </ul>
                    <div class="all_text_total_main">
                        <div class="cart_totle_spacing">
                            <div class="text-right main_section">
                                <div class="total_cart_section">

                                    <!-- cart Total Price info -->

                                    <div class="d-flex">
                                        <div class="useless_div"></div>
                                        <div class="subtotal_text">
                                            <span>SubTotal</span>
                                        </div>
                                        <div class="subTotal_price">
                                            <span>{{$product[0]->price}}$</span>
                                        </div>
                                    </div>

                                    <!-- cart under text -->

                                    <div class="d-flex">
                                        
                                        <div class="cart__discription text-right w-100">
                                            <p>Shipping & texes Calculate at checkout</p>
                                        </div>
                                        
                                    </div>

                                    <!-- chackout Buttons -->

                                    <div class="d-flex">
                                        <div class="useless_div_second"></div>
                                        <div class="all_Button_cart">
                                            <div class="checkout_btn d-inline-block">
                                                <button class="btn my-btn t-baground">Continue Shopping</button>
                                            </div>
                                            <div class="checkout_btn d-inline-block">
                                                <button class="btn my-btn t-baground">Update</button>
                                            </div>
                                            <div class="checkout_btn d-inline-block">
                                                <button class="btn my-btn">Check out</button>  
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
</section>



@include('web.includes.subfooter')
@include('web.includes.footer')
@include('web.includes.endfile')