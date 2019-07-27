<?php
error_reporting(0);
session_start();
mysql_connect('localhost','root','');
mysql_select_db('db_penjualankredit');
$arr = implode("", array_keys($_FILES));
$id = $_SESSION['idpen'];
$n = $_FILES[$arr]['name'];
$fol = "img/bukti pembayaran/".$n;

$que = mysql_query("UPDATE tbpenjualan SET bukti='$n' WHERE id='$id'");
if($que){
	move_uploaded_file($_FILES[$arr]['tmp_name'], $fol);
}
echo $n;
?>