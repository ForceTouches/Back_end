// elemnts dom string
var elements = {
    /*pages*/
    dashPages: document.querySelector('body.dash'),
    usersPage: document.querySelector('body.dash .dash-users'),
    contestsPage: document.querySelector('body.dash .dash-contests'),
    reportPage: document.querySelector('body.dash .dash-reports'),
    adsPage: document.querySelector('body.dash .dash-ads'),
    settingsPage: document.querySelector('body.dash .dash-settings'),
    userDetailsPage: document.querySelector('body.dash .dash-users-details'),
    contestDitailsPage: document.querySelector('body.dash .dash-contests-details'),

    /*elements for multiple pages */
    tableBodys: document.querySelectorAll('table tbody'),
    body: document.querySelector('body'),
    sideNavIcon: document.querySelector('body.dash .side-top .control i'),
    bodyAside: document.querySelector('body aside'),
    mainCont: document.querySelector('body.dash .content'),

    /*elements for contest ditails page */
    contestDitailsSetIcon: document.querySelector('body.dash .dash-contests-details .set-icon'),
    contestDitailsAcceptBtns: document.querySelectorAll('body.dash .dash-contests-details .control-two .btn'),
    contestDitailsMessage: document.querySelector('body.dash .dash-contests-details .message'),
    contestDitailsMassegeTxt: document.querySelector('body.dash .dash-contests-details .message-txt'),

    /*elements for report page */
    reportActiveBtn: document.querySelector('.modal-showReport .modal-body .contest-details .contest-details-table tbody .active-switch .custom-control-input'),

    /*elements for contest page */
    contestTypeOptions: document.querySelectorAll('body.dash .dash-contests .main-cont .contests-type-toggle > div'),
    contestTypeConts: document.querySelectorAll('body.dash .dash-contests .main-cont .contests-type-cont > div'),
    tableShowIcons: document.querySelectorAll('table tbody tr td .show-icon'),

    /*elements for users page */
    usersTypeOptions: document.querySelectorAll('body.dash .dash-users .main-cont .users-type-toggle > div'),
    usersTypeConts: document.querySelectorAll('body.dash .dash-users .main-cont .users-type-cont > div'),
    newManegaerBtn: document.querySelector('body.dash .dash-users .main-cont .newManegar'),
    manegerModalInpFiles: document.querySelectorAll('.model-users .inpFile'),
    addManegerImgDefult: document.querySelector('.modal-newManegar .entryImg .defult-img'),
    addManegerImgChange: document.querySelector('.modal-newManegar .entryImg .img-change'),
    adjustManegerImgDefult: document.querySelector('.modal-adjustManeger .entryImg .defult-img'),
    adjustManegerImgChange: document.querySelector('.modal-adjustManeger .entryImg .img-change'),

    /*elements for settings ditails page */
    inpField: document.querySelector('body.dash .dash-settings #inpFile'),
    imgDefult: document.querySelector('body.dash .dash-settings #entryImg .defult-img'),
    imgChange: document.querySelector('body.dash .dash-settings #entryImg .img-change'),
    usedColorsInputs: document.querySelectorAll('body.dash .dash-settings #collapseFour .colors-ditails .colors-row input[type="radio"]'),
    colorsDitails: document.querySelectorAll('body.dash .dash-settings #collapseFour .colors-ditails'),
    subTitleColors: document.querySelectorAll('body.dash .dash-settings .main-cont .accordion .card #collapseFour .sub-title .sub-title-color')
    


}


/***************
 * UI Controlar
 **************/
