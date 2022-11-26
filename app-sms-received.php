<?php include 'header-top.php'; ?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>

<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php include 'includes/header.php'?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php include 'includes/main-menu.php'?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Gelen SMS Dökümü</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                    </li>
                                    <li class="breadcrumb-item active">Gelen SMS Raporu
                                    </li>
                                    </ol>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                        </div>
                    </div>
                    <div class="content-body">
                        <!-- users list start -->
                        <div class="row justify-content-center">
                            <div class="col">
                                <section id="payment-reports">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title" id="horz-layout-colored-controls">Müşterilerden Gelen SMS Dökümü</h4>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                        </ul>
                                                    </div>
                                                </div>
                                                  <div class="card-body collapse show">
                                                      <div class="table-responsive">
                                                          <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                                              <thead>
                                                                  <tr>
                                                                      <th>ID</th>
                                                                      <th>Müşteri</th>
                                                                      <th>Telefon</th>
                                                                      <th>Alınan Tarh.</th>
                                                                      <th>Gelen SMS</th>
                                                                      <th>Gönderi Tarh.</th>
                                                                      <th>Giden SMS</th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>
                                                                  <?php
                                                                      $query = $db->query("SELECT * FROM view_sms_received WHERE FIRMA_ID =$user_Firma ORDER BY ID DESC", PDO::FETCH_ASSOC);
                                                                      if ( $query->rowCount() )
                                                                      {
                                                                          foreach( $query as $row )
                                                                          {
                                                                            $Smsg = $row['SEND_MSG'];
                                                                            $Rmsg = $row['RECEIVE_MSG'];
                                                                            print "<tr>";
                                                                          print '<td>'.$row['ID'].'</td>';
                                                                          print '<td>'.$row['CUSTOMER'].'</td>';
                                                                          print '<td>'.$row['PHONE'].'</td>';
                                                                          print '<td>'.$row['RECEIVE_DT'].'</td>';
                                                                          print '<td><a data-toggle="tooltip" data-placement="bottom" data-original-title="'.$Rmsg.'">'. kisalt($Rmsg, 80).'</a></td>';
                                                                          print '<td>'.$row['SEND_DT'].'</td>';
                                                                          print '<td><a data-toggle="tooltip" data-placement="bottom" data-original-title="'.$Smsg.'">'. kisalt($Smsg, 30).'</a></td>';
                                                                          print "</tr>";
                                                                          }
                                                                      }
                                                                      ?>
                                                              </tbody>
                                                              <tfoot>
                                                                  <tr>
                                                                      <th>ID</th>
                                                                      <th>Müşteri</th>
                                                                      <th>Telefon</th>
                                                                      <th>Alınan Tarh.</th>
                                                                      <th>Gelen SMS</th>
                                                                      <th>Gönderi Tarh.</th>
                                                                      <th>Giden SMS</th>
                                                                  </tr>
                                                              </tfoot>
                                                          </table>
                                                      </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <!-- users list ends -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php' ?>
    <!-- END: Footer-->
</body>
<!-- END: Body-->

</html>