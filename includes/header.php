<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon feather icon-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="EstetikPanel'i Keşfet..." tabindex="0" data-search="template-list">
                                    <ul class="search-list search-list-bookmark"></ul>
                                </div>
                                <!-- select.bookmark-select-->
                                <!--   option Chat-->
                                <!--   option email-->
                                <!--   option todo-->
                                <!--   option Calendar-->
                            </li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                            <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                            <!--     i.ficon.feather.icon-menu-->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Yapılacaklar"><i class="ficon feather icon-check-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Sohbet"><i class="ficon feather icon-message-square"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Mesajlar"><i class="ficon feather icon-mail"></i></a></li>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="Takvim"><i class="ficon feather icon-calendar"></i></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <?php include 'app-assets/data/locales/lang.php'; ?>

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon feather icon-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="input" type="text" placeholder="EstetikPanel'i Keşfet 👀" tabindex="-1" data-search="template-list">
                                <div class="search-input-close"><i class="feather icon-x"></i></div>
                                <ul class="search-list search-list-main"></ul>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link nav-link-support" data-toggle="modal" data-target="#inlineForm"><i class="ficon feather icon-edit"></i></a>
                        <li class="nav-item"><a class="nav-link nav-link-layout"><i class="ficon feather icon-sun"></i></a></li>
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon feather icon-mail"></i>
                                <span class="badge badge-pill badge-primary badge-up msgCount" id="msgCount">{0}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"><msgCount id="msgCountTitle"></msgCount> Yeni SMS</h3>
                                        <span class="notification-title">Müşteriden Gelen Mesajlar</span>
                                    </div>
                                </li>
                                <?php
                                    // echo "SELECT * FROM view_sms_received WHERE FIRMA_ID=$user_Firma AND DATE(RECEIVE_DT) = CURDATE() ORDER BY ID DESC";
                                    $query = $db->query("SELECT * FROM view_sms_received WHERE FIRMA_ID=$user_Firma AND DATE(RECEIVE_DT) = CURDATE() ORDER BY ID DESC", PDO::FETCH_ASSOC);
                                    if ( $query->rowCount() ){
                                        foreach( $query as $row ){
                                            $receiveDT = $row['RECEIVE_DT'];
                                            ?>
                                            <li class="scrollable-container media-list">
                                                <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left"><i class="feather icon-mail font-medium-5"></i></div>
                                                        <div class="media-body">
                                                            <h6 class="media-heading"><?=$row['CUSTOMER']?></h6>
                                                            <small class="notification-text success"><?=$row['RECEIVE_MSG']?></small>
                                                        </div>
                                                        <small class="warning"><?php echo time_elapsed_string($receiveDT); ?></small>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                        <script>
                                        document.getElementById("msgCountTitle").innerHTML = "<?=$query->rowCount()?>";
                                        document.getElementById("msgCount").innerHTML = "<?=$query->rowCount()?>";
                                        </script>
                                        <?php
                                    }
                                ?>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="/app-sms-received">Tüm İletiler</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?=$isimsoyisim;?></span><span class="user-status">Çevrimiçi</span></div><span><img class="round" src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#"><i class="feather icon-user"></i> Profili Düzenle</a><a class="dropdown-item" href="#"><i class="feather icon-mail"></i> Mesaj Kutum</a><a class="dropdown-item" href="#"><i class="feather icon-check-square"></i> Yapılacaklar</a><a class="dropdown-item" href=""><i class="feather icon-message-square"></i> Sohbet</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-logout.php?returnURL=<?php echo $_SERVER['REQUEST_URI']; ?>&logout=true"><i class="feather icon-power"></i><logout data-i18n="Logout">Çıkış yap</logout></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none"></ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>Aradağınız sayfa bulunamadı 🤦‍♂️🤷‍♂️</span></div>
            </a></li>
    </ul>
    