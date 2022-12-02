$(document).ready(function () {

  // Renering Icons in Actions column x
  var customIconsHTML = function (params) {
    var usersIcons = document.createElement("span");

    var deleteIconHTML = document.createElement('i');
    deleteIconHTML.title = 'Sil';
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-danger btn-icon btn-relief-danger round mr-50 mb-100 btn-sm waves-effect waves-light feather icon-trash-2"
    attrID.value = params.data.ID
    deleteIconHTML.setAttributeNode(attr);
    deleteIconHTML.setAttributeNode(attrID);

    var EditIconHTML = document.createElement('i');
    EditIconHTML.title = 'Düzenleme İşlemi';
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-success btn-icon btn-relief-success btn-sm round mr-50 mb-100 waves-effect waves-light feather icon-edit"
    attrID.value = params.data.ID
    EditIconHTML.setAttributeNode(attr);
    EditIconHTML.setAttributeNode(attrID);

    
    var JoinIconHTML = document.createElement('i');
    JoinIconHTML.title = 'Davetli Atama İşlemi';
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-primary btn-icon btn-relief-primary btn-sm mr-50 mb-100 waves-effect waves-light feather icon-user-plus"
    attrID.value = params.data.ID
    JoinIconHTML.setAttributeNode(attr);
    JoinIconHTML.setAttributeNode(attrID);

    
    var DetailIconHTML = document.createElement('i');
    DetailIconHTML.title = 'Katılım İşlemi';
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-warning btn-icon btn-relief-warning btn-sm mr-50 mb-100 waves-effect waves-light feather icon-users"
    attrID.value = params.data.ID
    DetailIconHTML.setAttributeNode(attr);
    DetailIconHTML.setAttributeNode(attrID);

    
    var ExportToXLSIconHTML = document.createElement('i');
    ExportToXLSIconHTML.title = 'Excele Aktar';
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-success btn-icon btn-relief-success btn-sm mr-50 mb-100 waves-effect waves-light feather icon-download"
    attrID.value = params.data.ID
    ExportToXLSIconHTML.setAttributeNode(attr);
    ExportToXLSIconHTML.setAttributeNode(attrID);

    DetailIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
      $('#ModalDetails').modal('show');
      $('#myGridJoinList').empty();
      document.getElementById('filter-text-box2').value = '';
      $('#myGridJoinList').attr('data-ids',ids);
      // console.log(document.querySelector('#myGridJoinList').dataset.ids);
      $("footers").html('<script src="app-assets/js/scripts/pages/app-education-edits.js?v='+ids+'"></script>');
    });

    ExportToXLSIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
      window.open(
        'https://panel.dijitalsultanbeyli.com/app-assets/data/export-education-joins?type=group&groupID='+ids,
        '_self'
      );
    });

    EditIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
      $("#add-edit-data").addClass("show");
      $("#overlay-bg-edit").addClass("show");
        $.ajax({
            type: "get",
            url: "/api/ajaxQEducations.php",
            data:{id:ids},
            success: function(res){
                var obj = JSON.parse(res);
                $('#inp-edit-grup-adi').val(obj['GRUP']);
                $('#inp-edit-start').val(moment(obj['START']).format('YYYY-MM-DD[T]HH:mm'));
                $('#inp-edit-finish').val(moment(obj['FINISH']).format('YYYY-MM-DD[T]HH:mm'));
                $('#editID').val(obj['ID']);
            },
            error:function(error)
            { console.log(error); }
        });
    });

    JoinIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
      $('#ModalAdd').modal('show');

        $.ajax({
            type: "POST",
            url: "/api/ajaxQEducation-joins.php",
            data:{id:ids},
            success: function(res) {
              $('input[type=hidden]').remove();
                $('.dual-listbox').empty();

                $('#JoinsList')[0].reset();
                let obj = JSON.parse(res);

                $(".joinGroup").remove();
                $inputPermissionsUserName = $('<input type="hidden" class="joinGroup" name="joinGroup"/>').val(ids);
                $('#JoinsList').append($inputPermissionsUserName);

              //DualListBox Companys
                $ArrPermissionsCompanys= [];
                for (let i = 0; i < obj['Companys'].length; i++) {
                    $shortCompanys = obj['Companys'][i]['ID'];
                    $descriptionCompanys = obj['Companys'][i]['companyTitle'];
                    $selectedCompanys = false;
                    if(obj['Companys'][i]['joinStatus']==true){
                      $selectedCompanys = true;
                      $inputSelectedPermissionCustomers = $('<input type="hidden" class="joinGroup1" name="multipleSirketler[]"/>').val($shortCompanys);
                      $('#JoinsList').append($inputSelectedPermissionCustomers);

                    }
                    $ArrPermissionsCompanys.push({
                        text: $descriptionCompanys,
                        value: $shortCompanys,
                        selected: $selectedCompanys
                    });
                }
                var dualListboxCompanys = new DualListbox('#multipleSirketler', {
                    availableTitle:'Tüm Şirketler',
                    selectedTitle: 'Davet Edilecekler',
                    addButtonText: 'Ekle',
                    removeButtonText: 'Çıkar',
                    addAllButtonText: 'Tümünü Ekle',
                    removeAllButtonText: 'Tümünü Çıkar',
                    searchPlaceholder: 'Şirket Ara',
                    options: $ArrPermissionsCompanys
                });
                dualListboxCompanys.addEventListener('added', function(event){
                    $(".joinGroup1").remove();
                    $('#JoinsList').append($inputPermissionsUserName);
                    $.each( dualListboxCompanys.selected, function( key, value ) {
                        $selectedPermissionsCompanys = dualListboxCompanys.selected[key].dataset.id;
                        $inputSelectedPermissionCompanys = $('<input type="hidden" class="joinGroup1" name="multipleSirketler[]"/>').val($selectedPermissionsCompanys);
                        $('#JoinsList').append($inputSelectedPermissionCompanys);
                    });
                });
                dualListboxCompanys.addEventListener('removed', function(event){
                    $(".joinGroup1").remove();
                    $('#JoinsList').append($inputPermissionsUserName);
                    $.each( dualListboxCompanys.selected, function( key, value ) {
                        $selectedPermissionsCompanys = dualListboxCompanys.selected[key].dataset.id;
                        $inputSelectedPermissionCompanys = $('<input type="hidden" class="joinGroup1" name="multipleSirketler[]"/>').val($selectedPermissionsCompanys);
                        $('#JoinsList').append($inputSelectedPermissionCompanys);
                    });
                });


              //DualListBox Companys
              $ArrPermissionsCustomers= [];
              for (let i = 0; i < obj['Customers'].length; i++) {
                  $shortCustomers = obj['Customers'][i]['ID'];
                  $descriptionCustomers = obj['Customers'][i]['companyTitle'];
                  $selectedCustomers = false;
                  if(obj['Customers'][i]['joinStatus']==true){
                    $selectedCustomers = true;
                    $inputSelectedPermissionCustomers = $('<input type="hidden" class="joinGroup2" name="multipleKisiler[]"/>').val($shortCustomers);
                    $('#JoinsList').append($inputSelectedPermissionCustomers);                  }
                  $ArrPermissionsCustomers.push({
                      text: $descriptionCustomers,
                      value: $shortCustomers,
                      selected: $selectedCustomers
                  });
              }
              var dualListboxCustomers = new DualListbox('#multipleKisiler', {
                  availableTitle:'Tüm Kişiler',
                  selectedTitle: 'Davet Edilecekler',
                  addButtonText: 'Ekle',
                  removeButtonText: 'Çıkar',
                  addAllButtonText: 'Tümünü Ekle',
                  removeAllButtonText: 'Tümünü Çıkar',
                  searchPlaceholder: 'Kişi Ara',
                  options: $ArrPermissionsCustomers
              });
              dualListboxCustomers.addEventListener('added', function(event){
                  $(".joinGroup2").remove();
                  $('#JoinsList').append($inputPermissionsUserName);
                  $.each( dualListboxCustomers.selected, function( key, value ) {
                      $selectedPermissionsCustomers = dualListboxCustomers.selected[key].dataset.id;
                      $inputSelectedPermissionCustomers = $('<input type="hidden" class="joinGroup2" name="multipleKisiler[]"/>').val($selectedPermissionsCustomers);
                      $('#JoinsList').append($inputSelectedPermissionCustomers);
                  });
              });
              dualListboxCustomers.addEventListener('removed', function(event){
                  $(".joinGroup2").remove();
                  $('#JoinsList').append($inputPermissionsUserName);
                  $.each( dualListboxCustomers.selected, function( key, value ) {
                      $selectedPermissionsCustomers = dualListboxCustomers.selected[key].dataset.id;
                      $inputSelectedPermissionCustomers = $('<input type="hidden" class="joinGroup2" name="multipleKisiler[]"/>').val($selectedPermissionsCustomers);
                      $('#JoinsList').append($inputSelectedPermissionCustomers);
                  });
              });


                $( ".dual-listbox__container div:nth-child(1)").css( "width", "100%" );
                $( ".dual-listbox__container div:nth-child(1)").css( "display", "inline-grid" );
                $( ".dual-listbox__container div:nth-child(3)").css( "width", "100%" );
                $( ".dual-listbox__container div:nth-child(3)").css( "display", "inline-grid" );
            }
        });
    });
    if(params.data.Status==1){
      deleteIconHTML.addEventListener("click", function () {
        var ids = $(this).attr("ids");
        
        Swal.fire({
          title: "Cidden",
          html:'Bu hizmeti silmek istediğinize emin misiniz?',
          icon: 'warning',
          width: 600,
          showDenyButton: false,
          showCancelButton: true,
          confirmButtonText: 'Evet',
          cancelButtonText: `Vazgeçtim`,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                  type: "POST",
                  url: "/api/app-educations/delete/group",
                  data: { ids: ids },
                  success: function(res) {
                    res = JSON.parse(res);
                    if (res['status'] == true) {
                      Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Başarıyla silindi',
                        html: 'Sayfa yenileniyor...',
                        showConfirmButton: false,
                        timer: 1500
                      })
                      setInterval(function() {
                        location.reload();
                      }, 1500);
                    

                    }else if(res['status']==false){
                      alert('hata!!!!');
                    }
                  }
                });
            } else {
              alert('hata!!!!');
            }
        });
        // $.ajax({
        //   type: "POST",
        //   url: "/api/delete/app-services/isitposible.php",
        //   data: {
        //       ids: ids
        //   },
        //   success: function(res) {
        //     res = JSON.parse(res)
        //     console.log(res);
        //       if (res['code'] == 1000) {
        //         console.log('okey');
        //       }else if(res['status']==false) {
        //         // swal("Hata!", "Silme esnasında hata oluştu.", "error");
        //         var ServiceCounts = res['serviceCounts'];
        //         Swal.fire({
        //           title: "Bu hizmet silinemez",
        //           html:
        //           'Bu Hizmet <b>'+ServiceCounts+'</b> işlemde kullanılıyor silinemez, ancak gizleyebilirsiniz.<br>Gizlemek istiyor musunuz?',
        //           icon: 'warning',
        //           showDenyButton: false,
        //           showCancelButton: true,
        //           confirmButtonText: 'Evet',
        //           cancelButtonText: `Vazgeçtim`,
        //         }).then((result) => {
        //           if (result.isConfirmed) {
        //             $.ajax({
        //               type: "POST",
        //               url: "/api/delete/app-services/service.php",
        //               data: {
        //                   ids: ids,
        //                   important: true
        //               },
        //               success: function(res) {
        //                 res = JSON.parse(res);
        //                 if (res['status'] == true) {
        //                   Swal.fire({
        //                     position: 'center',
        //                     icon: 'success',
        //                     title: 'Başarıyla gizlendi',
        //                     html: 'Sayfa yenileniyor...',
        //                     showConfirmButton: false,
        //                     timer: 1500
        //                   })
        //                   setInterval(function() {
        //                     location.reload();
        //                   }, 1500);
                        

        //                 }else if(res['status']==false){
        //                   alert('hata!!!!');
        //                 }
        //               }
        //             });
        //             // location.reload();
        //           } else{
        //             Swal.fire('İşlemden vazgeçildi.', '', 'info')
        //             Swal.fire({
        //               position: 'center',
        //               icon: 'info',
        //               title: 'İşlemden vazgeçildi.',
        //               showConfirmButton: false,
        //               timer: 1500
        //             });
        //           }
        //         })
        //       }
        //   }
        // })
      });
      usersIcons.appendChild(EditIconHTML);
      usersIcons.appendChild(JoinIconHTML);
      usersIcons.appendChild(DetailIconHTML);
      usersIcons.appendChild(ExportToXLSIconHTML);
      usersIcons.appendChild(deleteIconHTML);

    }else if(params.data.Status==0){
      usersIcons.appendChild(EditIconHTML);
    }

    return usersIcons
  }

  var columnDefs = [
    {
      headerName: 'Grup',
      width: 222,
      filter: true,
      field: "Group",
      pinned: "left",
      cellRenderer: function(params) {
        return '<a style="font-weight:bolder;"><i class="feather icon-bookmark" style="color:#1dab95"></i> '+ params.data.Group+'</a>'
      }
    },
    {
      headerName: 'Eğitim Adı',
      width: 222,
      field: "Education",
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function(params) {
        return params.data.Education
      }
    },
    {
      headerName: 'Başla',
      width: 155,
      field: "Start",
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function(params) {
        return params.data.Start
      }
    },
    {
      headerName: 'Bitiş',
      width: 155,
      field: "Finish",
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function(params) {
        return params.data.Finish
      }
    },
    {
      headerName: 'Davetli',
      width: 100,
      field: "Invitation",
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function(params) {
        return params.data.Invitation
      }
    },
    {
      headerName: 'Katılım',
      width: 100,
      field: "Join",
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function(params) {
        return params.data.Join
      }
    },
    {
      headerName: 'İşlem Yap',
      width:220,
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: customIconsHTML,
    }
  ];
  
  

  /*** GRID OPTIONS ***/
  var gridOptions = {
    defaultColDef: {
      resizable: false,
      sortable: false,

    },
    columnDefs: columnDefs,
    rowSelection: "multiple",
    floatingFilter: false,
    pagination: true,
    paginationPageSize: 10,
    pivotPanelShow: "always",
    colResizeDefault: "shift",
    animateRows: true,
    
   // onFirstDataRendered: onFirstDataRendered,
   /* onGridSizeChanged: onGridSizeChanged, */
  };

  if (document.getElementById("myGrid")) {
    
    var gridTable = document.getElementById("myGrid");

    agGrid.simpleHttpRequest({
      url: "app-assets/data/app-education-view?edu="+ids
      })
      .then(function (data) {
        gridOptions.api.setRowData(data);
        $('#inp-edit-education-name').val(educationNames);
        $('#educationID').val(ids);
      });

    function updateSearchQuery(val) {
      gridOptions.api.setQuickFilter(val);
    }

    $(".ag-grid-filter").on("keyup", function () {
      updateSearchQuery($(this).val());
    });

    function changePageSize(value) {
      gridOptions.api.paginationSetPageSize(Number(value));
    }

    $(".sort-dropdown .dropdown-item").on("click", function () {
      var $this = $(this);
      changePageSize($this.text());
      $(".filter-btn").text("1 - " + $this.text() + " of 50");
    });

    // $(".ag-grid-export-btn").on("click", function (params) {
    //   gridOptions.api.exportDataAsCsv();
    // });

    new agGrid.Grid(gridTable, gridOptions);
  }
});


