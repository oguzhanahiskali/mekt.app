var wto;
//$('.actions').css('display','none');
var arrayEkle = [];
var eachFiyat = 0;
var eachTotalFiyat = 0;
var anafiyat = 0;
var babafiyat = 0;
var EkFiyat = 0;
var EkFiyatRes = 0;

var SeansAdi = null;
var SeansIDsi = null;

var taksitSayisi=[{id:1,text:"Taksit Yok"},{id:2,text:"2 Taksit"},{id:3,text:"3 Taksit"},{id:4,text:"4 Taksit"},{id:5,text:"5 Taksit"},{id:6,text:"6 Taksit"},{id:7,text:"7 Taksit"},{id:8,text:"8 Taksit"},{id:9,text:"9 Taksit"},{id:10,text:"10 Taksit"},{id:11,text:"11 Taksit"},{id:12,text:"12 Taksit"},{id:13,text:"13 Taksit"},{id:14,text:"14 Taksit"},{id:15,text:"15 Taksit"},{id:16,text:"16 Taksit"},{id:17,text:"17 Taksit"},{id:18,text:"18 Taksit"},{id:19,text:"19 Taksit"},{id:20,text:"20 Taksit"},{id:21,text:"21 Taksit"},{id:22,text:"22 Taksit"},{id:23,text:"23 Taksit"},{id:24,text:"24 Taksit"}];

function taksitDegistir(e) {
	$('#taksitsayisiDiv').empty();
	$('#taksitsayisiDiv').append('<input type="number" class="form-control required" id="taksitsayisi" min="1" max="12" placeholder="Taksit Sayısı" aria-label="" name="taksitsayisi" aria-invalid="false">');
	$("#taksitsayisi").select2({
		allowClear: true,
		placeholder: 'Seçiniz',
		data: taksitSayisi
	});
	$('#taksitsayisi').val(e).trigger('change');
}
$("#dogumtarihi").change(function(e) {
	var vals = e.target.value.split('-');
	var year = vals[0];
	var month = vals[1];
	var day = vals[2];
	$("#dob").val(year);
	//console.log("dogumyilihesapla function girildi");
});

function hesaps() {
	if (($('#ad').val().length > 0) && ($('#soyad').val().length > 0) && ($('#tckimlikno').val().length > 0) && ($('#dogumyili').val() != "")) {
		$.get("nvi.php", $(".form-group").find("input").serialize(), function(data) {
			if (data == "TC Kimlik Numarası Geçerli") {
				toastr.success("Kimlik bilgileri başarıyla doğrulandı!");
				$('.actions').css('display', 'block');
			} else {
				toastr.error('Kimlik bilgileri hatalı!');
				$('.actions').css('display', 'none');
			}
		});
		//console.log("dogumyili hesaplandi");
	}
}
$('#ad').change(function() {
	if ($('#dogumyili').val() != "") {
		hesaps();
	}
});

$('#soyad').change(function() {
	if ($('#dogumyili').val() != "") {
		hesaps();
	}
});

$('#tckimlikno').change(function() {

	if ($('#dogumtarihi').val() != "") {
		hesaps();
	}
});