var UICtrl = (function() {
    
    return {
        smallSideNav: function(){
            elements.body.classList.add('side-nav-small');
            if(elements.sideNavIcon.classList.contains('flaticon-minus')) {
                elements.sideNavIcon.classList.remove('flaticon-minus');
                elements.sideNavIcon.classList.add('flaticon-add');
            }
        },
        normalSideNav: function(){
            elements.body.classList.remove('side-nav-small');
            if(elements.sideNavIcon.classList.contains('flaticon-add')) {
                elements.sideNavIcon.classList.add('flaticon-minus');
                elements.sideNavIcon.classList.remove('flaticon-add');
            }
        },
        toggleNavSide: function(e){
            if(e.target.closest('.side-top .control i')) {
                elements.body.classList.toggle('side-nav-small');
                elements.sideNavIcon.classList.toggle('flaticon-minus');
                elements.sideNavIcon.classList.toggle('flaticon-add');
            }
        },
        toggleMainCont: function(){
            elements.mainCont.classList.toggle('hide');
        },
        showMainCont: function(e){
            if(e.target.closest('body.dash .content')) {
                e.target.closest('body.dash .content').classList.remove('hide')
            } 
        },
        hidePersonImg: function(img) {
            img.style.display = "none"
        },
        showPersonImg: function(img) {
            img.style.display = "block"
        },
        
        toggleRowActiveState(e) {
           // var id= $('.comp').attr("comp_id");
            // if(e.target.closest('.active-switch .custom-control-input' +id)) {
            //     var rowTarget = e.target.closest('tr');
            //     if(rowTarget.classList.contains('active-row')) {
            //         rowTarget.classList.remove('active-row')
            //         var id= $('.comp').attr("comp_id");
            //         alert(id);
            //         $.ajax({
            //             type: "GET",
            //             url:'/change_status',
            //             async: false,
            //             data: {'id':id,'approved':0},
            //             cache: false,
            //             success: function(result)
            //             {
          
            //               $('#category').html(result);
            //             }
            //       });
            //     } else {
            //         rowTarget.classList.add('active-row')
            //         var id= $('.comp').attr("comp_id");
            //         alert(id);
            //         $.ajax({
            //             type: "GET",
            //             url:'/change_status',
            //             async: false,
            //             data: {'id':id,'approved':1},
            //             cache: false,
            //             success: function(result)
            //             {
          
            //               $('#category').html(result);
            //             }
            //       });
            //     }
            // }
            
        },
        toggleRowSetState(e) {
            // var btnTarget = e.target.closest('.set-icon');
            // if(btnTarget) {
            //     if(btnTarget.classList.contains('set')) {
            //         btnTarget.classList.remove('set');
            //         btnTarget.classList.add('unset')
            //     } else {
            //         btnTarget.classList.remove('unset');
            //         btnTarget.classList.add('set')
            //     }
            // }
            
        },
        openRelativePage(e) {
            var targetPage = e.target.closest('.show-icon').dataset.href
            if(targetPage) {
                window.location = targetPage;
            }
        },
        toggleNewManegarBtn(usersTypeContShow) {
            if(usersTypeContShow == ".manegers-cont") {
                elements.newManegaerBtn.classList.remove('hide');
                elements.newManegaerBtn.classList.add('visible')
            } else if(usersTypeContShow == ".users-cont") {
                elements.newManegaerBtn.classList.remove('visible');
                elements.newManegaerBtn.classList.add('hide')
            }
        },
        
        showMessage: function(e) {
            if(e.target.closest('.btn-accept')) {
                elements.contestDitailsMassegeTxt.textContent = 'تم القبول';
                elements.contestDitailsMessage.classList.add('show')
            } else if(e.target.closest('.btn-refuse')) {
                elements.contestDitailsMassegeTxt.textContent = 'تم الرفض';
                elements.contestDitailsMessage.classList.add('show')
            }
            
        },
        toogleActiveClassUsedColorsInput(e) {
            var targetInput = e.target;
            var colorsDitailsID = e.target.closest('#collapseFour .colors-ditails').id;
            var inputsForColorsDitailsID =document.querySelectorAll('#'+colorsDitailsID+ ' input[type="radio"]');
            for(var input of inputsForColorsDitailsID) {
                if(input.classList.contains('active-color')) {
                    input.classList.remove('active-color');
                }
                targetInput.classList.add('active-color')
            }
        },
        changeSubTitleColor(e) {
            var targetInputColorVal = e.target.value
                var targetHeadingForInput = e.target.closest('.collapse-sub').previousElementSibling.id;
                document.querySelector('#'+targetHeadingForInput+ ' .sub-title-color').style.backgroundColor = targetInputColorVal
        },
        setSubTitleColor() {
            var subTitleColors = elements.subTitleColors
            for(subTitleColor of subTitleColors) {
                var subTitleColorVal = subTitleColor.getAttribute('data-usedColor');
                subTitleColor.style.backgroundColor = subTitleColorVal
            }
            
        }
    }
})();

/***************
 * app Controlar
 **************/
