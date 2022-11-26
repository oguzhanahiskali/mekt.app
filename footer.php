

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">v1.4 Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://www.ahiskali.org" target="_blank">Ahıskalı </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span></p>
</footer>


    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>

    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables-<?php echo $_SESSION['dil']; ?>.min.js"></script>
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/pages/hospital-patients-list.js"></script>
    <script src="app-assets/js/tour/bootstrap-tour.min.js"></script>
    <script src="app-assets/js/tour/bootstrap-tour-standalone.min.js"></script>
    <?php
    if($urls == 'estetisyen-takvimi.php')
    {
        echo '<script src="app-assets/vendors/js/extensions/moment.min.js"></script>
        <script src="app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
        <script src="app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
        <script src="app-assets/js/scripts/pages/hospital-doctor-schedule.js"></script>';
    }if($urls == 'hasta-listesi.php'){
        echo '
        <script src="app-assets/js/scripts/modal/components-modal.js"></script>
        <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
        <script src="app-assets/js/scripts/extensions/toastr.js"></script>
        <script src="app-assets/js/hasta-ekle.js"></script>
        <script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
        <script src="app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
        <script src="app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>
        <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    ';
    }if($urls == 'takvim.php'){
        echo '
        <script src="app-assets/vendors/js/extensions/moment.min.js"></script>
        <script src="app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
        <script src="app-assets/js/scripts/extensions/fullcalendar.js"></script>
    ';
    }if($urls == 'musteri-profili.php'){
    include 'app-assets/footer/musteri-profili-foo.php';
    }
    ?>
</body>
</html>