@include('web.includes.header')
@include('web.includes.subheader')

  
  <section class="second__second_index">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12 d-block m-auto">
          <div class="main_text">
            <div class="main_heading">
              <h1 class="wow animate__animated animate__bounceInLeft" data-wow-delay="0.2s">the most advanced greek apparel company, ever.</h1>
            </div>
            <div class="main_paragraph wow animate__animated animate__bounceInLeft" data-wow-delay="0.2s">
              <p>Get a free, professional design your chapter will <br/> love back within 24 hours</p>
            </div>
            <div class="main__buttons wow animate__animated animate__flipInX" data-wow-delay="0.2s">
              <div class="first_btn_section "  id="indexBtn2">
                <a href="{{ route('designScreen') }}" class="btn my-btn text-uppercase">
                  <i class="fa fa-shopping-bag fa-sm" style="color: black"></i>&nbsp View Design</a>
                <p class="para_btn">Start with one of ours.Everything<br/> 
                  is 100% customizable</p>
              </div>
              <div class="text_rough">
                <span>OR</span>
              </div>
              <div class="second_btn_section " id="indexBtn1">
                <a href="{{ route('designScreen') }}" class="btn my-btn text-uppercase">
                  <i class="fa fa-pencil" style="color: black"></i> &nbsp Create Design</a>
                <p class="para_btn">Have our desingers bring<br/>
                  your idea to life</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 d-block m-auto wow animate__animated animate__bounceInRight" data-wow-delay="0.2s">
          <div class="main_second_section_image">
            <img src="{{ asset('storage/images/home/1.png')}}" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="index__section_three" id="flipperParent">
<div class="container">
  <div class="main_heading text-center">
    <h1>How it works?</h1>
  </div>
  <div class="main_under_section_three">
    <div class="row custom_slide_parent ">
      <div id="flipper" class="col-lg-2 col-md-4 col-6 d-block slide_child my-lg-0 my-2 wow animate__animated animate__flipInY"  data-wow-delay="0.5s">


        <div class="main__slide_section">
          <div class="slide__all_parent">
            <div class="image_slide">
              <div class="img_parent_main">
                <img src="{{ asset('storage/images/home/12.png')}}" alt="" class="img-fluid rounded-circle">
              <div class="img_counter">
                <span>1</span>
              </div>
              </div>
            </div>
              <div class="under__img_slide">
                <div class="heading_section">
                  <h4>Pick a product</h4>
                </div>
                <div class="para_discription">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe magnam assumenda ex soluta? Corrupti vitae, quod nisi itaque ducimus nihil.</p>
                </div>
              </div> 
            
          </div>
        </div>


      </div>
      <div class="col-lg-2 col-md-4 col-6 d-block slide_child my-lg-0 my-2 wow animate__animated animate__flipInY" data-wow-delay="0.5s">


        <div class="main__slide_section">
          <div class="slide__all_parent">
            <div class="image_slide">
              <div class="img_parent_main">
                <img src="{{ asset('storage/images/home/12.png')}}" alt="" class="img-fluid rounded-circle">
              <div class="img_counter">
                <span>2</span>
              </div>
              </div>
            </div>
              <div class="under__img_slide">
                <div class="heading_section">
                  <h4>Tell A Designer What You Want</h4>
                </div>
                <div class="para_discription">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe magnam assumenda ex soluta? Corrupti vitae, quod nisi itaque ducimus nihil.</p>
                </div>
              </div> 
            
          </div>
        </div>


      </div>
      <div class="col-lg-2 col-md-4 col-6 d-block slide_child my-lg-0 my-2 wow animate__animated animate__flipInY" data-wow-delay="0.5s">

        <div class="main__slide_section">
          <div class="slide__all_parent">
            <div class="image_slide">
              <div class="img_parent_main">
                <img src="{{ asset('storage/images/home/12.png')}}" alt="" class="img-fluid rounded-circle">
              <div class="img_counter">
                <span>3</span>
              </div>
              </div>
            </div>
              <div class="under__img_slide">
                <div class="heading_section">
                  <h4>Receive a Design Within 24 Hours</h4>
                </div>
                <div class="para_discription">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe magnam assumenda ex soluta? Corrupti vitae, quod nisi itaque ducimus nihil.</p>
                </div>
              </div> 
            
          </div>
        </div>


      </div>
      <div class="col-lg-2 col-md-4 col-6 d-block slide_child my-lg-0 my-2 wow animate__animated animate__flipInY" data-wow-delay="0.5s">


        <div class="main__slide_section">
          <div class="slide__all_parent">
            <div class="image_slide">
              <div class="img_parent_main">
                <img src="{{ asset('storage/images/home/12.png')}}" alt="" class="img-fluid rounded-circle">
              <div class="img_counter">
                <span>4</span>
              </div>
              </div>
            </div>
              <div class="under__img_slide">
                <div class="heading_section">
                  <h4>Easy Individual & Group Payments</h4>
                </div>
                <div class="para_discription">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe magnam assumenda ex soluta? Corrupti vitae, quod nisi itaque ducimus nihil.</p>
                </div>
              </div> 
            
          </div>
        </div>


      </div>
      <div class="col-lg-2 col-md-4 col-6 d-block slide_child my-lg-0 my-2 wow animate__animated animate__flipInY" data-wow-delay="0.5s">


        <div class="main__slide_section">
          <div class="slide__all_parent">
            <div class="image_slide">
              <div class="img_parent_main">
                <img src="{{ asset('storage/images/home/12.png')}}" alt="" class="img-fluid rounded-circle">
              <div class="img_counter">
                <span>5</span>
              </div>
              </div>
            </div>
              <div class="under__img_slide">
                <div class="heading_section">
                  <h4>Receive Your Order Quickly</h4>
                </div>
                <div class="para_discription">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe magnam assumenda ex soluta? Corrupti vitae, quod nisi itaque ducimus nihil.</p>
                </div>
              </div> 
            
          </div>
        </div>


      </div>
      <div class="col-lg-2 col-md-4 col-6 d-block slide_child my-lg-0 my-2 wow animate__animated animate__flipInY" data-wow-delay="0.5s">


        <div class="main__slide_section">
          <div class="slide__all_parent">
            <div class="image_slide">
              <div class="img_parent_main">
                <img src="{{ asset('storage/images/home/12.png')}}" alt="" class="img-fluid rounded-circle">
              <div class="img_counter">
                <span>6</span>
              </div>
              </div>
            </div>
              <div class="under__img_slide">
                <div class="heading_section">
                  <h4>Look Great</h4>
                </div>
                <div class="para_discription">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe magnam assumenda ex soluta? Corrupti vitae, quod nisi itaque ducimus nihil.</p>
                </div>
              </div> 
            
          </div>
        </div>


      </div>
    </div>
  </div>
