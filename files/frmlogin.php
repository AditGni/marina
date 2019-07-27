<table align="center" width="350" style="margin-top:0px; padding:10px"><tr><td>
<div class="panel panel-success" style="background:#f9f9f9">
<div class="panel-body" style="padding:30px">

<table style="margin-bottom:30px; margin-top:10px"><tr>
<td>
<font style="font-size:25px; color:#CC3300"><b>UD. MARINA</b></font>
<font style="color:#009900; font-size:12px"><br />Boroko, Bolaang Mongondow Utara</font>
</td></tr></table>

<form action="" method="post">
<div class="form-group has-feedback">
<input type="text" required class="form-control" style="height:40px" maxlength="10" name="admin" id="user" placeholder="Username">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>

<div class="form-group has-feedback" style="margin-top:-10px">
<input type="password" required style="height:40px" class="form-control" maxlength="10" name="pas" id="pass" placeholder="Password">							
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div style="text-align:right">
<button type="submit" name="login" class="btn btn-success btn-lg" ><span class="glyphicon glyphicon-log-in"></span> Login</button>
</div>

</form>
<?php
if(isset($_POST['login'])){
	$admin=$_POST['admin'];
	$pas=$_POST['pas'];
	$ket="admin";
	$cek=mysql_query("select * from tbadmin where admin='$admin' and pass='$pas'");
	$a=mysql_fetch_array($cek);
	if(mysql_num_rows($cek)>0){
		$_SESSION['admin']=$admin;
		$_SESSION['pass']=$pas;

		if($a['ket']!='admin'){
			header("location:panel/");
		} else {
			header("location:pelanggan/");
		}

		/*if(($a['ket']<>'camat') && ($a['ket']<>'admin')){
			$_SESSION['ket']=$a['ket'];
		}else{
			$_SESSION['ket']=$ket;
		}
		if(($a['ket']=='camat') && ($ket=='camat')){
			?><script>document.location='<?php echo $host;?>camat/';</script><?php	
		}else{
			if($ket<>'camat'){
				?><script>document.location='<?php echo $host;?>panel/';</script><?php	
			}else{
				?><script>alert("Akun tidak dikenali..")</script> <?php	
			}
		}*/
	
	}else{
		?><script>alert("Akun tidak dikenali..")</script> <?php
	}
}
?>
</div>

</div></td></tr></table>