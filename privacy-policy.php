<!DOCTYPE html>
<!--
Template Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PixInvent
Website: http://www.pixinvent.com/
Contact: hello@pixinvent.com
Follow: www.twitter.com/pixinvents
Like: www.facebook.com/pixinvents
Purchase: https://1.envato.market/vuexy_admin
Renew Support: https://1.envato.market/vuexy_admin
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.

-->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Fixed Layout - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">
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
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky fixed-footer  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="sk-layout-2-columns.html" data-toggle="tooltip" data-placement="top" title="2-Columns"><i class="ficon feather icon-sidebar"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="starter-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
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
                                <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="starter-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-shopping-cart"></i><span class="badge badge-pill badge-primary badge-up cart-item-count">6</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><span class="cart-item-count">6</span><span class="ml-50">Items</span></h3><span class="notification-title">In Your Cart</span>
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
                                        <h3 class="white">5 New</h3><span class="grey darken-2">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list">
                                    <!-- a(href='javascript:void(0)').d-flex.justify-content-between-->
                                    <!--   .d-flex.align-items-start-->
                                    <!--       i.feather.icon-plus-square-->
                                    <!--       .mx-1-->
                                    <!--         .font-medium.block.notification-title New Message-->
                                    <!--         small Are your going to meet me tonight?-->
                                    <!--   small 62 Days ago--><a class="d-flex justify-content-between" href="javascript:void(0)">
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
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John Doe</span><span class="user-status">Available</span></div><span><img class="round" src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="#"><i class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item" href="#"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="#"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="feather icon-power"></i> Logout</a>
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
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/html/ltr/vertical-menu-template/index.html">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Vuexy</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item active"><a href="/html/ltr/vertical-menu-template/index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Privacy Policy</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Description -->
                <section id="description" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Gizlilik Politikası</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                            <div class=WordSection1>

<p class=MsoNormal>Gizlilik ve Kişisel Verilerin Korunması Politikasının Amacı<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Bu Gizlilik ve Kişisel Verilerin Korunması Politikası <span
class=SpellE>Ganitto</span> A.Ş.'<span class=SpellE>nin</span> (Estetik Panel)
işlettiği estetikpanel.com adresli internet hizmetinin ne gibi kişisel veriler
topladığını, bu bilgilerin nasıl kullanıldığını, gerekmesi halinde Estetik
Panel ’in bu bilgileri kimlerle paylaşabileceğini, Estetik Panel ’in
topladığı/işlediği/sakladığı kişisel verilerinize ilişkin haklarınızın ne
olduğunu, bu hakları nasıl kullanabileceğinizi ve elektronik ticari iletiler
konusundaki tercihlerinizi nasıl değiştirebileceğinizi açıklamaktadır.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Kişisel verilerin işlenmesine ilişkin hukuki dayanak<o:p></o:p></p>

<p class=MsoNormal>Estetik Panel ’in sunduğu internet hizmeti olan estetikpanel.com,
5651 Sayılı İnternet Ortamında Yapılan Yayınların Düzenlenmesi ve Bu Yayınlar
Yoluyla İşlenen Suçlarla Mücadele Edilmesi Hakkında Kanun ve ilgili ikincil
mevzuat, 6563 Sayılı Elektronik Ticaretin Düzenlenmesi Hakkında Kanun ve ilgili
ikincil mevzuat, 5237 Sayılı Türk Ceza Kanunu ve 6698 Say<span
style='mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri'>ı</span>l<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>ı</span> Ki<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>ş</span>isel
Verilerin Korunmas<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>ı</span> Kanunu ve benzeri kanun ve y<span
style='mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri'>ö</span>netmeliklerden kaynaklanan y<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>ü</span>k<span
style='mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri'>ü</span>ml<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>ü</span>l<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>ü</span>klerini
yerine getirebilmek i<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>ç</span>in ki<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>ş</span>isel
verilerinizi (ad, <span class=SpellE>soyad</span>, doğum tarihi, cep telefonu
numarası, e-posta, cinsiyet, adres ve kişiyi doğrudan veya dolaylı olarak
tanımlamaya yönelik bazı kişisel bilgileri) toplamaktadır.<o:p></o:p></p>

<p class=MsoNormal>Bu veriler açık rızanıza istinaden, burada belirtilen
amaçlar dışında kullanılmamak kaydı ile her türlü tedbir alınarak toplanacak,
işlenecek ve saklanacaktır.<o:p></o:p></p>

