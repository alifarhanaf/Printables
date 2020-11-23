@include('admin.includes.header')
@include('admin.includes.sidebar')
@include('admin.includes.headerbar')

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

<div class="pd-10  bg-gray-200">

    
  <div class="row">
    <div class="col-md-9">
      <div class="az-content-label mg-b-5 ">
       
        <p class="pd-t-10">All Brands</p>
        
      </div>
    </div>
    <div class="col-md-3 text-center">
      <a href="{{ route('brand.form') }}">
      <button  style="width: fit-content; font-size:10px; border-radius:5px; float:right;" class=" btn btn-outline-indigo btn-rounded btn-block ">
      
        Add New Brand
        
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
          <th> </th>
          <th>Actions</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($brands as $brand)
        <tr >
        <th  class="align-middle" scope="row">
          @if(isset($brand->images[0]->url))
          <img src="{{ asset($brand->images[0]->url)}}" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
          @else
          <img src="https://via.placeholder.com/500x334" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
          @endif
        </th>
            <td class="align-middle" >{{$brand->name}}</td>
            {{-- <td class="align-middle" >{{$brand->description}}</td> --}}
            <td class="align-middle">
              <span class="badge badge-pill badge-primary {{$brand->enabled == 1 ? 'badge-success':'badge-danger'}}  "> {{$brand->enabled == 1 ? 'Active':'Disabled'}}  </span>
              {{-- <span class="badge badge-pill badge-primary badge-success  "> Active  </span> --}}
            </td>
            <td class="align-middle"></td>
            <td>
                <div class="row">
                   
                    <form action="{{ route ('brand.edit',$brand->id) }}"  >
                        {{ csrf_field() }}
                        
                <button type="submit" class="grid-btn"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('brand.delete',$brand->id) }}" method="POST" >
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