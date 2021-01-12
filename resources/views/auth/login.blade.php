<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prizes Way Dash</title>

    <!-- Bootstrap -->

    <link href="{{ asset('/back/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- flaticon libarary -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/back/css/font/flaticon.css')}}">

    <!-- main css style file -->
        
    <link rel = "stylesheet" href = "{{ asset('/back/css/main.css')}}" />

  </head>
  <body class="log-in">
    
    <!-- Start Log in page-->
    <section class="login">
      <div class="row m-0">
        <aside class="login-side-nav col-xl-4 col-lg-6 col-md-6 d-flex flex-column justify-content-center pb-1">
          <div class="content">
            <div class="logo text-center">
              <img src="{{ asset('/back/img/logo.png')}}" alt="">
            </div>
            <div class="login-text text-right">
              <h2>تسجيل الدخول</h2>
              <small>سجل دخولك الأن</small>
            </div>
            
            <form class="d-flex flex-column" method="POST" action="{{ route('login') }}">
               @csrf
              <div class="input-feild position-relative">
                <input class="w-100 text-right @error('email') is-invalid @enderror" type="mail" placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="input-feild position-relative">
                <input class="w-100 text-right @error('password') is-invalid @enderror" type="password" placeholder="كلمة المرور" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group form-check text-right">
                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="exampleCheck1">تذكرنى لاحقاً</label>
              </div>
              <!-- <a class="btn" href="./dashboard/main-page.html">تسجيل الدخول</a> -->
              <input type="submit" class="btn" value="تسجيل الرخول" >
            </form>
            <div class="social-icon text-center">
              <a href="#">
                <i class="flaticon-twitter"></i>
              </a>
              <a href="#">
                <i class="flaticon-facebook"></i>
              </a>
              <a href="#">
                <i class="flaticon-instagram"></i>
              </a>
              
            </div>
            
          </div>
        </aside>
        <div class="login-main-img col-xl-8 col-lg-6 col-md-6">
        </div>
      </div>
    </section>
    <!-- End Log in page-->


    <script src="{{ asset('/back/js/jquery-1.11.3.min.js')}}"> </script>
    <script src="{{ asset('/back/js/popper.min.js')}}"></script>
    <script src="{{ asset('/back/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/back/js/custom.js')}}"> </script>
  </body>
</html>