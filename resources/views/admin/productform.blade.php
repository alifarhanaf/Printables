@include('admin.includes.header')

@include('admin.includes.sidebar')

    

@if(isset($product))
@foreach ($product as $product)
    
@endforeach
<form action="{{ route('submit.edit.product',$product->id) }}" method="POST" enctype="multipart/form-data">

@else
<form action="{{ route('submit.product') }}" method="POST" enctype="multipart/form-data">
@endif

{{-- <form action="{{ route('submit.product') }}" method="POST" enctype="multipart/form-data"> --}}
  {{ csrf_field() }}

  @if(session('message') && session('message')=='Success')
  <div class="alert alert-success ">
    <ul>
        
            {{ session('message') }}
        
    </ul>
</div>
@elseif(session('message'))
<div class="alert alert-danger ">
  <ul>
      
          <li>{{ session('message') }}</li>
      
  </ul>
</div>
@endif

  @if ($errors->any() )
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <div class="pd-20  bg-gray-200">

    
    <div class="row">
      <div class="col-md-9">
        <div class="az-content-label mg-b-5 ">
          @if(isset($product))
          <p class="pd-t-10">Edit Your Product</p>
          @else
          <p class="pd-t-10">Enter New Product</p>
          @endif
        </div>
      </div>
      <div class="col-md-3 text-center">
        {{-- <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20">
          @if(isset($product))
          Update Product
          @else
          Publish Product
          @endif
        </button> --}}
       
      </div>
    </div>
  {{-- <div class="az-content-label mg-b-5 ">Enter New Product</div>
  <button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Publish Brand</button> --}}

  </div>

      
       <div class="row">
         
        <div class=" col-md-9 mg-t-15 ">
          

          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">

            <label class="form-label mg-b-10 pd-l-5"><b>Enter Product Name:</b></label>
            <div class="form-group">
              
              <input name="name" type="text" class="form-control" 
              @if(isset($product))
              placeholder="{{$product->name}}" 
              value="{{$product->name}}"
              @else
              placeholder="Enter Name"
              value=""
              @endif
              >
            </div>

            <label class="form-label mg-b-10 pd-l-5"><b>Enter Description:</b></label>
            <div class="form-group row row-sm  mg-b-10">
                <div class="col-lg">
                  <textarea id="editor" name="description" rows="6" class="form-control" 
                  @if(isset($product))
                  placeholder="{{$product->description}}">{{$product->description}}
                  @else
                  placeholder="">
                  @endif
                  
                  </textarea>
                </div>
            </div>

            <label class="form-label mg-b-10 pd-l-5"><b>Select Size:</b></label>
            <div class="form-group row row-sm ">
              <div class="col-lg">
              <select name="sizes[]" class="form-control select2" multiple="multiple">
                <option value="S" selected>S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XLL">XXL</option>
              </select>
                
                  {{-- <textarea name="sizes" rows="3" class="form-control" placeholder="Sizes"></textarea> --}}
                </div>
            </div>

            <label class="form-label mg-b-10 pd-l-5"><b>Enter Price:</b></label>
            <div class="form-group ">
                <input  name="price" type="text" class="form-control" 
                @if(isset($product))
                placeholder="{{$product->price}}" 
                value="{{$product->price}}"
                @else
                placeholder="Enter Price"
                value=""
                @endif
                >
              </div>

              <label class="form-label mg-b-10 pd-l-5"><b>Select Colors:</b></label>
              <div class="form-group ">
              <div class="All_Colors" >
                <div class="row " style="padding-inline-start: 5%">
                  @foreach ($colors as $color)
                      <div class="main_colors" >
                          <input style="display: none" type="checkbox" name="colors[]"
                              value="{{ $color->id }}">
                          <label
                              style="background-color:{{ $color->hexcode }};
                              cursor: pointer;
                              width: 1.3rem;
                              height: 1.3rem;
                              margin-left:2px;
                              
                              border-radius: 5px;">
                            </label>
                      </div>
                @endforeach
                </div>
              </div>
              </div>
{{-- 
              <select class="form-control select2" multiple="multiple">
                <option value="Firefox" selected>Firefox</option>
                <option value="Chrome">Chrome</option>
                <option value="Safari">Safari</option>
                <option value="Opera">Opera</option>
                <option value="Internet Explorer">Internet Explorer</option>
              </select> --}}

              {{-- <div class="form-group mg-t-20 mg-lg-t-0 ">
                <select name="brand_id" class="form-control select2 ">
                  <option label="Select Brand"></option>
                  @foreach ($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group mg-t-20 mg-lg-t-0 ">
                <select name="group_id" class="  form-control select2 mg-t-15">
                  <option label="Select Group"></option>
                  @foreach ($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                  @endforeach
                </select>
              </div> --}}

              
            
             
              
           



              
              <label class="form-label mg-b-10 pd-l-5"><b>Choose Image:</b></label>
              <div class="form-group row row-sm ">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="images[]" type="file" class="custom-file-input"   multiple="multiple" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              
              <button style="width: fit-content;" type="submit" class="mg-t-20 btn btn-az-primary pd-x-20"> Save </button>
            </form>
              


            
              
              @if(isset($product))
              <label class="form-label mg-b-10 mg-t-20 pd-l-5"><b>Product Images:</b></label>
              <div class="row row-sm mh-50px ">
              @foreach ($product->images as $images)
              
              <div class="container1 mg-t-5">
                <img src="{{ asset($images->url)}} " class="h-125px product-thumbnail wd-100p  wd-sm-200 " alt="Responsive image">
                <div class="overlay">
                  
                    
                      {{-- <button type="submit"> --}}
                      <form class="form-inline" action="{{ route('product.image.delete',$images->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <button style="background:transparent; border:hidden;" type="submit" class="icon" title="User Profile">
                      <i class="typcn typcn-delete"></i>
                        </form>
                  </button>
                
                
                </div>
              </div>
              
              {{-- <img src="{{ asset($images->url)}} " class="h-125px product-thumbnail wd-100p  wd-sm-200 " alt="Responsive image">  --}}
              
              
             
              {{-- <div class="overlay"></div> --}}
             {{-- <div class="button"><a href="#"> BUTTON </a>   --}}
             </div>
              @endforeach
              @endif
              
              
              
              
            
          </div>

        </div>
       
        <div class="col-md-3 mg-t-15">

          <div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border: none; ">
              Status
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
              <div style="margin-left: 8%">
              <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="1"
                @if(isset($product))
                    
                 
                {{$product->enabled == 1 ? 'checked':''}}
               
                @endif
                > <label style="margin-left: 3%">Enable</label><br>
              </div>
              <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="0"
                @if(isset($product)) 
                {{$product->enabled == 0 ? 'checked':''}}
                @endif
                > <label style="margin-left: 3%">Disable</label><br>
              </div>
              </div>
              
            </div><!-- card-body -->
          </div><!-- card -->


          <div class="card bd-0 mg-t-10">
            
              <a id="collapsebtn" data-toggle="collapse" 
            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" 
            style=" width: -webkit-fill-available; text-align: left;" 
          ><div class="card-header  tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border: none;">
            
          <b>Select Groups</b>
        </div>
        </a>
              
            <!-- card-header -->
            <div id="collapseExample" class="card-body bd bd-t-0 list-group " style="overflow-x: hidden; padding: 0; margin-bottom: 0; "  >
              
              <ul style="padding-top:1.25rem; padding-left:8%;"   >
                @foreach ($groups as $group)
                
                
                <div class="checkbox" style="">
                  
                  <li style="list-style-type: none;">
                  <label>  <input name="groups_id[]" type="checkbox" value="{{$group->id}}"
                    @if(isset($product->groups[0])) 
                  @foreach($product->groups as $productGroup)
                  {{$group->id == $productGroup->id ? 'checked':''}} 
                  @endforeach
                  @endif
                     > &nbsp{{$group->name}}</label>
                  </li>
                
                </div>
              
                @endforeach
              </ul>
              
              
            </div><!-- card-body -->
          </div><!-- card -->

          
          <div class="card bd-0 mg-t-10">
            
              <a id="collapsebtn1" data-toggle="collapse" 
            href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1" 
            style=" width: -webkit-fill-available; text-align: left;" 
          >
          <div class="card-header  tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border: none;">
          <b>Select Brand</b>
          </div>
        </a>
              {{-- Select Groups --}}
            {{-- </div> --}}
            <!-- card-header -->
            <div id="collapseExample1" class="card-body bd bd-t-0 list-group " style="overflow-x: hidden; padding: 0;  "  >
              
              <ul style="padding-top:1.25rem; padding-left:8%;"   >
                @foreach ($brands as $brand)
                
                
                <div class="checkbox" style="">
                  
                  <li style="list-style-type: none;">
                  <label>  <input name="brand_id" type="checkbox" value="{{$brand->id}}"
                    @if(isset($product->brands[0])) 
                  @foreach($product->brands as $productBrand)
                  {{$brand->id == $productBrand->id ? 'checked':''}} 
                  @endforeach
                  @endif
                     > &nbsp{{$brand->name}}</label>
                  </li>
                
                </div>
              
                @endforeach
              </ul>
              
              
            </div><!-- card-body -->
          </div><!-- card -->


          <div class="card bd-0 mg-t-10">
            
              <a id="collapsebtn2" data-toggle="collapse" 
            href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2" 
            style=" width: -webkit-fill-available; text-align: left;" 
          >
          <div class="card-header  tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border: none;">
          <b>Select Categories</b>
          </div>
          </a>
              {{-- Select Groups --}}
            {{-- </div> --}}
            <!-- card-header -->
            <div id="collapseExample2" class="card-body bd bd-t-0 list-group " style="overflow-x: hidden; padding: 0; margin-bottom: 0; "  >
              
              <ul style="padding-top:1.25rem; padding-left:8%;"   >
                @foreach ($categories as $category)
                
                
                <div class="checkbox" style="">
                  
                  <li style="list-style-type: none;">
                  <label>  <input name="categories_id[]" type="checkbox" value="{{$category->id}}"
                    @if(isset($product->categories[0])) 
                  @foreach($product->categories as $productCategory)
                  {{$category->id == $productCategory->id ? 'checked':''}} 
                  @endforeach
                  @endif

                     > &nbsp{{$category->name}}</label>
                  </li>
                
                </div>
              
                @endforeach
              </ul>
              
              
            </div><!-- card-body -->
          </div><!-- card -->


          <div class="card bd-0 mg-t-10">
            
            <a id="collapsebtn3" data-toggle="collapse" 
          href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3" 
          style=" width: -webkit-fill-available; text-align: left;" 
        >
        <div class="card-header  tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border: none;">
        <b>Select Print Locations</b>
        </div>
        </a>
            {{-- Select Groups --}}
          {{-- </div> --}}
          <!-- card-header -->
          <div id="collapseExample3" class="card-body bd bd-t-0 list-group " style="overflow-x: hidden; padding: 0; margin-bottom: 0; "  >
            
            <ul style="padding-top:1.25rem; padding-left:8%;"   >
              @foreach ($printLocations as $printLocation)
              
              
              <div class="checkbox" style="">
                
                <li style="list-style-type: none;">
                <label>  <input name="printLocation_ids[]" type="checkbox" value="{{$printLocation->id}}"
                  @if(isset($product->print_locations[0])) 
                  @foreach($product->print_locations as $productPrintLocation)
                  {{$printLocation->id == $productPrintLocation->id ? 'checked':''}} 
                  @endforeach
                  @endif
                   > &nbsp{{$printLocation->name}}</label>
                </li>
              
              </div>
            
              @endforeach
            </ul>
            
            
          </div><!-- card-body -->
        </div><!-- card -->





          {{-- <div class="d-flex flex-column wd-md-100% pd-10 pd-sm-20 bg-gray-200">
            <div style="margin-left: 8%">
              <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="1"
                @if(isset($product))
                    
                 
                {{$product->enabled == 1 ? 'checked':''}}
               
                @endif
                > <label style="margin-left: 3%">Enable</label><br>
              </div>
              <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="0"
                @if(isset($product)) 
                {{$product->enabled == 0 ? 'checked':''}}
                @endif
                > <label style="margin-left: 3%">Disable</label><br>
              </div>
    
              </div>
    
            </div> --}}


          {{-- <div class="form-group mg-t-100 mg-lg-t-0 ">

            <select name="brand_ids[]" class="form-control select2" multiple="multiple">
              <option label="Select Brand"></option>
            @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
            </select>
          </div> --}}

            {{-- <div class="form-group mg-t-100 mg-lg-t-0 ">
            <select name="brand_id" class="form-control select2 ">
              <option label="Select Brand"></option>
              @foreach ($brands as $brand)
              <option value="{{$brand->id}}">{{$brand->name}}</option>
              @endforeach
            </select>
          </div> --}}

          {{-- <div class="form-group mg-t-20 mg-lg-t-0 ">
            <select name="group_ids[]" class="  form-control select2 mg-t-15" multiple="multiple">
              <option label="Select Group"></option>
              @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->name}}</option>
              @endforeach
            </select>
          </div> --}}

          {{-- <div style="margin-top: 2%;" class="mg-b-0 az-content-label" >
            <p style=" margin-bottom: 0.5rem;" >Status</p> 
          </div> --}}
          
        
       
          


        </div>
       </div>

       
