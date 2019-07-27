<div class="col-md-10 offset-md-1">
	<?php
	$sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pel='$idp'");
	$r = mysql_num_rows($sql);
	if($r){
	?>
	<div class="card my-2">
		<div class="card-body">
			<div class="row">
				<?php
				$sql = mysql_query("SELECT * FROM tbproduk a, tbkeranjang b, tbstok c WHERE a.id=b.kode_pro AND a.id=c.id_poroduk ORDER BY 1");
				while($d = mysql_fetch_array($sql)){?>
					<div class="col-md-4">
						<p class="text-center text-uppercase"><?= $d['nama_barang'];?></p>
						<img src="pic/1.jpg" class="img-fluid">
						<div class="card-text text-center">
							<span class="text-primary">Rp.<?= number_format($d['harga']);?></span><br>
							Dibeli <div class="badge badge-success"><?= $d['jumlah'];?></div><br>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<?php
				$id = $_SESSION['id'];
				$sql = mysql_query("SELECT * FROM tbkeranjang a, tbproduk b WHERE a.kode_pro=b.id AND kode_pel='$id'");
				$item = 0;
				$tot = 0;
				while($d = mysql_fetch_array($sql)){
					$item += $d['jumlah'];
					$tot += $d['jumlah']*$d['harga'];
				}
				?>
				<div class="col-md-6">
					<label>Rincian Transaksi: </label>
					<table class="table table-borderless table-sm table-hover">
						<tr>
							<td>Jumlah Barang</td>
							<td id="item" alt="<?= $item;?>"><?= $item;?></td>
						</tr>
						<tr>
							<td>Total</td>
							<td id="total" alt="<?= $tot;?>"><?= number_format($tot);?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="pilih_pay">Pilih Pembayaran:</label>
						<select class="form-control" id="pilih_pay">
							<option>...</option>
							<option value="t">Tunai</option>
							<option value="k">Kredit</option>
						</select>
					</div>
					<div class="form-group" id="tun">
						<label for="tunai">Tunai</label>
						<input type="text" name="" class="form-control" id="tunai">
					</div>
					<div class="form-group" id="kre">
						<label for="kredit">Pilih Angsuran</label>
						<select class="form-control" id="kredit">
							<option value="">...</option>
							<option value="3">3x</option>
							<option value="6">6x</option>
							<option value="12">12x</option>
						</select>
						<label for="kredit">Pilih Uang Muka(DP)</label>
						<select class="form-control" id="dp">
							<option value="">...</option>
							<option value="10">10%</option>
							<option value="20">20%</option>
							<option value="30">30%</option>
						</select>
					</div>
				</div>
			</div>
			<!-- akhir row -->
			<div class="jumbotron py-4" id="detail">
				<h5>Detail Pembayaran</h5>
				<div class="col-md-6">
					<table class="table table-borderless">
						<tr>
							<td>Angsuran/Tenor</td>
							<td>:</td>
							<td id="h_kre" alt="">3x</td>
						</tr>
						<tr>
							<td>Uang Muka(DP)</td>
							<td>:</td>
							<td id="h_dp" alt="">Rp. 3.000.000(10%)</td>
						</tr>
						<tr>
							<td>Bunga(%)</td>
							<td>:</td>
							<td id="bung" alt="">Rp. 10.000.000</td>
						</tr>
						<tr>
							<td>Sub</td>
							<td>:</td>
							<td id="sub" alt="">tau olo</td>
						</tr>
						<tr>
							<td>Total</td>
							<td>:</td>
							<td id="tot" alt="">tau olo</td>
						</tr>
						<tr>
							<td>Angsuran/bulan</td>
							<td>:</td>
							<td id="h_ang" alt="">tau olo</td>
						</tr>
					</table>
				</div>
			</div>
			<button class="btn btn-danger btn-block" id="byr"><i class="fa fa-handshake"></i> Bayar</button>
		</div>
	</div>
	<?php } else {?>
		<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> Keranjang anda masih kosong, silahkan isi keranjang anda <a href="?page=barang">disini</a></div>
	<?php } ?>
</div>