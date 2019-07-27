<?php
include"../konek/sambung.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
$idjenis=$_POST['idjenis'];
$thn=date("Y")-1;
$sqlkec = mysql_query("SELECT * FROM tbkec order by id DESC");
$response["potensitani"] = array();
while($kec=mysql_fetch_array($sqlkec)){
$result = mysql_query("SELECT * FROM tbkelautan where id_kelautan='$idjenis' && kd_kec='$kec[kd_kec]' && tahun='$thn'  order by id DESC");
if(mysql_num_rows($result)>0){
while($row = mysql_fetch_array($result)){
	$sqljenis = mysql_query("SELECT * FROM tbjeniskelautan where id='$row[id_kelautan]' order by id DESC");
	$j=mysql_fetch_array($sqljenis);
	$h['id_kec']=$kec[0];
	$h['nm_kec']=$kec[2];
	$h['lat']=$kec[3];
	$h['lon']=$kec[4];
	$h['jenis']=$j[1];
	$h['tahun']=$row['tahun']; 
	$h['ket']=$row['ket'];
	array_push($response["potensitani"], $h);
}
}
}
$response["success"] = "1";
echo json_encode($response);
}