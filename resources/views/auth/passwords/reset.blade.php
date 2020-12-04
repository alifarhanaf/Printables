<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet" href="style.css" /> --}}
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">
    <title>Geneologie</title>
  </head>
  <body>
    {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
    
    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}
 
 
    <div class="container">

     
      


      <div class="forms-container">
       
            {{-- @if ($errors->any() )
        <div  class="alert alert-danger" style="border: 2px solid #77a6ba; padding : 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                <span class="invalid-feedback" role="alert" style="color:red">
                  <strong style="text-align: right">{{ $error }}</strong>
                </span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif --}}
         
        
       
        <div class="signin-signup">
         
         
    
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
            <i class="fa fa-lock  fa-7x" style="margin-bottom: 40px; color:#84a0ac"></i>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" type="email" placeholder="Enter Your Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
              
                               
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
            <input id="password" type="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>

            <input id="password-confirm" type="password" placeholder="Confirm Password " class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
       
            
            {{-- <span>Hello This is span to test</span> --}}
            <input type="submit" value="Send Password Reset Link" style="font-size: 1rem" class="btn my-btn solid" />

           
           
          </form>
         
        
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel" style="align-items: center;">
          <div class="content">
            <h2 class="title" style="color: whitesmoke">Reset Password</h2>
            
          </div>
          <img src="{{ asset('images/log.svg')}}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            
          </div>
          <img  src="{{ asset('images/register.svg')}}" class="image" alt="" />
        </div>
      </div>
    </div>

    {{-- <script src="app.js"></script> --}}
    {{-- <script src="{{ asset('frontend/style.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if(Session::has('status'))
            // console.log('Hi');
                toastr.success("{{ Session::get('status') }}") ;
            @endif
            @if(Session::has('errors'))
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}") ;
            @endforeach
            @endif
        </script>
    
    
    
  </body>
</html>
