@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="az-content-label mg-b-5 ">All Products </div>
<p class="mg-b-10 ">A form control layout using flex-column to create vertical alignment.</p>
<hr>


<div class="table-responsive">
    <table class="table mg-b-0">
      <thead>
         
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Sizes</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
          {{-- <th>Image</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
        <tr >
        <th  class="align-middle" scope="row">
          <a href="www.google.com">
          <img src="{{ isset($product->images[0]->url) ? asset($product->images[0]->url) : 'https://via.placeholder.com/500' }}"  class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
        </a>
        </th>
            <td class="align-middle" >{{$product->name}}</td>
            <td class="align-middle" >{{$product->sizes}}</td>
            <td class="align-middle" >{{$product->price}}</td>
            <td class="align-middle"> 
              <span class="badge badge-pill badge-primary {{$product->enabled == 1 ? 'badge-success':'badge-danger'}}  "> {{$product->enabled == 1 ? 'Active':'Disabled'}}  </span>
            </td>
            {{-- <td class="align-middle" >{{$product->description}}</td> --}}
            {{-- <td class="align-middle"> 
                <img src="https://via.placeholder.com/500x334" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
            </td> --}}
            <td>
                <div class="row">
                   
                    <form action="{{ route ('product.edit',$product->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('product.delete',$product->id) }}" method="POST">
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