</div>
</section>



<section class="why_chose_index">
    <div class="container">
      <div class="main_heading text-center">
        <h1>How it works?</h1>
      </div>
      <div class="main_text_whyChose">
        <div class="row why_chose">
          <div class="col-lg-6 col-12 d-block m-auto wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s">
            <div class="chose_underText">
              <div class="heading_under">
                <h2>The Platform</h2>
              </div>
              <div class="main__paragraph">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, facere corporis dolorum ad sed tempora explicabo molestiae? Rerum, iste commodi.</p>
              </div>
              <div class="list___under">
                <ul>
                  <li>Live Chat</li>
                  <li>Instant Quotes</li>
                  <li>Real Time Order Update</li>
                  <li>Collaborate Directly With Designers</li>
                  <li>5000+ Designs Can be customized</li>
                  <li>Text updated</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-12 d-block m-auto m_5rem wow animate__animated animate__fadeInRight" data-wow-delay="0.5s">
            <div class="whychose_img">
              <img src="{{ asset('storage/images/home/3.png')}}" alt="" class="img-fluid">
            </div>
          </div>
        </div>

        <div class="row why_chose_second">
          
          <div class="col-lg-6 col-12 d-block m-auto myImage_second wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
            <div class="whychose_img">
              <img src="{{ asset('storage/images/home/4.png')}}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-6 col-12 d-block m-auto myText_second wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
            <div class="chose_underText">
              <div class="heading_under">
                <h2 class="themeColor">Membership</h2>
              </div>
              <div class="main__paragraph">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti enim quo hic neque aut odio totam illo dicta molestiae odit vero, consectetur accusantium rerum, beatae cum quas! Earum, laboriosam optio.</p>
              </div>
              <div class="my-btn_main" id="learnMore">
                <a href="" class="btn my-btn">Learn More</a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
</section>