$('#dogumtarihi').change(function() {

	clearTimeout(wto);
	wto = setTimeout(function() {
		hesaps();
	}, 3000);

});
$('#select2estetisyen').select2({
	allowClear: true,
	placeholder: 'Seçiniz',
	ajax: {
		url: '/api/ajaxEstetisyen.php',
		dataType: 'json',
		delay: 250,
		processResults: function(data) {
			return {
				results: data
			};
		},
		cache: true
	}
});
$('#select2hizmet').select2({
	allowClear: true,
	placeholder: 'Seçiniz',
	ajax: {
		url: '/api/ajaxHizmet.php',
		dataType: 'json',
		delay: 250,
		processResults: function(data) {
			return {
				results: data.Services
			};
		},
		success: function(result) {},
		cache: true
	}
});
$('#select2seans').select2({
	allowClear: true,
	placeholder: 'Seçiniz',
	ajax: {
		url: '/api/ajaxSeans.php',
		dataType: 'json',
		delay: 250,
		processResults: function(data) {
			return {
				results: data
			};
		},
		success: function(result) {
		},
		cache: true
	}
}).on("select2:selecting", function (e) {
	if(SeansIDsi!=null){
		if(SeansIDsi==e.params.args.data.id){
			console.log('değişim olmadı');
		}else{
			console.log('değişti !!!!');
			Swal.fire({
				icon: 'warning',
				title: 'Lütfen Öngörülebilir Seans Adeti belirleyiniz',
				html: `<input type="number" id="login" class="swal2-input" name="loginss" placeholder="Seans Sayısı">`,
				confirmButtonText: 'Kaydet',
				focusConfirm: false,
				preConfirm: () => {
				  const login = Swal.getPopup().querySelector('#login').value
				  callbackONG(login);
				}
			  }).then((result) => {
				// Swal.fire(`
				//   Login: ${result.value.login}
				//   Password: ${result.value.password}
				// `.trim())
			  })
			// Swal.fire({
			// 	icon: 'warning',
			// 	title: 'Lütfen Öngörülebilir Seans Adeti belirleyiniz',
			// 	input: 'text',
			// 	inputAttributes: {
			// 	  autocapitalize: 'off'
			// 	},
			// 	showCancelButton: true,
			// 	confirmButtonText: 'Look up',
			// 	showLoaderOnConfirm: true,
			// 	preConfirm: (login) => {
			// 	  return fetch(`//api.github.com/users/${login}`)
			// 		.then(response => {
			// 		  if (!response.ok) {
			// 			throw new Error(response.statusText)
			// 		  }
			// 		  return response.json()
			// 		})
			// 		.catch(error => {
			// 		  Swal.showValidationMessage(
			// 			`Request failed: ${error}`
			// 		  )
			// 		})
			// 	},
			// 	allowOutsideClick: () => !Swal.isLoading()
			//   }).then((result) => {
			// 	if (result.isConfirmed) {
			// 	  Swal.fire({
			// 		title: `${result.value.login}'s avatar`,
			// 		imageUrl: result.value.avatar_url
			// 	  })
			// 	}
			//   })
			  
		}
	}
});
// var $eventSelect = $("#select2seans");

// $eventSelect.select2();

// $eventSelect.on("select2:selecting", function (e) { console.log("select2:open", e); });

$('#select2sure').select2({
	allowClear: true,
	placeholder: 'Seçiniz',
	ajax: {
		url: '/api/ajaxSure.php',
		dataType: 'json',
		delay: 250,
		processResults: function(data) {
			return {
				results: data
			};
		},
		success: function(result) {

		},
		cache: true
	}
});
$('#taksitsayisi').on('select2:select', function(e) {
	$("#odemeturu").select2("open");
});
// <option value="">Döviz?</option>
// <option value="TRY">TRY</option>
// <option value="USD">USD</option>
// <option value="EUR">EUR</option>
// <option value="GBP">GBP</option>

var AllCurrency = {
	null: "Döviz ?",
	TRY: "TRY",
	FREE: "HEDİYE",
	// USD: "USD",
	// EUR: "EUR",
	// GBP: "GBP"
};
$.each(AllCurrency, function(key, value) {
	$('#inp-currency').append('<option value=' + key + '>' + value + '</option>');
	$('#inp-receive-currency').append('<option value=' + key + '>' + value + '</option>');
});

$("#inp-currency").on('change', function() {
	var value = $(this).val();
	if (value != null) {
		$("#inp-receive-currency").prop('selectedIndex', 0);
		$("#inp-receive-currency").val(value).trigger("change");
		$(`#inp-receive-currency option[value=` + value + `]`).attr('selected', 'selected');
		if(value == 'FREE'){
			taksitDegistir(1);
			$('#taksitsayisi').prop( "disabled", true );
			$('#fiyat').val(0).prop( "disabled", true );
			$('#odeme').val(0).prop( "disabled", true );
		}else{
			$('#fiyat').prop( "disabled", false );
			$('#odeme').prop( "disabled", false );
			$('#taksitsayisi').prop( "disabled", false );

		}
	}
});

