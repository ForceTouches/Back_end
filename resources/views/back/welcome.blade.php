@extends('layouts.app')
@section('body')
<main class="text-right dash-main">
  <!-- start page content-->
  <div class="dash-mainPage">
    <div class="content">
     
      <div class="main-title py-3 mb-3">
        <span class="">الرئيسية</span>
      </div>
      <div class="main-cont">
        <div class="row pages-links">
          <div class="p-link col-sm-12 col-md-6">
            <div class="card">
              <div class="card-body">
                <a href="{{url('/prizes')}}">
                  <div class="pageLink-cont">
                    <div class="icon d-inline-flex">
                      <i class="flaticon-gift"></i>
                    </div>
                    <span>{{$competitions}}<br>مسابقة</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class=" p-link col-sm-12 col-md-6">
            <div class="card">
              <div class="card-body">
                <a href="{{url('/users')}}">
                  <div class="pageLink-cont">
                    <div class="icon d-inline-flex">
                      <i class="flaticon-profile-user"></i>
                    </div>
                    <span>{{$user}}<br>مستخدم</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="p-link col-sm-12 col-md-6">
            <div class="card">
              <div class="card-body">
                <a href="{{url('/ads')}}">
                  <div class="pageLink-cont">
                    <div class="icon d-inline-flex">
                      <i class="flaticon-shopping-list"></i>
                    </div>
                    <span>{{$ads}}<br>اعلان</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="p-link col-sm-12 col-md-6">
            <div class="card">
              <div class="card-body">
                <a href="{{url('/competitionProblem')}}">
                  <div class="pageLink-cont">
                    <div class="icon d-inline-flex">
                      <i class="flaticon-email"></i>
                    </div>
                    <span>{{$competitionProblem}}<br>بلاغ</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- End page content-->
  
  
</main>

@endsection