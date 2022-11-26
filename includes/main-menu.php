    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div id="navbar-header" class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="/">
                        <div class="brand-logo"></div>
                        <div class="ep-logo"></div>
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" id="menuStatus" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class=" nav-item <?=checkUrlMenu($urls,'index.php')?>"><a href="/"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Gösterge Paneli</span></a></li>
                    <li class=" navigation-header"><span data-i18n="Modules">Modüller</span>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-meeting-appointment.php')?>"><a href="app-meeting-appointment"><i class="feather icon-feather"></i><span class="menu-title" data-i18n="Meeting Appointment">Görüşme Takvimi</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-events.php')?>"><a href="app-events"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Calender">Randevu Takvimi</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-customer-list.php')?> <?=checkUrlMenu($urls,'app-customer-view.php')?> <?=checkUrlMenu($urls,'app-customer-edit.php')?>"><a href="app-customer-list"><i class="feather icon-users"></i><span class="menu-title" data-i18n="Customer">Müşteriler</span></a>
                </li>
                <li class=" nav-item <?php if($urls=='app-sms-send.php' || $urls=='app-sms-report.php'){ echo 'open';} ?>"><a href="app-sms-send"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="SMS Processes">SMS İşlemleri</span></a>
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'app-sms-send.php')?>"><a href="app-sms-send"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="Bulk SMS Sending">Toplu SMS Gönderimi</span></a></li>
                        <li class="<?=checkUrlMenu($urls,'app-sms-report.php')?>"><a href="app-sms-report"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="SMS Send Report">Giden İleti Raporu</span></a></li>
                        <li class="<?=checkUrlMenu($urls,'app-sms-received.php')?>"><a href="app-sms-received"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="SMS Received Report">Gelen İleti Raporu</span></a></li>
                    </ul>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'report-sessions.php')?>"><a href="report-sessions"><i class="feather icon-download-cloud"></i><span class="menu-title" data-i18n="">Seans Raporları</span></a>
                </li>
                <?php if($staffMission==1){ ?>
                <li class=" nav-item <?php if($urls=='report-earnings-by-installment-date.php' || $urls=='report-earnings-by-process-date.php'){ echo 'open';} ?>"><a><i class="feather icon-trending-up"></i><span class="menu-title" data-i18n="Title report earnings php">Ciro Raporu</span></a>
                    <ul class="menu-content">
                        <li class="has-sub is-shown <?php if($urls=='report-earnings-by-process-date.php'){ echo 'open';} ?>"><a href="#"><i class="fa fa-cogs"></i><span class="menu-item" style="font-size:.7em" data-i18n="">İşlem Zamanına Göre</span></a>
                            <ul class="menu-content <?php if($urls=='report-earnings-by-process-date.php'){ echo 'open';} ?>">
                                <li id="NavEarningsReportByProcess" class=" nav-item "><a href="report-earnings-by-process-date#earning-graph"><i class="feather icon-trending-up"></i><span class="menu-title" style="font-size:.7em" data-i18n="Earnings Graph">Kazanç Grafiği</span></a></li>
                                <li id="NavServiceReportByProcess" class=" nav-item "><a href="report-earnings-by-process-date#service-reports"><i class="feather icon-list"></i><span class="menu-title" style="font-size:.7em" data-i18n="Service Sales">Hizmet Satışları</span></a></li>
                                <li id="NavProductReportByProcess" class=" nav-item "><a href="report-earnings-by-process-date#product-reports"><i class="feather icon-tag"></i><span class="menu-title" style="font-size:.7em" data-i18n="Product Sales">Ürün Satışları</span></a></li>
                            </ul>
                        </li>
                        <li class="has-sub is-shown <?php if($urls=='report-earnings-by-installment-date.php' ){ echo 'open';} ?>"><a href="#"><i class="fa fa-list-ol"></i><span class="menu-item" style="font-size:.7em" data-i18n="">Tahsilat Tarh. Göre</span></a>
                            <ul class="menu-content" style="">
                                <li id="NavEarningsReportByInstallment" class=" nav-item "><a href="report-earnings-by-installment-date#earning-graph"><i class="feather icon-trending-up"></i><span class="menu-title" style="font-size:.7em" data-i18n="Earnings Graph">Kazanç Grafiği</span></a></li>
                                <li id="NavServiceReportByInstallment" class=" nav-item "><a href="report-earnings-by-installment-date#service-reports"><i class="feather icon-list"></i><span class="menu-title" style="font-size:.7em" data-i18n="Service Sales">Hizmet Satışları</span></a></li>
                                <li id="NavProductReportByInstallment" class=" nav-item "><a href="report-earnings-by-installment-date#product-reports"><i class="feather icon-tag"></i><span class="menu-title" style="font-size:.7em" data-i18n="Product Sales">Ürün Satışları</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <?php } ?>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-expenses.php')?>"><a href="app-expenses"><i class="feather icon-trending-down"></i><span class="menu-title" data-i18n="Expenses">Harcamalar</span><span class="badge badge badge-primary badge-pill float-right mr-2">Yeni</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-debtors.php')?>"><a href="app-debtors"><i class="feather icon-trending-down"></i><span class="menu-title" data-i18n="Title app debtors php">Borçlular Listesi</span><span class="badge badge badge-primary badge-pill float-right mr-2">Yeni</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-game.php')?>"><a href="app-game"><i class="fa fa-puzzle-piece"></i><span class="menu-title" >Puzzle Oyna!</span><span class="badge badge badge-primary badge-pill float-right mr-2">Yeni</span></a>
                </li>
                <?php if($staffMission==1){ ?>
                <li class=" navigation-header"><span data-i18n="Settings"></span>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-services.php')?>"><a href="app-services"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Services">Hizmetler</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-services-application-areas.php')?>"><a href="app-services-application-areas"><i class="feather icon-share-2"></i><span class="menu-title" data-i18n="Service Areas">Hizmet Bölgeleri</span></a>
                </li>
                <li class=" nav-item <?=checkUrlMenu($urls,'app-products.php')?>"><a href="app-products"><i class="feather icon-tag"></i><span class="menu-title" data-i18n="Products">Ürünler</span></a>
                </li>
                <li class=" nav-item <?php if($urls=='settings-room.php' || $urls == 'app-staff-list.php' || $urls=='settings-dayOfwork.php'){ echo 'open';} ?>"><a ><i class="feather icon-sliders"></i><span class="menu-title" data-i18n="Company Settings">Şirket Ayarları</span></a>
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'settings-room.php')?>"><a href="settings-room"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="Room Settings">Seans Oda Ayarları</span></a></li>
                    </ul>    
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'settings-dayOfwork.php')?>"><a href="settings-dayOfwork"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Title settings dayOfwork php">Çalışma Cetveli</span></a></li>
                    </ul>
                    <ul class="menu-content">
                        <li class="<?=checkUrlMenu($urls,'app-staff-list.php')?>"><a href="app-staff-list"><i class="fa fa-id-card-o"></i><span class="menu-title" data-i18n="Title app staff list php">Personel Listesi</span></a></li>
                    </ul>
                    <ul class="menu-content" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bu Modül Geliştirme Aşamasındadır.">
                        <li class="<?=checkUrlMenu($urls,'')?>"><a href="#"><i class="feather icon-calendar"></i><span class="menu-title" data-i18n="">Personel Çalışma Çizelgesi</span></a></li>
                    </ul>    
                </li>
                <?php } ?>
                <?php if($user_ID==33){ ?>
                    <hr>
                    <li class=" navigation-header"><span># Root Menü:</span>
                    </li>
                    <li class=" nav-item">
                        <select name="Companys" id="companys" class="form-control">
                            <?php
                            	$QallCompanys = "SELECT FIRMA_ID, FIRMA_ADI FROM tbl_firma WHERE DURUM = 1 ORDER BY FIRMA_ADI ASC";
                                $RallCompanys = $db->query($QallCompanys, PDO::FETCH_ASSOC);
                            
                                if ( $RallCompanys->rowCount() ){
                                    foreach( $RallCompanys as $row ){
                                        $selected = '';
                                        if($row['FIRMA_ID']==$user_Firma){
                                            $selected = 'selected';
                                        }
                                        ?>
                                        <option <?=$selected?> value="<?=$row['FIRMA_ID']?>"><?=$row['FIRMA_ID']?> | <?=$row['FIRMA_ADI']?></option>
                                    <?php
                                    }
                                }
                                ?>
                        </select>
                        <script src="/app-assets/vendors/js/vendors.min.js"></script>

                        <script>
                            $("#companys").on('change', function() {
                                $.ajax({
                                        type: "POST",
                                        data: ({
                                            CIM: $(this).val()
                                        }),
                                        url: "/api/update/companyChange.php",
                                        success: function(res) {
                                            var obj = JSON.parse(res);
                                            if(obj['status']==true){
                                                location.reload();
                                            }
                                        }
                                    });
                            });
                        </script>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>