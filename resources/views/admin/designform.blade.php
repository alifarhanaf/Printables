@include('admin.includes.header')
@include('admin.includes.sidebar')

          <div class="az-content-label mg-b-5 ">Enter New Design</div>
          <p class="mg-b-10 ">A form control layout using flex-column to create vertical alignment.</p>
          <div class="row">
            <div class="col-md-9">
          <form action="{{ route('submit.design') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
          <div class="d-flex flex-column wd-md-100% pd-30 pd-sm-40 bg-gray-200">
            <div class="form-group">
              <input name="name" type="text" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group mg-t-20">
                <input name="description" type="text" class="form-control" placeholder="Description">
              </div>
              <div class="row row-sm mg-t-15">
                <div class="col-sm-7 col-md-6 col-lg-4">
                  <div class="custom-file">
                    <input name="image" type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                </div>
              </div>
            <button style="width: fit-content;" type="submit" class="w-20 mg-t-20 btn btn-az-primary pd-x-20">Save</button>
               
          </div>
        </div>
        <div class="col-md-3">
        </div>
          </div>

@include('admin.includes.footer')

     