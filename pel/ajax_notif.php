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
	?>
	<div id="tjp" class="d-none"><?= $d['jenis_pembayaran'];?></div>
	<?php
	if($d['jenis_pembayaran']=='k'){
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
		<?php } else if($d['status']=='p'){?>
				<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Konfirmasi proses pengantaran. mohon menunggu</div>
		<?php } else if($d['status']=='k'){?>
				<div class="alert alert-success">
					<i class="fa fa-check-circle"></i> Pesanan anda dalam perjalanan. Klik tombol dibawah jika barang telah sampai
					<button class="btn btn-primary rounded-0 mt-3 btn-block" alt="<?= $id;?>" id="delivered">Pesanan telah sampai?</button>
				</div>
		<?php }
		} else if($d['jenis_pembayaran']=='t'){
				if($d['status']=='n'){
			?>
			<div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Pesanan anda sedang dikonfirmasi oleh admin</div>
		<?php } else if($d['status']=='p'){?>
			<div class="alert alert-warning">
				<i class="fa fa-exclamation-circle"></i> Pesanan anda dalam perjalanan. Klik tombol dibawah jika barang telah sampai
				<button class="btn btn-primary rounded-0 mt-3 btn-block" alt="<?= $id;?>" id="delivered">Pesanan telah sampai?</button>
			</div>
		<?php }
		} 
		?>
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

		// pesanan sampai?
		$("#delivered").click(function(){
		  var id = $(this).attr('alt')
		  $.ajax({
		  	url: "ajax_notif.php",
		  	type: "POST",
		  	data: "hal=delivered&id="+id,
		  	success: function(ada){
		  		window.location = "?page=barang"
		  	}
		  })
		})
		</script><?php
// kredit
} else if($hal=="konfir_byr"){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET status='p' WHERE id='$id'");
} else if($hal=='problem_byr'){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET bukti_pembayaran='-',status='m' WHERE id='$id'");

} else if($hal=='kredit_antar'){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET status='k' WHERE id='$id'");
} else if($hal=='delivered'){
// tunai
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET status='y' WHERE id='$id'");
}
?>