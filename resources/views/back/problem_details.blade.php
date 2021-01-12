@extends('layouts.app')
@section('body')
<main class="text-right dash-main">

<!-- start page content-->
<div class="dash-reports">
  <div class="content">
    <div class="main-title py-3 mb-3">
      <span class="">تفاصيل البلاغ</span>
    </div>

    <div class="main-cont">

    <div class="report-details mb-5">
                  <div class="details justify-content-between align-items-xl-center align-items-lg-center align-items-md-center align-items-start row">
                    <div class="content row col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">
                      <div class="name d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">الاسم</span>
                        <span class="cell-cont">{{$user['name']}}</span>
                      </div>
                      <div class="mail d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">البريد الالكتروني </span>
                        <span class="cell-cont">{{$user['email']}}</span>
                      </div>
                      <div class="phone d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">رقم الجوال</span>
                        <span class="cell-cont">{{$user['phone']}}</span>
                      </div>
                      <div class="date d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">تاريخ البلاغ</span>
                        <span class="cell-cont">{{date('d-m-Y', strtotime($competitionProblem['created_at']))}}</span>
                      </div>
                    </div>
                    
                  </div>
                  
                  <div class="report-txt">
                    نص البلاغ
                    <br>
                    {{$competitionProblem['reason']}}
                  </div>
                </div>

                <div class="contest-details">
                  <div class="contest-details-title py-3 mb-3">
                    <span class="">المسابقة</span>
                  </div>
                  <div class="contest-details-cont table-responsive-xl">
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
                      @if($comp['approved']==1)
                        <tr class="active-row" >
                        @else
                        <tr class="">
                        @endif
                            <th scope="row">{{$comp['id']}}</th>
                            <td class="flag">
                            {{$comp['country']}}
                            </td>
                            <td>{{$comp['title']}}</td>
                            <td>
                            <a href="#" class="icon icon-gift d-flex justify-content-center">
                                <i class="flaticon-gift"></i>
                            </a>
                            
                            </td>
                            
                            <td class="d-flex justify-content-center">
                            <div class="social-icons d-flex justify-content-center">
                            @if(isset($comp['social']['twitter'])&& !empty($comp['social']['twitter']))
                                <a href="<?php echo $comp['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                                <i class="flaticon-twitter activeSocial"></i>
                                </a>
                            @endif
                            @if(isset($comp['social']['internet'])&& !empty($comp['social']['internet']))
                                <a href="<?php echo $comp['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                                <i class="flaticon-globe"></i>
                                </a>
                            @endif
                            @if(isset($comp['social']['website'])&& !empty($comp['social']['websit']))
                                <a href="<?php echo $comp['social']['website']; ?>" class="icon d-flex justify-content-center">
                                <i class="flaticon-bell"></i>
                                </a>
                            @endif
                            @if(isset($comp['social']['instagram'])&& !empty($comp['social']['instagram']))
                                <a href="<?php $comp['social']['instagram']?>" class="icon d-flex justify-content-center">
                                <i class="flaticon-instagram"></i>
                                </a>
                            @endif

                            @if(isset($comp['social']['facebook']) && !empty($comp['social']['facebook']))
                                <a href="<?php echo $comp['social']['facebook']; ?>" class="icon d-flex justify-content-center">
                                <i class="flaticon-facebook"></i>
                                </a>
                            @endif
                            @if(isset($comp['social']['tik_tok'])&& !empty($comp['social']['tik_tok']))
                                <a href="<?php echo $comp['social']['tik_tok']; ?>" class="icon d-flex justify-content-center">
                                <i class="flaticon-tik-tok"></i>
                                </a>
                            @endif
                            </div>
                            
                            </td>
                            <td>{{date('d-m-Y', strtotime($comp['created_at']))}}</td>
                            <td>
                        
                            <a href="{{url('/star/'.$comp['id'].'/'.$comp['installed'])}}" class="border-0 show-icon set-icon @if($comp['installed']==1) set @else unset @endif" >
                                <i class="flaticon-star"></i>
                            </a> 
                            </td>
                            <td>
                            <a href="{{url('/change_status/'.$comp['id'].'/'.$comp['approved'])}}" class="border-0 show-icon">
                                <i class="flaticon-switch"></i> <!--the other icon >> flaticon-switch-1-->
                            </a>
                            </td>
                            <td>
                            <a href="{{url('/prizes/details/'.$comp['id'])}}" class="border-0 show-icon" >
                                <i class="flaticon-eye"></i>
                            </a>
                            </td>
                            <td>
                            <a href="{{url('/delete_comp/'.$comp['id'])}}" class=" border-0 btn-delContest show-icon">
                                <i class="flaticon-delete"></i>
                            </a>
                            </td>
                        </tr>
             
                      </tbody>
                      
                    </table>
                    
                  </div>

                </div>
                
  </div>
</div>
<!-- End page content-->


</main>

@endsection