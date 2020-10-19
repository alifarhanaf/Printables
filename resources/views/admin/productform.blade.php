@include('admin.includes.header')
@include('admin.includes.sidebar')

    

@if(isset($product))
@foreach ($product as $product)
    
@endforeach
<form action="{{ route('submit.edit.product',$product->id) }}" method="POST" enctype="multipart/form-data">

@else
<form action="{{ route('submit.product') }}" method="POST" enctype="multipart/form-data">
@endif

<form action="{{ route('submit.product') }}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
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
        <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20">
          @if(isset($product))
          Update Product
          @else
          Publish Product
          @endif
        </button>
      </div>
    </div>
  {{-- <div class="az-content-label mg-b-5 ">Enter New Product</div>
  <button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Publish Brand</button> --}}

  </div>

      
       <div class="row">
         
        <div class=" col-md-9 mg-t-15 ">
          

          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
           
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
            <div class="form-group row row-sm mg-t-10 mg-b-10">
                <div class="col-lg">
                  <textarea id="editor" name="description" rows="6" class="form-control" 
                  @if(isset($product))
                  placeholder="{{$product->description}}"
                  @else
                  placeholder=""
                  @endif
                  
                  ></textarea>
                </div>
            </div>
            <div class="form-group row row-sm mg-t-10">
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
            <div class="form-group mg-t-20">
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

              
            
             
              
           



              
    
              <div class="form-group row row-sm mg-t-15">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="images[]" type="file" class="custom-file-input"   multiple="multiple" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="mh-50px mg-t-20">
              @if(isset($product))
              @foreach ($product->images as $images)
              
              <img src="{{ asset($images->url)}} " class="h-125px product-thumbnail wd-100p  wd-sm-200 " alt="Responsive image">    
              
              @endforeach
              @endif
              </div>

            {{-- <button style="width: fit-content;" type="submit" class="mg-t-20 btn btn-az-primary pd-x-20"> Save </button> --}}
          </div>

        </div>
       
        <div class="col-md-3 mg-t-15">
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
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

          <div style="margin-top: 2%;" class="mg-b-0 az-content-label" >
            <p style=" margin-bottom: 0.5rem;" >Status</p> 
          </div>
          <div style="margin-left: 8%">
          <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="1"
            @if(isset($product))
                
             
            {{$product->enabled == 1 ? 'checked':''}}
           
            @endif
            > <label style="margin-left: 3%">Enable</label><br></div>
          <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="0"
            @if(isset($product)) 
            {{$product->enabled == 0 ? 'checked':''}}
            @endif
            > <label style="margin-left: 3%">Disable</label><br></div>

          </div>

          <div style="margin-top: 2%;" class="mg-b-0 az-content-label">
            <p style="margin-bottom: 0.5rem;" >Select Groups</p> 
          </div>
          {{-- @if(isset($product))
          <div class="checkbox">
            <li>
            <label>  <input name="groups[]" type="checkbox" value="{{$product->groups[0]->id}}" checked> &nbsp{{$product->groups[0]->name}}</label>
            </li>
          </div>
          @endif --}}
          @foreach ($groups as $group)
          <div class="checkbox">
            <li>
            <label>  <input name="group_id" type="checkbox" value="{{$group->id}}"
              @if(isset($product)) 
              {{$group->id == $product->groups[0]->id ? 'checked':''}} 
              @endif
               > &nbsp{{$group->name}}</label>
            </li>
          </div>
          @endforeach

          <div style="margin-top: 2%;" class="mg-b-0 az-content-label" >
            <p style="margin-bottom: 0.5rem;" >Select Brand</p> 
          </div>
          @foreach ($brands as $brand)
          <div class="checkbox">
           
              <li>
              
            <label>  <input name="brand_id" type="checkbox" value="{{$brand->id}}" 
              @if(isset($product))
              {{$brand->id == $product->brands[0]->id ? 'checked':''}}
              @endif
              > &nbsp{{$brand->name}}</label>
          </li>
        
          </div>
          @endforeach

          <div style="margin-top: 2%;" class="mg-b-0 az-content-label">
            <p style="margin-bottom: 0.5rem;" >Select Categories</p> 
          </div>
          @foreach ($categories as $category)
          <div class="checkbox">
            <li>
            <label>  <input name="categories_id" type="checkbox" value="{{$category->id}}"
              @if(isset($product))
              {{$category->id == $product->categories[0]->id ? 'checked':''}}
              @endif
              > &nbsp{{$category->name}}</label>
            </li>
          </div>
          @endforeach
          {{-- <div class="checkbox">
            <label><input type="checkbox" value="{{$group->id}}">{{$group->name}}</label>
          </div>
          <div class="checkbox">
            <label><input type="checkbox" value="">Option 2</label>
          </div>
          <div class="checkbox ">
            <label><input type="checkbox" value="">Option 3</label>
          </div> --}}

          

          {{-- <div class="az-toggle">
            <span>
             
              </span></div> --}}

              {{-- <div class=" switch-field ">
                <input class="form-control" type="radio" id="radio-one" name="enable" value="1" checked/>
                <label for="radio-one">Enable</label>
                <input class="form-control" type="radio" id="radio-two" name="enable" value="0" />
                <label for="radio-two">Disable</label>
              </div> --}}
              {{-- <div style="margin-top: 2%;" class="mg-b-0 az-content-label" >
                <p style=" margin-bottom: 0.5rem;" >Status</p> 
              </div> --}}


              {{-- <div style="margin-left: 8%">
              <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="1"> <label style="margin-left: 3%">Enable</label><br></div>
              <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="0"> <label style="margin-left: 3%">Disable</label><br></div>
              </div> --}}
         
         
          
              {{-- <div class="row ">  
                <div class="col-md-3" style="margin-top: 2%; padding-right:0; ">
                  <input style="height: 15px" class="align-middle form-control" type="radio"  name="enable" value="1" >
                </div>
                <div>
                  <label >
                    <span class="align-middle" style="padding-left : 0px" class="mg-t-5">Enable</span>
                  </label>
                </div>
                  
                
              </div>
              <div class="row ">  
                <div class="col-md-3" style="margin-top: 2%; padding-right:0; ">
                  <input style="height: 15px" class=" align-middle form-control" type="radio"  name="enable" value="0" >
                </div>
                <div>
                  <label >
                    <span  class="align-middle" style="padding-left : 0px" class="mg-t-5">Disbale</span>
                  </label>
                </div>
              </div> --}}
              {{-- End Radio Buttons --}}

          </div>
       
          


        </div>
       </div>

       
@include('admin.includes.footer')

<script>
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
</script>