<p class=MsoNormal>İşlenen kişisel verilerinizin neler olduğunu, yurt içi veya
yurt dışında kişisel verilerin aktarıldığı üçüncü kişileri öğrenmek,
verilerinizi değiştirmek, güncellemek ve/veya silmek estetikpanel.com web
sitesi, mobil uygulaması ve mobil sitesi üzerinden hesabınıza erişebilir veya
contact@estetikpanel.com e-posta adresi üzerinden bizimle irtibata geçebilirsiniz.
6698 Sayılı Kişisel Verilerin Korunması Kanunu madde 11 uyarınca sahip
olduğunuz diğer haklar saklıdır.<o:p></o:p></p>

<p class=MsoNormal>6563 Sayılı Elektronik Ticaretin Düzenlenmesi Hakkında Kanun
uyarınca; onayın geri alındığına ilişkin kayıtlar bu tarihten itibaren 1 yıl;
ticari elektronik iletinin içeriği ve gönderiye ilişkin diğer her türlü kayıt
ise gerektiğinde ilgili bakanlığa sunulmak üzere 3 yıl saklanacaktır. Süre
geçtikten sonra kişisel verileriniz şirketimiz tarafından üzerine silinir, yok
edilir veya anonim hale getirilir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Çerez (<span class=SpellE>Cookie</span>) Kullanımı<o:p></o:p></p>

<p class=MsoNormal>estetikpanel.com yasal yükümlülüğü çerçevesinde, işbu
Gizlilik ve Kişisel Verilerin Korunması Politikası ile belirlenen amaçlar
dışında kullanılmamak şartı ile gezinme bilgilerinizi toplayacak, işleyecek,
üçüncü kişilerle paylaşacak ve güvenli olarak saklayacaktır. Gezinme
bilgilerinizi toplama amacıyla kullandığımız çerezler (<span class=SpellE>cookie</span>)
hakkında bilgi, estetikpanel.com web ve mobil sitesine ilk girişinizde veya
mobil uygulamasını telefonunuza veya tabletinize yüklediğinizde “açılır pencere
(pop-<span class=SpellE>up</span> ekran)” ile verilecektir.<o:p></o:p></p>

<p class=MsoNormal>Çerezler, estetikpanel.com 'u ziyaret ettiğinizde veya mobil
uygulamayı cep telefonunuza yüklediğinizde veya mobil <span class=SpellE>sitesi’nden</span>
bağlandığınızda, internet tarayıcınız tarafından yüklenen ve bilgisayarınız,
cep telefonunuz veya tabletinizde saklanan küçük bilgi parçacıklarını içeren
metin dosyalarıdır.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>estetikpanel.com, size özel tanıtım yapmak, promosyonlar ve
pazarlama teklifleri sunmak, web sitesinin veya mobil uygulamanın içeriğini
size göre iyileştirmek ve/veya tercihlerinizi belirlemek <span class=GramE>amacıyla</span>;
site üzerinde gezinme bilgilerinizi ve/veya site üzerindeki üyelik kullanım
geçmişinizi izlemektedir. estetikpanel.com farklı yöntemlerle veya farklı
zamanlarda site üzerinde toplanan bilgileri eşleştirebilir ve bu bilgileri
üçüncü taraflar gibi başka kaynaklardan alınan bilgilerle birlikte
kullanabilir. Söz konusu eşleştirme ve kullanma yalnızca işbu Gizlilik ve
Kişisel Verilerin Korunması Politikası ile belirlenen amaçlar ve kapsam
dahilinde kalacaktır.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Çerez Çeşitleri<o:p></o:p></p>

<p class=MsoNormal>estetikpanel.com web sitesinde, mobil uygulamasında ve mobil
sitesinde oturum çerezleri ve kalıcı çerezler kullanmaktadır. Oturum kimliği
çerezi, tarayıcınızı kapattığınızda sona erer. Kalıcı çerez ise sabit
diskinizde uzun bir süre kalır. İnternet tarayıcınızın &quot;yardım&quot;
dosyasında verilen talimatları izleyerek veya “www.allaboutcookies.org” veya
“www.youronlinechoices.eu” adresini ziyaret ederek kalıcı çerezleri
kaldırabilir ve hem oturum çerezlerini hem de kalıcı çerezleri
reddedebilirsiniz. Kalıcı çerezleri veya oturum çerezlerini reddederseniz, web
sitesini, mobil uygulamayı ve mobil sitesini kullanmaya devam edebilirsiniz,
fakat web sitesinin, mobil uygulamanın ve mobil sitesinin tüm işlevlerine
erişemeyebilirsiniz veya erişiminiz sınırlı olabilir. Mobil uygulamada söz
konusu durum değişkenlik gösterebilmektedir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>estetikpanel.com çerezleri yaptığınız tercihleri hatırlamak
ve web sitesi/mobil uygulama/mobil sitesi kullanımınızı kişiselleştirmek için
kullanır (örneğin parolanızı kaydeden ve oturumunuzun sürekli açık kalmasını
sağlayan, daha sonraki ziyaretlerinizde sizi tanıyan çerezler). estetikpanel.com
çerezleri ayrıca <span class=SpellE>estetikpanel.com’a</span> nereden
bağlandığınız, hangi içeriği görüntülediğiniz ve ziyaretinizin süresi gibi <span
class=SpellE>estetikpanel.com'u</span> nasıl kullandığınızı takip etmemizi sağlar.
Buna ek olarak, ilgi alanlarınıza ve size daha uygun içerik ve kampanyalar
sunmak için hedeflenmiş reklam/tanıtım amacıyla kullanır. estetikpanel.com
çerezler yoluyla elde edilen bilgileri kullanıcılardan toplanan kişisel
verilerle eşleştirir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><span style='font-family:"Calibri Light",sans-serif;
mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin;mso-bidi-theme-font:
major-latin'>estetikpanel.com üçüncü taraf çerezlerini reklam ve yeniden
hedefleme için nasıl kullanmaktadır?<o:p></o:p></span></p>

