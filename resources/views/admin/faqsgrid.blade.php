@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="pd-10  bg-gray-200">

    
  <div class="row">
    <div class="col-md-9">
      <div class="az-content-label mg-b-5 ">
       
        <p class="pd-t-10">All FAQS</p>
        
      </div>
    </div>
    <div class="col-md-3 text-center">
      <a href="{{ route('faq.form') }}">
      <button  style="width: fit-content; font-size:10px; border-radius:5px; float:right;" class=" btn btn-outline-indigo btn-rounded btn-block ">
      
        Add New FAQ
        
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
          <th>Name</th>
          <th>Status</th>
          <th>Actions</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($faqs as $faq)
        <tr >
            <td class="align-middle" >{{$faq->questions}}</td>
            <td class="align-middle">
              <span class="badge badge-pill badge-primary badge-success  "> Active  </span>
            </td>
            
            <td>
                <div class="row">
                   
                    <form action="{{ route ('faq.edit',$faq->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="grid-btn"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('faq.delete',$faq->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button  type="submit" class="grid-btn"><i class="typcn typcn-delete"></i></button>
                </form>
                
                <div>
            </td>

          </tr>
              
        @endforeach
       
      </tbody>
    </table>
  </div><!-- table-responsive -->




@include('admin.includes.footer')