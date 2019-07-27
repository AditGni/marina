
<?php
 include"../season/sambung.php";
if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values
 $id = $_POST['id_pel'];

 $result = mysql_query("SELECT * FROM biodata where id_pel='$id'");
if(mysql_num_rows($result)>0){
	echo "success";
}
}

?>
