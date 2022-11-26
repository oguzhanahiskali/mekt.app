<?php
include 'header-top.php';

$password = "4h15k4l1";

function UN_Verify($un, $CompID){
    $sql = "SELECT * FROM tbl_personel WHERE USERNAME = $un AND USERSTATUS = 1 AND DURUM = 1 AND TUR = 1 AND FIRMA_ID = $CompID";
    $result = $mysqli->query($sql);

    $json = [];
    while($row = $result->fetch_assoc()){
        $json[] =	[
            'id'		=>$row['ID'],
            'name'		=>$row['ADI'].' '.$row['SOYADI']
            ]; 
        echo $row['ADI'].' '.$row['SOYADI'];
        
        if (password_verify($pw, $row['PASSWORD'])) {
            echo 'Parola geçerli!';
        } else {
            echo 'Geçersiz parola.';
        }
    }
}

function PW_Verify($un, $pw, $CompID){
    $sql = "SELECT * FROM tbl_personel WHERE USERSTATUS = 1 AND DURUM = 1 AND TUR = 1 AND FIRMA_ID = $CompID";
    $result = $mysqli->query($sql);

    while($row = $result->fetch_assoc()){
        echo "<pre>";
        echo $row['ADI'].' '.$row['SOYADI'];
        
        if (password_verify($pw, $row['PASSWORD'])) {
            echo 'Parola geçerli!';
        } else {
            echo 'Geçersiz parola.';
        }
    }
}
    

/*
        // Prepare a select statement
        $sql = "SELECT PASSWORD FROM tbl_personel WHERE PASSWORD = ? AND USERSTATUS = 1 AND DURUM = 1";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_pw);

            // parametre ata
            $param_pw = $password;

            // Hazırlanan ifadeyi yerine getirme girişimi
            if(mysqli_stmt_execute($stmt)){
                // db sonucu
                mysqli_stmt_store_result($stmt);

                // Kullanıcı adının olup olmadığını kontrol edin, evet ise şifreyi doğrular
                if(mysqli_stmt_num_rows($stmt) == 0){
                    // Bind result variables

                        if(password_verify($password, $hashed_password)){
                            echo "şifre doğru";
                        } else{
                            echo 'Girdiğiniz şifre geçerli değil.';
                        }
                } else{
                    // Display an error message if username doesn't exist
                    echo 'Kullanıcı adı hatalı.';
                }
            } else{
                echo "Oops! Lütfen daha sonra tekrar deneyin.";
            }

        // Close statement
        //mysqli_stmt_close($stmt);
    }
    */
    ?>