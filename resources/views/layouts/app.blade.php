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
  <body class="dash">
      <!-- Start main page -->
      <section class="dash-section">
          <aside class="dash-aside p-3">
            <div class="side-top d-flex justify-content-end mb-3 pb-3">
                <div class="control">
                    <i class="flaticon-minus"></i>
                </div>
            </div>
            <div class="person-information text-center ">
                <div class="image m-auto">
                    <img class="w-100" src="{{ asset(auth()->user()->photo)}}" alt="person-image">
                </div>
                <div class="person-name">
                  <p class="name m-0"></i> {{auth()->user()->name}}</p>
                </div>
                <div class="position">
                <?php $type=auth()->user()->type; ?>
                @if($type==1)
                مستخدم
                @else
                مدير الاداره
                @endif
                </div>
            </div>

            <ul class="links p-0 text-right">
              <li class="w-100 active"><a href="{{url('/home')}}"><i class="flaticon-home"></i>الرئيسية</a></li>
              <li class="w-100"><a href="{{url('/users')}}"><i class="flaticon-profile-user"></i>المستخدمين</a></li>
              <li class="w-100"><a href="{{url('/prizes')}}"><i class="flaticon-gift"></i>المسابقات</a></li>
              <li class=" w-100"><a href="{{url('/ads')}}"><i class="flaticon-shopping-list"></i>الاعلانات</a></li>
              <li class=" w-100"><a href="{{url('/competitionProblem')}}"><i class="flaticon-email"></i>البلاغات</a></li>
              <li class="w-100"><a href="{{url('/settings')}}"><i class="flaticon-settings-1"></i>الاعدادات</a></li>
              <li class="w-100"><a href="{{ route('logout') }}" data-toggle="modal"  onclick="event.preventDefault();

                document.getElementById('logout-form').submit();"><i class="flaticon-logout"></i>تسجيل الخروج
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                @csrf

                </form>
                </a></li>
            </ul>
          </aside>

         
          @yield('body')
         

      </section>
      <!-- End main page -->

    <script src="{{ asset('/back/js//jquery-1.11.3.min.js')}}"> </script>
    <script src="{{ asset('/back/js/popper.min.js')}}"></script>
    <script src="{{ asset('/back/js/bootstrap.min.js')}}"></script>
    
    <script src="{{ asset('/back/js/custom.js')}}"> </script>
    <!-- <script src="{{ asset('/back/js/back.js')}}"> </script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

      @if (Session::has('success'))

          swal({

            title: "تم الاضافه بنجاح",

            text: "{!! Session::get('sweet_alert.text') !!}",

            icon: "success",

            button: "تم ",

        });

      @endif

      @if (Session::has('install'))

      swal({

        title: "تم التثبيت بنجاح",

        text: "{!! Session::get('sweet_alert.text') !!}",

        icon: "success",

        button: "تم ",

      });

      @endif

      @if (Session::has('notinstall'))

      swal({

        title: "تم الغاء التثبيت",

        text: "{!! Session::get('sweet_alert.text') !!}",

        icon: "error",

        button: "تم ",

        });

      @endif

      @if (Session::has('approved'))

      swal({

        title: "تم التفعيل بنجاح",

        text: "{!! Session::get('sweet_alert.text') !!}",

        icon: "success",

        button: "تم ",

      });

      @endif

      @if (Session::has('notapproved'))

      swal({

        title: "تم الغاء التفعيل",

        text: "{!! Session::get('sweet_alert.text') !!}",

        icon: "error",

        button: "تم ",

        });

      @endif

      @if (Session::has('info'))

          swal({

                title: "تم التعديل بنجاح",

                text: "{!! Session::get('sweet_alert.text') !!}",

                icon: "info",

                button: "تم ",

            });

      @endif

      @if (Session::has('error'))

          swal({

                title: "تم الحذف بنجاح",

                text: "{!! Session::get('sweet_alert.text') !!}",

                icon: "error",

                button: "تم ",

            });

      @endif

      @if (Session::has('warning'))

          swal({

                title: "{!! Session::get('sweet_alert.title') !!}",

                text: "{!! Session::get('sweet_alert.text') !!}",

                icon: "warning",

                button: "تم ",

            });

      @endif

      @if (Session::has('blocked'))

      swal({

        title: "تم التفعيل بنجاح",

        text: "{!! Session::get('sweet_alert.text') !!}",

        icon: "success",

        button: "تم ",

      });

      @endif

      @if (Session::has('notblocked'))

      swal({

        title: "تم الغاء التفعيل",

        text: "{!! Session::get('sweet_alert.text') !!}",

        icon: "error",

        button: "تم ",

        });

      @endif
    </script>
  </body>
</html>