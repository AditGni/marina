<?php
error_reporting(0);
mysql_connect('localhost','root','');
mysql_select_db('toko');
ob_start();
session_start();
include "content.php";
$idp = $_SESSION['id'];
// CEK SESSION APAKAH ADMIN
if($_SESSION['ket']=='admin'){
    header("location:../admin/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UD. MARINA - Penjualan Tunai dan Kredit</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->
          <a href="index.php" class="h4 mr-5 nav-link">UD MARINA</a>
          <!-- Topbar Search -->
<!--           <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-4 my-2 my-md-0 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link" href="?page=barang">
                <i class="fa fa-backpack"></i> Barang
              </a>
            </li>

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Kategori
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <?php
                $sql = mysql_query("SELECT * FROM tbkategori ORDER BY 1");
                while($d = mysql_fetch_array($sql)){?>
                <a class="dropdown-item d-flex align-items-center" href=""><?= ucfirst($d['kategori']);?></a>
                <?php } ?>
              </div>
            </li> -->
            <?php if($_SESSION['admin']){?>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link" href="?page=keranjang">
                Keranjang
                <?php
                $sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pel='$idp'");
                $r = mysql_num_rows($sql);
                $d = mysql_fetch_array($sql);
                if($r){?>
                <span class="badge badge-warning badge-counter" id="menu_cart"><?= $r;?></span>
                <?php } ?>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow ml-auto">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                $sql = mysql_query("SELECT * FROM tbpelanggan WHERE id='$idp'");
                $d = mysql_fetch_array($sql);
                ?>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucfirst($d['nama']);?></span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            <?php } else {?>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#daftar-modal">
                Daftar
              </a>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link log" href="#" data-toggle="modal" data-target="#login-modal">
                Login
              </a>
            </li>
            <?php } ?>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
          <?php if($_GET['page']){?>
            <div class="row my-2"> 
              <?php include $link;?>
            </div>
            <?php
          } else {
            include $link;
          }
          ?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
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

  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sign-in"></i>Login</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="?page=proses&act=login" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" id="user" name="user">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
            </div>
            <button class="btn btn-primary" id="btn-lg">Login</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

  <!-- Regis Modal -->
  <div class="modal fade" id="daftar-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-user"></i> Daftar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="?page=proses&act=regis" method="POST">
            <div class="form-group">
              <input type="text" name="nama" class="form-control <?= $_SESSION['error']['nama'] ? 'is-invalid' : ''?>" placeholder="Nama Lengkap" value="<?= @$_SESSION['nama'];?>">
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <input type="text" name="user" class="form-control <?= $_SESSION['error']['user'] ? 'is-invalid' : ''?>" placeholder="Username" value="<?= @$_SESSION['user'];?>">
              </div>
              <div class="col-md-6">
                <input type="password" name="pass" class="form-control <?= $_SESSION['error']['pass'] ? 'is-invalid' : ''?>" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <textarea class="form-control <?= $_SESSION['error']['alamat'] ? 'is-invalid' : ''?>" name="alamat" placeholder="Alamat"><?= @$_SESSION['alamat'];?></textarea>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <label class="<?= $_SESSION['error']['jk'] ? 'text-danger' : ''?>">Jenis Kelamin</label>
                <div class="custom-control custom-radio">
                  <input type="radio" name="jk" class="custom-control-input" id="l" value="pria" <?= $_SESSION['jk']=='pria' ? 'checked' : '';?>>
                  <label for="l" class="custom-control-label">Pria</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" name="jk" class="custom-control-input" id="p" value="wanita" <?= $_SESSION['jk']=='wanita' ? 'checked' : '';?>>
                  <label for="p" class="custom-control-label">Wanita</label>
                </div>
              </div>
              <div class="col-md-6">
                <input type="text" name="telp" class="form-control <?= $_SESSION['error']['telp'] ? 'is-invalid' : ''?>" placeholder="No. Telpon" value="<?= @$_SESSION['telp'];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <button class="btn btn-success btn-block" type="submit">Masuk</button>
              </div>
              <div class="col-md-6">
                <a href="?page=barang" class="btn btn-danger btn-block">Batal</a>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Anda yakin ingin keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="?page=proses&act=logout">Keluar</a>
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

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script type="text/javascript">
    $(".log").click(function(){
      $("#user").val('')
      $("#pass").val('')
    })
  </script>
  <?php include "img_js.php";?>
  <?php include "script.php";?>

</body>

</html>
