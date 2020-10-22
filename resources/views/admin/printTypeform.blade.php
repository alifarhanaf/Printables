@include('admin.includes.header')
@include('admin.includes.sidebar')
<form action="{{ route('submit.printType') }}" method="POST">
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
        <p class="pd-t-10">Enter New Print Type</p> 
      </div>
    </div>
    <div class="col-md-3 text-center">
      <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20">Publish Print Type</button>
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

            <div class="card bd-0 mg-t-10">
            
                <a id="collapsebtn" data-toggle="collapse" 
              href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" 
              style=" width: -webkit-fill-available; text-align: left;" 
            ><div class="card-header  tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8">
              
            <b>Select FAS</b>
          </div>
          </a>
                
              <!-- card-header -->
              <div id="collapseExample" class="card-body bd bd-t-0 list-group " style="overflow-x: hidden; padding: 0; margin-bottom: 0; display:none;"  >
                
                <ul style="padding-top:1.25rem; "   >
                  @foreach ($faqs as $faq)
                  
                  
                  <div class="checkbox" style="">
                    
                    <li style="list-style-type: none;">
                    <label>  <input name="group_id" type="checkbox" value="{{$faq->id}}"
                       
                      
                       > &nbsp {{$faq->questions}}</label>
                    </li>
                  
                  </div>
                
                  @endforeach
                </ul>
                
                
              </div><!-- card-body -->
            </div><!-- card -->
            
              
            {{-- <button style="width: fit-content;" type="submit" class="w-20 mg-t-20 btn btn-az-primary pd-x-20">Save</button> --}}
               
          </div>

          

          


        </div>
        
        <div class="col-md-3 mg-t-15">
            <div class="card bd-0">
                <div class="card-header tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8">
                  Status
                </div><!-- card-header -->
                <div class="card-body bd bd-t-0">
                  <div style="margin-left: 8%">
                  <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="1"
                    @if(isset($printType))
                        
                     
                    {{$printType->enabled == 1 ? 'checked':''}}
                   
                    @endif
                    > <label style="margin-left: 3%">Enable</label><br>
                  </div>
                  <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="0"
                    @if(isset($printType)) 
                    {{$printType->enabled == 0 ? 'checked':''}}
                    @endif
                    > <label style="margin-left: 3%">Disable</label><br>
                  </div>
                  </div>
                  
                </div><!-- card-body -->
              </div><!-- card -->
       
        </div>

          </div>

@include('admin.includes.footer')

<script>
    document.getElementById("collapsebtn").addEventListener("click", function toffi(){
  var sw = document.getElementById("collapseExample");
  if (sw.style.display === "block") {
    sw.style.display = "none";
  } else {
    sw.style.display = "block";
  }
  // console.log(sw.style.display);
});


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