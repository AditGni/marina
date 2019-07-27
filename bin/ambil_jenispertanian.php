<?php
include"../konek/sambung.php";
$thn=date("Y")-1;
if($_SERVER['REQUEST_METHOD']=='POST'){
$result = mysql_query("SELECT * FROM tbjenisperkebunan order by id DESC");
if(mysql_num_rows($result)>0){
$response["jenistani"] = array();
while($row = mysql_fetch_array($result)){
	$sqltani = mysql_query("SELECT * FROM tbperkebunan where id_perkebunan='$row[0]' && tahun='$thn'");
	$jum=0;
	while($j=mysql_fetch_array($sqltani)){
		$jum+=$j['ket'];
	}
	$h['id']=$row[0];
	$h['jenis']=$row[1];
	$h['jumlah']=$jum;
	$h['tahun']=$thn;
	array_push($response["jenistani"], $h);
}
	$response["success"] = "1";
	echo json_encode($response);
}else{
	$response["success"] = "0"; 
	echo json_encode($response);
}
}