@include('admin.includes.header')
@include('admin.includes.sidebar')
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


<div class="pd-10  bg-gray-200">

    
  <div class="row">
    <div class="col-md-9">
      <div class="az-content-label mg-b-5 ">
       
        <p class="pd-t-10">All Categories</p>
        
      </div>
    </div>
    <div class="col-md-3 text-center">
      <a href="{{ route('category.form') }}">
      <button  style="width: fit-content; font-size:10px; border-radius:5px; float:right;" class=" btn btn-outline-indigo btn-rounded btn-block ">
      
        Add New Category
        
      </button>
    </a>
      
    </div>
  </div>


</div>

<hr>

<div class="table-responsive">
    <table class="table mg-b-0">
      <thead>
         
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
          {{-- <th>Description</th> --}}
         
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr >
        <th  class="align-middle" scope="row"><img src="{{ asset($category->images[0]->url)}}" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image"></th>
            <td class="align-middle" >{{$category->name}}</td>
            {{-- <td class="align-middle" >{{$design->description}}</td> --}}
            <td class="align-middle"> 
              <span class="badge badge-pill badge-primary {{ $category->enabled == 1 ? 'badge-success' : 'badge-danger' }}  ">
                            {{ $category->enabled == 1 ? 'Active' : 'Disabled' }} 
              </span>
            </td>
            <td>
                <div class="row">
                   
                    <form action="{{ route ('category.edit',$category->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="grid-btn"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('category.delete',$category->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button  type="submit" class="grid-btn"><i class="typcn typcn-delete"></i></button>
                </form>
                
                <div>
            </td>
            {{-- <td></td> --}}

          </tr>
              
        @endforeach
       
      </tbody>
    </table>
  </div><!-- table-responsive -->




@include('admin.includes.footer')
<script>
  $(function() {
      var timeout = 3000; // in miliseconds (3*1000)
      $('.alert').delay(timeout).fadeOut(300);
  });

</script>