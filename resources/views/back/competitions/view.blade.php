@extends('layouts.app')
@section('body')
<main class="text-right dash-main">

<!-- start page content-->
<div class="dash-contests">
  <div class="content">
   
    <div class="main-title py-3 mb-3">
      <span class="">المسابقات</span>
    </div>
    <div class="main-cont">
      <div class="contests-type-toggle">
        <div class="contests-social contest-type-active" data-constType=".contests-social-cont">
          مسابقات منصات التواصل
        </div>
        <div class="contests-place" data-constType=".contests-place-cont">
          مسابقات على حسب الموقع
        </div>
      </div>


      <div class="contests-type-cont position-relative">
        <div class="contests-social-cont table-responsive-xl show-table">
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
            @foreach($competitions_social as $social)
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
                    <a href="<?php echo $social['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-twitter activeSocial"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['internet'])&& !empty($social['social']['internet']))
                    <a href="<?php echo $social['social']['twitter']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-globe"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['website'])&& !empty($social['social']['websit']))
                    <a href="<?php echo $social['social']['website']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-bell"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['instagram'])&& !empty($social['social']['instagram']))
                    <a href="<?php $social['social']['instagram']?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-instagram"></i>
                    </a>
                  @endif

                  @if(isset($social['social']['facebook']) && !empty($social['social']['facebook']))
                    <a href="<?php echo $social['social']['facebook']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-facebook"></i>
                    </a>
                  @endif
                  @if(isset($social['social']['tik_tok'])&& !empty($social['social']['tik_tok']))
                    <a href="<?php echo $social['social']['tik_tok']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-tik-tok"></i>
                    </a>
                  @endif
                  </div>
                  
                </td>
                <td>{{date('d-m-Y', strtotime($social['created_at']))}}</td>
                <td>
              
                  <a href="#" class="border-0 show-icon set-icon @if($social['installed']==1) set @else unset @endif" data-href='{{url('/star/'.$social['id'].'/'.$social['installed'])}}'>
                    <i class="flaticon-star"></i>
                  </a> 
                </td>
                <td>
                  <button class="border-0 show-icon" data-href='{{url('/change_status/'.$social['id'].'/'.$social['approved'])}}'>
                    <i class="flaticon-switch"></i>
                  </button>
                </td>
                <td>
                  <button class="border-0 show-icon" data-href='{{url('/prizes/details/'.$social['id'])}}'>
                    <i class="flaticon-eye"></i>
                  </button>
                </td>
                <td>
                  <button type="button" class=" border-0 btn-delContest show-icon" data-href='{{url('/delete_comp/'.$social['id'])}}' >
                    <i class="flaticon-delete"></i>
                  </button>
                </td>
              </tr>
             
            @endforeach 
              
              
            </tbody>
            
          </table>
        </div>
        <div class="contests-place-cont hide table-responsive-xl">
          <table class="table table-striped contest-details-table text-center">
            <thead>
              <tr>
                <th scope="col">الرقم</th>
                <th scope="col">الدولة</th>
                <th scope="col">اسم المسابقة</th>
                <th scope="col">الهدية</th>
                <th scope="col">الموقع</th>
                <th scope="col">التاريخ</th>
                <th scope="col">تثبيت</th>
                <th scope="col">الحاله</th>
                <th scope="col">عرض</th>
                <th scope="col">مسح</th>
              </tr>
            </thead>
            <tbody>
            @foreach($competitions_location as $location)
            @if($location['approved']==1)
              <tr class="active-row" >
              @else
              <tr class="" >
              @endif
                <th scope="row">{{$location['id']}}</th>
                <td class="flag">
                {{$location['country']}}
                </td>
                <td>{{$location['title']}}</td>
                <td>
                  <a href="#" class="icon icon-gift d-flex justify-content-center">
                    <i class="flaticon-gift"></i>
                  </a>
                  
                </td>
                <td class="d-flex justify-content-center">
                  <div class="place-icon d-flex justify-content-center">
                    <a href="<?php echo $location['location']; ?>" class="icon d-flex justify-content-center">
                      <i class="flaticon-placeholder"></i>
                    </a>
                  </div>
                  
                </td>
                <td>{{date('d-m-Y', strtotime($location['created_at']))}}</td>
                <td>
              
                  <button class="border-0 show-icon set-icon @if($location['installed']==1) set @else unset @endif" data-href='{{url('/star/'.$location['id'].'/'.$location['installed'])}}'>
                    <i class="flaticon-star"></i>
                  </button> 
                </td>
                <td>
                  <button class="border-0 show-icon" data-href='{{url('/change_status/'.$location['id'].'/'.$location['approved'])}}'>
                    <i class="flaticon-eye"></i>
                  </button>
                </td>
                <td>
                  <button class="border-0 show-icon" data-href='{{url('/prizes/details/'.$location['id'])}}'>
                    <i class="flaticon-eye"></i>
                  </button>
                </td>
                <td>
                <button type="button" class=" border-0 btn-delContest show-icon" data-href='{{url('/delete_comp/'.$location['id'])}}' >
                    <i class="flaticon-delete"></i>
                  </button>
                </td>
              </tr>
              <!-- Modal -->
              <!-- Button trigger modal -->
       

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
  </div>
</div>
<!-- End page content-->

</main>

<!--------
all Models
---------->

<!-- delete contest Modal -->
<div class="modal fade modal-delContest" id="delContest"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-md modal-dialog-centered" role="document">
<div class="modal-content text-right">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">هل تريد حذف العنصر بالتأكيد؟</h5>
    <button type="button" class="close m-0 pt-0 pb-0" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  
  <div class="modal-footer justify-content-start">
    <button class="btn pl-5 pr-5 rounded-pill btn-delContest confirm">تأكيد</button> <!--to close modal when click this btn add this >> data-dismiss="modal" aria-label="Close"-->
    <button class="close btn rounded-pill" id="cansel-btn" data-dismiss="modal" aria-label="Close">
      إلغاء
    </button>
  </div>
  
</div>
</div>
</div>





@endsection


