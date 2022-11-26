    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div id="navbar-header" class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <div class="ep-logo"></div>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" id="menuStatus" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item <?=checkUrlMenu($urls,'index.php')?>"><a href="/"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Gösterge Paneli</span></a></li>
                    <li class=" navigation-header"><span>Modüller</span>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-events.php')?>"><a href="app-events"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Calender">Randevu Takvimi</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-customer-list.php')?> <?=checkUrlMenu($urls,'app-customer-view.php')?> <?=checkUrlMenu($urls,'app-customer-edit.php')?>"><a href="app-customer-list"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Customer">Müşteriler</span></a>
                </li>
                <li class=" nav-item <?php if($urls=='app-sms-send.php' || $urls=='app-sms-report.php'){ echo 'open';} ?>"><a href="app-sms-send"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="CompanySettings">SMS İşlemleri</span></a>
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'app-sms-send.php')?>"><a href="app-sms-send"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="CompanySettings">Toplu SMS Gönd.</span></a></li>
                        <li class="<?=checkUrlMenu($urls,'app-sms-report.php')?>"><a href="app-sms-report"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="CompanySettings">İleti Raporu</span></a></li>
                    </ul>
                </li>
                <li class=" navigation-header"><span>Ayarlar</span>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-services.php')?>"><a href="app-services"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Services">Hizmetler</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-services-application-areas.php')?>"><a href="app-services-application-areas"><i class="feather icon-share-2"></i><span class="menu-title" data-i18n="Service Areas">Hizmet Bölgeleri</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-products.php')?>"><a href="app-products"><i class="feather icon-tag"></i><span class="menu-title" data-i18n="Products">Ürünler</span></a>
                </li>
                <li class=" nav-item <?php if($urls=='settings-room.php' || $urls=='settings-dayOfwork.php'){ echo 'open';} ?>"><a href="page-account-settings"><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="CompanySettings">Şirket Ayarları</span></a>
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'settings-room.php')?>"><a href="settings-room"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="CompanySettings">Oda Ayarları</span></a></li>
                    </ul>    
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'settings-dayOfwork.php')?>"><a href="settings-dayOfwork"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Title settings dayOfwork php">Şirket Çalışma Cetveli</span></a></li>
                    </ul>   
                    <ul class="menu-content" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bu Modül Geliştirme Aşamasındadır.">
                        <li class="<?=checkUrlMenu($urls,'')?>"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="">Personel Çalışma Çizelgesi</span></a></li>
                    </ul>    
                </li>
            </ul>
        </div>
    </div>