@include('admin.includes.footer')
<script>
  $('.All_Colors label').click(function(event) {
      $(this).parents('.All_Colors').find('label').removeAttr('data-active', false)
      $(this).attr('data-active', true)
      $(this).parent('.main_colors').find('input[type="checkbox"]').attr('checked', 'checked')
  })

</script>

<script>

// document.getElementById("collapsebtn").addEventListener("click", function toffi(){
//   var sw = document.getElementById("collapseExample");
//   if (sw.style.display === "block") {
//     sw.style.display = "none";
//   } else {
//     sw.style.display = "block";
//   }
//   // console.log(sw.style.display);
// });
// document.getElementById("collapsebtn1").addEventListener("click", function toffi(){
//   var sw = document.getElementById("collapseExample1");
//   if (sw.style.display === "block") {
//     sw.style.display = "none";
//   } else {
//     sw.style.display = "block";
//   }
//   // console.log(sw.style.display);
// });
// document.getElementById("collapsebtn2").addEventListener("click", function toffi(){
//   var sw = document.getElementById("collapseExample2");
//   if (sw.style.display === "block") {
//     sw.style.display = "none";
//   } else {
//     sw.style.display = "block";
//   }
//   // console.log(sw.style.display);
// });

// document.getElementById("collapsebtn3").addEventListener("click", function toffi(){
//   var sw = document.getElementById("collapseExample3");
//   if (sw.style.display === "block") {
//     sw.style.display = "none";
//   } else {
//     sw.style.display = "block";
//   }
//   // console.log(sw.style.display);
// });


  // Additional code for adding placeholder in search box of select2
  (function($) {
    var Defaults = $.fn.select2.amd.require('select2/defaults');

    $.extend(Defaults.defaults, {
      searchInputPlaceholder: ''
    });

    var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

    var _renderSearchDropdown = SearchDropdown.prototype.render;

    SearchDropdown.prototype.render = function(decorated) {

      // invoke parent method
      var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

      this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

      return $rendered;
    };

  })(window.jQuery);
</script>

<script>
  $(function(){
    // Toggle Switches
    $(document).ready(function(){
          $('.select2').select2({
            placeholder: 'Choose one',
            searchInputPlaceholder: 'Search'
          });

          $('.select2-no-search').select2({
            minimumResultsForSearch: Infinity,
            placeholder: 'Choose one'
          });
        });
 

  
  });
</script>

<script>
  ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

        $(function() {
        var timeout = 3000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
        });
</script>
