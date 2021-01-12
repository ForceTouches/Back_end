@extends('layouts.app')
@section('body')
<main class="text-right dash-main">
    <!-- start page content-->
    <div class="dash-users">
      <div class="content">
        
        
        <div class="main-cont">
          <div class="main-title-cont d-flex justify-content-between align-items-end">
            <div class="users-type-toggle row m-0">
              <div class="users users-type-active" data-usersPageType=".users-cont"> <!--col-12 col-sm-6-->
                المستخدمين
              </div>
              <div class="manegers m-0" data-usersPageType=".manegers-cont">
                المديرين
              </div>
              
            </div>
            <!-- Button trigger modal (add new Manegar) -->
            <div class="newManegar hide">
              <button type="button" class="btn-newManegar btn rounded-pill" data-toggle="modal" data-target="#addNewManegar" data-whatever="@mdo">
                <i class="flaticon-add-button"></i>
                <span>مدير جديد</span>
              </button>
            </div>
            
          </div>
  
          <div class="users-type-cont">
            <div class="users-cont table-responsive-xl">
              <table class="table table-striped contest-details-table text-center">
                <thead>
                  <tr>
                    <th scope="col">الرقم</th>
                    <th scope="col">اسم المستخدم</th>
                    <th scope="col">الصوره</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">رقم الجوال</th>
                    <th scope="col">الحاله</th>
                    <th scope="col">عرض</th>
                    <th scope="col">مسح</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                @if($user['blocked']==1)
                <tr class="active-row" id="user-0">
                @else
                <tr class="" >
                @endif
                    <th scope="row">{{$user['id']}}</th>
                    <td>{{$user['name']}}</td>
                    <td class="person-image">
                      <img class="w-100" src="{{url($user['photo'])}}" alt="">
                    </td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['phone']}}</td>
                    <td>
                      <button class="border-0 show-icon" data-href='{{url('/user_status/'.$user['id'].'/'.$user['blocked'])}}'>
                        <i class="flaticon-switch"></i>
                      </button>
                    </td>
                    <td>
                      <button class="border-0 show-icon bg-transparent" data-href='{{url('/users_details/'.$user['id'])}}'>
                        <i class="flaticon-eye"></i>
                      </button>
                    </td>
                    <td>
                    <button type="button" class=" border-0 btn-delContest show-icon" data-href='{{url('/delete_user/'.$user['id'])}}' >
                      <i class="flaticon-delete"></i>
                    </button> 
                    </td>
                  </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>

            <div class="manegers-cont hide table-responsive-xl">
              <table class="table table-striped contest-details-table text-center manegers-table">
                <thead>
                  <tr>
                  <th scope="col">الرقم</th>
                    <th scope="col">اسم المستخدم</th>
                    <th scope="col">الصوره</th>
                    <th scope="col">البريد الالكتروني</th>
                    <th scope="col">رقم الجوال</th>
                    <th scope="col">الحاله</th>
                    <th scope="col">عرض</th>
                    <th scope="col">مسح</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($managers as $manager)
                  @if($manager['blocked']==1)
                  <tr class="active-row" id="user-0">
                  @else
                  <tr class="" >
                  @endif
                    <th scope="row">{{$manager['id']}}</th>
                    <td>{{$manager['name']}}</td>
                    <td class="person-image">
                      <img class="w-100" src="{{url($manager['photo'])}}" alt="">
                    </td>
                    <td>{{$manager['email']}}</td>
                    <td>{{$manager['phone']}}</td>
                    <td>
                      <button class="border-0 show-icon" data-href='{{url('/user_status/'.$manager['id'].'/'.$manager['blocked'])}}'>
                        <i class="flaticon-switch"></i>
                      </button>
                    </td>
                    <td>
                      <button class="border-0 show-icon bg-transparent" data-href='{{url('/users_details/'.$manager['id'])}}'>
                        <i class="flaticon-eye"></i>
                      </button>
                    </td>
                    <td>
                    <button type="button" class=" border-0 btn-delContest show-icon" data-href='{{url('/delete_user/'.$manager['id'])}}' >
                      <i class="flaticon-delete"></i>
                    </button>   
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
 <!--------
  all Models
          ---------->
          <!-- delete user Modal -->
          <div class="modal fade modal-delUserItem" id="delUserItem"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
              <div class="modal-content text-right">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف العنصر بالتأكيد؟</h5>
                  <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-footer justify-content-start">
                  <button class="btn pl-5 pr-5 rounded-pill btn-delUserItem confirm" data-dismiss="modal" aria-label="Close">تأكيد</button>
                  <button class="close btn rounded-pill" id="cansel-btn" data-dismiss="modal" aria-label="Close">
                    إلغاء
                  </button>
                </div>
                
              </div>
            </div>
          </div>

          <!-- add new Maneger Modal-->
        <div class="modal model-users fade modal-newManegar" id="addNewManegar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content text-right">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مدير جديد</h5>
                <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="{{url('/store_user')}}" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
                  <div class="form-group d-flex mb-0 pb-3">
                    <div class="inputs col-lg-7 row align-items-center">
                      <div class="input-field col-lg-6">
                        <input type="email" id="maneger-mail" placeholder="البريد الالكترونى" name="email">
                      </div>
                      <div class="input-field col-lg-6">
                        <input type="password" id="maneger-pass" placeholder="كلمة المرور" name="password">
                      </div>
                      
                    </div>
                    
                    <div class="peson-img col-lg-5 d-flex align-items-center justify-content-lg-around justify-content-center row"> <!-- flex-column  -->
                      <div class="image entryImg position-relative" id="entryImg">
                        <img class="w-100 img-change" src="{{ asset('/back/img/scan0002.jpg')}}" alt="person-image">
                        <span class="position-absolute"><img class="defult-img overflow-hidden w-100" src="{{ asset('/back/img/img-placeholder.png')}}" alt="add-icon"></span>
                      </div>
                      <div class="btn-imgChange position-relative">
                        <input type="file" class="inpFile" id="maneger-img" name="photo">
                        <button type="button" class="btn-change-img btn pr-3 pl-3 d-flex align-items-center">
                          <i class="flaticon-export"></i>
                          <span>رفع الصورة</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="modal-bottom justify-content-start pt-3">
                    <button type="submit" class="btn btn-addNewManegar pl-5 pr-5 rounded-pill">إضافة</button>
                  </div>

                </form>
              </div>
              
            </div>
          </div>
        </div>

        <!-- adjust Maneger Modal -->
        <div class="modal model-users fade modal-adjustManeger" id="adjustManeger"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content text-right">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">إضافة مدير جديد</h5>
                <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group d-flex mb-0 pb-3">
                    <div class="inputs col-lg-7 row align-items-center">
                      <div class="input-field col-lg-6">
                        <input type="email" id="maneger-mail" placeholder="البريد الالكترونى">
                      </div>
                      <div class="input-field col-lg-6">
                        <input type="password" id="maneger-pass" placeholder="كلمة المرور">
                      </div>
                      
                    </div>
                    
                    <div class="peson-img col-lg-5 d-flex align-items-center justify-content-lg-around justify-content-center row"> <!-- flex-column  -->
                      <div class="image entryImg position-relative" id="entryImg">
                        <img class="w-100 img-change" src="../img/scan0002.jpg" alt="person-image">
                        <span class="position-absolute"><img class="defult-img overflow-hidden w-100" src="../img/img-placeholder.png" alt="add-icon"></span>
                      </div>
                      <div class="btn-imgChange position-relative">
                        <input type="file" class="inpFile" id="maneger-img">
                        <button type="button" class="btn-change-img btn pr-3 pl-3 d-flex align-items-center">
                          <i class="flaticon-export"></i>
                          <span>رفع الصورة</span>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="modal-bottom justify-content-start pt-3">
                    <button type="" class="btn btn-adjustManeger pl-5 pr-5 rounded-pill">حفظ</button>
                  </div>

                </form>
              </div>
              
            </div>
          </div>
        </div>
            
@endsection