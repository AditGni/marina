<?php
if(!empty($_GET['page'])){
  $p = $_GET['page'];
  if($p=='barang'){
    $link = "laman/barang.php";
    $title = "Barang";
  } else if($p=='keranjang'){
    $link = "laman/keranjang.php";
    $title = "Keranjang Saya";
  } else if($p=='login'){
    $link = "login.php";
    $title = "Login";
  } else if($p=='registrasi'){
    $link = "regis.php";
    $title = "Registrasi";
  } else if($p=='proses'){
    $link = "proses.php";
  } else if($p=='transaksi'){
    $link = "laman/riwayat.php";
    $title = "Riwayat Transaksi";
  } else if($p=='view-barang'){
    $link = "laman/view_barang.php";
    $title = "Detail Barang";
  }
} else {
  $link = "laman/barang.php";
}