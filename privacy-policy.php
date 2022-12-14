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
                                            <div class="media-body"><span class="item-title text-truncate text-bold-500 d-block mb-50">Apple - Macbook?? (Latest Model) - 12" Display - Intel Core M5 - 8GB Memory - 512GB Flash Storage - Space Gray</span><span class="item-desc font-small-2 text-truncate d-block"> MacBook delivers a full-size experience in the lightest and most compact Mac notebook ever. With a full-size keyboard, force-sensing trackpad, 12-inch Retina display,1 sixth-generation Intel Core M processor, multifunctional USB-C port, and now up to 10 hours of battery life,2 MacBook features big thinking in an impossibly compact form.</span>
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
                        <h4 class="card-title">Gizlilik Politikas??</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                            <div class=WordSection1>

<p class=MsoNormal>Gizlilik ve Ki??isel Verilerin Korunmas?? Politikas??n??n Amac??<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Bu Gizlilik ve Ki??isel Verilerin Korunmas?? Politikas?? <span
class=SpellE>Ganitto</span> A.??.'<span class=SpellE>nin</span> (Estetik Panel)
i??letti??i estetikpanel.com adresli internet hizmetinin ne gibi ki??isel veriler
toplad??????n??, bu bilgilerin nas??l kullan??ld??????n??, gerekmesi halinde Estetik
Panel ???in bu bilgileri kimlerle payla??abilece??ini, Estetik Panel ???in
toplad??????/i??ledi??i/saklad?????? ki??isel verilerinize ili??kin haklar??n??z??n ne
oldu??unu, bu haklar?? nas??l kullanabilece??inizi ve elektronik ticari iletiler
konusundaki tercihlerinizi nas??l de??i??tirebilece??inizi a????klamaktad??r.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Ki??isel verilerin i??lenmesine ili??kin hukuki dayanak<o:p></o:p></p>

<p class=MsoNormal>Estetik Panel ???in sundu??u internet hizmeti olan estetikpanel.com,
5651 Say??l?? ??nternet Ortam??nda Yap??lan Yay??nlar??n D??zenlenmesi ve Bu Yay??nlar
Yoluyla ????lenen Su??larla M??cadele Edilmesi Hakk??nda Kanun ve ilgili ikincil
mevzuat, 6563 Say??l?? Elektronik Ticaretin D??zenlenmesi Hakk??nda Kanun ve ilgili
ikincil mevzuat, 5237 Say??l?? T??rk Ceza Kanunu ve 6698 Say<span
style='mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri'>??</span>l<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>??</span> Ki<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>??</span>isel
Verilerin Korunmas<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>??</span> Kanunu ve benzeri kanun ve y<span
style='mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri'>??</span>netmeliklerden kaynaklanan y<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>??</span>k<span
style='mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri'>??</span>ml<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>??</span>l<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>??</span>klerini
yerine getirebilmek i<span style='mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri'>??</span>in ki<span style='mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri'>??</span>isel
verilerinizi (ad, <span class=SpellE>soyad</span>, do??um tarihi, cep telefonu
numaras??, e-posta, cinsiyet, adres ve ki??iyi do??rudan veya dolayl?? olarak
tan??mlamaya y??nelik baz?? ki??isel bilgileri) toplamaktad??r.<o:p></o:p></p>

<p class=MsoNormal>Bu veriler a????k r??zan??za istinaden, burada belirtilen
ama??lar d??????nda kullan??lmamak kayd?? ile her t??rl?? tedbir al??narak toplanacak,
i??lenecek ve saklanacakt??r.<o:p></o:p></p>

