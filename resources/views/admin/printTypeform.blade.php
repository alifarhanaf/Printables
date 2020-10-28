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
            ><div class="card-header  tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border: aliceblue;">
              
            <b>Select FAQ</b>
          </div>
          </a>
                
              <!-- card-header -->
              <div id="collapseExample" class="card-body bd bd-t-0 list-group " style="overflow-x: hidden; padding: 0; margin-bottom: 0; display:none; max-height: 400px;"  >
                
                <ul style="padding-top:1.25rem; padding-inline-end: 40px;"   >
                  <?php $a = 0; ?>
                  @foreach ($faqs as $faq)
                  {{-- @foreach ($faq->answers as $answers) --}}
                 
                  <div class="card bd-0 mg-b-10">
                    
                    <div class="card-header tx-medium bd-0 tx-white bg-indigo" style="border: aliceblue;" >
                      <div class="checkbox" style="">
                        <?php $a++; ?>
                        <li style="list-style-type: none;">
                      <div class="row">
                        <div class="col-md-1">
                          <input name="faq_ids[]" type="checkbox" value="{{$faq->id}} " class="mg-t-3"
                         >
                      </div>
                      
                      <div class="col-md-11" style="padding-left:0;">
                      <a id="collapsebtn{{$a}}" data-toggle="collapse" 
              href="#collapseExample{{$a}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$a}}" 
              style=" width: -webkit-fill-available; text-align: left;" 
            > <div>
                        
                        <label>   &nbsp{{$faq->questions}}</label>
                        </div>
                      </a>
                      </div>
                    
                      </div>
                     
                    
                  
                      {{-- here  --}}
                     
                        
                        
                      {{-- //End here --}}
                    
                      
                    </li>
                  </div>
                  </div><!-- card-header -->
                </a>
                  
                    <div id="collapseExample{{$a}}" class="card-body bd bd-t-0" style="overflow-x: hidden; padding: 20px; margin-bottom: 0; display:none;">
                     
                      @foreach ($faq->answers as $answers)
                      
                       <li class="mg-l-10">
                        {{$answers->answers}}
                       </li>
                       @endforeach
                    </div><!-- card-body -->
                 
                    
                    
                  
                  </div>
               
                  @endforeach
                </ul>
                
                
              </div><!-- card-body -->
            </div><!-- card -->
            
              
            {{-- <button style="width: fit-content;" type="submit" class="w-20 mg-t-20 btn btn-az-primary pd-x-20">Save</button> --}}
            <button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Save</button>
          </div>

          

          


        </div>
        
        <div class="col-md-3 mg-t-15">
            <div class="card bd-0">
                <div class="card-header tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border:none">
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

document.getElementById("collapsebtn1").addEventListener("click", function toffi(){
  var sw = document.getElementById("collapseExample1");
  
  if (sw.style.display === "block") {
    sw.style.display = "none";
  } else {
    sw.style.display = "block";
  }

});
document.getElementById("collapsebtn2").addEventListener("click", function toffi(){
  var sw = document.getElementById("collapseExample2");
  
  if (sw.style.display === "block") {
    sw.style.display = "none";
  } else {
    sw.style.display = "block";
  }

});
document.getElementById("collapsebtn3").addEventListener("click", function toffi(){
  var sw = document.getElementById("collapseExample3");
  
  if (sw.style.display === "block") {
    sw.style.display = "none";
  } else {
    sw.style.display = "block";
  }

});
document.getElementById("collapsebtn4").addEventListener("click", function toffi(){
  var sw = document.getElementById("collapseExample4");
  
  if (sw.style.display === "block") {
    sw.style.display = "none";
  } else {
    sw.style.display = "block";
  }

});
document.getElementById("collapsebtn5").addEventListener("click", function toffi(){
  var sw = document.getElementById("collapseExample5");
  
  if (sw.style.display === "block") {
    sw.style.display = "none";
  } else {
    sw.style.display = "block";
  }

});

</script>
<script>

    $(function() {
    var timeout = 3000; // in miliseconds (3*1000)
    $('.alert').delay(timeout).fadeOut(300);
    });
    
</script>