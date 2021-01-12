@extends('layouts.app')
@section('body')

<main class="text-right dash-main">
  
  <!-- start page content-->
  <div class="dash-ads">
    <div class="content">
      
      <div class="main-title py-3 mb-3 d-flex justify-content-between align-items-center">
        <span class="">الاعلانات</span>

        <!-- Button trigger modal (add new ads) -->
        <button type="button" class="btn-newAds btn rounded-pill" data-toggle="modal" data-target="#addNewAds" data-whatever="@mdo">
          <i class="flaticon-add-button"></i>
          اعلان جديد
        </button>

      </div>

      <div class="main-cont table-responsive-xl">
        <table class="table table-striped ads-table">
          <thead>
            <tr>
              <th scope="col">الرقم</th>
              <th scope="col">اسم الاعلان</th>
              <th scope="col">رابط الاعلان</th>
              <th scope="col">صورة الاعلان</th>
              <th scope="col">التاريخ</th>
              <th scope="col">تعديل</th>
              <th scope="col">حذف</th>
            </tr>
          </thead>
          <tbody>
          @foreach($ads as $ad)
            <tr class= "item">
              <th scope="row">{{$ad['id']}}</th>
              <td>{{$ad['title']}}</td>
              <td>{{$ad['link']}}</td>
              <td>{{$ad['image']}}</td>
              <td>{{$ad['created_at']}}</td>
              <td>
                <button type="button" class="adjust-ads btn-adjustAds" data-toggle="modal" data-target="#adjustAds" data-whatever="@mdo">
                  <i class="flaticon-pen"></i>
                </button>
              </td>
              <td>
                <button type="button" class="delete del-ads btn-delAds" data-toggle="modal" data-target="#delAds" data-whatever="@mdo">
                  <i class="flaticon-delete"></i>
                </button>
              </td>
            </tr>

              <!-- delete ads Modal -->
              <div class="modal fade modal-delAds" id="delAds"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                  <div class="modal-content text-right">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف العنصر بالتأكيد؟</h5>
                      <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <div class="modal-footer justify-content-start">
                    <form action="{{url('/ads_destroy/'.$ad['id'])}}" id="form" method="post" enctype="multipart/form-data" >
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                      <button type="submit" class="btn pl-5 pr-5 rounded-pill btn-delAds">تأكيد</button>
                      <button class="close btn rounded-pill" id="cansel-btn" data-dismiss="modal" aria-label="Close">
                        إلغاء
                      </button>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
              <!-- adjust ads Modal -->
              <div class="modal modal-ads fade modal-adjustAds" id="adjustAds"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                  <div class="modal-content text-right">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">تعديل الاعلان</h5>
                      <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{url('ads_edit/'.$ad['id'])}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                       		
                        <div class="form-group">
                          <div class="row all-inputs">
                            <div class="col-12 column col-lg-4">
                              <input type="text" class="form-control" id="adjustAds-name" placeholder="اسم الاعلان" value="{{$ad['title']}}" name="title">
                            </div>
                            <div class="col-12 column col-lg-4">
                              <input type="text" class="form-control" id="adjustAds-url" placeholder="رابط الاعلان" value="{{$ad['link']}}" name="link">
                            </div>
                            <div class="col-12 column col-lg-4">
                              <div class="form-control input-file position-relative">
                                <div class="inp-assets">
                                  <i class="flaticon-export"></i>
                                  <img class=" img-change" src="{{ asset($ad['image'])}}" alt="person-image" width="14%">
                    <!-- <span class="inp-placeholder"><img class="defult-img overflow-hidden w-100" src="{{ asset($ad['image'])}}" alt="add-icon"></span> -->
                                  <span class="inp-placeholder">صورة الاعلان</span>
                                </div>
                               
                                <input type="file" class="" name="image" id="adjustAdsImg-name" placeholder="صورة الاعلان">
                              </div>
                              
                            </div>
                          
                        </div>
                        <div class="modal-bottom justify-content-start pt-3">
                          <button type="submit" class="btn-adjustAds btn pl-5 pr-5 rounded-pill">حفظ</button>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </tbody>
          
        </table>

        

        
      </div>

    </div>
  </div>
  <!-- End page content-->
  
</main>



<!-- add new ads Modal-->
<div class="modal modal-ads fade modal-newAds" id="addNewAds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content text-right">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">إضافة إعلان جديد</h5>
        <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="{{url('/ads_store')}}" method="post"  enctype="multipart/form-data">
              {{ csrf_field() }}
          <div class="form-group">
            <div class="row all-inputs">
              <div class="col-12 column col-lg-4">
                <input type="text" class="form-control" id="newAds-name" placeholder="اسم الاعلان" name="title">
              </div>
              <div class="col-12 column col-lg-4">
                <input type="text" class="form-control" id="newAds-url" placeholder="رابط الاعلان" name="link">
              </div>
              <div class="col-12 column col-lg-4">
                <div class="form-control input-file position-relative">
                  <div class="inp-assets">
                    <i class="flaticon-export"></i>
                    <span class="inp-placeholder">صورة الاعلان</span>
                  </div>
                  <input type="file" class="" id="adsImg-name" placeholder="صورة الاعلان" name="image">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-bottom justify-content-start pt-3">
            <button type="submit" class="btn btn-addnewAds pl-5 pr-5 rounded-pill">إضافة</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>


@endsection