<?php $urls = basename($_SERVER['SCRIPT_NAME']); ?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>EstetikPanel v2</title>
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="estetikpanel.com">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="/pwa/icons/estetikpanel-icon-iphone5_splash.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/pwa/icons/estetikpanel-icon-iphone6_splash.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/pwa/icons/estetikpanel-icon-iphoneplus_splash.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/pwa/icons/estetikpanel-icon-iphonex_splash.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
    <link href="/pwa/icons/estetikpanel-icon-ipad_splash.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/pwa/icons/estetikpanel-icon-ipadpro1_splash.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link href="/pwa/icons/estetikpanel-icon-ipadpro2_splash.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
    <link rel="apple-touch-icon" sizes="128x128" href="/pwa/icons/estetikpanel-icon-128x128.png">
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="/pwa/icons/estetikpanel-icon-128x128.png">
    <link rel="icon" sizes="192x192" href="/pwa/icons/estetikpanel-icon-192x192.png">
    <link rel="icon" sizes="128x128" href="/pwa/icons/estetikpanel-icon-128x128.png">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <!-- SESSION-DETAILS PAGE  -->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- SESSION-DETAILS PAGE  -->
    <?php if($urls == 'app-events.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/light-fullcalendar.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/extensions/daygrid.min.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/extensions/timegrid.min.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">';
    }
    ?>
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
    
    <?php if($urls == 'app-customer-list.php' || $urls == 'app-services.php' || $urls == 'report-earnings.php' || $urls == 'app-products.php' || $urls == 'settings-room.php' || $urls == 'app-services-application-areas.php'){//app-customer-list.php
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-grid.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-balham-dark.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-blue.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-bootstrap.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-dark.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-fresh.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-balham.css">';
    }?>

    <!-- END: Vendor CSS-->
    <?php if($urls == 'index.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether-theme-arrows.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/tether.min.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/shepherd-theme-default.css">';
    }?>
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css?asd">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">

    <?php
    if($urls == 'index.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-analytics.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/card-analytics.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/tour/tour.css">';
    }else if($urls == 'app-customer-list.php' || $urls == 'app-services.php' || $urls == 'report-earnings.php' || $urls == 'app-services-application-areas.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/aggrid.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/data-list-view.css">
    ';
    }else if($urls == 'app-products.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-user.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/aggrid.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/file-uploaders/dropzone.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/data-list-view.css">';

    }else if($urls == 'settings-room.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-user.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/aggrid.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/file-uploaders/dropzone.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/data-list-view.css">';

    }else if($urls == 'page-account-settings.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-grid.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/aggrid.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    ';
    }elseif($urls == 'app-customer-view.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-user.css">';
    }elseif($urls == 'app-wizard.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">';
    }
    ?>
    <?php if($urls == 'app-events.php'){
        echo '<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">';
        echo '<style>
        .select2-results__option[aria-selected=true] {
        display: none;
    }
    </style>';
    }
    ?>
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->
    
    <script>
        if ('serviceWorker' in navigator) {
        	window.addEventListener('load', function () {
        		navigator.serviceWorker.register('/sw.js?v=3');
        	});
        }
        // if ("serviceWorker" in navigator) {
        //     navigator.serviceWorker
        //     .register("/pwa/sw.js")
        //     .then(function (registration) {
        //         console.log("success load");
        //     })
        //     .catch(function (err) {
        //         console.log(err);
        //     });
        // }
        // if ('serviceWorker' in navigator) {
        //     navigator.serviceWorker.register('/sw.js');
        // }

        
    </script>
</head>