$(document).on('click', '#btnEditUpdate', function(){
  if($('#inp-edit-grup-adi').val() && $('#inp-edit-start').val() && $('#inp-edit-finish').val() && $('#editID').val() ){
    $.ajax({
       type: "POST",
       url: "/api/update/app-education/index.php",
       data: $('#FormEditHizmet').serialize(),
       success: function(res) {
        var obj = JSON.parse(res);

            if(obj['code']==1000){                  
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'Başarıyla güncellendi',
                  html: 'Sayfa yenileniyor...',
                  showConfirmButton: false,
                  timer: 785
                })
                setInterval(function() {
                  location.reload();
                }, 785);
            }else if(obj['status']==false){
              toastr.error('Silmeye çalıştığınız bölge seanslar arasında kullanılıyor. Silmek için lütfen önce seansdan kaldırınız.', 'Bu bölge Silinemez!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
              toastr.success('Listeye tekrar eklendi..', 'Bu bölge Silinemez!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });

                var currentRegionValues = $('#hizmetBolgesi').val();
                console.log('currentRegionValues: '+currentRegionValues);

                var resReqireVal = obj['requireID'];

                console.log('resReqireVal: '+resReqireVal);
                $.each( resReqireVal, function( key, val ) {
                  // console.log(val);
                  currentRegionValues.push(val);
                });
              console.log('currentRegionValues: '+currentRegionValues);
                $("#hizmetBolgesi").val(currentRegionValues).trigger("change");
            }
        }
    })
  }else{
    Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
  }  
});

$(document).on('click', '#btnNewGroup', function(){

  if( $('#inp-new-group').val().length >0 && $('#inp-new-start').val().length >0 && $('#inp-new-finish').val().length >0 ){
    $.ajax({
       type: "POST",
       url: "/api/insert/education/new-group",
      //  data: { 'ASD':$('#FormEditHizmet').serializeArray(),'education':ids},
       data: $('#formAddGroup').serializeArray(),
       success: function(res) {
        var obj = JSON.parse(res);
              if(obj[0]['status']==true){   
                location.reload();
                // window.location.href='/app-services';
            }
        }
    })
  }else{
    Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
  }



});