<p class=MsoNormal>????lenen ki??isel verilerinizin neler oldu??unu, yurt i??i veya
yurt d??????nda ki??isel verilerin aktar??ld?????? ??????nc?? ki??ileri ????renmek,
verilerinizi de??i??tirmek, g??ncellemek ve/veya silmek estetikpanel.com web
sitesi, mobil uygulamas?? ve mobil sitesi ??zerinden hesab??n??za eri??ebilir veya
contact@estetikpanel.com e-posta adresi ??zerinden bizimle irtibata ge??ebilirsiniz.
6698 Say??l?? Ki??isel Verilerin Korunmas?? Kanunu madde 11 uyar??nca sahip
oldu??unuz di??er haklar sakl??d??r.<o:p></o:p></p>

<p class=MsoNormal>6563 Say??l?? Elektronik Ticaretin D??zenlenmesi Hakk??nda Kanun
uyar??nca; onay??n geri al??nd??????na ili??kin kay??tlar bu tarihten itibaren 1 y??l;
ticari elektronik iletinin i??eri??i ve g??nderiye ili??kin di??er her t??rl?? kay??t
ise gerekti??inde ilgili bakanl????a sunulmak ??zere 3 y??l saklanacakt??r. S??re
ge??tikten sonra ki??isel verileriniz ??irketimiz taraf??ndan ??zerine silinir, yok
edilir veya anonim hale getirilir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>??erez (<span class=SpellE>Cookie</span>) Kullan??m??<o:p></o:p></p>

<p class=MsoNormal>estetikpanel.com yasal y??k??ml??l?????? ??er??evesinde, i??bu
Gizlilik ve Ki??isel Verilerin Korunmas?? Politikas?? ile belirlenen ama??lar
d??????nda kullan??lmamak ??art?? ile gezinme bilgilerinizi toplayacak, i??leyecek,
??????nc?? ki??ilerle payla??acak ve g??venli olarak saklayacakt??r. Gezinme
bilgilerinizi toplama amac??yla kulland??????m??z ??erezler (<span class=SpellE>cookie</span>)
hakk??nda bilgi, estetikpanel.com web ve mobil sitesine ilk giri??inizde veya
mobil uygulamas??n?? telefonunuza veya tabletinize y??kledi??inizde ???a????l??r pencere
(pop-<span class=SpellE>up</span> ekran)??? ile verilecektir.<o:p></o:p></p>

<p class=MsoNormal>??erezler, estetikpanel.com 'u ziyaret etti??inizde veya mobil
uygulamay?? cep telefonunuza y??kledi??inizde veya mobil <span class=SpellE>sitesi???nden</span>
ba??land??????n??zda, internet taray??c??n??z taraf??ndan y??klenen ve bilgisayar??n??z,
cep telefonunuz veya tabletinizde saklanan k??????k bilgi par??ac??klar??n?? i??eren
metin dosyalar??d??r.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>estetikpanel.com, size ??zel tan??t??m yapmak, promosyonlar ve
pazarlama teklifleri sunmak, web sitesinin veya mobil uygulaman??n i??eri??ini
size g??re iyile??tirmek ve/veya tercihlerinizi belirlemek <span class=GramE>amac??yla</span>;
site ??zerinde gezinme bilgilerinizi ve/veya site ??zerindeki ??yelik kullan??m
ge??mi??inizi izlemektedir. estetikpanel.com farkl?? y??ntemlerle veya farkl??
zamanlarda site ??zerinde toplanan bilgileri e??le??tirebilir ve bu bilgileri
??????nc?? taraflar gibi ba??ka kaynaklardan al??nan bilgilerle birlikte
kullanabilir. S??z konusu e??le??tirme ve kullanma yaln??zca i??bu Gizlilik ve
Ki??isel Verilerin Korunmas?? Politikas?? ile belirlenen ama??lar ve kapsam
dahilinde kalacakt??r.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>??erez ??e??itleri<o:p></o:p></p>

