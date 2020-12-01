@include('web.includes.header')
@if ($errors->any() )
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@include('web.includes.subheader')


<section class="header_beneath single__product_selected_print">
    <div class="container" >
        <div class="my_nav">
            <div class="row under_nav">
                <div class="col-lg-2 col-12 d-lg-block  m-auto">
                    <div class="my_link">
                        <a href="{{route('productScreen')}}" class="main">
                            <div class="span_round">
                                <span>1</span>
                            </div>
                            Chose a product
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block  m-auto">
                    <div class="my_link">
                        <a href="{{route('designDetailScreen')}}" class="main">
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
                <div class="col-lg-2 col-12 d-lg-block  m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>4</span>
                            </div>
                            Delivery
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block  m-auto">
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
                                               <img src="{{ $variant->images[0]->url}}" alt="" class="img-fluid">
                                           </div>
                                           <div class="product_tielt-print">
                                               <h5 class="text-capitalize">{{ $product[0]->name}}</h5>
                                               <p>{{ $variant->colors[0]->name }}</p>
                                           </div>
                                       </div>
                                       <div class="main_delete_this">
                                           <button class="delete" data-hide="true">
                                               {{-- <img src="{{ asset('storage/images/wizard 3/icon-basket.png')}}" alt="" class="img-fluid"> --}}
                                           </button>
                                       </div> 
                                    </div>
                                    <div class="product_foot_select">
                                        <div class="main__footer_selcet">
                                            <div class="main_all_colors">
                                                <div class="colors_parent_div">
                                                    <div class="color_main" style="background-color:{{ $variant->colors[0]->hexcode }} ">
                                                        
                                                    </div>
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
                                                    {{-- <img src="{{ asset('storage/images/home/colors.png')}}" alt="logo" class="img-fluid"> --}}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="view_product">
                                <div class="spacing_product">
                                    <div class="product_head_select">
                                       <div class="d-flex">
                                           <div class="image_flex_spacing">
                                               <img src="{{ $product[0]->images[0]->url}}" alt="" class="img-fluid">
                                           </div>
                                           <div class="product_tielt-print">
                                               <h5 class="text-capitalize">{{ $product[0]->name}}</h5>
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
                            </li> --}}
                            <div class="add_Products_Msg">
                                <div class="product_spacing text-center">
                                    {{-- <p>You Can add upto 4 apperel options  .</p> --}}
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-10 d-block m-auto ">
                <div class="print_info">
                    <div class="all_info_under_spacing">
                        <form action="{{ route('setPrintTypeCookie') }}" method="POST" >
                        <div class="print_type spacing_bottom">
                            <label for="Print_type">
                                Print Type
                            </label>
                            <select name="print_type" id="Print_type"  class="form_class form-control w-50">
                                <option  value=""> Select One </option>
                                @foreach ($product[0]->groups[0]->print_types as $printTypes)
                                <option  value="{{$printTypes->id}}"> {{$printTypes->name}} </option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div id="faqs">
                        </div>
                        <div class="main__paragraph spacing_bottom">
                            <div class="main_paraSpacing">
                                <p>If you are not sure how many pieces will be ordered, select a lower range, we charge for the exact quantity ordered. More purchases means cheaper prices!<br><br>

                                    However, if you do not reach minimum estimated quantity, we cannot process your order .</p>
                            </div>
                        </div>
                        <div class="shoping__option spacing_bottom">
                            <label for="shoping__option">
                                Shipping Option
                            </label>
                            <select name="shippingOption" id="shoping__option" class="form-control form_class">
                                @foreach ($shippingOptions as $so)
                            <option value="{{$so->id}}">{{$so->options}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="main__paragraph spacing_bottom">
                            <div class="main_paraSpacing">
                                <p>Group Shipping will ship to one location.<br><br>
                                    

                                    Individual shipping costs an additional $2/pc to ship and $2/pc to fulfill. Each product will be shipped directly to the individual’s address..</p>
                            </div>
                        </div>
                        <div class="BaseTag spacing_bottom">
                            <label for="BaseTag">
                                Would you like your order bagged and tagged?
                            </label>
                            <select name="bagAndTag" id="BaseTag" class="form-control form_class">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="main__paragraph spacing_bottom">
                            <div class="main_paraSpacing">
                                <p>Bag n Tag costs an additional $1 per shirt.</p>
                            </div>
                        </div>
                        <div class="next__btn spacing_bottom" id="printTypeNext">
                        
                                {{-- <input type="hidden" id="designID" name="designID" value=""> --}}
                                <button type="submit" style="border:none;">
                            <a  class="btn my-btn w-100">
                                 
                                    Next
                                {{ csrf_field() }}
                               
                            </a>
                        </button>
                        </form>
                        {{-- <a href="{{ route('deliveryAddressScreen')}}" class="btn my-btn">Next</a> --}}
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
        $(function() {
        var timeout = 2000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
        });
       
        $("#Print_type").change(function(){
        var selected = $(this).children("option:selected").val();
       console.log(selected);
       $.ajax({
            url: 'allPrintTypeFaqs/'+selected,
            type: 'get',
            success: function(response){
                
                console.log(response);
                $('#faqs').html(response);
                
            }
        });
    });
    });

    //Backup
//     $(document).ready(function(){
       
//        $("#Print_type").change(function(){
//        var selected = $(this).children("option:selected").val();
//       console.log(selected);
//       $.ajax({
//            url: 'allPrintTypeFaqs/'+selected,
//            type: 'get',
//            success: function(response){
//                if(response.printTypeFaqs.length>0){
//                    console.log(response.printTypeFaqs);
                   
//                    for(var i = 0, l = response.printTypeFaqs.length; i < l; i++){
//                        document.getElementById("faq"+i).style.display = "block";
//                        document.getElementById("faqid"+i).innerHTML = response.printTypeFaqs[i].questions
                   
//                    $.ajax({
//                    url: 'faqAnswers/'+response.printTypeFaqs[i].id,
//                    type: 'get',
//                    success: function(data){
//                        console.log(data.faqAnswers);
//                    //    for(var i = 0, l = response.printTypeFaqs.length; i < l; i++){
                       
                      
//                        for(var j = 0, l = data.faqAnswers.length; j < l; j++){
//                            document.getElementById("ab"+i+j).style.display = "block";
//                            document.getElementById("ab"+i+j).innerHTML = data.faqAnswers[j].answers
//                        }
//                    // }
//                        // console.log(response);
//                        // var test = '<div class="Order_price spacing_bottom" ><label id="faqid" for="Order_price">'+response.printTypeFaqs[0].questions+'</label><select name="Order_price" id="Order_price" class="form_class form-control">'+
//                        //     '<option value="'+data.faqAnswers[0].id+'">'+data.faqAnswers[0].answers+'</option>'+
                          
//                        //     '</select></div>';
//                        // document.getElementById("faqs").innerHTML = test;

//                    }
//                });
//            }   
//                }
               
               
//            }
//        });
//    });
//    });
   //BkEnd

    // $(document).ready(function(){
    //     $("#Print_type").change(function(){
    //     var selected = $(this).children("option:selected").val();
    //     console.log(selected);
    //     // $.ajax({
    //     //     url: 'allPrintTypeFaqs/'+selected,
    //     //     type: 'get',
    //     //     success: function(response){
    //     //         console.log(response);
    //     //         $('#faqs').html(response);
    //     //     }
    //     // });
    // });

</script>
@include('web.includes.endfile')