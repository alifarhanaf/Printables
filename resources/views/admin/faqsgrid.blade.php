@include('admin.includes.header')
@include('admin.includes.sidebar')

<div class="az-content-label mg-b-5 ">All Faqs </div>
<p class="mg-b-10 ">A form control layout using flex-column to create vertical alignment.</p>
<hr>

<div class="table-responsive">
    <table class="table mg-b-0">
      <thead>
         
        <tr>
          <th>Namw</th>
          <th>Actions</th>
         
        </tr>
      </thead>
      <tbody>
        @foreach ($faqs as $faq)
        <tr >
            <td class="align-middle" >{{$faq->questions}}</td>
            
            <td>
                <div class="row">
                   
                    <form action="{{ route ('faq.edit',$faq->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('faq.delete',$faq->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button  type="submit" class="btn btn-indigo btn-icon"><i class="typcn typcn-delete"></i></button>
                </form>
                
                <div>
            </td>

          </tr>
              
        @endforeach
       
      </tbody>
    </table>
  </div><!-- table-responsive -->




@include('admin.includes.footer')