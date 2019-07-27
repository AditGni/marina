<div class="col-md-10 offset-md-1">
	<div class="row">
		<?php
		$sql = mysql_query("SELECT * FROM tbpenjualan WHERE idp='$idp' AND status='y' ORDER BY id DESC");
		$r = mysql_num_rows($sql);
		if($r){
			while($d = mysql_fetch_array($sql)){?>
			<div class="col-md-6 mb-3">
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
							<tr>
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
								<td><?= $dt['banyak'];?></td>
								<td><?= $dt['harga'];?></td>
								<td><?= $dt['total'];?></td>
							</tr>
						<?php } ?>
							<tr>
								<td colspan="2"></td>
								<td class="font-weight-bold"><?= $j;?></td>
								<td class="font-weight-bold">Rp.<?= number_format($h);?></td>
								<td class="font-weight-bold">Rp.<?= number_format($t);?></td>
							</tr>
						</table>
					</div>
					<div class="card-footer">
						<div class="alert alert-success"><i class="fa fa-check"></i> Transaksi Sukses!</div>
					</div>
				</div>
			</div>
			<?php } } else {?>
				<div class="col-md-12">
					<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> Riwayat Transaksi masih kosong</div>
				</div>
			<?php } ?>
	</div>
</div>