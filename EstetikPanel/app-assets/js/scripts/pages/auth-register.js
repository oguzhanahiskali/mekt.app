/*=========================================================================================
  File Name: auth-register.js
  Description: Auth register js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  ('use strict');

  var assetsPath = '../../../app-assets/',
    registerMultiStepsWizard = document.querySelector('.register-multi-steps-wizard'),
    pageResetForm = $('.auth-register-form'),
    select = $('.select2'),
    creditCard = $('.credit-card-mask'),
    expiryDateMask = $('.expiry-date-mask'),
    cvvMask = $('.cvv-code-mask'),
    mobileNumberMask = $('.mobile-number-mask'),
    pinCodeMask = $('.pin-code-mask');

  if ($('body').attr('data-framework') === 'laravel') {
    assetsPath = $('body').attr('data-asset-path');
  }

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetForm.length) {
    pageResetForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'register-username': {
          required: true
        },
        'register-email': {
          required: true,
          email: true
        },
        'register-password': {
          required: true
        }
      }
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------
  $.validator.addMethod("notOnlyZero", function (value, element, param) {
      return this.optional(element) || value != '0';
  });
  // Horizontal Wizard
  if (typeof registerMultiStepsWizard !== undefined && registerMultiStepsWizard !== null) {
    var numberedStepper = new Stepper(registerMultiStepsWizard),
      $form = $(registerMultiStepsWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          username: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true,
            minlength: 8
          },
          'confirm-password': {
            required: true,
            minlength: 8,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'home-address': {
            required: true
          },
          'companyName': {
            required: true
          },
          'Iller': {min:1},
          'Ilceler': {
            notOnlyZero: '0'
          },
          'activeUser': {
            notOnlyZero: '0'
          },
          'totalUser': {
            notOnlyZero: '0'
          },
          'numberOfRooms': {
            notOnlyZero: '0'
          },
          'company-address': {
            required: true
          },
          addCard: {
            required: true
          }
        },
        messages: {
          password: {
            required: 'Enter new password',
            minlength: 'Enter at least 8 characters'
          },
          'confirm-password': {
            required: 'Please confirm new password',
            minlength: 'Enter at least 8 characters',
            equalTo: 'The password and its confirm are not the same'
          },
          'Iller': { min: "İl seçiniz" },
          'Ilceler': { notOnlyZero: "İlçe seçiniz" },
          'totalUser': { notOnlyZero: "Çalışan Sayısı Belirtiniz" },
          'activeUser': { notOnlyZero: "Kullanıcı Sayısı Belirtiniz" },
          'numberOfRooms': { notOnlyZero: "Oda Sayısı Belirtiniz" },
        },
      });
    });

    $(registerMultiStepsWizard).find('.btn-next').each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) { numberedStepper.next(); }
          else { e.preventDefault();
          }
        });
      });

    $(registerMultiStepsWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(registerMultiStepsWizard)
      .find('.btn-submit')
      .on('click', function () {
        
          var isValid = $(this).parent().siblings('form').valid();
          var PN1 = $('#pin-code1').val();
          var PN2 = $('#pin-code2').val();
          var PN3 = $('#pin-code3').val();
          var PN4 = $('#pin-code4').val();
          if(PN1!='' && PN2!='' && PN3!='' && PN4!=''){
              var PhoneNumber = $('#mobile-number').val().replace(/\s/g, '');
              $('#verify-code').val(PN1+PN2+PN3+PN4);
              $.ajax({
                  type: "POST",
                  url: "/api/app-sms/register/code-validation.php",
                  data: ({Phone: PhoneNumber,VerificationCode: PN1+PN2+PN3+PN4}),
                  success: function(res) {
                      var obj = JSON.parse(res);
                      if(obj['status']==true){
                          toastr['success']('Doğrulama kodu başarıyla onaylandı.', 'Doğrulama Başarılı', { closeButton: true, tapToDismiss: false, progressBar: true,positionClass: 'toast-bottom-right'});
                          $('.btn-next-success').prop('disabled', false);
                          
                          if (isValid) {
                            $.ajax({
                              type: "POST",
                              url: "/api/register/new-register.php",
                              data: $form.serialize(),
                              success: function(res) {
                                console.log(res);
                                  var obj = JSON.parse(res);
                                  if(obj['status']==true){
                                      toastr['success'](PhoneNumber+' numaralı telefona erişim bilgileriniz gönderildi. Giriş Paneline yönlendiriliyorsunuz...', 'Başvurunuz onayladnı! 🎉', { closeButton: true, tapToDismiss: false, progressBar: true, positionClass: 'toast-bottom-right' });
                                      setTimeout(function(){ window.location = 'https://estetik.app/'; }, 1500);
                                  }
                              }
                            });
                          }
                      }else if(obj['status']==false){
                          toastr['warning']('Girilen kod numarası hatalı Lütfen kontrol edip tekrar deneyiniz.', 'Doğrulama başarısız', { closeButton: true, tapToDismiss: false, progressBar: true, positionClass: 'toast-bottom-right'});
                          $('.btn-next-success').prop('disabled', true);
                      }
                  }
              });
          }
      });
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // credit card

  // Credit Card
  // if (creditCard.length) {
  //   creditCard.each(function () {
  //     new Cleave($(this), {
  //       creditCard: true,
  //       onCreditCardTypeChanged: function (type) {
  //         const elementNodeList = document.querySelectorAll('.card-type');
  //         if (type != '' && type != 'unknown') {
  //           //! we accept this approach for multiple credit card masking
  //           for (let i = 0; i < elementNodeList.length; i++) {
  //             elementNodeList[i].innerHTML =
  //               '<img src="' + assetsPath + 'images/icons/payments/' + type + '-cc.png" height="24"/>';
  //           }
  //         } else {
  //           for (let i = 0; i < elementNodeList.length; i++) {
  //             elementNodeList[i].innerHTML = '';
  //           }
  //         }
  //       }
  //     });
  //   });
  // }

  // Expiry Date Mask
  // if (expiryDateMask.length) {
  //   new Cleave(expiryDateMask, {
  //     date: true,
  //     delimiter: '/',
  //     datePattern: ['m', 'y']
  //   });
  // }

  // // CVV
  // if (cvvMask.length) {
  //   new Cleave(cvvMask, {
  //     numeral: true,
  //     numeralPositiveOnly: true
  //   });
  // }

  // phone number mask
  if (mobileNumberMask.length) {
    new Cleave(mobileNumberMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // Pincode
  if (pinCodeMask.length) {
    new Cleave(pinCodeMask, {
      delimiter: '',
      numeral: true
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------
});
