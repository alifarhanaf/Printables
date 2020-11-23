@include('admin.includes.header')
@include('admin.includes.sidebar')
@include('admin.includes.headerbar')

<div class="pd-10  bg-gray-200">

    
  <div class="row">
    <div class="col-md-9">
      <div class="az-content-label mg-b-5 ">
       
        <p class="pd-t-10">All Campaigns</p>
        
      </div>
    </div>
    <div class="col-md-3 text-center">
      {{-- <a href="{{ route('product.form') }}">
      <button  style="width: fit-content; font-size:10px; border-radius:5px; float:right;" class=" btn btn-outline-indigo btn-rounded btn-block ">
      
        Add New Product
        
      </button>
    </a> --}}
      
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
          <th>Delivery Date</th>
          <th>Updated At</th>
          <th>Status</th>
          {{-- <th>Actions</th> --}}
          {{-- <th>Image</th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach ($campaigns as $campaign)
        <tr >
        <th  class="align-middle" scope="row">
          <form action="{{ route ('campaignScreenAdmin1',$campaign->id) }}" >
            {{ csrf_field() }}
          <button type="submit" class="ax">
          <img src="{{ isset($campaign->designs[0]->images[0]->url) ? asset($campaign->designs[0]->images[0]->url) : 'https://via.placeholder.com/500' }}"  class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
          </button>
          </form>
        </th>
            <td class="align-middle" ><a style="font-weight: 400; color:black; text-transform: uppercase;" href="{{ route ('campaignScreenAdmin1',$campaign->id) }}">{{$campaign->name}}</a></td>
            <td class="align-middle" >{{$campaign->deliveryDate}}</td>
            <td class="align-middle" >{{$campaign->updated_at}}</td>
            <td class="align-middle"> 
              <span class="badge badge-pill 
              @switch($campaign->status)
                @case(1)
                badge-success
                @break

                @case(2)
                badge-warning
                @break

                @case(3)
                badge-danger
                @break

                @case(4)
                badge-info
                
                @break

                @case(5)
                badge-light
                @break

                @default
                
              @endswitch

                
               ">
               @switch($campaign->status)
                @case(1)
                Pending Approval
                @break

                @case(2)
                Campaign Approved
                @break

                @case(3)
                Campaign Cancelled
                @break

                @case(4)
                Campaign in Process
                @break

                @case(5)
                Campaign Closed
                @break

                @default
                
              @endswitch

                {{-- {{$campaign->status == 1 ? 'Pending Approval':'Campaign Closed'}} --}}
              </span>
            </td>
            {{-- <td class="align-middle" >{{$product->description}}</td> --}}
            {{-- <td class="align-middle"> 
                <img src="https://via.placeholder.com/500x334" class="img-thumbnail wd-50p wd-sm-50" alt="Responsive image">
            </td> --}}
            {{-- <td>
                <div class="row">
                   
                    <form action="{{ route ('product.edit',$product->id) }}" >
                        {{ csrf_field() }}
                <button type="submit" class=" grid-btn" ><i class="typcn typcn-edit"></i></button>
                    </form>
                &nbsp
                <form action="{{ route('product.delete',$product->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <button  type="submit" class=" grid-btn"><i class="typcn typcn-delete"></i></button>
                </form>
                
                <div>
            </td> --}}
           

          </tr>
              
        @endforeach
       
      </tbody>
    </table>
  </div><!-- table-responsive -->







@include('admin.includes.footer')