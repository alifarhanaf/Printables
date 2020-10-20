@include('admin.includes.header')
@include('admin.includes.sidebar')
<form action="{{ route('submit.design') }}" method="POST" enctype="multipart/form-data">
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
    <div class="col-md-9 ">
      <div class="az-content-label mg-b-5 ">
        <p class="pd-t-10">Enter New Design</p> 
      </div>
    </div>
    <div class="col-md-3 text-center">
      <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20">Publish Design</button>
    </div>
  </div>
{{-- <div class="az-content-label mg-b-5 ">Enter New Product</div>
<button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Publish Brand</button> --}}

</div>

          
          <div class="row">
            <div class="col-md-9 mg-t-15">
         
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            <div class="form-group">
              <input name="name" type="text" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group row row-sm mg-t-10 mg-b-10">
              <div class="col-lg">
                <textarea id="editor" name="description" rows="6" class="form-control" placeholder="Description"></textarea>
              </div>
          </div>
              <div class="row row-sm mg-t-15">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
            {{-- <button style="width: fit-content;" type="submit" class="w-20 mg-t-20 btn btn-az-primary pd-x-20">Save</button> --}}
               
          </div>
        </div>
        
        <div class="col-md-3 mg-t-15">
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
        

            <div class="row ">  
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
            </div>
             

          </div>
       
        </div>

          </div>

@include('admin.includes.footer')

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