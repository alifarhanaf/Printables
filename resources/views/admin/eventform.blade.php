@include('admin.includes.header')
@include('admin.includes.sidebar')
@include('admin.includes.headerbar')
@if (isset($event))

    <form action="{{ route('submit.edited.category', $event->id) }}" method="POST" >
    @else
        <form action="{{ route('submitEvent') }}" method="POST" >
@endif
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
              @if(isset($event))
              <p class="pd-t-10">Edit Your Event</p>
              @else
              <p class="pd-t-10">Enter New Event</p>
              @endif
                
            </div>
        </div>
        <div class="col-md-3 text-center">
        </div>
    </div>
</div>





<div class="row">
    <div class="col-md-9 mg-t-15">

        <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            <label class="form-label mg-b-10 pd-l-5"><b>Enter Event Name:</b></label>
            <div class="form-group">
                <input name="name" type="text" class="form-control"
                @if(isset($event))
                placeholder="{{$event->name}}"
                value="{{$event->name}}"
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
                    @if(isset($event)) 
                    placeholder="{{$event->description}}">{{$event->description}}
                    @else 
                    placeholder="Description">
                    @endif
                      </textarea>
                </div>
            </div>

            
            <button type="submit" style="width: fit-content;" class=" btn btn-az-primary pd-x-20 mg-t-20">Save </button>
            {{-- <button style="width: fit-content;" type="submit"
                class="w-20 mg-t-20 btn btn-az-primary pd-x-20">Save</button> --}}

        </div>
    </div>
    <div class="col-md-3 mg-t-15">

        <div class="card bd-0">
            <div class="card-header tx-medium bd-0 tx-white bg-indigo" style="background: #f4f5f8;border:none;">
                Status
            </div><!-- card-header -->
            <div class="card-body bd bd-t-0">
                <div style="margin-left: 8%">
                    <div class="row"><input style="margin-top: 2%" type="radio" name="status" value="1" @if (isset($event))


                        {{ $event->enabled == 1 ? 'checked' : '' }}

                        @endif
                        checked
                        > <label style="margin-left: 3%">Enable</label><br>
                    </div>
                    <div class="row"><input style="margin-top: 2%" type="radio" name="status" value="0" @if (isset($event))
                        {{ $event->enabled == 0 ? 'checked' : '' }}
                        @endif
                        > <label style="margin-left: 3%">Disable</label><br>
                    </div>
                </div>

            </div><!-- card-body -->
        </div><!-- card -->
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
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    $(function() {
        var timeout = 3000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
    });

</script>
