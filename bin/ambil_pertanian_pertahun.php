<?php
include"../konek/sambung.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
$idjenis=$_POST['idjenis'];
$response["potensipertahun"] = array();
for($d=date("Y")-2; $d<=date("Y"); $d++){
$result = mysql_query("SELECT * FROM tbperkebunan where id_perkebunan='$idjenis' && tahun='$d'  order by id DESC");
if(mysql_num_rows($result)>0){
$ket=0;
while($row = mysql_fetch_array($result)){
	$ket+=$row['ket'];
}
}else{
	$ket=0;
}
$h['jumlah']=$ket;
$h['tahun']=$d;
array_push($response["potensipertahun"], $h);

}
$response["success"] = "1";
echo json_encode($response);
}