$('#select2hizmet').on('select2:select', function(e) {
	var data = e.params.data;

	var strSeans = data["seans"];
	var strSure = data["sure"];
	var strFiyat = data["fiyat"];
	var strCurrency = data["currency"];

	SeansAdi = strSeans.text;
	SeansIDsi = strSeans.id;

	anafiyat = parseInt(strFiyat);
	babafiyat = parseInt(strFiyat);

	var selectOptionSure = new Option(strSure.text);
	var selectOptionSeans = new Option(strSeans);

	$("#inp-currency").prop('selectedIndex', 0);
	$("#inp-currency").val(strCurrency).trigger("change");
	$(`#inp-currency option[value=` + strCurrency + `]`).attr('selected', 'selected');
	$( "#select2seans" ).prop( "disabled", false );

	if ($('#select2seans').find("option[value='" + strSeans.id + "']").length) {
		$('#select2seans').val(strSeans.id).trigger('change');
	} else {
		var newOption = new Option(strSeans.text, strSeans.id, true, true);
		$('#select2seans').append(newOption).trigger('change');
		//$('#select2-select2seans-container').css('background-color','orange');
	}

	if ($('#select2sure').find("option[value='" + strSure.id + "']").length) {
		$('#select2sure').val(strSure.id).trigger('change');
	} else {
		var newOption = new Option(strSure.text, strSure.id, true, true);
		$('#select2sure').append(newOption).trigger('change');
	}

	setInterval(function() {
		//$('#select2-select2seans-container').css('background-color','white');
		$('#select2-select2seans-container').css('color', 'orange');
		$('#select2-select2seans-container').css('font-weight', 'bolder');
		$("#select2-select2seans-container").fadeOut(50).fadeIn(1000);
	}, 3000);
	setInterval(function() {
		//$('#select2-select2seans-container').css('background-color','white');
		$('#select2-select2sure-container').css('color', 'orange');
		$('#select2-select2sure-container').css('font-weight', 'bolder');
		$("#select2-select2sure-container").fadeOut(50).fadeIn(1000);
	}, 3000);
	setInterval(function() {
		//$('#select2-select2seans-container').css('background-color','white');
		$('#fiyat').css('color', 'orange');
		$('#fiyat').css('font-weight', 'bolder');
		$("#fiyat").fadeOut(50).fadeIn(1000);
	}, 3000);
	//$('#select2sure').append(selectOptionSure).trigger('change'); 

	//$('#select2sure').val(strSure.id).trigger('change'); // Notify any JS components that the value changed

	//$('#select2sure').append(selectOptionSure).trigger('change');

	//$('#select2seans').append(selectOptionSeans).trigger('change');
	$("#fiyat").val(parseInt(strFiyat));

	//var seanssayisi = strSeans.split(" ",1);
	$("#gunfarki").val(30); //sabit seans fark (statik veri)
	//$("#taksitsayisi").val(seanssayisi);
	//hizmethesapla();
	$("#hizmetBolgesi").select2("open");
});

$("#fiyat").keyup(function() {
	if ($('#fiyat').val() > 0) {
		console.log("hizmet fiyatı sıfırdan büyük");
	} else {
		console.log("hizmet fiyatı 0 olarak belirtildi");
		hizmethesapla();
	}
	hizmethesapla();
});
$("#odeme").keyup(function() {
	hizmethesapla();
});

$("#taksitsayisi").keyup(function() {
	hizmethesapla();
});

$("#iskonto").keyup(function() {
	var hizmetfiyat = parseInt($("#fiyat").val());
	var hizmetodeme = parseInt($("#odeme").val());
	var iskonto = parseInt($("#iskonto").val());

	var iskontoHesap = hizmetfiyat - (hizmetfiyat / 100) * iskonto;
	$("#iskonto2").val(iskontoHesap);
	hizmethesapla();
});