<p class=MsoNormal>estetikpanel.com web sitesinde, mobil uygulamas??nda ve mobil
sitesinde oturum ??erezleri ve kal??c?? ??erezler kullanmaktad??r. Oturum kimli??i
??erezi, taray??c??n??z?? kapatt??????n??zda sona erer. Kal??c?? ??erez ise sabit
diskinizde uzun bir s??re kal??r. ??nternet taray??c??n??z??n &quot;yard??m&quot;
dosyas??nda verilen talimatlar?? izleyerek veya ???www.allaboutcookies.org??? veya
???www.youronlinechoices.eu??? adresini ziyaret ederek kal??c?? ??erezleri
kald??rabilir ve hem oturum ??erezlerini hem de kal??c?? ??erezleri
reddedebilirsiniz. Kal??c?? ??erezleri veya oturum ??erezlerini reddederseniz, web
sitesini, mobil uygulamay?? ve mobil sitesini kullanmaya devam edebilirsiniz,
fakat web sitesinin, mobil uygulaman??n ve mobil sitesinin t??m i??levlerine
eri??emeyebilirsiniz veya eri??iminiz s??n??rl?? olabilir. Mobil uygulamada s??z
konusu durum de??i??kenlik g??sterebilmektedir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>estetikpanel.com ??erezleri yapt??????n??z tercihleri hat??rlamak
ve web sitesi/mobil uygulama/mobil sitesi kullan??m??n??z?? ki??iselle??tirmek i??in
kullan??r (??rne??in parolan??z?? kaydeden ve oturumunuzun s??rekli a????k kalmas??n??
sa??layan, daha sonraki ziyaretlerinizde sizi tan??yan ??erezler). estetikpanel.com
??erezleri ayr??ca <span class=SpellE>estetikpanel.com???a</span> nereden
ba??land??????n??z, hangi i??eri??i g??r??nt??ledi??iniz ve ziyaretinizin s??resi gibi <span
class=SpellE>estetikpanel.com'u</span> nas??l kulland??????n??z?? takip etmemizi sa??lar.
Buna ek olarak, ilgi alanlar??n??za ve size daha uygun i??erik ve kampanyalar
sunmak i??in hedeflenmi?? reklam/tan??t??m amac??yla kullan??r. estetikpanel.com
??erezler yoluyla elde edilen bilgileri kullan??c??lardan toplanan ki??isel
verilerle e??le??tirir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal><span style='font-family:"Calibri Light",sans-serif;
mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin;mso-bidi-theme-font:
major-latin'>estetikpanel.com ??????nc?? taraf ??erezlerini reklam ve yeniden
hedefleme i??in nas??l kullanmaktad??r?<o:p></o:p></span></p>

