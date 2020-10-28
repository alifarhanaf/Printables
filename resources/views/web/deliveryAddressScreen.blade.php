@include('web.includes.header')
@include('web.includes.subheader')

<section class="header_beneath address_section_main">
    <div class="container" >
        <div class="my_nav">
            <div class="row under_nav">
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>1</span>
                            </div>
                            Chose a product
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto ">
                    <div class="my_link">
                        <a href="" class="main">
                            <div class="span_round">
                                <span>2</span>
                            </div>
                            Design Description
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-12 d-lg-block d-none m-auto">
                    <div class="my_link">
                        <a href="" class="main">
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
                <div class="form-row spacing_bottom">
                    <div class="form-group col-md-6">
                      <label for="addcheck">Address Option</label>
                      <select id="addcheck" class="form-control form_class">
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="addressName">Address Name</label>
                      <select id="addressName" class="form-control form_class">
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-6">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control form_class" id="fname" placeholder="First Name"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control form_class" id="lname" placeholder="Last Name"/>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-6">
                      <label for="address1">Address line 1</label>
                      <input type="text" class="form-control form_class" id="address1" placeholder="Address"/>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address2">Address line 1</label>
                      <input type="text" class="form-control form_class" id="address2" placeholder="Address"/>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-4">
                      <label for="inputCity">City</label>
                      <input type="text" class="form-control form_class" id="inputCity" placeholder="City"/>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">State</label>
                      <input type="text" class="form-control form_class" id="inputState" placeholder="State"/>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputZip">Zip Code</label>
                      <input type="number" class="form-control form_class" id="inputZip" placeholder="Zip Code"/>
                    </div>
                  </div>


                  <div class="form-row spacing_bottom">
                    <div class="form-group col-md-7">
                      <label for="inputZip">Tell us when you need your order</label>
                      <select id="inputState" class="form-control form_class">
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>

                  <div class="main_paragrap w-50 spacing_bottom">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ex facere architecto, in tempore vero praesentium. Atque fuga repellendus architecto.</p>
                  </div>

                  <div class="next_btn spacing_bottom">
                  <a href="{{ route('cartScreen')}}" class="btn my-btn">Next</a>
                  </div>
            </div>
        </div>


    </div>
</section>



@include('web.includes.subfooter')
@include('web.includes.footer')
@include('web.includes.endfile')