@include('admin.includes.header')
@include('admin.includes.sidebar')

        
       
        <div class="row ">
          <div class="col-md-9">
          <div class="az-content-label mg-b-5 text-center">Edit Product</div>
          <p class="mg-b-10 text-center">A form control layout using flex-column to create vertical alignment.</p>
          @foreach ($product as $prod)
          {{-- var_dump($prod); --}}
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            <form action="{{ route('submit.edit.product',$prod->id,$prod->brands[0]->id,$prod->groups[0]->id) }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
                  
              
            <div class="form-group">
              
              <input name="name" type="text" class="form-control" placeholder="{{$prod->name}}" value="{{$prod->name}}">
            </div>
            <div class="form-group row row-sm mg-t-10 mg-b-10">
                <div class="col-lg">
                  <textarea name="description" rows="3" class="form-control"  placeholder="{{$prod->description}}" > {{$prod->description}} </textarea>
                </div>
            </div>
            <div class="form-group row row-sm mg-t-10">
                <div class="col-lg">
                  <textarea name="sizes" rows="3" class="form-control" placeholder="{{$prod->sizes}}"> {{$prod->sizes}} </textarea>
                  
                </div>
            </div>
            <div class="form-group mg-t-20">
                <input  name="price" type="text" class="form-control" placeholder="{{$prod->price}}" value="{{$prod->price}}">
              </div>
              @endforeach
              <div class="mh-50px">
              @foreach ($prod->images as $images)
              
              <img src="{{ asset($images->url)}} " class="h-125px product-thumbnail wd-100p  wd-sm-200 " alt="Responsive image">    
              
              @endforeach
            </div>


            <div class="col-lg-4">
              <p class="mg-b-10">Multiple Select with Pre-Filled Input</p>
              <select class="form-control select2" multiple="multiple">
                <option value="Firefox" selected>Firefox</option>
                <option value="Chrome">Chrome</option>
                <option value="Safari">Safari</option>
                <option value="Opera">Opera</option>
                <option value="Internet Explorer">Internet Explorer</option>
              </select>
            </div><!-- col -->

              
    
              <div class="form-group row row-sm mg-t-15">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Change Image</label>
                  </div>
                </div>
              </div>

            <button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20"> Save </button>
          </div>
          </div>
          <div class="col-md-3  mg-t-50">
            <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">

            <div class="form-group mg-t-20 mg-lg-t-0 ">
              <select name="brand_id" class="form-control select2 ">
                <option label="{{$prod->brands[0]->name}}" value="{{$prod->brands[0]->id}}"></option>
                @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group mg-t-20 mg-lg-t-0 ">
              <select name="group_id" class="  form-control select2 mg-t-15">
                <option label="{{$prod->groups[0]->name}}" value="{{$prod->groups[0]->id}}"></option>
                @foreach ($groups as $group)
                          <option value="{{$group->id}}">{{$group->name}}</option>
                @endforeach
              </select>
            </div>
            
            



            {{-- Radio Button Check --}}
            <div class="row mg-t-10">
              <div class="col-lg-5">
                <label class="rdiobox">
                  <input style="height: 10px" class="form-control" name="enable" type="radio" value="1" {{$prod->enabled == 1 ? 'checked':''}}>
                  <span>Enable</span>
                </label>
              </div><!-- col-3 -->
              <div class="col-lg-5 mg-t-20 mg-lg-t-0">
                <label class="rdiobox">
                  <input style="height: 10px" class="form-control" type="radio" id="radio-two" name="enable" value="0" {{$prod->enabled == 0 ? 'checked':''}}>
                  <span class="mg-t-5">Disbale</span>
                </label>
              </div><!-- col-3 -->
            </div>



            
            {{-- End --}}

            {{-- <div  >
             
                
                  <input class="form-control" type="radio" id="radio-one" name="enable" value="1" {{$prod->enabled == 1 ? 'checked':''}} />
               
               
              <label for="radio-one">Enable</label>
             
             
              
              <input class="form-control" type="radio" id="radio-two" name="enable" value="0" {{$prod->enabled == 0 ? 'checked':''}} />
              <label for="radio-two">Disable</label>
            </div> --}}

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

     