<p class=MsoNormal>estetikpanel.com ??erezleri ayr??ca; arama motorlar??n??, <span
class=SpellE>estetikpanel.com'u</span> ve <span class=SpellE>estetikpanel.com???un</span>
reklam verdi??i web sitelerini ziyaret etti??inizde ilginizi ??ekebilece??ini
d??????nd?????? reklamlar?? size sunabilmek i??in kullanabilir. Bu reklamlar?? sunarken,
<span class=SpellE>estetikpanel.com???un</span> sizi tan??yabilmesi amac??yla
taray??c??n??za benzersiz bir ??????nc?? taraf ??erezi yerle??tirilebilir. <span
class=SpellE>estetikpanel.com???un</span> web sitesi/mobil uygulamas??/mobil
sitesi ayr??ca; Google, <span class=SpellE>Inc</span>. (&quot;Google&quot;)
taraf??ndan sa??lanan bir web analizi hizmeti olan Google <span class=SpellE>Analytics</span>
kullanmaktad??r. Google <span class=SpellE>Analytics</span>, ??erezleri
ziyaret??ilerin web sitesini/mobil uygulamay??/<span class=SpellE>mobi</span>
sitesini nas??l kulland??klar??n?? analiz etmek amac??yla kullan??r. Bu web sitesini/mobil
uygulamay??/mobil sitesini kullan??m??n??zla ilgili bilgiler (IP adresiniz dahil)
Google'a aktar??larak Google taraf??ndan ABD'deki sunucularda saklanmaktad??r.
Google bu bilgileri web sitesini/mobil uygulamay??/mobil sitesini kullan??m??n??z??
de??erlendirmek, estetikpanel.com web sitesi/mobil uygulama/mobil site
faaliyetini derlemek ve web sitesi/mobil uygulama/mobil <span class=SpellE>sitesifaaliyeti</span>
ve internet kullan??m??yla ilgili ba??ka hizmetler sa??lamak amac??yla
kullanacakt??r. Fakat IP adresinizi Google taraf??ndan depolanan di??er verilerle
e??le??tirmeyecektir. Google <span class=SpellE>Analytics</span> kullan??m??
hakk??nda daha fazla bilgi i??in (reddetme se??enekleri dahil), ??u adresi ziyaret
edebilirsiniz: http://www.google.com/intl/tr/policies/privacy/#infocollect<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Bunun yan?? s??ra sizler i??in ilginizi ??ekebilecek reklamlar??
size sunabilmek amac??yla, Facebook ile de ??zel hedef kitle olu??turmak amac??yla,
i??bu Gizlilik/Ki??isel Verilerin Korunmas?? Politikas?? ve ??leti??im <span
class=SpellE>??zni???ni</span> kabul etmekle, estetikpanel.com ile payla??m????
oldu??unuz ki??isel verilerinizden e-posta adresiniz Facebook ile
payla????lmaktad??r. <span class=GramE>e</span>-Posta adresinizi Facebook'a
y??klemeden ve iletmeden ??nce, <span class=SpellE>hash</span> y??ntemiyle
Facebook taraf??ndan yerel olarak sistemimizde ??ifrelenir. Facebook ile
payla????lan <span class=SpellE>Hash</span> Y??ntemiyle ??ifrelenen e-posta
adresiniz, yaln??zca e??le??tirme i??lemi i??in kullan??lacakt??r. ??????nc?? taraflarla
veya di??er reklam verenlerle payla????lmaz ve e??le??tirme i??lemi tamamland??ktan
sonra m??mk??n olan en k??sa s??rede Facebook sistemlerinden silinirler. Facebook,
(a) ki??isel veriniz Facebook sistemlerinde bulundu??u s??rece verilerin
g??venli??ini ve b??t??nl??????n?? korumak ve (b) Facebook sistemlerinde bulunan
ki??isel verinize yanl????l??kla veya yetkisiz olarak eri??ilmesine ve verinizin
yanl????l??kla veya yetkisiz olarak kullan??lmas??na, de??i??tirilmesine veya if??a
edilmesine kar???? korumak i??in geli??tirilen teknik ve fiziksel g??venlik
??nlemlerini de i??erecek ??ekilde, ??zel hedef kitlenizi (&quot;??zel hedef
kitleniz&quot;) olu??turan <span class=SpellE>Hash</span> Y??ntemiyle ??ifrelenen
Verilerin ve Facebook Kullan??c?? Kimli??i koleksiyonunun gizlili??ini ve g??venli??ini
sa??layacakt??r. Ayr??ca, izniniz olmadan veya yasalar gerektirmedi??i s??rece,
Facebook ??????nc?? taraflara veya di??er reklam verenlere ??zel hedef kitleniz i??in
eri??im veya bilgi vermez, ??zel hedef kitle bilgilerinizi kullan??c??lar??m??z
hakk??ndaki bilgilere eklemez veya ilgi alan??na dayal?? profiller olu??turmaz ya
da ??zel hedef kitlenizi size hizmet sunman??n haricinde kullanmaz. Facebook ??zel
hedef kitleler ko??ullar?? i??in
https://www.facebook.com/ads/manage/customaudiences/tos.php?_=_ adresini,
Facebook Gizlilik ??lkeleri i??in https://www.facebook.com/privacy/explanation
adresini ziyaret edebilirsiniz.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Resmi Makamlarla Ki??isel Veri Payla????m??<o:p></o:p></p>

