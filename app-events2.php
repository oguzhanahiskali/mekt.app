<?php include 'header-top.php';
    if(!empty($_GET['id']) and isset($_GET['id'])){
        $musteriID =  $_GET['id'];
        $query = $db->query("SELECT * FROM tbl_musteri_kimlik WHERE ID='$musteriID'")->fetch(PDO::FETCH_ASSOC);
        $musteriOptionTC = $query['TC'];
        $musteriOption = $musteriID.' '.$query['ADI'].' '.$query['SOYADI'];
        $musteriAdiSoyadi = $query['ADI'].' '.$query['SOYADI'];
    }
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>App Calender - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/light-fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/extensions/daygrid.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/extensions/timegrid.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">

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
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">

<style>
    .select2-results__option[aria-selected=true] {
    display: none;
}
</style>
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                            <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                            <!--     i.ficon.feather.icon-menu-->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon feather icon-check-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-chat.html" data-toggle="tooltip" data-placement="top" title="Chat"><i class="ficon feather icon-message-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-email.html" data-toggle="tooltip" data-placement="top" title="Email"><i class="ficon feather icon-mail"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-calender.html" data-toggle="tooltip" data-placement="top" title="Calendar"><i class="ficon feather icon-calendar"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
                                <!-- select.bookmark-select-->
                                <!--   option Chat-->
                                <!--   option email-->
                                <!--   option todo-->
                                <!--   option Calendar-->
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-shopping-cart"></i><span class="badge badge-pill badge-primary badge-up cart-item-count">6</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><span class="cart-item-count">6</span><span class="mx-50">Items</span></h3><span class="notification-title">In Your Cart</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="cart-item" href="app-ecommerce-details.html">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center"><img src="/app-assets/images/pages/eCommerce/4.png" width="75" alt="Cart Item"></div>
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Apple - Apple Watch Series 1 42mm Space Gray Aluminum Case Black Sport Band - Space Gray Aluminum</span><span class="item-desc font-small-2 text-truncate d-block"> Durable, lightweight aluminum cases in silver, space gray,gold, and rose gold. Sport Band in a variety of colors. All the features of the original Apple Watch, plus a new dual-core processor for faster performance. All models run watchOS 3. Requires an iPhone 5 or later to run this device.</span>
                                                <div class="d-flex justify-content-between align-items-center mt-1"><span class="align-middle d-block">1 x $299</span><i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a><a class="cart-item" href="app-ecommerce-details.html">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center"><img class="mt-1 pl-50" src="/app-assets/images/pages/eCommerce/dell-inspirion.jpg" width="100" alt="Cart Item"></div>
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Apple - Macbook® (Latest Model) - 12" Display - Intel Core M5 - 8GB Memory - 512GB Flash Storage - Space Gray</span><span class="item-desc font-small-2 text-truncate d-block"> MacBook delivers a full-size experience in the lightest and most compact Mac notebook ever. With a full-size keyboard, force-sensing trackpad, 12-inch Retina display,1 sixth-generation Intel Core M processor, multifunctional USB-C port, and now up to 10 hours of battery life,2 MacBook features big thinking in an impossibly compact form.</span>
                                                <div class="d-flex justify-content-between align-items-center mt-1"><span class="align-middle d-block">1 x $1599.99</span><i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a><a class="cart-item" href="app-ecommerce-details.html">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center"><img src="/app-assets/images/pages/eCommerce/7.png" width="88" alt="Cart Item"></div>
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Sony - PlayStation 4 Pro Console</span><span class="item-desc font-small-2 text-truncate d-block"> PS4 Pro Dynamic 4K Gaming & 4K Entertainment* PS4 Pro gets you closer to your game. Heighten your experiences. Enrich your adventures. Let the super-charged PS4 Pro lead the way.** GREATNESS AWAITS</span>
                                                <div class="d-flex justify-content-between align-items-center mt-1"><span class="align-middle d-block">1 x $399.99</span><i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a><a class="cart-item" href="app-ecommerce-details.html">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center"><img src="/app-assets/images/pages/eCommerce/10.png" width="75" alt="Cart Item"></div>
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Beats by Dr. Dre - Geek Squad Certified Refurbished Beats Studio Wireless On-Ear Headphones - Red</span><span class="item-desc font-small-2 text-truncate d-block"> Rock out to your favorite songs with these Beats by Dr. Dre Beats Studio Wireless GS-MH8K2AM/A headphones that feature a Beats Acoustic Engine and DSP software for enhanced clarity. ANC (Adaptive Noise Cancellation) allows you to focus on your tunes.</span>
                                                <div class="d-flex justify-content-between align-items-center mt-1"><span class="align-middle d-block">1 x $379.99</span><i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a><a class="cart-item" href="app-ecommerce-details.html">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center"><img class="mt-1 pl-50" src="/app-assets/images/pages/eCommerce/sony-75class-tv.jpg" width="100" alt="Cart Item"></div>
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Sony - 75" Class (74.5" diag) - LED - 2160p - Smart - 3D - 4K Ultra HD TV with High Dynamic Range - Black</span><span class="item-desc font-small-2 text-truncate d-block"> This Sony 4K HDR TV boasts 4K technology for vibrant hues. Its X940D series features a bold 75-inch screen and slim design. Wires remain hidden, and the unit is easily wall mounted. This television has a 4K Processor X1 and 4K X-Reality PRO for crisp video. This Sony 4K HDR TV is easy to control via voice commands.</span>
                                                <div class="d-flex justify-content-between align-items-center mt-1"><span class="align-middle d-block">1 x $4499.99</span><i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a><a class="cart-item" href="app-ecommerce-details.html">
                                        <div class="media">
                                            <div class="media-left d-flex justify-content-center align-items-center"><img class="mt-1 pl-50" src="/app-assets/images/pages/eCommerce/canon-camera.jpg" width="70" alt="Cart Item"></div>
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Nikon - D810 DSLR Camera with AF-S NIKKOR 24-120mm f/4G ED VR Zoom Lens - Black</span><span class="item-desc font-small-2 text-truncate d-block"> Shoot arresting photos and 1080p high-definition videos with this Nikon D810 DSLR camera, which features a 36.3-megapixel CMOS sensor and a powerful EXPEED 4 processor for clear, detailed images. The AF-S NIKKOR 24-120mm lens offers shooting versatility. Memory card sold separately.</span>
                                                <div class="d-flex justify-content-between align-items-center mt-1"><span class="align-middle d-block">1 x $4099.99</span><i class="remove-cart-item feather icon-x danger font-medium-1"></i></div>
                                            </div>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center text-primary" href="app-ecommerce-checkout.html"><i class="feather icon-shopping-cart align-middle"></i><span class="align-middle text-bold-600">Checkout</span></a></li>
                                <li class="empty-cart d-none p-2">Your Cart Is Empty.</li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                            <div class="media-body">
                                                <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                            <div class="media-body">
                                                <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                        </div>
                                    </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                            <div class="media-body">
                                                <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                        </div>
                                    </a></li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John Doe</span><span class="user-status">Available</span></div><span><img class="round" src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.php?returnURL=<?php echo $_SERVER['REQUEST_URI']; ?>&logout=true"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="/app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="/app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="/app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="/app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="/app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php include 'includes/main-menu.php';?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Full calendar start -->
                <section id="basic-examples">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="cal-category-bullets d-none">
                                            <div class="bullets-group-1 mt-2">
                                                <div class="category-business mr-1">
                                                    <span class="bullet bullet-success bullet-sm mr-25"></span>
                                                    Business
                                                </div>
                                                <div class="category-work mr-1">
                                                    <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                                    Work
                                                </div>
                                                <div class="category-personal mr-1">
                                                    <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                                    Personal
                                                </div>
                                                <div class="category-others">
                                                    <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                                    Others
                                                </div>
                                            </div>
                                        </div><div class="divider">
                                            <div class="divider-text">
                                                <input type="date" class="form-control pickadate" id="dateField" data-html="true" data-toggle="tooltip" data-original-title="Işınlanmak İstediğin Tarihi Seç 😉"/>
                                            </div>
                                        </div>
                                        <div id="fc-default"></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calendar Modal starts-->
                    <div class="modal animated bounceInLeft text-left" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-text-bold-600" id="cal-modal">Yeni Hizmet Planla</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <section id="validation">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form action="#" class="steps-validation wizard-circle">
                                                            <!-- Step 1 -->
                                                            <h6><i class="step-icon fa fa-stethoscope"></i> Hizmet Tanımlama Bilgisi</h6>
                                                            <fieldset>
                                                                <fieldset class="border row col-md-12">
                                                                    <legend  class="w-auto">Hizmet Bilgisi</legend>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="odaSecimi">Oda Seçimi
                                                                                <span class="danger">*</span>
                                                                            </label>                                                                      
                                                                            <select class="select2 form-control required" id="odaSecimi" name="odaSecimi" ></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="select2adisoyadi">Müşteri Seç</label>
                                                                            <select class="select2 form-control required" id="select2adisoyadi" name="select2adisoyadi"></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="select2estetisyen">Estetisyen Seç</label>
                                                                            <select class="select2 form-control required" id="select2estetisyen" name="select2estetisyen"></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="select2hizmet">
                                                                            Hizmet Seçin:
                                                                            <span class="danger">*</span>
                                                                            </label>
                                                                            <select class="select2 form-control required" id="select2hizmet" name="select2hizmet"></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="hizmetBolgesi">Hizmet Bölgesi
                                                                                <span class="danger">*</span>
                                                                            </label>                                                                      
                                                                            <select class="select2 form-control required" id="hizmetBolgesi" name="hizmetBolgesi[]" ></select>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <br>
                                                                <fieldset class="border row col-md-12">
                                                                    <legend  class="w-auto">Seans & Ödeme Bilgisi</legend>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="select2seans">Seans Seçin:<span class="danger">*</span>
                                                                            </label>
                                                                            <select class="select2 form-control required" id="select2seans" name="select2seans"></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group validate">
                                                                            <label for="gunfarki">Seanlar Arası Gün Farkı<span class="danger">
                                                                                    *
                                                                                </span>
                                                                            </label>
                                                                            <div class="input-group">
                                                                            
                                                                            <input type="number" class="form-control required" id="gunfarki" placeholder="Seans Gün Farkı" min="1" max="31" aria-label="" name="gunfarki" aria-invalid="false">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">gün</span>
                                                                            </div>   
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="taksitsayisi">Taksit Sayısı
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <div id="taksitsayisiDiv">
                                                                            <input type="number" class="form-control required" id="taksitsayisi" min="1" max="12" placeholder="Taksit Sayısı" aria-label="" name="taksitsayisi" aria-invalid="false">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="odemeturu">Ödeme Türü
                                                                                <span class="danger">*</span>
                                                                            </label>                                                                      
                                                                            <input type="number" class="form-control required" id="odemeturu" min="1" placeholder="Ödeme Türü" aria-label="" name="odemeturu" aria-invalid="false">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="start">Seans Başlama Tarih/Saati:</label>
                                                                        <input type="text" name="start" class="form-control" id="start" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="sure">
                                                                            Seans Süresi Seçin:
                                                                            <span class="danger">*</span>
                                                                            </label>
                                                                            <select class="select2 form-control required" id="select2sure" name="select2sure"></select>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <br>
                                                                <fieldset class="border row col-md-12">
                                                                    <legend  class="w-auto">Hizmet Fiyatlandırma Bilgisi</legend>
                                                                    
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="fiyat">Hizmet Fiyatı:<span class="danger">*</span></label>
                                                                            <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><?php echo $currency; ?></span>
                                                                            </div>
                                                                            <input type="number" class="form-control required" id="fiyat" onfocus="this.select();" onmouseup="return false;" placeholder="Toplam" aria-label="" name="fiyat">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">.00</span>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="iskonto">İskonto Hesaplama (% ?):</label>
                                                                            <div class="input-group">
                                                                            <input type="number" class="form-control" id="iskonto" min="1" onfocus="this.select();" onmouseup="return false;" max="100" min="0" maxlength="2" style="width: 10px!important" placeholder="%" aria-label="">
                                                                            <input type="number" class="form-control" disabled="disabled" id="iskonto2" placeholder="%" aria-label="" name="iskonto2">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label id="ilkOdeme" for="odeme">Ödeme Girin:<span class="danger">*</span></label>
                                                                            <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><?php echo $currency; ?></span>
                                                                            </div>
                                                                            <input type="number" class="form-control required" id="odeme" onfocus="this.select();" onmouseup="return false;" placeholder="Ön" aria-label="" name="odeme">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">.00</span>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="odeme">Kalan Ödeme:</label>
                                                                            <div class="input-group">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text"><?php echo $currency; ?></span>
                                                                            </div>
                                                                            <input type="number" class="form-control required" id="kalan" placeholder="Kalan"  aria-label="" name="kalan" disabled="">
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">.00</span>
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <!-- calendar Modal ends-->
                </section>
                <!-- // Full calendar end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/moment.min.js"></script>
    <!--<script src="/app-assets/vendors/js/calendar/fullcalendar.min.js"></script>-->
    <script src="/app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
    <script src="/app-assets/js/scripts/extensions/full-calendar-scheduler.min.js"></script>
    
    <script src="/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
        <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <script src="/app-assets/js/scripts/components.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
    <?php
        $QroomFetch = $db->query("SELECT * FROM tbl_firma_resources WHERE FIRMA_ID=$user_Firma" , PDO::FETCH_ASSOC);
        if ( $QroomFetch->rowCount() ){
            foreach( $QroomFetch as $row ){
                 echo '[data-resource-id="'.$row['ROOM_ID'].'"] { color:'.$row['COLOR'].';}';
            }
       }    
    ?>
    </style>

    
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/forms/wizard-steps.js"></script>
    <script src="/app-assets/js/seans.js"></script>
	<script>
        $('#odaSecimi').select2({
            allowClear: true,
            placeholder: 'Seçiniz',
            ajax: {
              url: '/api/ajaxAllResource.php',
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                return {
                  results: data
                };
              },
              success: function(result) {
               console.log(result);
              },
              cache: true
            }
      });

        $('#select2adisoyadi').select2({
            allowClear: true,
            placeholder: 'Seçiniz',
            ajax: {
              url: '/api/ajaxMusteri.php',
              dataType: 'json',
              delay: 250,
              processResults: function (data) {
                return {
                  results: data
                };
                console.log(result);
              },
              success: function(result) {
               
              },
              cache: true
            }
      });
        <?php
            if(!empty($musteriOption)){
                ?>
                            var newOption = new Option('<?=$musteriOptionTC?> <?=$musteriAdiSoyadi?>', <?=$musteriID?>, false, false);
                            $('#select2adisoyadi').append(newOption).trigger('change');

                <?php
            }

        ?>
    
        $( document ).ready(function()
        {
            $('#fc-default').fullCalendar(
            {
                defaultView: 'agendaDay',
                groupByResource: true,
                lazyFetching: true,
                resources: '/api/ajaxAllResource.php',
                selectConstraint: "businessHours",
                select: function(start, end, jsEvent, view) {
                    if (start.isAfter(moment())) {
                        alert(start.isAfter(moment()));

                        var eventTitle = prompt("Provide Event Title");
                        if (eventTitle) {
                        $("#calendar").fullCalendar('renderEvent', {
                            title: eventTitle,
                            start: start,
                            end: end,
                            stick: true
                        });
                        alert('Appointment booked at: ' + start.format("h(:mm)a"));
                        }
                    } else {
                        alert('Cannot book an appointment in the past');
                    }
                },
                eventClick: function(calEvent, jsEvent, view) {
                //alert('Event: ' + calEvent.title);
                },
                closeText:"Kapat",
                currentText:"Bugun",
                monthNames:["Ocak","Subat","Mart","Nisan","Mayis","Haziran","Temmuz","Agustos","Eylul","Ekim","Kasim","Aralik"],
                monthNamesShort:["Oca","Şub","Mar","Nis","May","Haz","Tem","Ağu","Eyl","Eki","Kas","Ara"],
                dayNames:["Pazar","Pazartesi","Sali","Carsamba","Persembe","Cuma","Cumartesi"],
                dayNamesShort:["Pz","Pt","Sa","Ça","Pe","Cu","Ct"],
                dayNamesMin:["Pz","Pt","Sa","Ça","Pe","Cu","Ct"],
                weekHeader:"Hf",
                dateFormat:"dd.mm.yy",
                firstDay:1,
                isRTL:!1,
                next:"Ileri",
                month:"Ay",
                weekText:"Hafta",
                day:"Gun",
                allDayText:"TumGun",
                list:"Ajanda",
                currentText:"Bugun",
                minTime:"08:00:00",
                maxTime:"20:00:00",
                slotLabelFormat:'HH:mm',
                contentHeight: 'auto',
                eventLimitText: 'tane Daha',
                longPressDelay:250,

                buttonText:{
                    today:    "Bugun",
                    month:    "Ay",
                    week:     "Hafta",
                    day:      "Gun",
                    list:     "Liste"
                },
                theme:false,
                allDaySlot:false,
                slotEventOverlap: false,
                timeFormat: 'H:mm',
                header:{
                    left: 'prev,today,next',
                    center: 'title',
                    //right: 'month,basicWeek,agendaDay,listWeek'
                    right: 'agendaDay,listWeek'

                },
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: false,
                
                select: function(start, end, jsEvent, view, resource) {
                    if (start.format("ddd") !== "Sun")
                    {
                        if (start.format("HH") < 08 || start.format("HH") > 20) {
                            $('#ModalAdd').modal('hide');
                            $('#fc-default').fullCalendar( 'changeView', 'agendaDay');
                            Swal.fire(
                            'Saat Belirlenmedi😒',
                            'Lütfen Oda alanına göre Saat belirleyiniz 😉',
                            'warning'
                            );
                        }else{
                            $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                            $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                            $('#ModalAdd').modal('show');
                            $('#odaSecimi').empty();
                            var newOption = new Option(resource.text, resource.id, false, false);
                            $('#odaSecimi').append(newOption).trigger('change');
                            console.log("burada");
                        }
                    }
                    else
                    {
                        alert("We are close on Saturdays and Sundays");
                    }
                },
                eventRender: function(event, element){
                    element.bind('click', function(){
                        var seansid = event.id;
                        $.ajax({
                        type: "GET",
                        url: "api/ajaxStpk.php",
                        data: ({
                            SessionID:seansid
                        }),
                        success: function(result){
                            var obj = JSON.parse(result);
                            var getdatas = obj[0]['id'];
                            window.location.href='session-details.php?CID='+getdatas;
                        }
                        });
                    });
                    
                element.popover({
                    title: event.title,
                    html:true,
                    content: event.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });
                },
                html: true,
                

                events: '/api/__events.php'

            });
            $('#dateField').change(function() {
                dateString =  $("#dateField").val();
                let d = $.fullCalendar.moment(dateString);
                $('#fc-default').fullCalendar('gotoDate', d);

            });
            
            $.ajax({
                type: 'POST',
                url: 'api/ajaxDayOfWork.php',
                data: {id:$(this).val()},
                success: function(data)
                { 
                    bizHours = JSON.parse(data);
                    $('#fc-default').fullCalendar('option', { businessHours: bizHours });

                }
            });
        });
        </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>