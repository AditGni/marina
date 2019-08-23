<?php
error_reporting(0);
mysql_connect('localhost','root','');
mysql_select_db('db_penjualankredit');
session_start();
include "content.php";
$idp = $_SESSION['id'];
// cek login
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

  <title>UD. ARAFAH MEUBEL</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-capitalize fixed-top" id="mainNav">
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


  <!-- Copyright Section -->
  <section class="copyright py-4 mt-5 text-center text-white">
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
      // return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      return rupiah;
    }

    function cariJml(a){
      var i = 0;
      var jml = a.length;
      var k = "";
      while(i < a.length){
        if(a[i]!='.'){
          k += a[i];
        }
        i++;
      }
      return k;
    }
    $("#bank").hide()
    $("#pesan").hide();
    $("#t_bayar").hide();
    $("#t_kembali").hide();
    $("#pesan").hide();
    $("#alt_kurang").hide();
    $(".ker").click(function(){
      var i = $(this).attr('alt');
      var k = $(this).text();
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=adakah",
        success: function(ada){
          if(ada==1){
            $("#pesan").html('<i class="fa fa-exclamation-circle"></i> Transaksi anda belum selesai!</i>')
            $("#pesan").fadeIn();
            $("#pesan").fadeOut(2000)
            return false
          } else {
            $.ajax({
              url: "ajax.php",
              type: "POST",
              data: "mod=in_car&id="+i,
              success: function(dat){
                if(k=='Beli Sekarang'){
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
          }
        }
      })
    })

    $("#cash").keyup(function(){
      $("#alt_kurang").fadeOut('fast');
      var isi = $(this).val();
      $(this).val(formatRupiah(isi.toString()));
    })

    $("#j_bayar").change(function(){
      var isi = $(this).val();
      if(isi=='cod'){
        $("#pesan").fadeIn();
        $("#bank").fadeOut(100);
      } else if(isi=='tf'){
        $("#bank").fadeIn();
        $("#pesan").fadeOut(100);
      } else {
        $("#bank").fadeOut();
        $("#pesan").fadeOut(100);
      }
      if(isi!='not'){
        $("#j_bayar").removeClass('border-danger');
      }
    })

    $("#p_bank").change(function(){
      if($("#p_bank").val()!='not'){
        $("#p_bank").removeClass('border-danger');
      }
    })
    $("#byr_ker").click(function(){
      var qty = $("#item").attr('alt');
      var tot = $("#total").attr('alt');
      var jenis = $("#j_bayar").val();
      var bank = $("#p_bank").val();
      if(jenis=='not'){
        $("#j_bayar").addClass('border-danger');
        return false
      } else {
        $("#j_bayar").removeClass('border-danger');
      }
      if($("#bank").is(":not(:hidden)")){
        if(bank=='not'){
          $("#p_bank").addClass('border-danger');
          return false;
        } else {
          $("#p_bank").removeClass('border-danger');
        }
      }
        
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=in_trans&tot="+tot+"&qty="+qty+"&j_bayar="+jenis+"&bank="+bank,
        success: function(ada){
          window.location = "?page=keranjang"
        }
      })
    })


    $("#byr").click(function(){
      var cart_val = $("#isi_keranjang").html();
      var qty = $("#item").attr('alt');
      var tot = $("#total").attr('alt');
      var cash = cariJml($("#cash").val().toString());

      if(Number(cash) < Number(tot)){
        $("#alt_kurang").fadeIn();
        $("#alt_kurang").html("<i class='fa fa-exclamation-circle'></i> Pembayaran kurang");
        return false;
      }
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=in_trans&qty="+qty+"&tot="+tot+"&cash="+cash,
        success: function(ada){
          $("#view_cart").fadeOut();
          $("#pesan").fadeIn();
          $("#isikan").html($("#isi_keranjang").html());
          $("#isikan #del_item").hide();
          $("#h_jml").html(qty);
          $("#h_tot").html(formatRupiah(tot.toString()));
          $("#h_tun").html(formatRupiah(cash.toString()));
          $("#h_kem").html(formatRupiah((cash - tot).toString()));

          $("#t_bayar").fadeIn();
          $("#t_bayar #isi").html("Rp."+formatRupiah(cash.toString()));
          $("#t_kembali").fadeIn();
          $("#t_kembali #isi").html("Rp."+formatRupiah((cash-tot).toString()));

          setInterval(function(){
            window.location = "?page=transaksi";
          }, 8000)
          $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "mod=cek_jumlah_cart",
            success: function(dat){
              $("#menu_cart").html("Keranjang "+dat);
            }
          })
        }
      })
    })
  </script>
  <?php include "img_js.php";?>
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
