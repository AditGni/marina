<?php
error_reporting(0);
ob_start();
session_start();
mysql_connect('localhost','root','');
mysql_select_db('toko');
include "page.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UD MARINA</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?= $page=='produk' || $page=='kategori' || $page=='pelanggan' ? 'active' : '';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-fw fa-book"></i>
          <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse <?= $page=='produk' || $page=='kategori' || $page=='pelanggan' ? 'show' : '';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item <?= $page=='produk' ? 'active' : '';?>" href="?page=produk">Produk</a>
            <a class="collapse-item <?= $page=='kategori' ? 'active' : '';?>" href="?page=kategori">Kategori</a>
            <!-- <a class="collapse-item" href="?page=produk">Stok</a> -->
            <a class="collapse-item <?= $page=='pelanggan' ? 'active' : '';?>" href="?page=pelanggan">Pelanggan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item <?= $page=='daftar-transaksi' ? 'active' : '';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse <?= $page=='daftar-transaksi' ? 'show' : '';?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item <?= $page=='daftar-transaksi' ? 'active' : '';?>" href="?page=daftar-transaksi">Daftar Transaksi</a>

          </div>
        </div>
      </li>
      <li class="nav-item <?= $page=='laporan' ? 'active' : '';?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#laporan" aria-expanded="true" aria-controls="laporan">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Laporan</span>
        </a>
        <div id="laporan" class="collapse <?= $page=='laporan' ? 'show' : '';?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <?php
          $act = $_GET['act'];
          ?>
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
            <a class="collapse-item <?= $act=='produk' ? 'active' : '';?>" href="?page=laporan&act=produk">Data</a>

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php
          include "home.php";
          include $link;
          ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white h-25">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="?page=logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="konfirmasi_bayar" tabindex="-1" role="dialog" aria-labelledby="bayar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bayar">Konfirmasi Pembayaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" class="img-thumbnail w-75 mx-auto d-block">
          <div class="btn-group d-block text-center">
            <button class="btn btn-success konfir_byr"><i class="fa fa-check"></i> Terima</button>
            <button class="btn btn-danger tolak_byr"><i class="fa fa-times"></i> Tolak</button>
          </div>
        </div>

        <div></div>
        <!-- <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="?page=logout">Logout</a>
        </div> -->
      </div>
    </div>
  </div>

  <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="bayar" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="bayar">Detail Transaksi</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/datatables-demo.js"></script>
  <script type="text/javascript">

    function printContent(el){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }

    // Notifikasi Transaksi
    $(".isi-modal").click(function(){
      var id = $(this).attr('alt');
      $(".modal img").attr('src', "img/bukti/"+id.slice(2))
      $(".modal .btn-group .btn").attr('alt', id.slice(0,1))
    })
    $(".konfir_byr").click(function(){
      var id = $(this).attr('alt')
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "hal=konfir_byr&id="+id.slice(0,1),
        success: function(ada){
          window.location = "?page=daftar-transaksi"
        }
      })
    })

    $(".tolak_byr").click(function(){
      var id = $(this).attr('alt')
      $.ajax({
        url: "../pel/ajax_notif.php",
        type: "POST",
        data: "hal=problem_byr&id="+id.slice(0,1),
        success: function(ada){
          window.location = "?page=daftar-transaksi"
        }
      })
    })

    $(".tunai_antar").click(function(){
      var val = $(this).attr('alt');
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "hal=tunai_antar&id="+val,
        success: function(ada){
          window.location = "?page=daftar-transaksi";
        }
      })
    })

    $(".kredit_antar").click(function(){
      var id = $(this).attr('alt');
      if(confirm("Antar pesanan?")){
        $.ajax({
          url: "../pel/ajax_notif.php",
          type: "POST",
          data: "hal=kredit_antar&id="+id,
          success: function(ada){
          window.location = "?page=daftar-transaksi";
          }
        })
      }
    })

    $("#hide").hide();
    $("#lap").change(function(){
      var lap = $(this).val().toLowerCase();
      if(lap=='no'){
        // $("#isi").html('')
        $("#print").html('')
      } else {
        $("#print").html('')
        $("#print").append("<h4 class='text-center'>Laporan "+lap+"</h4><table class='table table-bordered mt-2' id='isi'></table>")
        // $("#isi h4").html('Laporan '+ lap)
        $("#isi").html($("#"+lap).html())
      }
    })

    $(".detail").click(function(){
      var id = $(this).attr('alt')
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "hal=detail_transaksi&id="+id,
        success: function(ada){
          $("#detail .modal-body").html(ada)
        }
      })
    })
  </script>
</body>
</html>
