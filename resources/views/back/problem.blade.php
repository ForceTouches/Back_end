@extends('layouts.app')
@section('body')
<main class="text-right dash-main">

<!-- start page content-->
<div class="dash-reports">
  <div class="content">
    
    <div class="main-title py-3 mb-3">
      <span class="">البلاغات</span>
    </div>

    <div class="main-cont table-responsive-xl">
      <table class="table table-striped ads-table">
        <thead>
          <tr>
            <th scope="col">الرقم</th>
            <th scope="col">اسم المستخدم</th>
            <th scope="col">رقم المسابقة</th>
            <th scope="col">اسم المسابقة</th>
            <th scope="col">نوع الطلب</th>
            <th scope="col">نوع المسابقة</th>
            <th scope="col">التاريخ</th>
            <th scope="col">عرض</th>
          </tr>
        </thead>
        <tbody>
        @foreach($competitionProblem as $competition)
          <tr class= "item btn-showReport" >
            <th scope="row">{{$competition['id']}}</th>
            <td>{{$competition['user_name']}}</td>
            <td>{{$competition['number']}}</td>
            <td>{{$competition['name']}}</td>
            <td>{{$competition['reason']}}</td>
            <td>{{$competition['type']}}</td>
            <td>{{$competition['date']}}</td>
            <td>
             
              <a href="{{url('/problem_details/'.$competition['id'])}}" class="border-0 show-icon" >
                  <i class="flaticon-eye"></i>
              </a>
            </td>
          </tr>
        @endforeach
        </tbody>
        
      </table>
    </div>

  </div>
</div>
<!-- End page content-->


</main>

 <!--------
        all Models
        ---------->

        <!-- Report Modal -->
        <div class="modal fade modal-showReport" id="showReport"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content text-right">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تفاصيل البلاغ</h5>
                <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="report-details mb-5">
                  <div class="details justify-content-between align-items-xl-center align-items-lg-center align-items-md-center align-items-start row">
                    <div class="content row col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">
                      <div class="name d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">الاسم</span>
                        <span class="cell-cont">أحمد كرم بدر</span>
                      </div>
                      <div class="mail d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">البريد الالكتروني </span>
                        <span class="cell-cont">Test@gmail.com</span>
                      </div>
                      <div class="phone d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">رقم الجوال</span>
                        <span class="cell-cont">01111664236</span>
                      </div>
                      <div class="date d-flex flex-column col-xl-3 col-lg-6 col-md-6">
                        <span class="cell-title">تاريخ البلاغ</span>
                        <span class="cell-cont">2020 / 02 / 02</span>
                      </div>
                    </div>
                    <div class="btn-delReport col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4 text-center">
                      <button type="button" class="btn rounded-pill btn-delContest" data-toggle="modal" data-target="#delReport">حذف</button> <!--to close modal when click this btn add this >> data-dismiss="modal" aria-label="Close"-->
                    </div>
                  </div>
                  
                  <div class="report-txt">
                    نص البلاغ
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
                        <tr class="active-row" id="contest-0">
                          <th scope="row">01</th>
                          <td class="flag">
                            <img src="../img/flag.png" alt="">
                          </td>
                          <td>مسابقة شير</td>
                          <td>
                            <a href="#" class="icon icon-gift d-flex justify-content-center">
                              <i class="flaticon-gift"></i>
                            </a>
                            
                          </td>
                          <td class="d-flex justify-content-center">
                            <div class="social-icons d-flex justify-content-center">
                              <a href="#" class="icon d-flex justify-content-center">
                                <i class="flaticon-twitter activeSocial"></i>
                              </a>
                              <a href="#" class="icon d-flex justify-content-center">
                                <i class="flaticon-globe"></i>
                              </a>
                              <a href="#" class="icon d-flex justify-content-center">
                                <i class="flaticon-bell"></i>
                              </a>
                              <a href="#" class="icon d-flex justify-content-center">
                                <i class="flaticon-instagram"></i>
                              </a>
                              <a href="#" class="icon d-flex justify-content-center">
                                <i class="flaticon-facebook"></i>
                              </a>
                              <a href="#" class="icon d-flex justify-content-center">
                                <i class="flaticon-tik-tok"></i>
                              </a>
                            </div>
                            
                          </td>
                          <td>2020 / 02 / 02</td>
                          <td>
                            <button class="border-0 set-icon set">
                              <i class="flaticon-star"></i>
                            </button>
                            
                          </td>
                          <td>
                            <div class="custom-control custom-switch active-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" checked> <!--checked-->
                              <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                          </td>
                          <td>
                            <button class="border-0 show-icon">
                              <i class="flaticon-eye"></i>
                            </button>
                          </td>
                          <td>
                            <button type="button" class="border-0 btn-delContest delete" data-toggle="modal" data-target="#delReport" data-whatever="@mdo">
                              <i class="flaticon-delete"></i>
                            </button>
                          </td>
                        </tr>
                        
                        
                      </tbody>
                      
                    </table>
                    
                  </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>

        <!-- delete report Modal -->
        <div class="modal fade modal-delReport" id="delReport"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content text-right">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف العنصر بالتأكيد؟</h5>
                <button type="button" class="cansel close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              
              <div class="modal-footer justify-content-start">
                <button class="close btn pl-5 pr-5 rounded-pill btn-delReport confirm">تأكيد</button> <!--to close modal when click this btn add this >> data-dismiss="modal" aria-label="Close"-->
                <button class="cansel close btn rounded-pill" id="cansel-btn" data-dismiss="modal" aria-label="Close">
                  إلغاء
                </button>
              </div>
              
            </div>
          </div>
        </div>

@endsection