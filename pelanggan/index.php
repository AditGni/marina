<?php
mysql_connect('localhost','root','');
mysql_select_db('toko');
error_reporting(0);
session_start();
include "content.php";
$idp = $_SESSION['id'];
// CEK SESSION APAKAH ADMIN
if($_SESSION['ket']=='admin'){
    header("location:../panel/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UD. MARINA</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">UD. ARAFAH MEUBEL</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?page=barang">Barang</a>
          </li>
          <?php
          $sql = mysql_query("SELECT SUM(jumlah) as jumlah FROM tbkeranjang WHERE kode_pel='$idp'");
          $r = mysql_num_rows($sql);
          $d = mysql_fetch_array($sql);
          ?>
          <?php if(!empty($_SESSION['admin'])){?>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?page=keranjang" id="menu_cart">Keranjang <?= ($r > 0) ? '<span class="badge badge-warning">'.$d['jumlah'].'</span>' : '';?></a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?page=transaksi">Riwayat Transaksi</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?page=proses&act=logout">Logout</a>
          </li>
        <?php } else {?>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?page=registrasi">Registrasi</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="?page=login">Login</a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mt-5"><?= $title;?></h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <div class="row">
        <?php include $link;?>
      </div>
  </div>
</section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <div class="col-lg-4 mb-5 mb-lg-0" id="maps">
          <!-- <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">2215 John Daniel Drive
            <br>Clark, MO 65243</p> -->
          <!-- <div id="maps" style="width:100%;height:300px"></div> -->
        </div>

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Around the Web</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-linkedin-in"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">About Freelancer</h4>
          <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by
            <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Your Website 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>
  <script type="text/javascript">
    function formatRupiah(angka, prefix= 'Rp.'){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      // return rupiah;
    }
    $("#detail").hide();
    $("#byr").hide();
    $("#tun").hide();
    $("#kre").hide();
    $(".ker").click(function(){
      var i = $(this).attr('alt');
      var k = $(this).text();
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=in_car&id="+i,
        success: function(dat){
          if(k=='Beli'){
            window.location = "?page=keranjang";
          }
        }
      })
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=cek_jumlah_cart",
        success: function(dat){
          $("#menu_cart").html("Keranjang "+dat);
        }
      })
    })

    $("#pilih_pay").change(function(){
      var isi = $(this).val();
      if(isi=='t'){
        $("#tun").fadeIn();
        $("#kre").hide();
      } else if(isi=='k'){
        $("#kre").fadeIn();
        $("#tun").hide();
      } else {
        $("#tun").fadeOut();
        $("#kre").fadeOut();
      }
    })

    $("#kredit").change(function(){
      var isi = $(this).val();
      if(isi==''){
        $("#detail").fadeOut();
        $("#byr").fadeOut();
      } else {
        $("#byr").fadeIn();
        $("#detail").fadeIn();
        var tenor = $("#kredit").val();
        var dp = $("#dp").val();
        var bunga;
        if(tenor==3){
          bunga = 2.5;
        } else if(tenor==6){
          bunga = 5;
        } else if(tenor==12){
          bunga = 8;
        }
        var total = $("#total").attr('alt');
        var h_dp = total*(dp/100);
        var h_bunga = (total - h_dp)*(bunga/100)*tenor;
        var h_total = (total-h_dp)+h_bunga;

        $("#h_kre").attr('alt',$("#kredit").val());
        $("#h_dp").attr('alt', h_dp);
        $("#bung").attr('alt', h_bunga);
        $("#sub").attr('alt', (total-h_dp));
        $("#tot").attr('alt', h_total);
        $("#h_ang").attr('alt', (Math.ceil(h_total/tenor)));

        $("#h_kre").html($("#kredit").val()+"x");
        $("#h_dp").html(formatRupiah(h_dp.toString())+" ("+dp+"%)");
        $("#bung").html(formatRupiah(h_bunga.toString())+" ("+bunga+"%)");
        $("#tot").html(formatRupiah(h_total.toString()));
        $("#sub").html(formatRupiah((total-h_dp).toString()));
        $("#h_ang").html(formatRupiah(Math.ceil(h_total/tenor).toString()));
      }
    })
    $("#dp").change(function(){
      var isi = $(this).val();
      if(isi==''){
        $("#detail").fadeOut();
      } else {
        $("#detail").fadeIn();
        var tenor = $("#kredit").val();
        var dp = $("#dp").val();
        var bunga;
        if(tenor==3){
          bunga = 2.5;
        } else if(tenor==6){
          bunga = 5;
        } else if(tenor==12){
          bunga = 8;
        }
        var total = $("#total").attr('alt');
        var h_dp = total*(dp/100);
        var h_bunga = (total - h_dp)*(bunga/100)*tenor;
        var h_total = (total-h_dp)+h_bunga;

        $("#h_kre").attr('alt',$("#kredit").val());
        $("#h_dp").attr('alt', h_dp);
        $("#bung").attr('alt', h_bunga);
        $("#sub").attr('alt', (total-h_dp));
        $("#tot").attr('alt', h_total);
        $("#h_ang").attr('alt', (Math.ceil(h_total/tenor)));

        $("#h_kre").html($("#kredit").val()+"x");
        $("#h_dp").html(formatRupiah(h_dp.toString())+" ("+dp+"%)");
        $("#bung").html(formatRupiah(h_bunga.toString())+" ("+bunga+"%)");
        $("#tot").html(formatRupiah(h_total.toString()));
        $("#sub").html(formatRupiah((total-h_dp).toString()));
        $("#h_ang").html(formatRupiah(Math.ceil(h_total/tenor).toString()));
      }
    })

    $("#byr").click(function(){
      var item = $("#item").attr('alt');
      var lama = $("#h_kre").attr('alt');
      var dp = $("#h_dp").attr('alt');
      var bunga = $("#bung").attr('alt');
      var tot_kotor = $("#sub").attr('alt');
      var tot_bersih = $("#tot").attr('alt'); 
      var ang = $("#h_ang").attr('alt');
      // alert(item+" "+lama+" "+dp+" "+bunga+" "+tot_kotor+" "+tot_bersih+" "+ang);
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "item="+item+"&lama="+lama+"&dp="+dp+"&bunga="+bunga+"&tot_kotor="+tot_kotor+"&tot_bersih="+tot_bersih+"&angsur="+ang+"&mod=in_pen",
        success: function(ada){
          // $("#detail").html(ada);
        }
      })
    })
  </script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDyEU8awzu_Fs0oAWAZGueEl7VPrpZShn4&callback=initial"></script>
  <script>
    function initial(){
      var properti = {
        center: new google.maps.LatLng(0.563563, 123.053546),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var peta = new google.maps.Map(document.getElementById("maps"), properti);

      var titik = new google.maps.Marker({
        position: new google.maps.LatLng(0.563563, 123.053546),
        map: peta,
      })
    }
    google.maps.event.addDomListener(window, 'load', initial);
  </script>
</body>
</html>
