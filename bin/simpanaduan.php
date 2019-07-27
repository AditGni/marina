<?php
include"../season/sambung.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values
$id_pel = $_POST['id_pel'];
$isi=$_POST['isi'];
$tanggal=date("d/m/Y");
$sql=mysql_query("insert into pengaduan (id_pel,isi,tanggal,status) values ('$id_pel','$isi','$tanggal','proses')");
if($sql){
	echo "success";
}
}
?>