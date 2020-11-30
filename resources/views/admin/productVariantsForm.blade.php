@include('admin.includes.header')
@include('admin.includes.sidebar')
@include('admin.includes.headerbar')

{{ csrf_field() }}

@if (session('message') && session('message') == 'Success')
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

@if ($errors->any())
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
              @if(isset($category))
              <p class="pd-t-10">Edit Your category</p>
              @else
              <p class="pd-t-10">Select {{$product->name}}'s Variants</p>
              @endif
                
            </div>
        </div>
        <div class="col-md-3 text-center">
        </div>
    </div>
</div>





<div class="row">
    <div class="col-md-9 mg-t-15">
        <form action="{{ route('submit.product.variants',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            
            <label class="form-label mg-b-10 pd-l-5"><b>Select Colors:</b></label>
              <div class="form-group ">
              <div class="All_Colors" >
                <div class="row " style="padding-inline-start: 5%">
                  @foreach ($colors as $color)
                      <div class="main_colors" >
                          <input style="display: none" type="checkbox" name="colors[]"
                              value="{{ $color->id }}" data-id="{{ $color->name }}">
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

            {{-- <label class="form-label mg-b-10 pd-l-5"><b>Enter Description:</b></label>
            <div class="form-group row row-sm  mg-b-10">
                <div class="col-lg">
                    <textarea id="editor" name="description" rows="6" class="form-control"
                    @if(isset($category)) 
                    placeholder="{{$category->description}}">{{$category->description}}
                    @else 
                    placeholder="Description">
                    @endif
                      </textarea>
                </div>
            </div> --}}
            @foreach ($colors as $color)
            {{-- <div id="" style="border: 1px solid black"> --}}
            <div id="file{{$color->id}}" style="display: none; border: 1px solid black; padding:10px; margin-top:10px " >
                <div class="row">
                    <div class="col-md-6">
                <label class="form-label mg-t-10 pd-l-5"><b>Choose Image For {{$color->name}}:</b></label>
                <div class="row row-sm ">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="custom-file">
                        <input name="images[]" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label mg-t-10 pd-l-5"><b>Selected Color:</b></label>
                <div class="row row-sm ">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div id="selectedColorBG" ></div>
                        {{-- <div class="custom-file">
                        <input name="image{{$color->id}}" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div> --}}
                    </div>
                </div>
                </div>
                </div>
                

                {{-- <label class="form-label mg-b-10 pd-l-5"><b>Enter Name:</b></label>
                <div class="form-group"> --}}
                
                    <label class="form-label mg-b-10 mg-t-10 pd-l-5"><b>Enter Variant Name For {{$color->name}}:</b></label>
                    <div class="form-group">
                    <input name="names[]" type="text" class="form-control"
                        placeholder="Enter Name"
                        value=""
                        
                        >
                    </div>
                    
                </div>
            @endforeach
           
            

            {{-- <div id="test1" style="display: none">
                <label class="form-label mg-t-10 pd-l-5"><b>Choose Image:</b></label>
                <div class="row row-sm ">
                    <div class="col-sm-7 col-md-6 col-lg-4">
                        <div class="custom-file">
                            <input name="image" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                </div> --}}
            <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20 mg-t-20">Save </button>
            {{-- <button style="width: fit-content;" type="submit"
                class="w-20 mg-t-20 btn btn-az-primary pd-x-20">Save</button> --}}

        </div>
        </form>
    </div>
    <div class="col-md-3 mg-t-15">

        {{-- <div class="col-md-3" style="margin-top: 2%; padding-right:0; ">
            <input style="height: 15px" class="align-middle form-control" type="radio" name="enable" value="1">
        </div>
        <div>
            <label>
                <span class="align-middle" style="padding-left : 0px" class="mg-t-5">Enable</span>
            </label>
        </div>


    </div>
    <div class="row ">
        <div class="col-md-3" style="margin-top: 2%; padding-right:0; ">
            <input style="height: 15px" class=" align-middle form-control" type="radio" name="enable" value="0">
        </div>
        <div>
            <label>
                <span class="align-middle" style="padding-left : 0px" class="mg-t-5">Disbale</span>
            </label>
        </div>
    </div>


</div> --}}




</div>





</div>

@include('admin.includes.footer')
<script>
    // $(document).ready(function(){
    //     $.ajax({
    //         url: 'allColors/',
    //         type: 'get',
    //         success: function(response){
    //         }
    //         });
    //     $('#showPaletteOnly').spectrum({
    //         showPaletteOnly: true,
    //         showPalette:true,
    //         color: '#DC3545',
    //         palette: [
    //             ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
    //             ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
    //         ]
    //     });
    // });




    $('.All_Colors label').click(function(event) {
      $(this).parents('.All_Colors').find('label').removeAttr('data-active', false)
      $(this).attr('data-active', true)
      $(this).parent('.main_colors').find('input[type="checkbox"]').attr('checked', 'checked')
      var id = $(this).parent('.main_colors').find('input[type="checkbox"]').val();
      var name = $(this).parent('.main_colors').find('input[type="checkbox"]').data('id');
                    document.getElementById("file"+id).style.display ="block";
                    document.getElementById("name"+id).style.display ="block";
                    $('#selectedColorBG').attr('style', 'background: blue !important');
                    console.log(id);
                    console.log(name);
  })



                    // $('.All_Colors label').click(function(event) {
                    // $(this).parents('.All_Colors').find('label').removeAttr('data-active', false)
                    // $(this).parents('.All_Colors').find('input').removeAttr('checked', false)
                    // $(this).attr('data-active', true)
                    // $(this).parent('.main_colors').find('input[type="radio"]').attr('checked', 'checked')
                    
                    // // alert('Hi');
                    // })
    
    // ClassicEditor
    //     .create(document.querySelector('#editor'))
    //     .catch(error => {
    //         console.error(error);
    //     });

    $(function() {
        var timeout = 3000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
    });

</script>