<section class="Collection_desing">
  <div class="container">
    <div class="main_heading">
      <h1 class="text-center">Popular Products. Delightful designs.</h1>
    </div>
    <div class="all_collections">
      <div class="row wow animate__animated animate__fadeInUp" data-wow-delay="0.5s" style="">
        <div class="col-lg-8 col-sm-6 col-12 m-auto d-block one-collection " style="    margin-bottom: 30px !important;">
        
          {{-- <div class="collection_custom_parent">
            <a href="">
            
            <div class="text_main_ovrelay">
              <h2>TEES</h2>
            </div>
          </a>
          </div> --}}
          <div class="collection_custom_parent" style="height: 300px">
          <div class="hovereffect ">
            <img  src="{{ asset('storage/images/b.png')}}" height="100%" alt="" class="img-fluid">
            <div class="overlay"  >
              <h2 style="margin-top:15% !important">TEES</h2>
      
          </div>
        </div>
          </div>
         
        </div>
        <div class="col-lg-4 col-sm-6 col-12 m-auto " style="    margin-bottom: 30px !important;">
          <div class="collection_custom_parent" style="height: 300px">
            <div class="hovereffect ">
              <img  src="{{ asset('storage/images/A.png')}}" alt="" height="100%" class="img-fluid">
              <div class="overlay"  >
                <h2 style="margin-top:30% !important">TEES</h2>
        
            </div>
          </div>
            </div>
          {{-- <div class="collection_custom_parent">
            <a href="">
            
            <div class="text_main_ovrelay">
              <h2>TEES</h2>
            </div>
          </a>
          </div> --}}
        </div>
      </div>
      <div class="row  wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
        
        <div class="col-lg-4 col-sm-6 col-12 m-auto d-block  " style="    margin-bottom: 30px !important;">
          <div class="collection_custom_parent" style="height: 300px">
            <div class="hovereffect ">
              <img  src="{{ asset('storage/images/A.png')}}" alt="" class="img-fluid" height="100%">
              <div class="overlay"  >
                <h2 style="margin-top:30% !important">TEES</h2>
        
            </div>
          </div>
            </div>
          {{-- <div class="collection_custom_parent">
            <a href="">
            
            <div class="text_main_ovrelay">
              <h2>TEES</h2>
            </div>
          </a>
          </div> --}}
        </div>
        <div class="col-lg-8 col-sm-6 col-12    " style="margin-bottom: 30px">
          <div class="collection_custom_parent" style="height: 300px">
            <div class="hovereffect ">
              <img  src="{{ asset('storage/images/b.png')}}" alt="" class="img-fluid" height="100%">
                  <div class="overlay"  >
                      <h2 style="margin-top:15% !important">TEES</h2>
              
                  </div>
          </div>
            </div>
        
          {{-- <div class="collection_custom_parent">
            <a href="">
            
            <div class="text_main_ovrelay">
              <h2>TEES</h2>
            </div>
          </a>
          </div> --}}
         
        </div>
      </div>
    </div>
  </div>
</section>


<section class="rough_textmain">
  <div class="container">
    <div class="main_heading">
      <h1 class="text-center ">Lets built this togather.</h1>
    </div>
    <div class="main_paragraph text-center">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit voluptas velit eligendi perspiciatis esse id nisi quaerat harum blanditiis tempora, voluptates exercitationem a! Vel non alias id nemo soluta incidunt harum sed eligendi, illo molestias odio modi quo laborum illum?</p>
    </div>
    <div class="m-auto text-center button_div " id="getStarted">
      <a href="{{ route('designScreen') }}" class="btn my-btn">Get started</a>
    </div>
  </div>
</section>

<section class="all_designs_main">
  <div class="container">
    <div class="main_heading">
      <h1 class="text-center">designs gallery</h1>
    </div>
    <div class="paragraph_under">
      {{-- <p class="text-center">All design can be customized for your organization</p> --}}
    </div>
    <div class="main_designs">
      <div class="main_all_desings">
        @foreach ($designs as $design)
        @foreach($design->images as $image)
        <div class="child_image">
          <div class="main_child_spacing">
            <a >
              <div class="hovereffect">
                {{-- <img class="img-responsive" src="http://placehold.it/350x250" alt=""> --}}
                <img src="{{ asset($image->url)}}" alt="" class="img-fluid">
                    <div class="overlay" id="overlayDesign">
                        <h2 id="productOverlayButtonHeading">{{$design->name}}</h2>
                <p  id="productOverlayButton">
                  <form action="{{ route('setCookie') }}" method="POST" >
                    <input type="hidden" id="designID" name="designID" value="{{$design->id}}">
                    {{ csrf_field() }}
                    
                    <button type="submit" style="border:none;background:transparent;" id="productOverlayButton">
                      <a class="btn my-btn" style="color: whitesmoke;font-size:12px; text-transform:uppercase "> 
                         Customize Product</a>
                  </button>
            </form>
                  {{-- Clear --}}
                  
                </p>
                    </div>
            </div>

             
            </a>
          </div>
        </div>
        @endforeach            
        @endforeach
        
        {{-- <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div>
        <div class="child_image">
          <div class="main_child_spacing">
            <a href="">
             <img src="{{ asset('storage/images/home/a.png')}}" alt="" class="img-fluid">
            </a>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
</section>


  
@include('web.includes.subfooter')
@include('web.includes.footer')
<script>

  
  </script>
@include('web.includes.endfile')