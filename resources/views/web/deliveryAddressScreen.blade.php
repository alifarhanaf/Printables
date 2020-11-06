@include('web.includes.header')
@if ($errors->any() )
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@include('web.includes.subheader')

<section class="header_beneath address_section_main">
    <div class="container" >
        <div class="my_nav">
            <div class="row under_nav">
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="{{route('productScreen')}}" class="main">
                            <div class="span_round">
                                <span>1</span>
                            </div>
                            Chose a product
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto ">
                    <div class="my_link">
                        <a href="{{route('designDetailScreen')}}" class="main">
                            <div class="span_round">
                                <span>2</span>
                            </div>
                            Design Description
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="{{route('printTypeScreen')}}" class="main">
                            <div class="span_round">
                                <span>3</span>
                            </div>
                            Print Type
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-block m-auto">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>4</span>
                            </div>
                            Delivery
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="">
                            <div class="span_round">
                                <span>5</span>
                            </div>
                            Review
                        </a>
                    </div>
                </div>
            </div>   
        </div>
        
        <div class="main__all_address_section">
            <div class="form_main_div">
              <form action="{{ route('setDraftCampaign') }}" method="POST" >
                <div class="form-row spacing_bottom">
                    <div class="form-group col-md-6">
                      <label for="addcheck">Address Option</label>
                      <select id="addcheck" name="savePreference" class="form-control form_class">
                        <option value="newSave" >New Address(Save)</option>
                        <option value="newDontSave">New Address(Don't Save)</option>
                        
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="addressName">Address Name</label>
                      <input type="text" name="addressName" class="form-control form_class" id="adname" placeholder="Address Name"/>
                      {{-- <select id="addressName" class="form-control form_class">
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select> --}}
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-6">
                      <label for="fname">First Name</label>
                      <input type="text" name="firstName" class="form-control form_class" id="fname" placeholder="First Name"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="lname">Last Name</label>
                      <input type="text" name="lastName" class="form-control form_class" id="lname" placeholder="Last Name"/>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-6">
                      <label for="address1">Address line 1</label>
                      <input type="text" name="addressLine1" class="form-control form_class" id="address1" placeholder="Address"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address2">Address line 2</label>
                      <input type="text" name="addressLine2" class="form-control form_class" id="address2" placeholder="Address"/>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-4">
                      <label for="inputCity">City</label>
                      <input type="text" name="city" class="form-control form_class" id="inputCity" placeholder="City"/>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">State</label>
                      <input type="text" name="state" class="form-control form_class" id="inputState" placeholder="State"/>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputZip">Zip Code</label>
                      <input type="number" name="zipCode" class="form-control form_class" id="inputZip" placeholder="Zip Code"/>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-7">
                      <label for="inputZip">Tell us when you need your order</label>
                      <select id="inputState1" class="form-control form_class">
                        @foreach ($orderTenures as $ot)
                        <option value="{{$ot->id}}">{{$ot->options}}</option>
                        
                        @endforeach
                       
                        
                      </select>
                      {{-- <p>{{$ot->id}}</p> --}}
                    </div>
                  </div>

                  <div id="ddInput" class="form-row spacing_bottom" style="display: none">
                    <div class="form-group col-md-7">
                      <label >Tell us when you need your order</label>
                      <input type="date" class="form-control form_class" name="deliveryDate" id="dd">
                        
                    </div>
                  </div>

                  <div class="main_paragrap w-50 spacing_bottom">
                      <p>Greek House delivers your order within 10 business days after sizes and payment have been submitted. Need your order rushed .</p>
                  </div>
                  <div id="deliveryDate">
                  </div>

                  <div class="next_btn spacing_bottom">
                    
                      <button type="submit" style="border:none;">
                  <a  class="btn my-btn w-100">
                       
                          Next
                      {{ csrf_field() }}
                     
                  </a>
              </button>
              </form>
                  {{-- <a href="{{ route('cartScreen')}}" class="btn my-btn">Next</a> --}}
                  </div>
            </div>
        </div>


    </div>
</section>



@include('web.includes.subfooter')
@include('web.includes.footer')
<script>
   $(document).ready(function(){
    $(function() {
        var timeout = 2000; // in miliseconds (3*1000)
        $('.alert').delay(timeout).fadeOut(300);
        });
       
       $("#inputState1").change(function(){
       var selected = $(this).children("option:selected").val();
      console.log(selected);
      if(selected==2){
        document.getElementById("ddInput").style.display = "block";
      }
      // $.ajax({
      //      url: 'allPrintTypeFaqs/'+selected,
      //      type: 'get',
      //      success: function(response){
               
      //          console.log(response);
      //          $('#faqs').html(response);
               
      //      }
      //  });
   });
   });
</script>
@include('web.includes.endfile')