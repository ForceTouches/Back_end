/*general $, console*/
$(document).ready(function () {
    "use strict";


    $('#comp_not').on("click", function(){

       
        swal({
            title: "هل ترغب بتشغيل هذا الاعلان ؟",
            buttons: {
              catch: {
                text: "تاكيد",
                value: "catch",
                confirmButtonColor: '#000000',
              },
                cancel: "إلغاء"
            },
            dangerMode: true,
          })
          .then((willDelete) => {

               if (willDelete) {
               
                var id= $('#comp_not').attr("comp_id");
                var base_url = $('#comp_not').attr("base_url");
                var approved = $('#comp_not').attr("approved");
                var location =window.location.href;
                var arr=location.split('/');
                var loc= arr[3];
                // alert(loc);
                $.ajax({
                    type: "GET",
//url:base_url+'/'+loc+'/change_status',
                    url:'/change_status',
                    async: false,
                    data: {'id':id,'approved':approved},
                    cache: false,
                    success: function(result)
                    {
                        swal("حسنا ", "تم التفعيل", "success");
                        $(".comp_not"+id).addClass("active-row");
                        $(".custom-switch"+id).addClass("active-row");
                        $("#customSwitch"+id).checked=true;
        
                    }
                });
            
               } else {
                   swal({
                       text:"حسناً! تم الالغاء",
                       buttons: {

                           cancel: "تم"
                       }
                   });
               }
           });
      
    });

    $('#comp').on("click", function(){

        swal({
            title: "هل ترغب بايقاف هذا الاعلان ؟",
            buttons: {
              catch: {
                text: "تاكيد",
                value: "catch",
                confirmButtonColor: '#000000',
              },
                cancel: "إلغاء"
            },
            dangerMode: true,
          })
          .then((willDelete) => {

               if (willDelete) {
               
                var id= $('#comp').attr("comp_id");
                var base_url = $('#comp').attr("base_url");
                var approved = $('#comp').attr("approved");
                var location =window.location.href;
                var arr=location.split('/');
                var loc= arr[3];
                $.ajax({
                    type: "GET",
                    url:'/change_status',
                    async: false,
                    data: {'id':id,'approved':approved},
                    cache: false,
                    success: function(result)
                    {
                        swal("حسنا ", "تم  الغاء التفعيل", "success");
                        $(".comp"+id).removeClass("active-row");
                        $(".custom-switch"+id).removeClass("active-row");
                        $("#customSwitch"+id).checked=false;
                    }
                });
               } else {
                   swal({
                       text:"حسناً! تم الالغاء",
                       buttons: {

                           cancel: "تم"
                       }
                   });
               }
           });

      
    });
});
$(document).ready(function () {
    "use strict";
    $('#star').on("click", function(){

        swal({
            title: "هل ترغب  تثبيت  هذا الاعلان ؟",
            buttons: {
              catch: {
                text: "تاكيد",
                value: "catch",
                confirmButtonColor: '#000000',
              },
                cancel: "إلغاء"
            },
            dangerMode: true,
          })
          .then((willDelete) => {

               if (willDelete) {
                var id= $('#star').attr("star_id");
                $.ajax({
                    type: "GET",
                    url:'/star',
                    async: false,
                    data: {'id':id,'installed':1},
                    cache: false,
                    success: function(result)
                    {
                        swal("حسنا ", "تم التثبيت", "success");
        
                        $(".star"+id).addClass("set");
                        $(".star" +id).removeClass("unset");
                    }
                });
               } else {
                   swal({
                       text:"حسناً! تم الالغاء",
                       buttons: {

                           cancel: "تم"
                       }
                   });
               }
           });
     
      
    });

    $('#not_star').on("click", function(){

        swal({
            title: "هل ترغب بالغاء تثبيت  هذا الاعلان ؟",
            buttons: {
              catch: {
                text: "تاكيد",
                value: "catch",
                confirmButtonColor: '#000000',
              },
                cancel: "إلغاء"
            },
            dangerMode: true,
          })
          .then((willDelete) => {

               if (willDelete) {
                var id= $('#not_star').attr("star_id");
                $.ajax({
                    type: "GET",
                    url:'/star',
                    async: false,
                    data: {'id':id,'installed':0},
                    cache: false,
                    success: function(result)
                    {
                        swal("حسنا ", "تم الغاء التثبيت", "success");

                        $(".not_star"+id).addClass("unset");
                        $(".not_star"+id).removeClass("set");
                    }
                });
               } else {
                   swal({
                       text:"حسناً! تم الالغاء",
                       buttons: {

                           cancel: "تم"
                       }
                   });
               }
           });
      
    });

});


$('.status').on("click", function(){
    swal({
        title: "هل ترغب بالغاء تثبيت  هذا الاعلان ؟",
        buttons: {
          catch: {
            text: "تاكيد",
            value: "catch",
            confirmButtonColor: '#000000',
          },
            cancel: "إلغاء"
        },
        dangerMode: true,
      })
      .then((willDelete) => {

           if (willDelete) {
            var id= $('.status').attr("comp_id");
            var base_url = $('.status').attr("base_url");
            var approved = $('.status').attr("approved");
            var location =window.location.href;
            var arr=location.split('/');
            var loc= arr[3];
            alert(id);
            $.ajax({
                type: "GET",
        //url:base_url+'/'+loc+'/change_status',
                url:'/change_status',
                async: false,
                data: {'id':id,'approved':approved},
                cache: false,
                success: function(result)
                {
                    swal("حسنا ", "تم التفعيل", "success");
            
                }
            });
           } else {
               swal({
                   text:"حسناً! تم الالغاء",
                   buttons: {

                       cancel: "تم"
                   }
               });
           }
       });
  
 });

