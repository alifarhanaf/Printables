@include('admin.includes.header')
@include('admin.includes.sidebar')
@include('admin.includes.headerbar')

<div class="pd-10  bg-gray-200">

    
  <div class="row">
    <div class="col-md-9">
      <div class="az-content-label mg-b-5 ">
       
        <p class="pd-t-10">All Groups</p>
        
      </div>
    </div>
    <div class="col-md-3 text-center">
      <a href="{{ route('group.form') }}">
      <button  style="width: fit-content; font-size:10px; border-radius:5px; float:right;" class=" btn btn-outline-indigo btn-rounded btn-block ">
      
        Add New Group
        
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
        </tr>
      </thead>
      <tbody>
        @foreach ($groups as $group)
        <tr >
        <th  class="align-middle" scope="row">
          <img src="{{ isset($group->images[0]->url) ? asset($group->images[0]->url) : 'https://via.placeholder.com/500' }}"  class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
         
        </th>
            <td class="align-middle" >{{$group->name}}</td>
            
            <td class="align-middle"> 
              <span class="badge badge-pill badge-primary {{$group->enabled == 1 ? 'badge-success':'badge-danger'}}  "> {{$group->enabled == 1 ? 'Active':'Disabled'}}  </span>
            </td>
            <td>
                <div class="row">
                   
                    <form action="{{ route ('group.edit',$group->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="grid-btn"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('group.delete',$group->id) }}" method="POST">
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