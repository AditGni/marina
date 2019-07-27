<?php
include"../konek/sambung.php";
$thn=date("Y")-1;
if($_SERVER['REQUEST_METHOD']=='POST'){
$result = mysql_query("SELECT * FROM tbjeniskelautan order by id DESC");
if(mysql_num_rows($result)>0){
$response["jenisperikanan"] = array();
while($row = mysql_fetch_array($result)){
	$sqltani = mysql_query("SELECT * FROM tbkelautan where id_kelautan='$row[0]' && tahun='$thn'");
	$jum=0;
	while($j=mysql_fetch_array($sqltani)){
		$jum+=$j['ket'];
	}
	$h['id']=$row[0];
	$h['jenis']=$row[1];
	$h['jumlah']=$jum;
	$h['tahun']=$thn;
	array_push($response["jenisperikanan"], $h);
}
	$response["success"] = "1";
	echo json_encode($response);
}else{
	$response["success"] = "0"; 
	echo json_encode($response);
}
}