<p class=MsoNormal>estetikpanel.com çerezleri ayrıca; arama motorlarını, <span
class=SpellE>estetikpanel.com'u</span> ve <span class=SpellE>estetikpanel.com’un</span>
reklam verdiği web sitelerini ziyaret ettiğinizde ilginizi çekebileceğini
düşündüğü reklamları size sunabilmek için kullanabilir. Bu reklamları sunarken,
<span class=SpellE>estetikpanel.com’un</span> sizi tanıyabilmesi amacıyla
tarayıcınıza benzersiz bir üçüncü taraf çerezi yerleştirilebilir. <span
class=SpellE>estetikpanel.com’un</span> web sitesi/mobil uygulaması/mobil
sitesi ayrıca; Google, <span class=SpellE>Inc</span>. (&quot;Google&quot;)
tarafından sağlanan bir web analizi hizmeti olan Google <span class=SpellE>Analytics</span>
kullanmaktadır. Google <span class=SpellE>Analytics</span>, çerezleri
ziyaretçilerin web sitesini/mobil uygulamayı/<span class=SpellE>mobi</span>
sitesini nasıl kullandıklarını analiz etmek amacıyla kullanır. Bu web sitesini/mobil
uygulamayı/mobil sitesini kullanımınızla ilgili bilgiler (IP adresiniz dahil)
Google'a aktarılarak Google tarafından ABD'deki sunucularda saklanmaktadır.
Google bu bilgileri web sitesini/mobil uygulamayı/mobil sitesini kullanımınızı
değerlendirmek, estetikpanel.com web sitesi/mobil uygulama/mobil site
faaliyetini derlemek ve web sitesi/mobil uygulama/mobil <span class=SpellE>sitesifaaliyeti</span>
ve internet kullanımıyla ilgili başka hizmetler sağlamak amacıyla
kullanacaktır. Fakat IP adresinizi Google tarafından depolanan diğer verilerle
eşleştirmeyecektir. Google <span class=SpellE>Analytics</span> kullanımı
hakkında daha fazla bilgi için (reddetme seçenekleri dahil), şu adresi ziyaret
edebilirsiniz: http://www.google.com/intl/tr/policies/privacy/#infocollect<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Bunun yanı sıra sizler için ilginizi çekebilecek reklamları
size sunabilmek amacıyla, Facebook ile de özel hedef kitle oluşturmak amacıyla,
işbu Gizlilik/Kişisel Verilerin Korunması Politikası ve İletişim <span
class=SpellE>İzni’ni</span> kabul etmekle, estetikpanel.com ile paylaşmış
olduğunuz kişisel verilerinizden e-posta adresiniz Facebook ile
paylaşılmaktadır. <span class=GramE>e</span>-Posta adresinizi Facebook'a
yüklemeden ve iletmeden önce, <span class=SpellE>hash</span> yöntemiyle
Facebook tarafından yerel olarak sistemimizde şifrelenir. Facebook ile
paylaşılan <span class=SpellE>Hash</span> Yöntemiyle Şifrelenen e-posta
adresiniz, yalnızca eşleştirme işlemi için kullanılacaktır. Üçüncü taraflarla
veya diğer reklam verenlerle paylaşılmaz ve eşleştirme işlemi tamamlandıktan
sonra mümkün olan en kısa sürede Facebook sistemlerinden silinirler. Facebook,
(a) kişisel veriniz Facebook sistemlerinde bulunduğu sürece verilerin
güvenliğini ve bütünlüğünü korumak ve (b) Facebook sistemlerinde bulunan
kişisel verinize yanlışlıkla veya yetkisiz olarak erişilmesine ve verinizin
yanlışlıkla veya yetkisiz olarak kullanılmasına, değiştirilmesine veya ifşa
edilmesine karşı korumak için geliştirilen teknik ve fiziksel güvenlik
önlemlerini de içerecek şekilde, özel hedef kitlenizi (&quot;özel hedef
kitleniz&quot;) oluşturan <span class=SpellE>Hash</span> Yöntemiyle Şifrelenen
Verilerin ve Facebook Kullanıcı Kimliği koleksiyonunun gizliliğini ve güvenliğini
sağlayacaktır. Ayrıca, izniniz olmadan veya yasalar gerektirmediği sürece,
Facebook üçüncü taraflara veya diğer reklam verenlere özel hedef kitleniz için
erişim veya bilgi vermez, özel hedef kitle bilgilerinizi kullanıcılarımız
hakkındaki bilgilere eklemez veya ilgi alanına dayalı profiller oluşturmaz ya
da özel hedef kitlenizi size hizmet sunmanın haricinde kullanmaz. Facebook özel
hedef kitleler koşulları için
https://www.facebook.com/ads/manage/customaudiences/tos.php?_=_ adresini,
Facebook Gizlilik İlkeleri için https://www.facebook.com/privacy/explanation
adresini ziyaret edebilirsiniz.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Resmi Makamlarla Kişisel Veri Paylaşımı<o:p></o:p></p>

