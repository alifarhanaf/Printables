@include('admin.includes.header')
@include('admin.includes.sidebar')

@if(isset($faq))
@foreach ($faq as $faq)
    
@endforeach

<form action="{{ route('submit.edit.faqs',$faq->id) }}" method="POST" >

@else
<form action="{{ route('submit.faqs') }}" method="POST" >
@endif

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
        <p class="pd-t-10">Enter New FAQ</p> 
      </div>
    </div>
    <div class="col-md-3 text-center">
      <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20">Publish New FAQ</button>
    </div>
  </div>
{{-- <div class="az-content-label mg-b-5 ">Enter New Product</div>
<button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Publish Brand</button> --}}

</div>


    


          
          <div class="row">
            <div class="col-md-9 mg-t-15">
         
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">

            <label class="form-label mg-b-10 pd-l-5"><b>Enter Question:</b></label>
            <div class="form-group">
              <input name="questions" type="text" class="form-control" 
              
              @if(isset($faq))
              placeholder="{{$faq->questions}}" 
              value="{{$faq->questions}}"
              @else
              placeholder="Enter Name"
              value=""
              @endif
             
              >
            </div>
            <div class="row">
              <div class="col-md-10">
            <label class="form-label mg-b-10 pd-l-5 pd-t-5"><b>Enter Answers:</b></label>
              </div>
              <div class="col-md-2">
                @if(isset($faq))
                @else
                <button type="button" style="font-size: 10px; float:right; border-radius:5px; width:80px; min-height:35px;" class=" btn btn-outline-indigo btn-block  mg-b-10 addService">Add More</button>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div id="contain1">
                @if(isset($faq))
                @foreach ($faq->answers as $answers)
                    
                
                <input name="answers[]" type="text" class="form-control" placeholder="{{$answers->answers}} " value="{{$answers->answers}}">
                <input type="hidden" name="answerids[]" value="{{$answers->id}}">
                @endforeach
                
              
                
                @else
                <input name="answers[]" type="text" class="form-control" placeholder="Enter Answers">
                @endif
                
              
                
              
            </div>
            <div id="contain2"></div><div id="contain3"></div><div id="contain4"></div><div id="contain5"></div>
            </div>
              
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
                        @if(isset($faq))
                      
                   
                        {{$faq->enabled == 1 ? 'checked':''}}
                 
                        @endif
                        > <label style="margin-left: 3%">Enable</label><br>
                      </div>
                      <div class="row"><input style="margin-top: 2%" type="radio" name="enable" value="0"
                        @if(isset($faq)) 
                        {{$faq->enabled == 0 ? 'checked':''}}
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
  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
  } );

  var counter = 2;
  $(document).on('click', '.addService', function(){
    
    //div.innerHTML += '<div class="row "><div class="col-md-9"><input name="answers[]" type="text" class="form-control" placeholder="Enter Answer"></div><div class="col-md-3"></div></div>';
    document.getElementById('contain'+counter).innerHTML += '<input name="answers[]" type="text" class="form-control" placeholder="Enter Answer '+counter+'">';
    counter++;
    // document.getElementById("contain1").append(html); 
  // $(this).parent().append(html);
});


// var answerContainer = document.getElementById("contain");

// document.getElementById("addService").addEventListener("click",function() {
// 	var newEle = document.createElement("button");
//   var content = document.createTextNode("correct answer "+counter);
//   counter++;
//   newEle.appendChild(content);
//   answerContainer.appendChild(newEle);
// });


    $(function() {
    var timeout = 3000; // in miliseconds (3*1000)
    $('.alert').delay(timeout).fadeOut(300);
    });
    
</script>