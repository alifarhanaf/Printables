<footer>
    <div class="container">
        <div class="main__footer_site text-center">
          <h1 class="text-white"> Start your daily design today </h1>
          <div class="main_footer_style">
            <div class="btttn my-4">
              <a href="#" class="btn my-btn">Join Our House</a>
            </div>
            <div class="row mt-5">
              <div class="col-md-5 col-12 d-block my-md-auto my-4">
                <div class="logo__main_footer">
                  <a href="{{route('homeScreen')}}">
                    <img src="{{ asset('storage/images/home/logo-in-white.png')}}" alt="logo" class="img-fluid">
                  </a>
                </div>
              </div>
              <div class="col-md-4 col-12  d-block my-md-auto my-4">
                <ul class="mx-auto">
                  <li>
                    <a href="{{ route('JoinOurHouse') }}" class="text-white">Join Our Team</a>
                  </li>
                  <li>
                    <a href="{{route('designScreen')}}" class="text-white">Designs</a>
                  </li>
                  <li>
                    <a href="{{route('aboutUsScreen')}}" class="text-white">About</a>
                  </li>
                  <li>
                    <a href="{{route('designScreen')}}" class="text-white">Shop</a>
                  </li>
                </ul>
              </div>
              <div class="col-md-3 col-12  d-block my-md-auto my-4">
                <ul class="mx-auto">
                  <li>
                    <a href="mailto:someone@mail.com"class="text-white">Contact us</a>
                  </li>
                  <li>
                    <a href="{{route('PrivacyPolicy')}}" class="text-white">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="{{route('Terms&Conditions')}}" class="text-white">Terms & Conditions</a>
                  </li>
                  <li>
                    <a href="" class="text-white">Help</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div>
</footer>