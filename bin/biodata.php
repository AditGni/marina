<?php
 include"../season/sambung.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values
$id = $_POST['id_pel'];

$result = mysql_query("SELECT * FROM biodata where id_pel='$id' limit 1");
$a = mysql_fetch_array($result);

$json = '{"biodata":[{"id_pel":"'.$a[1].'","nama":"'.$a[2].'","alamat":"'.$a[3].'"}]}';
echo $json;

}