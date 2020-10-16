@include('admin.includes.header')
@include('admin.includes.sidebar')


<div class="table-responsive">
    <table class="table mg-b-0">
      <thead>
         
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($designs as $design)
        <tr >
        <th  class="align-middle" scope="row">{{$design->id}}</th>
            <td class="align-middle" >{{$design->name}}</td>
            <td class="align-middle" >{{$design->description}}</td>
            <td class="align-middle"> 
            <img src="https://via.placeholder.com/500x334" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
            </td>
            <td>
                <div class="row">
                   
                    <form action="{{ route ('design.edit',$design->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('design.delete',$design->id) }}" method="POST">
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