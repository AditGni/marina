<?php
if($r){?>
<div class="col-md-8 offset-md-2">
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				<div class="float-left">
					<h3>TR<?= $d['id'].date('Ymd', strtotime($d['tanggal']));?></h3>
				</div>
				<div class="float-right">
					<h3><?= date('d-m-Y', strtotime($d['tanggal']));?></h3>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-hover table-striped table-sm">
				<tr class="text-center">
					<td>No</td>
					<td>Barang</td>
					<td>Jumlah</td>
					<td>Harga</td>
					<td>Sub Total</td>
				</tr>
				<?php
				$sqli = mysql_query("SELECT * FROM tbpenjualan a, tbdetailpenjualan b, tbproduk c WHERE a.id=b.id_penjualan AND a.id='$d[id]' AND c.id=b.id_produk");
				$n = 1;
				$j = 0;
				$h = 0;
				$t = 0;
				while($dt = mysql_fetch_array($sqli)){
					$j += $dt['banyak'];
					$h += $dt['harga'];
					$t += $dt['banyak']*$dt['harga'];
				?>
				<tr>
					<td><?= $n++;?></td>
					<td class="text-capitalize"><?= $dt['nama_barang'];?></td>
					<td class="text-center"><?= $dt['banyak'];?></td>
					<td class="text-right">Rp.<?= number_format($dt['harga']);?></td>
					<td class="text-right">Rp.<?= number_format($dt['total']);?></td>
				</tr>
			<?php } ?>
				<tr>
					<td colspan="2"></td>
					<td class="font-weight-bold"><?= $j;?></td>
					<td class="font-weight-bold text-right">Rp.<?= number_format($h);?></td>
					<td class="font-weight-bold text-right">Rp.<?= number_format($t);?></td>
				</tr>
			</table>
		</div>
		<div class="card-footer">
			<div class="py-3 px-1 alert alert-<?= $d['status']=='n' ? 'info' : 'warning';?> row">
				<div class="col-md-1"><i class="fa fa-exclamation-circle"></i></div>
				<div class="col-md-11 mx-n4 my-auto">
				<?php
				if($d['status']=='n'){
					if($d['jenis_bayar']=='tf' && $d['bukti']=='-' || $d['bukti']=='s'){
						$idb = $d['bank'];
						$query = mysql_query("SELECT * FROM tbbank WHERE id_bank='$idb'");
						$de = mysql_fetch_array($query);
						echo "Segera melakukan pembayaran di rekening <strong>".strtoupper($de['nama_bank'])." - ".$de['no_rek']."</strong> dengan nama <strong>".$de['nama_pemilik']."</strong> dan kirim bukti pembayaran dibawah";
					} else if($d['jenis_bayar']=='tf' && $d['bukti']!='-' && $d['bukti']!='s'){
						echo "Bukti Pengiriman sedang dikonfirmasi oleh admin";
					} else {
						echo "Tunggu konfirmasi dari admin";
					}
				} else if($d['status']=='k'){
					echo "Menunggu konfirmasi pengantaran pesanan";
				} else {
					echo "Pesanan anda dalam perjalanan";
				}
				?>
				</div>
			</div>
			<?php
			if($d['jenis_bayar']=='tf' && $d['status']=='n'){
				if($d['bukti']=='s'){?>
					<div class="alert alert-danger" id="pesan_img"><i class="fa fa-times"></i> Berkas yang anda upload tidak valid</div>
				<?php } ?>
			<div class="form-row">
				<?php if($d['bukti']=='-' || $d['bukti']=='s'){?>
				<h5>Upload Bukti Pembayaran:</h5>
				<label for="gambar"class="col-md-2"></label>
				<input type="file" id="gambar" name="bank" class="form-control-file" alt="<?= $d['id'];?>">
				<img src="" class="img-fluid w-50 mt-2 mx-auto" id="gmb">
				<?php } ?>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>