<?php
// Include config file
require_once 'conf.php';

// Define variables and initialize with empty values
$username       = $password = "";
$username_err   = $password_err = "";

if($_GET['returnURL']){
    $redirect = $_GET['returnURL'];
}else{
    $redirect = 'index.php';
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["USERNAME"]))){
        $username_err = 'Lütfen kullanıcı adınızı girin.';
    } else{
        $username = trim($_POST["USERNAME"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['PASSWORD']))){
        $password_err = 'Lütfen şifrenizi girin.';
    } else{
        $password = trim($_POST['PASSWORD']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT TELEFON_CEP, PIN FROM tbl_kurulus WHERE TELEFON_CEP = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // parametre ata
            $param_username = $username;

            // Hazırlanan ifadeyi yerine getirme girişimi
            if(mysqli_stmt_execute($stmt)){
                // db sonucu
                mysqli_stmt_store_result($stmt);

                // Kullanıcı adının olup olmadığını kontrol edin, evet ise şifreyi doğrular
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                                    $pws = $_POST['PASSWORD'];

                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();

                            $_SESSION['USERNAME'] = $username;
							$uip 	=	$_SERVER['REMOTE_ADDR'];
                            $simdi 	=	date('Y-m-d H:i:s');
							$action =	'yes';
							mysqli_query($link,"INSERT INTO tbl_login_info(USERNAME,TESTEDPW,USERIP,DATE,SUCCESS)values('$username','$pws','$uip','$simdi','$action')");

                            header("location: ".$redirect);
                        } else{
                            // Display an error message if password is not valid
							$uip 	=	$_SERVER['REMOTE_ADDR'];
							$simdi 	=	date('Y-m-d H:i:s');
                            $action = 'no';
							mysqli_query($link,"INSERT INTO tbl_login_info(USERNAME,TESTEDPW,USERIP,DATE,SUCCESS) values('$username','$pws','$uip','$simdi','$action')");

                            $password_err = 'Girdiğiniz şifre geçerli değil.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'Kullanıcı adı hatalı.';
                }
            } else{
                echo "Oops! Lütfen daha sonra tekrar deneyin.";
            }
        }

        // Close statement
        //mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="İşletmenizi dilediğiniz yerden, altyapı yatırımı yapmadan bulut teknolojisi ile ister telefondan ister bilgisayardan müşterilerinizi, randevularınızı ve iş akışınızı yönetmeye hemen başlayın.">
    <meta name="keywords" content="Web Tabanlı ve Mobil Uygulamalı Güzellik ve Estetik Salonu Yazılımı, Müşteri Takibi, Randevu Yönetimi, Kasa İşlemleri, Personel Takibi, Ürün Stoğu Takibi">
    <meta name="author" content="Webvilla Creative">
    <meta name="robots" content="index"/>
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Güzellik ve Estetik Merkezi Yazılım Programı | Salon Takip Sistemi" />
    <meta property="og:description" content="Web Tabanlı ve Mobil Uygulamalı Güzellik ve Estetik Salonu Yazılımı. Müşteri Takibi, Randevu Yönetimi, Kasa İşlemleri. Personel Takibi. Ürün Stoğu Takibi." />
    <meta property="og:url" content="https://estetik.app/" />
    <meta property="og:site_name" content="Güzellik ve Estetik Merkezi Yazılım Programı" />
    <meta property="og:image" content="https://i1.wp.com/guzellikmerkeziprogram.com/wp-content/uploads/2019/07/estetikpanel_thumb.png?fit=995%2C931&#038;ssl=1" />
    <meta property="og:image:secure_url" content="https://i1.wp.com/guzellikmerkeziprogram.com/wp-content/uploads/2019/07/estetikpanel_thumb.png?fit=995%2C931&#038;ssl=1" />
    <meta property="og:image:width" content="995" />
    <meta property="og:image:height" content="931" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:description" content="Web Tabanlı ve Mobil Uygulamalı Güzellik ve Estetik Salonu Yazılımı. Müşteri Takibi, Randevu Yönetimi, Kasa İşlemleri. Personel Takibi. Ürün Stoğu Takibi." />
    <meta name="twitter:title" content="Güzellik ve Estetik Merkezi Yazılım Programı | Salon Takip Sistemi" />
    <meta name="twitter:site" content="@EstetikPanel" />
    <meta name="twitter:image" content="https://guzellikmerkeziprogram.com/wp-content/uploads/2019/07/estetikpanel_thumb.png" />
    <meta name="twitter:creator" content="@EstetikPanel" />
    <title>EstetikPanel v2 | Giriş Yap</title>
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/app-assets/auth-login/capslook/ls-capslock.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="estetik.app">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" sizes="128x128" href="/pwa/icons/estetikpanel-icon-128x128.png">
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="/pwa/icons/estetikpanel-icon-128x128.png">
    <link rel="icon" sizes="192x192" href="/pwa/icons/estetikpanel-icon-192x192.png">
    <link rel="icon" sizes="128x128" href="/pwa/icons/estetikpanel-icon-128x128.png">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-N04YC9HX13"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-N04YC9HX13');
    </script>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->
    <style>
    html {
   -webkit-touch-callout: none;
   -webkit-user-select: none;
   -khtml-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
}</style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body unselectable="on" class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                    <img id="left-bg" src="/app-assets/images/pages/login/preloader.gif" height="250" width="312" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="cardLogin rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Giriş Yap</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Tekrar hoş geldiniz, lütfen hesabınıza giriş yapın.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?returnURL=<?php echo $redirect; ?>" novalidate method="post">

                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="user-name" autocomplete="none" name="USERNAME" placeholder="Kullanıcı Adı" autofocus required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Kullanıcı Adı</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control password sample-capslock-input" id="user-password" autocomplete="none" name="PASSWORD" placeholder="Şifre" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="user-password">Şifre</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Beni Hatırla</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right disabled"><a href="#" class="card-link">Şifremi Unuttum?</a></div>
                                                    </div>
                                                    <a href="/EstetikPanel/register?ref=login" class="btn btn-success mr-1 mb-1 waves-effect waves-light" title="Hemen kullanmaya başla!">Başvuru Yap</a>
                                                    <button type="submit" data-spinning-button class="btn btn-primary float-right btn-inline ">Giriş Yap</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/pwa/ifnotinstall.js?v1"></script>

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <script>
        $(document).ready(function () {
            ls_capslock.init({
				element: '.sample-capslock-input',
				message: 'Capslook Açık',
				customClasses: ['customClass1', 'customClass2'],
				position: 'bottom'
			});
        });
    </script>
    <script src="/app-assets/auth-login/capslook/ls-capslock.js"></script>

    <script>
        function random_item(items) { return items[Math.floor(Math.random()*items.length)]; }
        var items = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $("#left-bg").attr("src", '/app-assets/images/pages/login/'+random_item(items)+'.png');
        if ("serviceWorker" in navigator) {
            navigator.serviceWorker
            .register("/sw.js")
            .then(function (registration) {
                console.log("App mode ready");
            })
            .catch(function (err) {
                console.log(err);
            });
        }
        var zyllemMain = (function() {
            function processSubmitLoader() {
                $("button[data-spinning-button]").click(function(e) {
                var $this = $(this);
                let formId = $this.data("spinning-button");
                let $form = formId ? $("#" + formId) : $this.parents("form");
                if ($form.length) {
                    $this.prepend("<i class='spinner-border spinner-border-sm'></i> ").attr("disabled", "");
                    setTimeout(() => {
                        $form.submit();
                    }, 250);
                }
                });
            }
            return { initSpinnerButton: processSubmitLoader };
        })();

        $(document).ready(function() {
            zyllemMain.initSpinnerButton();
        });
    </script>
</body>
<!-- END: Body-->

</html>