<p class=MsoNormal>estetikpanel.com ziyaretinize veya üyeliğe ilişkin kişisel
verilerinizi ve gezinme bilgileriniz gibi trafik bilgilerinizi; güvenliğiniz ve
Estetik <span class=SpellE>Panel’in</span> yasalar karşısındaki yükümlülüğünü
ifa etmesi amacıyla yasal olarak bu bilgileri talep etmeye yetkili olan kamu
kurum ve kuruluşları ile paylaşabilecektir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Kişisel Verilerin Korunmasına İlişkin Önlemler<o:p></o:p></p>

<p class=MsoNormal>Estetik Panel kişisel verilere yetkisiz erişimi engellemek
için gerekli önlemleri almaktadır.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Estetik Panel kişisel verilerinizi gizli tutacağını taahhüt
eder. Yine de alınan önlemlere rağmen <span class=SpellE>estetikpanel.com'a</span>
yapılabilecek saldırılar nedeniyle verilerin üçüncü kişilerin eline geçmesi
durumunda, Estetik Panel bu durumu derhal sizlere ve Kişisel Verileri Koruma
Kurulu’na bildirir ve gerekli önlemleri alır.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Estetik Panel işbu Gizlilik ve Kişisel Verilerin Korunması <span
class=SpellE>Politikası'nda</span> değişiklik yapabilir. İşbu Gizlilik ve
Kişisel Verilerin Korunması <span class=SpellE>Politikası'ndaki</span>
değişikliklerden haberdar olmanız için estetikpanel.com üyelerine gerekli
bilgilendirme yapılacaktır. Kullanıcılar, Üyelik/Kişisel bilgilerini ve
iletişim tercihlerini her zaman sisteme giriş yaparak güncelleyebilirler. Bu
konudaki taleplerinizi contact@estetikpanel.com e-posta adresine e-posta
göndererek iletebilirsiniz.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Uygulanacak Hukuk, Yetkili Mahkeme ve İcra Daireleri<o:p></o:p></p>

<p class=MsoNormal>İşbu Gizlilik/Kişisel Verilerin Korunması Politikası ve
İletişim İzni, Türkiye Cumhuriyeti kanunlarına tabidir. Gizlilik/Kişisel
Verilerin Korunması Politikası ve İletişim <span class=SpellE>İzni’nin</span>
uygulanmasından doğabilecek her türlü uyuşmazlığın çözümünde İstanbul Merkez
Mahkeme ve İcra Daireleri yetkilidir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>İletişim İzni<o:p></o:p></p>

<p class=MsoNormal>İşbu Gizlilik/Kişisel Verilerin Korunması Politikası ve
İletişim <span class=SpellE>İzni’ni</span> kabul etmekle, bizimle
paylaşılmasına rıza göstermiş olduğunuz kişisel verilerinizin, tarafınıza
çeşitli avantajların sağlanıp sunulabilmesi ve size özel tanıtım, promosyon,
reklam, satış, pazarlama, anket ve benzer amaçlı her türlü elektronik
iletişimin telefon, kısa mesaj (SMS), e-posta ve benzeri yollarla yapılması ve
diğer iletişim mesajlarının gönderilmesi amacıyla; toplanmasına, saklanmasına,
işlenmesine, kullanılmasına ve Estetik <span class=SpellE>Panel’in</span>
sözleşme ilişkisi içerisinde olduğu üçüncü kişilere aktarımına izin vermiş
bulunmaktasınız.</p>

</div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer fixed-footer footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/ui/prism.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>