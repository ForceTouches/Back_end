@extends('layouts.app')
@section('body')

<main class="text-right dash-main">

<!-- start page content-->
<div class="dash-contests-details">
  <div class="content">
    
    <div class="main-title py-3 mb-3">
      <span class="">تفاصيل المسابقة</span>
    </div>
    <div class="main-cont pt-3 pb-3">
      <div class="contest-name-section d-flex row mb-5">
        <div class="contest-name d-flex align-items-center justify-content-center row">
          <div class="contest-icon rounded-circle d-flex justify-content-center align-items-center">
            <i class="flaticon-gift"></i>
          </div>
          <div class="contest">
            <div class="name text-center text-sm-right">
            {{$competition['title']}}
            </div>
            <div class="location">
              <i class="flaticon-placeholder"></i>
              <span>{{$competition['location']}}</span>
              
            </div>
          </div>
        </div>
        <!-- <div class="control-section d-flex flex-column justify-content-around">
          <div class="control-one d-flex align-items-center justify-content-center">
            <button class="border-0 show-icon set-icon @if($competition['installed']==1) set @else unset @endif" data-href='{{url('/star/'.$competition['id'].'/'.$competition['installed'])}}'>
              <i class="flaticon-star"></i>
            </button>
            <button type="button" class="border-0 btn-delContest show-icon" data-href='{{url('/delete_comp/'.$competition['id'])}}'>
              <i class="flaticon-delete"></i>
            </button>
            <button class="border-0 show-icon" data-href='{{url('/change_status/'.$competition['id'].'/'.$competition['approved'])}}'>
              <i class="flaticon-eye"></i>
            </button>
          </div>
         
        </div> -->
      </div>
      <div class="contest-gift-section mb-5">
        <div class="contest-gift-title py-3 mb-3 mt-3">
          <span class="">الهدية</span>
        </div>
        <div class="contest-gift-cont">
          <span>{{$gift['name']}}</span>
        </div>
      </div>
      <div class="remain-time-section mb-5">
        <div class="remain-time-title py-3 mb-3 mt-3 d-flex justify-content-between row">
          <span class="txt">المدة المتبقية من  المسابقة</span>
          <span class="date">{{date('d-m-Y', strtotime($competition['expire_date']))}}</span>
        </div>
        <div class="remain-time-cont">
          <span class="remain-txt">متبقى</span>
          <span>{{$days}} يوم</span>
          <span>{{$hours}} ساعة</span>
        </div>
      </div>

      <div class="contest-moreDetails-section row mb-5">
        <div class="col contest-urls">
          <div class="contest-urls-title py-3 mb-3 mt-3">
            <span class="">روابط المسابقة</span>
          </div>
          <div class="contest-urls-cont d-flex">
          @if(isset($competition['social']['twitter'])&& !empty($competition['social']['twitter']))
            <a href="<?php echo $competition['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                <i class="flaticon-twitter activeSocial"></i>
            </a>
            @endif
            @if(isset($competition['social']['internet'])&& !empty($competition['social']['internet']))
            <a href="<?php echo $competition['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                <i class="flaticon-globe"></i>
            </a>
            @endif
            @if(isset($competition['social']['website'])&& !empty($competition['social']['websit']))
            <a href="<?php echo $competition['social']['website']; ?>" class="icon d-flex justify-content-center">
                <i class="flaticon-bell"></i>
            </a>
            @endif
            @if(isset($competition['social']['instagram'])&& !empty($competition['social']['instagram']))
            <a href="<?php $competition['social']['instagram']?>" class="icon d-flex justify-content-center">
                <i class="flaticon-instagram"></i>
            </a>
            @endif

            @if(isset($competition['social']['facebook']) && !empty($competition['social']['facebook']))
            <a href="<?php echo $competition['social']['facebook']; ?>" class="icon d-flex justify-content-center">
                <i class="flaticon-facebook"></i>
            </a>
            @endif
            @if(isset($competition['social']['tik_tok'])&& !empty($competition['social']['tik_tok']))
            <a href="<?php echo $competition['social']['tik_tok']; ?>" class="icon d-flex justify-content-center">
                <i class="flaticon-tik-tok"></i>
            </a>
            @endif
          </div>
        </div>
        <div class="col contest-owner">
          <div class="contest-owner-title py-3 mb-3 mt-3">
            <span class="">بواسطة</span>
          </div>
          <div class="contest-owner-cont d-flex align-items-center row">
            <div class="person-img">
              <img class="w-100" src="{{url($user['photo'])}}" alt="">
            </div>
            <div class="person-details mr-3">
              <div class="name">
                <span class="txt">{{$user['name']}}</span>
                <i class="flaticon-checked"></i>
              </div>
              <div class="location">
                <!-- <span>Omar.Cairo</span> -->
              </div>
              <div class="mail">
                <span>{{$user['email']}}</span>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>

  </div>
  <!-- Start Error Message -->
  <div class="message alert alert-warning alert-dismissible fade" role="alert">
    <strong class="message-txt">تم القبول</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<!-- End Error Message -->
</div>
<!-- End page content-->


  

</main>

@endsection