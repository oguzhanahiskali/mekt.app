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
    DetailIconHTML.title = 'Detay İşlemler';
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-warning btn-icon btn-relief-warning btn-sm mr-50 mb-100 waves-effect waves-light feather icon-users"
    attrID.value = params.data.ID
    DetailIconHTML.setAttributeNode(attr);
    DetailIconHTML.setAttributeNode(attrID);

    DetailIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
      $('#ModalDetails').modal('show');
      $('#myGridJoinList').attr('data-ids',ids);

      // window.location.replace("/app-education-edit.php?id="+ids);
      // window.location.href = "/app-education-edit.php?id="+ids;


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


    });
    if(params.data.Status==1){
      deleteIconHTML.addEventListener("click", function () {
        var ids = $(this).attr("ids");
        
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
        //         Swal.fire({
        //           title: "Buna gerçekten min misiniz?",
        //           html:'Bu hizmeti silmek istediğinize emin misiniz?',
        //           icon: 'warning',
        //           width: 600,
        //           showDenyButton: false,
        //           showCancelButton: true,
        //           confirmButtonText: 'Evet',
        //           cancelButtonText: `Vazgeçtim`,
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 $.ajax({
        //                   type: "POST",
        //                   url: "/api/delete/app-services/service.php",
        //                   data: {
        //                       ids: ids,
        //                       important: true
        //                   },
        //                   success: function(res) {
        //                     res = JSON.parse(res);
        //                     if (res['status'] == true) {
        //                       Swal.fire({
        //                         position: 'center',
        //                         icon: 'success',
        //                         title: 'Başarıyla gizlendi',
        //                         html: 'Sayfa yenileniyor...',
        //                         showConfirmButton: false,
        //                         timer: 1500
        //                       })
        //                       setInterval(function() {
        //                         location.reload();
        //                       }, 1500);
                            

        //                     }else if(res['status']==false){
        //                       alert('hata!!!!');
        //                     }
        //                   }
        //                 });
        //             } else {
        //               alert('hata!!!!');
        //             }
        //         });
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
      usersIcons.appendChild(deleteIconHTML);

    }else if(params.data.Status==0){
      usersIcons.appendChild(EditIconHTML);
    }

    return usersIcons
  }
  var columnDefs = [
    {
      headerName: 'Davetli',
      width: 165,
      field: "Group",
      cellRenderer: function(params) {
        return params.data.Group
      }
    },
    {
      field: 'Katılım',
      checkboxSelection: (params) => {
        return !!params.data && params.data.JoinStatus === 'true';
      },
      width:120,
      headerCheckboxSelection: true,
      checkboxSelection: true,
    },
  ]

  var selectedCheckboxWhere = [];
  var selectedCheckboxJoin = [];
  var selectedCheckboxTotal = [];
  /*** GRID OPTIONS ***/
  var gridOptions = {
    defaultColDef: {
      resizable: false,
      sortable: false,
      // flex: 1,
      // minWidth: 100

    },
    rowSelection: 'multiple',
    // suppressRowClickSelection: true,
    onFirstDataRendered: (params) => {
      params.api.forEachNode((node) =>
        node.setSelected(!!node.data && node.data.JoinStatus === true)
      );
    },
    suppressMenuHide: true,
    rowMultiSelectWithClick: true,
    onSelectionChanged: () => {
      var selectedData = gridOptions.api.getSelectedRows();
      // var selectedCheckboxWhere = [];
      selectedCheckboxJoin = [];
      // var selectedCheckboxTotal = [];
      if(selectedData[0]!=undefined){
        selectedCheckboxWhere = {
              Grp : selectedData[0].GroupID,
              Edu: getID
        };
      }
      function isArray(arr) {
        return arr instanceof Array;
      }
      if(selectedData.length>0) {
        $.each( selectedData, function( key, val ) {
          $.each( val, function( k, v ) {
            if(k=='ID'){
              selectedCheckboxJoin.push(v);
            }
          });
        });
      }else{
        selectedCheckboxJoin.push('clear');
      }

    },
    columnDefs: columnDefs,
    floatingFilter: false,
    pagination: true,
    paginationPageSize: 10,
    pivotPanelShow: "never",
    colResizeDefault: "shift",
    animateRows: true,
    
   // onFirstDataRendered: onFirstDataRendered,
   /* onGridSizeChanged: onGridSizeChanged, */
  };
  
  $(document).on('click', '#btnJoins2Update', function(){
    var selectedCheckboxTotal = [];
    selectedCheckboxTotal = {"Where" : selectedCheckboxWhere, "Joins" : selectedCheckboxJoin};
    $.ajax({
      type: "POST",
      url: "/api/update/app-education/view",
      data: selectedCheckboxTotal,
      success: function(result) {
        console.log(result);
        var obj = JSON.parse(result);
        if(obj['code']==1000){
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Başarıyla güncellendi',
            html: 'Sayfa yenileniyor...',
            showConfirmButton: false,
            timer: 785
          })
          location.reload();
          // toastr['success']('Başarıyla güncellendi.', 'Başarılı', {
          //     closeButton: true,
          //     tapToDismiss: false,
          //     progressBar: true,
          //     positionClass: 'toast-top-right'
          // });

        }
          // if(result=="basarili"){
          //     location.reload();
          //     window.location.href='/app-services';
          // }
      }
    })
  });

  if (document.getElementById("myGridJoinList")) {
    
    var gridTable = document.getElementById("myGridJoinList");

    var dataSetIDS;
    if(document.querySelector('#myGridJoinList').dataset.ids!=undefined){
      dataSetIDS = document.querySelector('#myGridJoinList').dataset.ids;
    }else{
      dataSetIDS = null;
    }

    selectedCheckboxWhere.length = 0;
    selectedCheckboxJoin.length = 0;
    selectedCheckboxTotal.length = 0;
    agGrid.simpleHttpRequest({
      url: "app-assets/data/app-education-edits?edu="+dataSetIDS
      })
      .then(function (data) {
        gridOptions.api.setRowData(data);
        $('#inp-edit-education-name').val(data[0]['Education']);
        $('#educationID').val(data[0]['EducationID']);
      });

      
    //   var counts = 0;
    //   var asd = setInterval(function() {
    //       counts++;
    //       console.log('Counts: '+counts);
    //       $("input[type='checkbox']").change( function() {
    //           var statuss = null;
    //           if($(this).is(":checked")) {
    //               statuss = true;
    //           }else{
    //               statuss = false;
    //           }

    //           // console.log('--------------');
    //           // console.log('Status: '+statuss);
    //           // console.log('JoinID: '+$(this).attr("data-ids"));
    //           // console.log('EducationID: '+getID);
    //           // console.log('GroupID: '+dataSetIDS);
    //           // console.log('--------------');
              
    //           $.ajax({
    //             type: "POST",
    //             url: "/api/update/app-education/view",
    //             data: {
    //               'Status':statuss,
    //               'IDjoin':$(this).attr("data-ids"),
    //               'GroupID':dataSetIDS
    //             },
    //             success: function(result) {
    //               // console.log(result);
    //               var obj = JSON.parse(result);
    //               if(obj['code']==1000){
    //                 console.log('test');
    //                 // Swal.fire({
    //                 //   position: 'center',
    //                 //   icon: 'success',
    //                 //   title: 'Başarıyla güncellendi',
    //                 //   html: 'Sayfa yenileniyor...',
    //                 //   showConfirmButton: false,
    //                 //   timer: 785
    //                 // })
    //                 toastr['success']('Başarıyla güncellendi.', 'Başarılı', {
    //                     closeButton: true,
    //                     tapToDismiss: false,
    //                     progressBar: true,
    //                     positionClass: 'toast-top-right'
    //                 });

    //               }
    //                 // if(result=="basarili"){
    //                 //     location.reload();
    //                 //     window.location.href='/app-services';
    //                 // }
    //             }
    //           })

    //       });
    //       if(counts==1){
    //           console.log('counts durdu');
    //           clearInterval(asd);
    //       }
    //   }, 1000);
    //   $("input[type='checkbox']").change( function() {
    //     console.log('its change!');
    //     var statuss = null;
    //     if($(this).is(":checked")) {
    //         statuss = true;
    //     }else{
    //         statuss = false;
    //     }
    // });
    function updateSearchQuery(val) {
      gridOptions.api.setQuickFilter(val);
    }

    $(".ag-grid-detail-filter").on("keyup", function () {
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

    $(".ag-grid-export-btn").on("click", function (params) {
      gridOptions.api.exportDataAsCsv();
    });

    new agGrid.Grid(gridTable, gridOptions);
  }
});
