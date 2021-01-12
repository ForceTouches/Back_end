@extends('layouts.app')
@section('body')

<main class="text-right dash-main">

<!-- start page content-->
<div class="dash-users-details">
  <div class="content">
   
    <div class="main-cont">
      <div class="person-info d-flex justify-content-sm-between row m-0 justify-content-center">
        <div class="info d-flex align-items-center row ml-0 mr-0 mb-3 justify-content-center text-sm-right text-center">
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
        <div class="control d-flex align-items-center">
          <!-- <button type="button" class="border-0 btn-delUser bg-transparent" data-toggle="modal" data-target="#delUserDitailItim" data-whatever="@mdo">
            <i class="flaticon-delete"></i>
          </button>
          <div class="custom-control custom-switch active-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch6">
            <label class="custom-control-label" for="customSwitch6"></label>
          </div> -->
        </div>
      </div>
      <div class="user-contests mt-5">
        <div class="user-contests-title mb-3">
          <span class="">المسابقات</span>
        </div>
        <div class="user-contests-cont table-responsive-xl">
          <table class="table table-striped contest-details-table text-center">
            <thead>
              <tr>
                <th scope="col">الرقم</th>
                <th scope="col">الدولة</th>
                <th scope="col">اسم المسابقة</th>
                <th scope="col">الهدية</th>
                <th scope="col">الروابط</th>
                <th scope="col">التاريخ</th>
                <th scope="col">تثبيت</th>
                <th scope="col">الحاله</th>
                <th scope="col">عرض</th>
                <th scope="col">مسح</th>
              </tr>
            </thead>
            <tbody>
            @foreach($competitions as $social)
              @if($social['approved']==1)
              <tr class="active-row" >
              @else
              <tr class="">
              @endif
                <th scope="row">{{$social['id']}}</th>
                <td class="flag">
                  {{$social['country']}}
                </td>
                <td>{{$social['title']}}</td>
                <td>
                  <a href="#" class="icon icon-gift d-flex justify-content-center">
                    <i class="flaticon-gift"></i>
                  </a>
                  
                </td>
                
                <td class="d-flex justify-content-center">
                  <div class="social-icons d-flex justify-content-center">
                  @if(isset($social['social']['twitter'])&& !empty($social['social']['twitter']))
                    <a href="http://<?php echo $social['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-twitter activeSocial"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['internet'])&& !empty($social['social']['internet']))
                    <a href="http://<?php echo $social['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-globe"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['website'])&& !empty($social['social']['websit']))
                    <a href="http://<?php echo $social['social']['website']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-bell"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['instagram'])&& !empty($social['social']['instagram']))
                    <a href="<?php $social['social']['instagram']?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-instagram"></i>
                    </a>
                  @endif

                  @if(isset($social['social']['facebook']) && !empty($social['social']['facebook']))
                    <a href="http://<?php echo $social['social']['facebook']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-facebook"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['tik_tok'])&& !empty($social['social']['tik_tok']))
                    <a href="http://<?php echo $social['social']['tik_tok']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-tik-tok"></i>
                    </a>
                  @endif
                  </div>
                  
                </td>
                <td>{{date('d-m-Y', strtotime($social['created_at']))}}</td>
                <td>
          
              <a href="{{url('/star/'.$social['id'].'/'.$social['installed'])}}" class="border-0 show-icon set-icon @if($social['installed']==1) set @else unset @endif" >
                  <i class="flaticon-star"></i>
              </a> 
              </td>
              <td>
              <a href="{{url('/change_status/'.$social['id'].'/'.$social['approved'])}}" class="border-0 show-icon">
                  <i class="flaticon-switch"></i> <!--the other icon >> flaticon-switch-1-->
              </a>
              </td>
              <td>
              <a href="{{url('/prizes/details/'.$social['id'])}}" class="border-0 show-icon" >
                  <i class="flaticon-eye"></i>
              </a>
              </td>
              <td>
              <a href="{{url('/delete_comp/'.$social['id'])}}" class=" border-0 btn-delContest show-icon">
                  <i class="flaticon-delete"></i>
              </a>
              </td>
              </tr>
             
            @endforeach
            </tbody>
            
          </table>
        </div>
      </div>
    </div>
    

  </div>
</div>
<!-- End page content-->


</main>

@endsection