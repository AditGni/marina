<?php
error_reporting(0);
session_start();
include"konek/sambung.php";

	include("path.php");
	$segmen = explode("/",$_SERVER['REQUEST_URI']);
	
	$url1 = $segmen[0];
	$url2 = $segmen[1];
	$url3 = $segmen[2];
	$url4 = $segmen[3];
	$url5 = $segmen[4];
	$url6 = $segmen[5];
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PENJUALAN KREDIT</title>
    <link rel="icon" type="image/png" href="<?php echo $host;?>icon/icontitle.png">
    <link href="<?php echo $host;?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $host;?>css/modern-business.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $host;?>css/foto-gallery.css">
    <link href="<?php echo $host;?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body style="background:#fff">
    <!-- Page Content -->
    <div class="container">
    
    <div class="row">	
	
    	<?php
		 include"files/frmlogin.php";
		?>
      </div>		
				
		<footer>
            <div class="row" align="center">
                <div class="col-lg-12" style="color:#999">

                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

	
        
    <!-- jQuery -->
    <script src="<?php echo $host;?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $host;?>js/bootstrap.min.js"></script>
    <script src="<?php echo $host;?>js/jquery.blueimp-gallery.min.js"></script>
	<script src="<?php echo $host;?>js/bootstrap-image-gallery.js"></script>
    <script src="<?php echo $host;?>js/photo-gallery.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	

</body>

</html>
