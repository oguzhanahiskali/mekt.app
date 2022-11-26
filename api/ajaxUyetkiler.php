<?php
include '../header-top.php';
include '../functions.php';

    $tc = $_POST['tckimlikno'];

    if (!empty($tc))
    {
       
        $yetki = $_POST['yetkiler'];

        if($yetkiler==""){
            $mukerreryetki=array_unique($yetki);
            $yetkiler = implode(" = '1', ", $mukerreryetki);
        }else{
            
        }
        $arrAllPerm = array('RAND_TAKV',
        'TAKV_SAAT_EKL',
        'ODME_TAKV',
        'ESTE_TAKV',
        'ESTE_KEND_GORS',
        'MUSTR_LIST',
        'MUSTR_EKL',
        'MUSTR_HZMT_EKL',
        'MUSTR_HZMT_SEANS_LST',
        'MUSTR_HZMT_SEANS_ISLM',
        'MUSTR_HZMT_TKST_LST',
        'MUSTR_HZMT_TKST_ISLM',
        'ODME_SYF',
        'HRCMLR_LST',
        'HRCMLR_ISLM',
        'HZMT_LST',
        'HZMT_ISLM',
        'HZMT_TNM_ISLM',
        'YKLSN_RAND',
        'YPN_SON_HRCMLR',
        'ALCK_HTRLT',
        'SON_6AY_GLR_GRFK',
        'PRYDK_HRCM_GRFK',
        'ESTE_SYS',
        'MSTR_SYS',
        'AYLK_GLR',
        'AYLK_GDR',
        'PROFIL_ISLM');

        $arrExlPer = array_diff($arrAllPerm, $yetki);
        $ArrExlmukerreryetki=array_unique($arrExlPer);
        $Exlyetkiler = implode(" = '0', ", $ArrExlmukerreryetki);

        $qTCisThere = "SELECT COUNT(*) AS VARMI FROM tbl_yetkiler WHERE TC = '$tc'";
        
        $resultTCisThere = $mysqli->query($qTCisThere);
        while($rowTC = $resultTCisThere->fetch_assoc())
        {
            $TCvarmi = $rowTC['VARMI'];
        }


        if($TCvarmi==1)
        {


            $QfLog = $db->query("SELECT * FROM tbl_yetkiler WHERE TC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);
            $old = $QfLog;

            $sql = "UPDATE tbl_yetkiler SET";
            
            if($yetkiler!==""){
            $sql.=' '.$yetkiler." = '1'";
            }
            if($Exlyetkiler!==""){
                if($yetkiler!==""){
                    $sql.=", ";
                }
                $sql.=$Exlyetkiler." = '0'";
            }
            $sql.=" WHERE TC = '$tc'";

            $query = $db->prepare($sql);
            $update = $query->execute(array($ins));

            $QfLog = $db->query("SELECT * FROM tbl_yetkiler WHERE TC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);
            $new = $QfLog;

            $eski = array_diff_assoc($old, $new); //old and new value diffrents
            $yeni = array_diff_assoc($new, $old); //new and old value diffrents

            //logs saved!
            logSQL($user_ID, 'Personel Yetki Güncelleme', $eski, $yeni);



            if ( $update ){
                print "Update Basarili";
                header("Location: /personel-yetkileri.php?mid=$tc");
            }
        }else{
                $sql = "INSERT INTO tbl_yetkiler SET ";
                $sql.="TC = '$tc', ";
                
                if($yetkiler!==""){
                $sql.=' '.$yetkiler." = '1'";
                }
                if($Exlyetkiler!==""){
                    if($yetkiler!==""){
                        $sql.=", ";
                    }
                    $sql.=$Exlyetkiler." = '0'";
                }

                $query = $db->prepare($sql);
                $update = $query->execute(array($ins));

                $QfLog = $db->query("SELECT * FROM tbl_yetkiler WHERE TC = '{$tc}'")->fetch(PDO::FETCH_ASSOC);
                $old = '';
                $new = $QfLog;
                //logs saved!
                logSQL($user_ID, 'Personel Yetki Ekleme', $old, $new);


                if ( $update ){
                    print "Insert Basarili";
                    header("Location: /personel-yetkileri.php?mid=$tc");
                }
        }



/*

        if ($link->query($SqlYetki) === TRUE) {
            echo "New record created successfully";
        }

        if ($insert && $SqlYetki){
            //header("Location: /yeni-estetisyen-ekle.php?durum=OK");
            $last_id = $db->lastInsertId();
            //echo "basarili";
        }else{
            echo "basarisiz";
            $error= $query->errorInfo();
            //header("Location: /yeni-estetisyen-ekle.php?durum=Basarisiz?hata=$error[2]");
        }

        */
    }
?>