function hizmethesapla() {
	console.log('hesaplama başlatıldı.');
	var hizmetfiyat = parseInt($("#fiyat").val());
	var hizmetodeme = parseInt($("#odeme").val());
	var iskonto = parseInt($("#iskonto").val());

	clearTimeout(wto);
	wto = setTimeout(function() {

		if (!hizmetfiyat) {
			$("#fiyat").val(0);
			$("#kalan").val(0);
			return;
		}
		if (!hizmetodeme) {
			$("#kalan").val(0);
			$("#odeme").val(0);
			return;
		}

		var kalan = hizmetfiyat - hizmetodeme;
		var yuzdeOn = kalan / hizmetfiyat * 100;

		if (hizmetodeme > hizmetfiyat) {
			$("#kalan").val(0);
			alert('Girilen ödeme Hizmet fiyatından fazla olamaz!');
			$("#kalan").val(0);
			$("#odeme").val(0);
			$("#odeme").attr({
				"max": hizmetfiyat,
				"min": 0
			});
		} else {
			$("#kalan").val(kalan);
			if (kalan == "0" && $("#taksitsayisi").val() !== "1") {
				$("#odeme").attr({
					"max": hizmetfiyat,
					"min": 0
				});
				taksitDegistir(1);
			}
			//alert('Ödemenin tamamı alındığı için Taksit sayısı 1 olarak güncellendi.');
		}

		if (yuzdeOn == 10) {
			if ($("#taksitsayisi").val() > 1) {
				alert("Kalan ödeme Toplam ödemenin %10'una eşit olduğu için taksit sayısı 2 olarak güncellendi..");
				//$("#taksitsayisi").val(2);
				taksitDegistir(2);
				//console.log('else 2 takist olarak güncellendi');
			}
		}

		if (kalan > 0 && $("#taksitsayisi").val() < 2) {
			Swal.fire({
				showConfirmButton: true,
				confirmButtonText: 'Peki',
				title: 'Taksit sayısı belirtmedin',
				text: '"Alınan Ödeme" miktarı "Toplam Hizmet" fiyatından daha az olduğu için müşteri borçlu durumdadır. Taksit sayısını (en az 2) olarak otomatik belirlenmiştir. Eğer istersen vade sayısını dilediğin gibi uzatabilirsin.',
				icon: 'warning'
			});
			taksitDegistir(2);
		}
	}, 2000);


};
$(document).ready(function() {
	var odemeturu = [{
			id: 1,
			text: 'Nakit'
		},
		{
			id: 2,
			text: 'Havale / EFT'
		},
		{
			id: 3,
			text: 'Kredi Kartı'
		}
	];
	$("#odemeturu").select2({
		allowClear: true,
		placeholder: 'Seçiniz',
		data: odemeturu
	});
	$("#taksitsayisi").select2({
		allowClear: true,
		placeholder: 'Seçiniz',
		data: taksitSayisi
	}).on('change', function(e) {
		// Access to full data
		if ($('#taksitsayisi').select2('val') == "") {
			$('#ilkOdeme').html('Ödeme Girin :<span class="danger">*</span>');
		} else {
			if ($('#taksitsayisi').select2('data')[0].id == 1) {
				$('#ilkOdeme').html('Ödeme Girin :<span class="danger">*</span>');
			} else {
				$('#ilkOdeme').html('Ödeme Girin (İlk Taksit) :<span class="danger">*</span>');
			}
		}
	});
	$("#odeme").change(function() {
		if ($(this).val() == 0) {
			Swal.fire({
				title: 'Bir ödeme almadın',
				text: "Bu işleme ödeme almadan devam etmek istediğine emin misin?",
				icon: 'warning',
				allowOutsideClick: false,
				showCancelButton: true,
				confirmButtonColor: '#ff8510',
				cancelButtonColor: '#1f9d57',
				confirmButtonText: 'Eminim, daha sonra ödeme alacağım',
				cancelButtonText: 'Hayır, hemen ödeme gireceğim'
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire({
						allowOutsideClick: false,
						title: 'Şimdilik ücret alınmadı',
						text: 'Ödemeyi daha sonra alacağını umuyorum.',
						icon: 'success'
					});
				} else {
					Swal.fire({
						allowOutsideClick: false,
						showConfirmButton: false,
						title: 'Hadi hakkımızı alalım',
						text: 'Boşuna mı çalışıyoruz :)',
						icon: 'success',
						timer: 1200
					});
					$("#odeme").focus();
				}
			})
		} else {
			console.log('Thanks');
		}
	});

	$('#hizmetBolgesi').select2({
		placeholder: 'Hizmet Belirleyiniz.'
	});
	$('#hizmetBolgesi').on("select2:unselect", function(e) {
		var datas = e.params.data;
		var SilinenID = datas.id;
		// var SilinenIDSure = datas.sure.time;
		EkFiyat = 0;

		var val = $(this).val();

		eachFiyat = 0;
		arrayEkle = [];
		//$("#fiyat").val(babafiyat);
		//console.log('Ek hizmet Silindi, Güncel Ana Fiyat'+anafiyat);


		//console.log(val);
		//anafiyat -= parseInt(strrFiyat);



		// $.each( val, function( key, value ) {
		// 	$.ajax({
		// 		type: 'get',
		// 		url: '/api/ajaxHizmetBolge.php?id='+value,
		// 		success: function(data) {

		// 			var returnedData = JSON.parse(data);

		// 			var strSure     = returnedData[0]['sure'];
		// 			var strrFiyat    = returnedData[0]['fiyat'];

		// 			//console.clear();
		// 			arrayEkle.push(strrFiyat);

		// 			eachFiyat += strrFiyat;

		// 			eachTotalFiyat = eachFiyat / 2;
		// 			console.log('Ek Tüm Fiyat: '+eachTotalFiyat);
		// 			toastr.remove();
		// 			toastr.success('Güncel Fiyat: '+ parseInt(anafiyat));
		// 			$('#fiyat').val(parseInt(anafiyat));
		// 			var hizmetFiyats = $('#fiyat').val();
		// 			console.log('test');
		// 			var toplabakam = parseInt(hizmetFiyats)+parseInt(eachTotalFiyat)
		// 			console.log(hizmetFiyats);
		// 			console.log(eachTotalFiyat);
		// 			console.log('test');
		// 			if(strrFiyat==null){
		// 				toastr.success('111 Have fun storming the castle!', 'Miracle Max Says');
		// 				$('#fiyat').val(parseInt(anafiyat));
		// 				console.log('if girdi');
		// 			}else{

		// 				//$('#fiyat').val(parseInt(anafiyat));
		// 				toastr.remove();
		// 				toastr.success('Güncel Fiyat: '+ parseInt(toplabakam));
		// 				$('#fiyat').val(parseInt(toplabakam));

		// 				console.log('else girdi');
		// 			}
		// 			/*
		// 			if ($('#select2sure').find("option[value='" + strSure.id + "']").length) {
		// 				$('#select2sure').val(strSure.id).trigger('change');
		// 			} else { 
		// 				var newOption = new Option(strSure.text, strSure.id, true, true);
		// 				$('#select2sure').append(newOption).trigger('change');
		// 			} */
		// 		}
		// 	});
		// });

	});
	$('#select2hizmet').on('change', function(e) {
		$('#hizmetBolgesi').select2().val(null);
		$('#hizmetBolgesi').select2({
			allowClear: true,
			multiple: true,
			placeholder: 'Hizmet Bölgesi Seçin',
			ajax: {
				url: '/api/ajaxHizmet.php',
				dataType: 'json',
				delay: 250,
				data: function(params) {
					var queryParameters = {
						areaFilter: params.term
					}

					return queryParameters;
				},
				processResults: function(data) {
					$.each(data.Services, function(index, value) {
						var valueID = JSON.stringify(value.id);
						var SelID = e.currentTarget.value;
						if (valueID == SelID) {
							callback(data.Services[index].regions);
						}
					});
					return {
						results: return_first
					};
				},
				cache: true
			}
		});
	});
	$('#hizmetBolgesi').on("change", function() {

		$("#hizmetBolgesi").on("select2-removed", function(e) {
			alert('testttt');
		});
		var val = $(this).val();

		var strrFiyat = 0;


		SumFiyat = 0;
		SumSure = 0;
		// console.clear();
		if ($('#hizmetBolgesi').val() == "") {
			toastr.remove();
			toastr.success('Tüm bölgeler sıfırlandığı için Fiyat Normale döndü.');
			$('#fiyat').val(parseInt(anafiyat));
		}

		eachFiyat = 0;
		arrayEkle = [];



		$.each(val, function(key, value) {

			// $.ajax({
			// 	type: 'get',
			// 	url: '/api/ajaxHizmetBolge.php?id='+value,
			// 	success: function(data) {

			// 		var returnedData = JSON.parse(data);

			// 		var strHizmet     = returnedData[0]['text'];
			// 		var strSure     = returnedData[0]['sure'];
			// 		var strrFiyat    = returnedData[0]['fiyat'];
			// 		console.log(strHizmet+' '+ strrFiyat);

			// 		arrayEkle.push(strrFiyat);

			// 		eachFiyat += strrFiyat;

			// 		console.log('Ek Tüm Fiyat: '+eachFiyat);
			// 		$('#fiyat').val(parseInt(anafiyat));
			// 		var hizmetFiyats = $('#fiyat').val();
			// 		var toplala = parseInt(hizmetFiyats)+parseInt(eachFiyat);
			// 		toastr.remove();
			// 		toastr.success('Güncel Fiyat: '+ parseInt(toplala));
			// 		$('#fiyat').val(parseInt(toplala));


			// 		//strrFiyat +=strrFiyat; 
			// 		var selectOptionSure = new Option(strSure);
			// 		/*
			// 		if ($('#select2sure').find("option[value='" + strSure.id + "']").length) {
			// 			$('#select2sure').val(strSure.id).trigger('change');
			// 		} else { 
			// 			var newOption = new Option(strSure.text, strSure.id, true, true);
			// 			$('#select2sure').append(newOption).trigger('change');
			// 		} */
			// 		//console.clear();
			// 		//console.log(SumSure);
			// 		//$("#fiyat").val(SumFiyat);
			// 		/*
			// 		var t = SumSure;
			// 		var h = Math.floor(t/60) ? Math.floor(t/60) +' SAAT' : '';
			// 		var m = t%60 ? t%60 +' DAKİKA' : '';
			// 		var mResult = h && m ? h+' '+m : h+m;
			// 		console.log(mResult);*/

			// 		/*
			// 		if ($('#select2sure').find("option[value='" + SumSure + "']").length) {
			// 			$('#select2sure').val(strSure.id).trigger('change');
			// 		} else { 
			// 			var newOption = new Option(mResult, SumSure, true, true);
			// 			$('#select2sure').append(newOption).trigger('change');
			// 		} */

			// 	}

			// });



			/*
			$.ajax({
				type: 'get',
				url: '/api/ajaxHizmetBolge.php?id='+value,
				data: $('#hastakayit').serialize(),
				success: function(result) {}})

				var data = e.params.data;
				
				var strSure     = data["sure"];
				var strrFiyat    = data["fiyat"];

				anafiyat += parseInt(strrFiyat);

				console.log(anafiyat);

				var selectOptionSure = new Option(strSure);
				$("#fiyat").val(parseInt(anafiyat));

				if ($('#select2sure').find("option[value='" + strSure.id + "']").length) {
					$('#select2sure').val(strSure.id).trigger('change');
				} else { 
					var newOption = new Option(strSure.text, strSure.id, true, true);
					$('#select2sure').append(newOption).trigger('change');
				} 
				*/
		});

	});

	/*
		$('#hizmetBolgesi').on("select2:unselect", function(e) {
			
			console.log('EkFiyat Sonuç tan Ek fiyat çıkarılıyor');
			EkFiyatRes = (parseInt(EkFiyatRes))-(parseInt(EkFiyat));
			console.log('EkFiyat'+EkFiyatRes);

			console.log('anafiyattan '+anafiyat+' - ek fiyat '+ EkFiyatRes +' çıkarılıyor');
			anafiyat = (parseInt(anafiyat)) - (parseInt(EkFiyatRes));
			console.log('AnaFiyat:'+anafiyat);

			$("#fiyat").val(parseInt(anafiyat));

		});

		$('#hizmetBolgesi').on('select2:select', function (e) {

			console.log('selected girdi');

			var val = $(this).val();

			$.each( val, function( key, value ) {
				//alert( value );
				$.ajax({
					type: 'get',
					url: '/api/ajaxHizmetBolge.php?id='+value,
					data: $('#hastakayit').serialize(),
					success: function(result) {}
				})

					var data = e.params.data;
					
					var strSure     = data["sure"];
					var strrFiyat    = data["fiyat"];

					anafiyat += parseInt(strrFiyat);
					EkFiyat += parseInt(strrFiyat);

					var selectOptionSure = new Option(strSure);
					$("#fiyat").val(parseInt(anafiyat));

					if ($('#select2sure').find("option[value='" + strSure.id + "']").length) {
						$('#select2sure').val(strSure.id).trigger('change');
					} else { 
						var newOption = new Option(strSure.text, strSure.id, true, true);
						$('#select2sure').append(newOption).trigger('change');
					} 

					console.log('değişti');

				
			});


		});

	*/


});