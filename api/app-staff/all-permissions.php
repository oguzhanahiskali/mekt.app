<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
    $json = [];
    $json['Permissions'] = [
        'CIRO_DKM'=> 'Ciro Dökümü',
        'PROFIL_ISLM' => 'Profil İşlem Yetkisi',
        'RAND_TAKV'=>'Randevu Takvimi',
        'TAKV_SAAT_EKL'=>'Randevu Saat Seans Tanımla',
        'ODME_TAKV'=>'Ödeme Takvimi',
        'ESTE_TAKV'=>'Estetisyene Göre Takvim',
        'ESTE_KEND_GORS'=>'Estetisyen Kendi Müşterileri Dışında Görmesin',
        'MUSTR_LIST'=>'Müşteri Listele',
        'MUSTR_EKL'=>'Müşteri Ekle',
        'MUSTR_HZMT_EKL'=>'Müşteri Hizmet Ekle',
        'MUSTR_HZMT_SEANS_LST'=>'Müşteri Hizmet Seans Listele',
        'MUSTR_HZMT_SEANS_ISLM'=>'Müşteri Hizmet Seans İşlem Yap / Seans Ekle',
        'MUSTR_HZMT_TKST_LST'=>'Müşteri Hizmet Taksit Listele',
        'MUSTR_HZMT_TKST_ISLM'=>'Müşteri Hizmet Taksit İşlem Yap',
        'ODME_SYF'=>'Alacaklar / Ödemeler',
        'HRCMLR_LST'=>'Harcamalar Listele',
        'HRCMLR_ISLM'=>'Harcamalar Ekle / Düzenle',
        'HZMT_LST'=>'Hizmetler Listele',
        'HZMT_ISLM'=>'Hizmetler Ekle / Düzenle',
        'HZMT_TNM_ISLM'=>'Hizmet Tanımlamaları Ekle / Düzenle',
        'YKLSN_RAND'=>'Yaklaşan Randevular',
        'YPN_SON_HRCMLR'=>'Yapılan Son Harcamalar',
        'ALCK_HTRLT'=>'Alacak Hatırlatmaları',
        'SON_6AY_GLR_GRFK'=>'Son 6 Ay Gelir / Gider Grafiği',
        'PRYDK_HRCM_GRFK'=>'Periyodik Harcama Grafiği',
        'ESTE_SYS'=>'Estetisyen Sayısı',
        'MSTR_SYS'=>'Müşteri Sayısı',
        'AYLK_GLR'=>'Aylık Gelir',
        'AYLK_GDR'=>'Aylık Gider'
    ];
        
echo json_encode($json);