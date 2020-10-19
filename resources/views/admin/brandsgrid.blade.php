@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="az-content-label mg-b-5 ">All Brands </div>
<p class="mg-b-10 ">A form control layout using flex-column to create vertical alignment.</p>
<hr>


<div class="table-responsive">
    <table class="table mg-b-0">
      <thead>
         
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th> </th>
          <th> </th>
          <th>Actions</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($brands as $brand)
        <tr >
        <th  class="align-middle" scope="row">
          <img src="https://via.placeholder.com/500x334" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
        </th>
            <td class="align-middle" >{{$brand->name}}</td>
            {{-- <td class="align-middle" >{{$brand->description}}</td> --}}
            <td class="align-middle"></td>
            <td class="align-middle"></td>
            <td>
                <div class="row">
                   
                    <form action="{{ route ('brand.edit',$brand->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('product.delete',$brand->id) }}" method="POST">
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