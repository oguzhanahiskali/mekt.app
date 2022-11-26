<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/error.css">
<title>asd</title>
<!-- END: Head-->

<!-- BEGIN: Body-->


<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- error 404 -->
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="/app-assets/images/pages/404.png" class="img-fluid align-self-center" alt="branding logo">
                                    <h1 class="font-large-2 my-1">404</h1>
                                    <h1 data-i18n="Page Not Found"></h1>
                                    <p class="p-2" style="background-color:white" data-i18n="Page Not Found Description"></p>
                                    <a class="btn btn-primary btn-lg mt-2" data-i18n="Back to Home" href="/"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- error 404 end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php'?>
    <script>
      $('.footer').remove();
      

    </script>
</body>
<!-- END: Body-->

</html>