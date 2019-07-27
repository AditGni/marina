<?php
error_reporting(0);
session_start();
mysql_connect('localhost','root','');
mysql_select_db('toko');
$mod = $_POST['mod'];
if($mod=='in_car'){
  $id = $_POST['id'];
  $idp = $_SESSION['id'];
  $sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pro='$id' AND kode_pel='$idp'");
  $ow = mysql_num_rows($sql);
  if($ow){
    $d = mysql_fetch_array($sql);
    $t = $d['jumlah'] + 1;
    mysql_query("UPDATE tbkeranjang SET jumlah='$t' WHERE kode_pro='$id' AND kode_pel='$idp'");
  } else {
    mysql_query("INSERT INTO tbkeranjang VALUES('','$id','$idp',1)");
  }
  echo "berhasil";
} else if($mod=='cek_jumlah_cart'){
  $sql = mysql_query("SELECT SUM(jumlah) as jml FROM tbkeranjang WHERE kode_pel='$_SESSION[id]'");
  $d = mysql_fetch_array($sql);
  if($d['jml'] > 0){
    ?>
    <span class="badge badge-warning"><?= $d['jml'];?></span>
    <?php
  }
} else if($mod=='in_pen'){
  $idp = $_SESSION['id'];
  $tgl = date('Y-m-d');
  $item = $_POST['item'];
  $lama = $_POST['lama'];
  $dp = $_POST['dp'];
  $bunga = $_POST['bunga'];
  $tot_kotor = $_POST['tot_kotor'];
  $tot_bersih = $_POST['tot_bersih'];
  $ang = $_POST['angsur'];

  mysql_query("INSERT INTO tbpenjualan VALUES('','$tgl','$lama','$idp','$dp','$bunga','$tot_kotor','$ang','$tot_bersih')");
  $id = $_SESSION['id'];
  $que = mysql_query("SELECT * FROM tbpenjualan WHERE idp='$id' AND status<>'y'");
  $row = mysql_num_rows($que);
  echo $row;
}
?>