@include('web.includes.header')
@include('web.includes.subheader')



<div  style="margin-top: 5%">
   
    <div class="container"> 
        <form method="POST" action="{{route('submitJOH')}}" accept-charset="UTF-8" autocomplete="off" id="work-with-us-form-element">
            
        @csrf
                        <div >
                            <div class="row"> 
                            <h5 class="mx-auto px-auto" style="font-size:2rem;font-weight:700;text-transform:uppercase;color: #84a0bf;">Join The Conversation.
                                Get Rewards!</h5>
                            </div>
            <div class="row"> 
                <div class="col-md-2 col-lg-2"></div>
                <div class="col-md-8 col-lg-8">
                    
                    <div class="joinOurHouse" style="margin-top: 5%">
                        <div class="row justify-content-center mt-5 mt-md-n5">
                            <div class="col-md-12 col-lg-12 ">
                                <label for="name" class="text-sm">Name*</label>
                                <div class="form-group">
                                <input class="form-control work-with-is-form-control " placeholder="Your name" id="form-full-name" name="name" type="text">
                                                                            </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="email" class="text-sm">Email*</label>
                                <div class="form-group">
                                    <input id="work_with_us_email" class="form-control work-with-is-form-control " placeholder="Your Email Address" name="email" type="text">
                                                                            </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="position" class="text-sm">Your position in your Organization</label>
                                <div class="form-group">
                                    <select class="form-control work-with-is-form-control select-placeholder " data-placeholder="400" data-selected="500" name="position"><option value="" selected="selected">Your Position in your chapter</option><option value="none">None</option><option value="tshirt_chair">T-Shirt Chair</option><option value="social_chair">Social Chair</option><option value="philanthropy_chair">Philanthropy Chair</option><option value="treasurer">Treasurer</option><option value="chapter_officer">Chapter Officer</option></select>
                                                                            </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="phone" class="text-sm">Your Phone Number</label>
                                <div class="form-group">
                                    <input class="form-control work-with-is-form-control " placeholder="Your phone number" id="phone_no" name="phone" type="text">
                                                                                <div class="invalid-feedback" style="display: none" id="phone_msg">
                                        Enter a valid phone number
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="members" class="text-sm">No. of Members</label>
                                <div class="form-group">
                                    <select class="form-control work-with-is-form-control select-placeholder " data-placeholder="400" data-selected="500" id="work-with-us-members" name="members"><option value="" selected="selected"># of members in your organization</option><option value="1">1-23</option><option value="24">24-47</option><option value="48">48-71</option><option value="72">72-143</option><option value="144">144+</option></select>
                                                                            </div> 
                            </div>
                            {{-- <div class="col-md-12 col-lg-12">
                                <label for="chapter" class="text-sm">Fraternity or Sorority</label>
                                <div class="form-group">
                                    <select name="chapter" id="chapters" class=" work-with-is-form-control selectized" autocomplete="nope" tabindex="-1" style="display: none;"><option value="" selected="selected"></option></select><div class="selectize-control work-with-is-form-control single"><div class="selectize-input items not-full has-options"><input type="select-one" autocomplete="nope" class="form-control" tabindex="" id="chapters-selectized" placeholder="Fraternity or Sorority" style="width: 151.812px;"></div></div>
                                                                            </div>
                            </div> --}}
                            <div class="col-md-12 col-lg-12 ">
                                <label for="name" class="text-sm">Fraternity or Sorority*</label>
                                <div class="form-group">
                                <input class="form-control work-with-is-form-control " placeholder="Enter Your Fraternity or Sorority"  name="chapter" type="text">
                                                                            </div>
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <label for="graduation_year" class="text-sm">Graduation Year</label>
                                <div class="form-group">
                                <select class="form-control work-with-is-form-control" id="graduation_year" name="graduation_year"><option value="" selected="selected">Your graduation year</option><option value="2020 Spring">2020 Spring</option><option value="2020 Fall">2020 Fall</option><option value="2021 Spring">2021 Spring</option><option value="2021 Fall">2021 Fall</option><option value="2022 Spring">2022 Spring</option><option value="2022 Fall">2022 Fall</option><option value="2023 Spring">2023 Spring</option><option value="2023 Fall">2023 Fall</option><option value="2024 Spring">2024 Spring</option><option value="2024 Fall">2024 Fall</option><option value="Alumni">Alumni</option><option value="Not a Student">Not a Student</option></select>
                                                                        </div>
                            </div> 
                            {{-- <div class="col-md-12 col-lg-12">
                                <label for="school" class="text-sm">University/College</label>
                                <div class="form-group">
                                    <select name="school" id="school-input" class="work-with-is-form-control selectized" autocomplete="nope" tabindex="-1" style="display: none;"><option value="" selected="selected"></option></select><div class="selectize-control work-with-is-form-control single"><div class="selectize-input items not-full has-options"><input type="select-one" autocomplete="nope" class="form-control" tabindex="" id="school-input-selectized" placeholder="University/College Name" style="width: 172.375px;"></div></div>
                                                                            </div>
                            </div> --}}
                            <div class="col-md-12 col-lg-12 ">
                                <label for="name" class="text-sm">University or College*</label>
                                <div class="form-group">
                                <input class="form-control work-with-is-form-control " placeholder="Enter Your University or College"  name="school" type="text">
                                                                            </div>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <label for="are_you_ready" class="text-sm">Are You Ready To Submit A Design Request?</label>
                                <div class="form-group">
                                    <select class="form-control work-with-is-form-control select-placeholder " data-placeholder="400" data-selected="500" name="are_you_ready"><option value="" selected="selected">Are you ready to submit a design request?</option><option value="no">Not yet!</option><option value="yes">Yes, I’m ready for my free design.</option></select>
                                                                            </div>
                            </div>  
                            <div class="col-md-6 col-md-offset-3 mt-4">
                                <div class="form-group">
                                    <div class="text-center px-auto mx-auto" >
                                    <button type="submit" class="btn btn-dark btn-lg shadow " id="submit_work_with_us">JOIN</button>
                                    </div>
                                    {{-- <input id="username" name="username" type="hidden" value="">
                                    <input id="password" name="password" type="hidden" value="">
                                    <input id="instagram_handle_field" name="instagram_handle" type="hidden" value="">
                                    <input id="submit_form" name="submit_form" type="hidden" value=""> --}}
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-md-2 col-lg-2"></div>    
            </div>
        </div> 
        </form> 
    </div> 
</div>

@include('web.includes.subfooter')    
@include('web.includes.footer')
@include('web.includes.endfile')