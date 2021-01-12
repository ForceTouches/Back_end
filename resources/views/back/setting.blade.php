@extends('layouts.app')
@section('body')
<main class="text-right dash-main">

<!-- start page content-->
<div class="dash-settings">
  <div class="content">
    
    <div class="main-title py-3 mb-3">
      <span class="">الإعدادات</span>
    </div>
    <div class="main-cont">
      <form  action="{{url('update_user/'.auth()->user()->id)}}" method="post"  enctype="multipart/form-data">
      {{ csrf_field() }}
      
        <div class="accordion" id="accordionExample">
          <!-- Start account settings area-->
          <div class="card">
            <div class="card-header" id="account-set">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <span>إعدادات الحساب</span>
                  <i class="flaticon-down-arrow"></i>
                </button>
              </h2>
            </div>

            <div id="collapseTwo" class="collapse" aria-labelledby="account-set" data-parent="#accordionExample">
              <div class="card-body d-flex">
                <div class="inputs col-lg-8 row">
                  <div class="input-field col-lg-6">
                    <input type="text" placeholder="الاسم " value="{{auth()->user()->name}}" name="name">
                    <input type="text" placeholder="الاسم بالكامل" value="{{auth()->user()->full_name}}" name="full_name">
                  </div>
                  <div class="input-field col-lg-6">
                    <input type="email" placeholder="البريد الالكترونى" value="{{auth()->user()->email}}" name="email">
                    <input type="tel" placeholder="الجوال" value="{{auth()->user()->phone}}" name="phone">
                  </div>
                </div>
                
                <div class="peson-img col-lg-4 d-flex align-items-center justify-content-between"> <!-- flex-column  -->
                  <div class="image entryImg position-relative" id="entryImg">
                    <img class="w-100 img-change" src="{{ asset(auth()->user()->photo)}}" alt="person-image">
                    <span class="position-absolute defultImg"><img class="defult-img overflow-hidden w-100" src="{{ asset(auth()->user()->photo)}}" alt="add-icon"></span>
                  </div>
                  <div class="btn-imgChange position-relative">
                    <input type="file" class="inpFile" id="inpFile" name="photo">
                    <button type="button" class="btn-change-img btn pr-3 pl-3 d-flex">
                      <i class="flaticon-pen"></i>
                      <span>تغيير الصوره</span>
                    </button>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <!-- End account settings area-->

           <!-- Start account settings area-->
           <div class="card mt-3">
            <div class="card-header" id="remain-time-show">
              <h2 class="mb-0">
                <button class="btn btn-link btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
                  <span>اقرب مدة عرض</span>
                  <i class="flaticon-down-arrow"></i>
                </button>
              </h2>
            </div>

            

            <div id="collapseThree" class="collapse" aria-labelledby="remain-time-show" data-parent="#accordionExample">
              <div class="card-body d-flex">
                
                
                <div class="remain-time d-flex justify-content-between">
                  <input type="number" class="w-100" placeholder="{{$setting['remaning_time']}}" name="remaning_time" value="{{$setting['remaning_time']}}">
                  
                </div>
                
              </div>
            </div>
          </div>
          <!-- End account settings area-->


           <!-- Start used colors area-->
           <div class="card mt-3">
              <div class="card-header" id="used-colors">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-right collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <span>الألوان المستخدمة</span>
                    <i class="flaticon-down-arrow"></i>
                  </button>
                </h2>
              </div>

              <div id="collapseFour" class="collapse" aria-labelledby="used-colors" data-parent="#accordionExample">
                <div class="card-body d-flex">
                  <!-- start sub collapses-->
                  <div class="accordion row w-100" id="accordionExample-sub">
                    <!--start main colors-->
                    <div class="card col-lg-4">
                      <div class="card-header" id="headingOne-sub">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne-sub" aria-expanded="true" aria-controls="collapseOne-sub">
                            <div class="sub-title">
                              <span class="sub-title-color" data-usedColor = {{$setting['primary_color']}}></span>
                              <span class="sub-title-txt">اللون الأساسي</span>
                            </div>
                            <i class="flaticon-down-arrow"></i>
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseOne-sub" class="collapse show collapse-sub" aria-labelledby="headingOne-sub" data-parent="#accordionExample-sub">
                        <div class="card-body">
                          <div class="colors-ditails" id="main-colors-ditails">
                            <div class="colors-row">
                              <input type="radio" value="#000" name="primary_color" @if($setting['primary_color']=="#000") class="active-color" @endif  @if($setting['primary_color']=="#000") checked @endif>
                              <input type="radio" value="#ff375eb3" name="primary_color" @if($setting['primary_color']=="#ff375eb3") class="active-color" @endif @if($setting['primary_color']=="#ff375eb3") checked @endif>
                              <input type="radio" value="#ff375e80" name="primary_color" @if($setting['primary_color']=="#ff375e80") class="active-color" @endif @if($setting['primary_color']=="#ff375e80") checked @endif>
                            </div>
                            <div class="colors-row">
                              <input type="radio" value="#ff375e66" name="primary_color" @if($setting['primary_color']=="#ff375e66") class="active-color" @endif @if($setting['primary_color']=="#ff375e66") checked @endif>
                              <input type="radio" value="#ff375e4d" name="primary_color" @if($setting['primary_color']=="#ff375e4d") class="active-color" @endif @if($setting['primary_color']=="#ff375e4d") checked @endif>
                              <input type="radio" value="#ff375e33" name="primary_color" @if($setting['primary_color']=="#ff375e33") class="active-color" @endif @if($setting['primary_color']=="#ff375e33") checked @endif>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!--End main colors-->
                    <!--start primary colors-->
                    <div class="card col-lg-4 mb-3">
                      <div class="card-header" id="headingTwo-sub">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo-sub" aria-expanded="true" aria-controls="collapseTwo-sub">
                            <div class="sub-title">
                              <span class="sub-title-color" data-usedColor = {{$setting['second_color']}}></span>
                              <span class="sub-title-txt">اللون الثانوي</span>
                            </div>
                            <i class="flaticon-down-arrow"></i>
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseTwo-sub" class="collapse collapse-sub" aria-labelledby="headingTwo-sub" data-parent="#accordionExample-sub">
                        <div class="card-body">
                          <div class="colors-ditails" id="primary-colors-ditails">
                            <div class="colors-row">
                              <input type="radio" value="#6585ff" name="second_color" @if($setting['second_color']=="#6585ff") class="active-color" @endif @if($setting['second_color']=="#6585ff") checked @endif>
                              <input type="radio" value="#ff375eb3" name="second_color" @if($setting['second_color']=="#ff375eb3") class="active-color" @endif @if($setting['second_color']=="#ff375eb3") checked @endif>
                              <input type="radio" value="#ff375e80" name="second_color" @if($setting['second_color']=="#ff375e80") class="active-color" @endif @if($setting['second_color']=="#ff375e80") checked @endif>
                            </div>
                            <div class="colors-row">
                              <input type="radio" value="#ff375e66" name="second_color" @if($setting['second_color']=="#ff375e66") class="active-color" @endif @if($setting['second_color']=="#ff375e66") checked @endif>
                              <input type="radio" value="#ff375e4d" name="second_color" @if($setting['second_color']=="#ff375e4d") class="active-color" @endif @if($setting['second_color']=="#ff375e4d") checked @endif>
                              <input type="radio" value="#ff375e33" name="second_color" @if($setting['second_color']=="#ff375e33") class="active-color" @endif @if($setting['second_color']=="#ff375e33") checked @endif>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end primary colors-->
                    <!--start txt colors-->
                    <div class="card col-lg-4 mb-3">
                      <div class="card-header" id="headingThree-sub">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseThree-sub" aria-expanded="true" aria-controls="collapseThree-sub">
                            <div class="sub-title">
                              <span class="sub-title-color" data-usedColor = {{$setting['text_color']}}></span>
                              <span class="sub-title-txt">لون الخط</span>
                            </div>
                            <i class="flaticon-down-arrow"></i>
                          </button>
                        </h2>
                      </div>
                  
                      <div id="collapseThree-sub" class="collapse collapse-sub" aria-labelledby="headingThree-sub" data-parent="#accordionExample-sub">
                        <div class="card-body">
                          <div class="colors-ditails" id="txt-colors-ditails">
                            <div class="colors-row">
                              <input type="radio" value="#6aaf74" name="text_color" @if($setting['text_color']=="#6aaf74") class="active-color" @endif @if($setting['text_color']=="#6aaf74") checked @endif>
                              <input type="radio" value="#ff375eb3" name="text_color" @if($setting['text_color']=="#ff375eb3") class="active-color" @endif @if($setting['text_color']=="#ff375eb3") checked @endif>
                              <input type="radio" value="#ff375e80" name="text_color" @if($setting['text_color']=="#ff375e80") class="active-color" @endif @if($setting['text_color']=="#ff375e80") checked @endif>
                            </div>
                            <div class="colors-row">
                              <input type="radio" value="#ff375e66" name="text_color" @if($setting['text_color']=="#ff375e66") class="active-color" @endif @if($setting['text_color']=="#ff375e66") checked @endif>
                              <input type="radio" value="#ff375e4d" name="text_color" @if($setting['text_color']=="#ff375e4d") class="active-color" @endif @if($setting['text_color']=="#ff375e4d") checked @endif>
                              <input type="radio" value="#ff375e33" name="text_color" @if($setting['text_color']=="#ff375e33") class="active-color" @endif @if($setting['text_color']=="#ff375e33") checked @endif>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--End txt colors-->
                  </div>
                  <!--End sub collapses-->
                  
                  
                  
                </div>
              </div>
            </div>
            <!-- End used colors area-->
        </div>

        <div class="form-submit">
          <input class="btn mt-3" type="submit" value="حفظ">
          <button class="btn mt-3">إلغاء</button>
        </div>
        
      </form>
    </div>

  </div>
</div>
<!-- End page content-->


</main>
@endsection