<?php
error_reporting(0);
session_start();
mysql_connect('localhost','root','');
mysql_select_db('db_penjualankredit');
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

  mysql_query("INSERT INTO tbpenjualan VALUES('','$tgl','','$lama','$idp','$dp','$bunga','$tot_kotor','$ang','$tot_bersih')");
} else if($mod=='in_trans'){
  $id = $_SESSION['id'];
  $tgl = date('Y-m-d');
  $qty = $_POST['qty'];
  $tot = $_POST['tot'];
  $sisa = 0;
  $byr = $_POST['j_bayar'];
  $bank = $_POST['bank'];

  if($byr=='cod'){
    $byr = 'tunai';
  }/* else if($byr=='tf'){
    $tunai = $tot;
  } else {
    $tunai = 0;
  }*/
  if($bank=='not'){
    $bank = '-';
  }
  /*$cash = $_POST['cash'];
  if($cash > $tot){
    $sisa = $cash - $tot;
  } else {
    $sisa = 0;
  }*/

  mysql_query("INSERT INTO tbpenjualan VALUES('','$tgl','$id','$qty','$tot','$byr','$bank',0,'$sisa','n','-')");

  $sqli = mysql_query("SELECT * FROM tbpenjualan WHERE tanggal='$tgl' AND idp='$id' AND qty='$qty' AND total='$tot' ORDER BY id DESC");
  $dt = mysql_fetch_array($sqli);
  $sql = mysql_query("SELECT * FROM tbkeranjang a, tbproduk b WHERE kode_pel='$id' AND a.kode_pro=b.id GROUP BY b.id");
  while($d = mysql_fetch_array($sql)){
    $tot = $d['harga'] * $d['jumlah'];
    mysql_query("INSERT INTO tbdetailpenjualan VALUES('','$dt[id]','$d[kode_pro]','$d[jumlah]','$d[harga]','$tot')");
  }
  mysql_query("DELETE FROM tbkeranjang WHERE kode_pel='$id'");
} else if($mod=='adakah'){
  $id = $_SESSION['id'];
  $que = mysql_query("SELECT * FROM tbpenjualan WHERE idp='$id' AND status<>'y'");
  $row = mysql_num_rows($que);
  echo $row;
}
?>