var appCtrl = (function(UI) {

    /*****************************************
     * general functionality for all dash pages
     *****************************************/

     if(elements.dashPages) {
        //make the side nav small in the phone window at the beginning
        window.addEventListener('load', function(e) {
            if(e.currentTarget.elements.body.classList.contains('dash')) {
                if (window.innerWidth < 540) {
                    UI.smallSideNav()
                }
            }
        });

        //make the side nav small in the small window
        window.addEventListener('resize', function(e) {
            if(e.currentTarget.elements.body.classList.contains('dash')) {
                if (window.innerWidth <= 770) {
                    UI.smallSideNav(e);
                    if(elements.mainCont.classList.contains('hide')) {
                        UI.showMainCont(e)
                    }
                } else if(window.innerWidth > 770) {
                    UI.normalSideNav(e)
                }
            }
        });

        //make the side nav small or big when you click the icone control
        elements.bodyAside.addEventListener('click', function(e) {
            if(e.view.elements.body.classList.contains('dash')) {
                if(e.target.closest('.control')) {
                    UI.toggleNavSide(e)
                    //hide the main section in very small screen
                    if(window.innerWidth <= 550) {
                        UI.toggleMainCont(e)
                    } else {
                        UI.showMainCont(e)
                    }
                }
                
            }
            
        });

     }


    /****************************
     * settings page functionality
     ****************************/

    //change img in settings page
    if(elements.settingsPage) { //check if there is an input file element or not (that happens when you in settings page)
        elements.inpField.addEventListener('change', function(event) {
            var file = this.files[0];
            if(file) {
                var imgUrl = URL.createObjectURL(event.target.files[0]);
                UI.hidePersonImg(elements.imgDefult)
                UI.showPersonImg(elements.imgChange)
                elements.imgChange.setAttribute('src', imgUrl);
            } else {
                UI.showPersonImg(elements.imgDefult)
                UI.hidePersonImg(elements.imgChange)
                elements.imgChange.setAttribute('src', '');
            }
        });

        var usedColorsInputs = elements.usedColorsInputs
        for(var usedColorsInput of usedColorsInputs) {
            //set background colors for used colors inputs when window load
            usedColorsInput.style.backgroundColor = usedColorsInput.value;
            
            //when you click colors inputs
            usedColorsInput.addEventListener('click', function(e) {
                //remove class "active-color" from all inputs and put it to cheked input
                UI.toogleActiveClassUsedColorsInput(e)
                
                //change background color for sub-title-color
                UI.changeSubTitleColor(e)
                
            });
        }

        //set background colors for sub titles color when window load
        UI.setSubTitleColor()
        
        
        
        
    }

    

    
    /*************************
    * report page functionality
    **************************/
   if(elements.reportPage) {
        //toggle active state for report modale
        elements.reportActiveBtn.addEventListener('click', function(e) {
            UI.toggleRowActiveState(e)
        });

        //toggle set state for report modale
        var tableBodys = elements.tableBodys
        for(var tableBody of tableBodys) {
            tableBody.addEventListener('click', function(e) {
                UI.toggleRowSetState(e)
            });
        }
        
   }

    
   /***************************
   * contest page functionality
   ***************************/
    if(elements.contestsPage) {
        
        var contestTypeOptions = elements.contestTypeOptions
        for(var contestTypeOption of contestTypeOptions) {
            contestTypeOption.addEventListener('click', function() {
                //add active style for contestTypeOption
                for(var contestTypeOption of contestTypeOptions) {
                    contestTypeOption.classList.remove('contest-type-active')
                }
                this.classList.add('contest-type-active')
                //show the relative cont to this option
                var contestTypeConts = elements.contestTypeConts
                for(contestTypeCont of contestTypeConts) {
                    if(!contestTypeCont.classList.contains('hide')) {
                        contestTypeCont.classList.add('hide')
                    }
                    if(contestTypeCont.classList.contains('visible')) {
                        contestTypeCont.classList.remove('visible')
                    }
                }
                var contestTypeContShow = this.getAttribute('data-constType');
                document.querySelector(contestTypeContShow).classList.remove('hide')
                document.querySelector(contestTypeContShow).classList.add('visible')
            });
        }

        //toggle active state for contests table rows
        var tableBodys = elements.tableBodys
        for(var tableBody of tableBodys) {
            tableBody.addEventListener('click', function(e) {
                UI.toggleRowActiveState(e)
            });
        }

        //toggle set state for contests table rows
        var tableBodys = elements.tableBodys
        for(var tableBody of tableBodys) {
            tableBody.addEventListener('click', function(e) {
                UI.toggleRowSetState(e)
            });
        }
        
        //open the relative page (contest-details)
        var tableShowIcons = elements.tableShowIcons
        for(var tableShowIcon of tableShowIcons) {
            tableShowIcon.addEventListener('click', function(e) {
                UI.openRelativePage(e)
            });
        }
        
    }

    /********************************
   * contest details page functionality
   **********************************/
  if(elements.contestDitailsPage) {
    //set state
    elements.contestDitailsSetIcon.addEventListener('click', function(e) {
        UI.toggleRowSetState(e)
    });
    //hide accept and refuse buttons when you click
    var contestDitailsAcceptBtns = elements.contestDitailsAcceptBtns
    for(var contestDitailsAcceptBtn of contestDitailsAcceptBtns) {
        contestDitailsAcceptBtn.addEventListener('click', function(e) {
            contestDitailsAcceptBtn.parentNode.parentNode.classList.add('hidden')
            UI.showMessage(e)
        });
    }

  }


    /*******************************
   * user details page functionality
   ********************************/
    if(elements.userDetailsPage) {
        
        //toggle active state for users details table rows
        var tableBodys = elements.tableBodys
        for(var tableBody of tableBodys) {
            tableBody.addEventListener('click', function(e) {
                UI.toggleRowActiveState(e)
            });
        }

        //toggle set state for users details table rows
        var tableBodys = elements.tableBodys
        for(var tableBody of tableBodys) {
            tableBody.addEventListener('click', function(e) {
                UI.toggleRowSetState(e)
            });
        }
        
    }
    

    /***********************
   * users page functionality
   ************************/
    if(elements.usersPage) {
        var usersTypeOptions = elements.usersTypeOptions
        for(var usersTypeOption of usersTypeOptions) {
            usersTypeOption.addEventListener('click', function() {
                //add active style for usersTypeOption
                for(var usersTypeOption of usersTypeOptions) {
                    usersTypeOption.classList.remove('users-type-active')
                }
                this.classList.add('users-type-active')
                //show the relative cont to this option
                var usersTypeConts = elements.usersTypeConts
                for(var usersTypeCont of usersTypeConts) {
                    if(!usersTypeCont.classList.contains('hide')) {
                        usersTypeCont.classList.add('hide')
                    }
                    if(usersTypeCont.classList.contains('visible')) {
                        usersTypeCont.classList.remove('visible')
                    }
                }
                //toggle show type of cont depend on if it's user or maneger
                var usersTypeContShow = this.getAttribute('data-usersPageType');
                document.querySelector(usersTypeContShow).classList.remove('hide')
                document.querySelector(usersTypeContShow).classList.add('visible')
                
                //show new manegar btn with manegar cont
                UI.toggleNewManegarBtn(usersTypeContShow)
                
            });
        }

        //open the relative page (contest-details)
        var tableShowIcons = elements.tableShowIcons
        for(var tableShowIcon of tableShowIcons) {
            tableShowIcon.addEventListener('click', function(e) {
                UI.openRelativePage(e)
            });
        }
        
        //change img in modal addNew and Adjust Maneger page
        var manegerModalInpFiles = elements.manegerModalInpFiles
        for(var manegerModalInpFile of manegerModalInpFiles) {
            manegerModalInpFile.addEventListener('change', function(event) {
                if(event.target.closest('.modal-newManegar .inpFile')) {
                    var file = this.files[0];
                    if(file) {
                        var imgUrl = URL.createObjectURL(event.target.files[0]);
                        UI.hidePersonImg(elements.addManegerImgDefult)
                        UI.showPersonImg(elements.addManegerImgChange)
                        elements.addManegerImgChange.setAttribute('src', imgUrl);
                    } else {
                        UI.showPersonImg(elements.addManegerImgDefult)
                        UI.hidePersonImg(elements.addManegerImgChange)
                        elements.addManegerImgChange.setAttribute('src', '');
                    }
                }
                if(event.target.closest('.modal-adjustManeger .inpFile')) {
                    var file = this.files[0];
                    if(file) {
                        var imgUrl = URL.createObjectURL(event.target.files[0]);
                        UI.hidePersonImg(elements.adjustManegerImgDefult)
                        UI.showPersonImg(elements.adjustManegerImgChange)
                        elements.adjustManegerImgChange.setAttribute('src', imgUrl);
                    } else {
                        UI.showPersonImg(elements.adjustManegerImgDefult)
                        UI.hidePersonImg(elements.adjustManegerImgChange)
                        elements.adjustManegerImgChange.setAttribute('src', '');
                    }
                }
                
            });
        }

        
        //toggle active state for contests table rows
        var tableBodys = elements.tableBodys
        for(var tableBody of tableBodys) {
            tableBody.addEventListener('click', function(e) {
                UI.toggleRowActiveState(e)
            });
        }
        
    }
    

})(UICtrl);