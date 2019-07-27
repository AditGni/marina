<?php
include"../konek/sambung.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
$result = mysql_query("SELECT * FROM tbkec order by id DESC");
if(mysql_num_rows($result)>0){
$response["camat"] = array();
while($row = mysql_fetch_array($result)){
	$h['id']=$row[0];
	$h['kec']=$row[2];
	$h['lat']=$row[3];
	$h['lon']=$row[4];
	array_push($response["camat"], $h);
}
	$response["success"] = "1";
	echo json_encode($response);
}else{
	$response["success"] = "0"; 
	echo json_encode($response);
}
}