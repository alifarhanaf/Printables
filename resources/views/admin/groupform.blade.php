@include('admin.includes.header')
@include('admin.includes.sidebar')

@if(isset($group))
@foreach ($group as $group)
    
@endforeach
<form action="{{ route('group.edit.submit',$group->id) }}" method="POST" enctype="multipart/form-data">
  @else 
<form action="{{ route('submit.group') }}" method="POST" enctype="multipart/form-data">
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
        @if(isset($group))
        <p class="pd-t-10">Edit Your Group</p> 
        @else
        <p class="pd-t-10">Enter New Group</p> 
        @endif
      </div>
    </div>
    <div class="col-md-3 text-center">
      <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20">
      @if(isset($group))
        Update Group
        @else 
        Publish Group
        @endif
      </button>
    </div>
  </div>
{{-- <div class="az-content-label mg-b-5 ">Enter New Product</div>
<button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Publish Brand</button> --}}

</div>
          
          <div class="row">
            <div class="col-md-9 mg-t-15">
          
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            <div class="form-group">
              <input name="name" type="text" class="form-control" 
              @if(isset($group))
              placeholder="{{$group->name}}"
              value="{{$group->name}}"
              @else 
              placeholder="Enter Name"
              value=""
              @endif
              >
            </div>
            
            <div class="form-group row row-sm mg-t-10 mg-b-10">
              <div class="col-lg">
                <textarea id="editor" name="description" rows="6" class="form-control"
                @if(isset($group)) 
                placeholder="{{$group->description}}">{{$group->description}}
                @else 
                placeholder="Description">
                @endif
                </textarea>
              </div>
          </div>

              <div class="row row-sm mg-t-15">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
            {{-- <button style="width: fit-content;" type="submit" class="mg-t-20 btn btn-az-primary pd-x-20">Save</button> --}}
            </form>
          </div>
          <div class="row">
          </div>
          @if(isset($group))
          {{-- {{$group->images[0]->url}} --}}
          {{-- {{$group[0]->images}} --}}
          @foreach ($group->faqs as $faq)

          <div class="mg-t-20 bg-gray-200"  >
            <div class="row">
              <div class="col-md-10">

                <a class="bg-gray-200 btn" data-toggle="collapse" 
            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" 
            style="width: -webkit-fill-available; text-align: left;" 
          >{{$faq->questions}}</a>

              </div>
              <div class="col-md-1">
                {{-- <div class="row"> --}}
                  
                    <form action="{{ route('group.faq.delete',$faq->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}
                      <button  type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-delete"></i></button>
                  </form>
                  
  
                  
                {{-- </div> --}}
                

              </div>
            </div>
            
            <div class="collapse mg-t-5" id="collapseExample">
              <div class="card card-body" style="text-align: left;">
                {{$faq->answers}}
              </div>
            </div>
          </div>
              
          @endforeach

          <div class="pd-20  bg-gray-200 mg-t-20">
            <div class="row">
              <div class="col-md-9 ">
                <div class="az-content-label mg-b-5 ">
                  
                  <p class="pd-t-10">Want to Add More FAQS ?</p> 
                  
                </div>
              </div>
              <div class="col-md-3 text-center">
                <button  id="faqbtn"  type="button" style="width: fit-content; " class=" btn btn-az-primary pd-x-20 ">Add FAQS</button>
              </div>
            </div>
          {{-- <div class="az-content-label mg-b-5 ">Enter New Product</div>
          <button type="submit" style="width: fit-content;" class="mg-t-20 btn btn-az-primary pd-x-20">Publish Brand</button> --}}
          
          </div>
          
          


          
         
          <div id="faq" style="display: none" class=" flex-column wd-md-100% pd-30 pd-sm-40 mg-t-20 bg-gray-200">
            <form action="{{ route('submit.group.faq') }}" method="POST">
              {{ csrf_field() }}

            <div class="form-group">
              <input name="question" type="text" class="form-control" placeholder="Enter Question">
            </div>
            <input name="group_id" type="hidden" class="form-control" value="{{$group->id}}">
            
            
            <div class="form-group row row-sm mg-t-10 mg-b-10">
              <div class="col-lg">
                <textarea id="editor1" name="answer" rows="3" class="form-control" placeholder="Answers"></textarea>
              </div>
          </div>

          <button type="submit" style=" width: -webkit-fill-available;" class=" btn btn-az-primary pd-x-20 mg-t-20">Submit FAQ</button>
            </form>
        </div>

        
        @endif
         


        </div>
        
        


        <div class="col-md-3 mg-t-15">
          <div class="d-flex flex-column wd-md-100% pd-10 pd-sm-20 bg-gray-200">
        

            <div class="row ">  
              <div class="col-md-3" style="margin-top: 2%; padding-right:0; ">
                <input style="height: 15px" class="align-middle form-control" type="radio"  name="enable" value="1"
                @if(isset($group))
                
             
                {{$group->enabled == 1 ? 'checked':''}}
           
                @endif
                >
              </div>
              <div>
                <label >
                  <span class="align-middle" style="padding-left : 0px" class="mg-t-5">Enable</span>
                </label>
              </div>
                
              
            </div>
            <div class="row ">  
              <div class="col-md-3" style="margin-top: 2%; padding-right:0; ">
                <input style="height: 15px" class=" align-middle form-control" type="radio"  name="enable" value="0"
                @if(isset($group)) 
                {{$group->enabled == 0 ? 'checked':''}}
                @endif
                >
              </div>
              <div>
                <label >
                  <span  class="align-middle" style="padding-left : 0px" class="mg-t-5">Disbale</span>
                </label>
              </div>
            </div>
             

          </div>
          
          <div class="d-flex flex-column wd-md-100% pd-20 pd-sm-20 mg-t-10 bg-gray-200">
            <div  class=" az-content-label" >
            <p style=" margin-bottom: 0.5rem;" >Profile Image</p> 
          </div>
          
          <div class="row  mg-t-20">
            @if(isset($group))
            @foreach ($group->images as $images)
            
            <div class="container1 mg-t-5 " style="max-width: 100%; padding-left:15%; padding-right:10%">
              <img src="{{ asset($images->url)}} " class="h-125px product-thumbnail   " alt="Responsive image" >
              <div class="overlay">
                
                  
                    {{-- <button type="submit"> --}}
                    <form action="{{ route('group.image.delete',$images->id) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}
                      <button style="background:transparent; border:hidden;" type="submit" class="icon" title="Delete Group Profile">
                    <i class="typcn typcn-delete"></i>
                  </form>
                </button>
              
              
              </div>
            </div>
            @endforeach
         
            @endif
           
          </div>


          </div>
       
          


        </div>

          </div>


@include('admin.includes.footer')
<script>
  $(document).ready(function() {
  $("#faqbtn").click(function() {
    $("#faq").toggle();
  });
});


  ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );

        $(function() {
        var timeout = 3000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
        });
</script>
     