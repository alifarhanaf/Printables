@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="az-content-label mg-b-5 ">All Groups </div>
<p class="mg-b-10 ">A form control layout using flex-column to create vertical alignment.</p>
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
                <button type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('group.delete',$group->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button  type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-delete"></i></button>
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