@include('admin.includes.header')
@include('admin.includes.sidebar')

        
       
        <div class="w-75 ">
          <div class="az-content-label mg-b-5 text-center">Edit Product</div>
          <p class="mg-b-10 text-center">A form control layout using flex-column to create vertical alignment.</p>
          @foreach ($product as $prod)
          {{-- var_dump($prod); --}}
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            <form action="{{ route('submit.edit.product',$prod->id) }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              
                  
              
            <div class="form-group">
              
              <input name="name" type="text" class="form-control" placeholder="{{$prod->name}}">
            </div>
            <div class="form-group row row-sm mg-t-10 mg-b-10">
                <div class="col-lg">
                  <textarea name="description" rows="3" class="form-control"  placeholder="{{$prod->description}}"></textarea>
                </div>
            </div>
            <div class="form-group row row-sm mg-t-10">
                <div class="col-lg">
                  <textarea name="sizes" rows="3" class="form-control" placeholder="{{$prod->sizes}}"></textarea>
                </div>
            </div>
            <div class="form-group mg-t-20">
                <input  name="price" type="text" class="form-control" placeholder="{{$prod->price}}">
              </div>
              @endforeach
              <div class="form-group mg-t-20 mg-lg-t-0 ">
                <select name="brand_id" class="form-control select2 ">
                  <option label="{{$prod->brands[0]->name}}"></option>
                  @foreach ($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group mg-t-20 mg-lg-t-0 ">
                <select name="group_id" class="  form-control select2 mg-t-15">
                  <option label="{{$prod->groups[0]->name}}"></option>
                  @foreach ($groups as $group)
                            <option value="{{$group->id}}">{{$group->name}}</option>
                  @endforeach
                </select>
              </div>

              
    
              <div class="form-group row row-sm mg-t-15">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>

            <button type="submit" class="mg-t-20 btn btn-az-primary pd-x-20"> Save </button>
          </div>

        </div>
@include('admin.includes.footer')

     