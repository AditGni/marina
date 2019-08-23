<?php
error_reporting(0);
mysql_connect('localhost','root','');
mysql_select_db('toko');
session_start();
$hal = $_POST['hal'];
if($hal=='view'){
	$id = $_SESSION['idpen'];
	$sql = mysql_query("SELECT * FROM tbpenjualan WHERE id='$id'");
	$d = mysql_fetch_array($sql);
	if($d['status']=='n'){
		if($d['bukti_pembayaran']=='-'){
		?>
		<!-- <h4>Transaksi Anda belum selesai</h4> -->
		<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Segera melakukan pembayaran di Rekening <span class="font-weight-bold">BRI - 5544332211</span> atas nama <span class="font-weight-bold">Anna Buhohang</span>. dan kirim bukti pembayarannya dibawah.</div>
		<div class="form-group form-row">
			<label class="col-md-2">Upload Bukti Pembayaran</label>
			<div class="col-md-10">
				<input type="file" id="gambar" name="bukti">
			</div>
		</div>
		<?php } else {?>
			<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Mohon menunggu konfirmasi pembayaran dari admin</div>
		<?php }
		} else if($d['status']=='m'){?>
			<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> Pembayaran tidak sesuai, Silahkan upload kembali bukti pembayaran yang valid</div>
			
			<div class="form-group form-row">
				<label class="col-md-2">Upload Bukti Pembayaran</label>
				<div class="col-md-10">
					<input type="file" id="gambar" name="bukti">
				</div>
			</div>
	<?php } ?>
		<script type="text/javascript">
		  $("#gambar").change(function(){
		    var isi = new FormData();
		    var nama = $(this).attr('name');
		    isi.append(nama, $(this)[0].files[0]);
		    $.ajax({
		      url: "ajax2.php",
		      type: "POST",
		      cache: false,
		      processData: false,
		      contentType: false,
		      data: isi,
		      success: function(ada){
		        window.location = "?page=keranjang"
		      }
		    })
		  })
		</script><?php
} else if($hal=="konfir_byr"){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET status='y' WHERE id='$id'");
} else if($hal=='problem_byr'){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET bukti_pembayaran='-',status='m' WHERE id='$id'");
}
?>