<p class=MsoNormal>estetikpanel.com ziyaretinize veya ??yeli??e ili??kin ki??isel
verilerinizi ve gezinme bilgileriniz gibi trafik bilgilerinizi; g??venli??iniz ve
Estetik <span class=SpellE>Panel???in</span> yasalar kar????s??ndaki y??k??ml??l??????n??
ifa etmesi amac??yla yasal olarak bu bilgileri talep etmeye yetkili olan kamu
kurum ve kurulu??lar?? ile payla??abilecektir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Ki??isel Verilerin Korunmas??na ??li??kin ??nlemler<o:p></o:p></p>

<p class=MsoNormal>Estetik Panel ki??isel verilere yetkisiz eri??imi engellemek
i??in gerekli ??nlemleri almaktad??r.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Estetik Panel ki??isel verilerinizi gizli tutaca????n?? taahh??t
eder. Yine de al??nan ??nlemlere ra??men <span class=SpellE>estetikpanel.com'a</span>
yap??labilecek sald??r??lar nedeniyle verilerin ??????nc?? ki??ilerin eline ge??mesi
durumunda, Estetik Panel bu durumu derhal sizlere ve Ki??isel Verileri Koruma
Kurulu???na bildirir ve gerekli ??nlemleri al??r.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Estetik Panel i??bu Gizlilik ve Ki??isel Verilerin Korunmas?? <span
class=SpellE>Politikas??'nda</span> de??i??iklik yapabilir. ????bu Gizlilik ve
Ki??isel Verilerin Korunmas?? <span class=SpellE>Politikas??'ndaki</span>
de??i??ikliklerden haberdar olman??z i??in estetikpanel.com ??yelerine gerekli
bilgilendirme yap??lacakt??r. Kullan??c??lar, ??yelik/Ki??isel bilgilerini ve
ileti??im tercihlerini her zaman sisteme giri?? yaparak g??ncelleyebilirler. Bu
konudaki taleplerinizi contact@estetikpanel.com e-posta adresine e-posta
g??ndererek iletebilirsiniz.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>Uygulanacak Hukuk, Yetkili Mahkeme ve ??cra Daireleri<o:p></o:p></p>

<p class=MsoNormal>????bu Gizlilik/Ki??isel Verilerin Korunmas?? Politikas?? ve
??leti??im ??zni, T??rkiye Cumhuriyeti kanunlar??na tabidir. Gizlilik/Ki??isel
Verilerin Korunmas?? Politikas?? ve ??leti??im <span class=SpellE>??zni???nin</span>
uygulanmas??ndan do??abilecek her t??rl?? uyu??mazl??????n ????z??m??nde ??stanbul Merkez
Mahkeme ve ??cra Daireleri yetkilidir.<o:p></o:p></p>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<p class=MsoNormal>??leti??im ??zni<o:p></o:p></p>

<p class=MsoNormal>????bu Gizlilik/Ki??isel Verilerin Korunmas?? Politikas?? ve
??leti??im <span class=SpellE>??zni???ni</span> kabul etmekle, bizimle
payla????lmas??na r??za g??stermi?? oldu??unuz ki??isel verilerinizin, taraf??n??za
??e??itli avantajlar??n sa??lan??p sunulabilmesi ve size ??zel tan??t??m, promosyon,
reklam, sat????, pazarlama, anket ve benzer ama??l?? her t??rl?? elektronik
ileti??imin telefon, k??sa mesaj (SMS), e-posta ve benzeri yollarla yap??lmas?? ve
di??er ileti??im mesajlar??n??n g??nderilmesi amac??yla; toplanmas??na, saklanmas??na,
i??lenmesine, kullan??lmas??na ve Estetik <span class=SpellE>Panel???in</span>
s??zle??me ili??kisi i??erisinde oldu??u ??????nc?? ki??ilere aktar??m??na izin vermi??
bulunmaktas??n??z.</p>

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