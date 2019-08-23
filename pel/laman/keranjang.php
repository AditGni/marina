<div class="col-md-10 offset-md-1">
	<?php
	$sql = mysql_query("SELECT a.id as id_penjualan, a.tanggal,a.lama,a.idp,a.uang_muka,a.bunga,a.besar_bunga,a.angsuran,a.tot_kotor,a.tot_bersih,b.nama,b.alamat,b.phone FROM tbpenjualan a, tbpelanggan b WHERE idp='$idp' AND a.idp=b.id AND status<>'y'");
	$r1 = mysql_num_rows($sql);
	if($r1){
		$d = mysql_fetch_array($sql);
		$_SESSION['idpen'] = $d['id_penjualan'];
		?>
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="card">
					<div class="card-body">
						<h4 id="subtitle">Transaksi Anda belum selesai</h4>
						<div id="notif"></div>

						<div class="row mt-5">
							<div class="col-md-6" id="pl">
								<h6>Pelanggan</h6>
								<table class="table table-sm table-borderless">
									<tbody>
										<tr>
											<td>Nama</td>
											<td><?= ucfirst($d['nama']);?></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td><?= ucfirst($d['alamat']);?></td>
										</tr>
										<tr>
											<td>No. Hp</td>
											<td><?= $d['phone'];?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6" id="jp">
								<h6>Jenis Pembayaran</h6>
								<table class="table table-sm table-borderless">
									<thead>
										<tr>
											<td>Total Harga Barang</td>
											<td>Rp.<?= number_format($d['tot_kotor']);?><td>
										</tr>
										<tr>
											<td>Angsuran/Tenor</td>
											<td><?= $d['lama'];?></td>
										</tr>
										<tr>
											<td>Uang Muka(DP)</td>
											<td>Rp.<?= number_format($d['uang_muka']);?></td>
										</tr>
										<tr>
											<td>Bunga(%)</td>
											<td>Rp.<?= number_format($d['besar_bunga'])." (".$d['bunga']."%)";?></td>
										</tr>
										<tr>
											<td>Total</td>
											<td>Rp.<?= number_format($d['tot_bersih']);?></td>
										</tr>
										<tr>
											<td>Angsuran/bulan</td>
											<td>Rp.<?= number_format($d['angsuran']);?></td>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<h6>Rincian Pesanan</h6>
						<table class="table table-sm table-borderless">
							<thead>
								<tr>
									<th>No</th>
									<th>Kategori</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Qty</th>
									<th>Sub total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql1 = mysql_query("SELECT * FROM tbdetailpenjualan a, tbproduk b, tbkategori c WHERE a.id_penjualan='$d[id_penjualan]' AND a.id_produk=b.id AND b.id_kategori=c.id ORDER BY b.id ASC");
								$n = 1;
								$tot = 0;
								while($dt = mysql_fetch_array($sql1)){
									$tot += $dt['harga_jual']*$dt['banyak'];
									?>
									<tr>
										<td><?= $n++;?></td>
										<td><?= ucfirst($dt['kategori']);?></td>
										<td><?= ucfirst($dt['nama_barang']);?></td>
										<td>Rp.<?= number_format($dt['harga_jual']);?></td>
										<td><?= $dt['banyak'];?></td>
										<td>Rp.<?= number_format($dt['banyak']*$dt['harga_jual']);?></td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	<?php } else {
		$sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pel='$idp'");
		$r = mysql_num_rows($sql);
		if($r){
		?>
		<div class="card my-2">
			<div class="card-body">
				<h4 class="text-center"><i class="fa fa-shopping-cart"></i> Keranjang</h4>
				<div class="row" id="view_cart">
					<?php
					$sql = mysql_query("SELECT b.id,a.nama_barang,a.harga,b.jumlah,a.img,a.stok FROM tbproduk a, tbkeranjang b WHERE a.id=b.kode_pro AND b.kode_pel='$idp' ORDER BY 1");
					$item = 0;
					$tot = 0;
					while($d = mysql_fetch_array($sql)){
						$item += $d['jumlah'];
						$tot += $d['jumlah']*$d['harga'];
						?>
						<div class="col-md-4">
							<p class="text-center text-uppercase"><?= substr($d['nama_barang'], 0,30);?></p>
							<img src="../admin/img/produk/<?= $d['img'];?>" class="img-fluid">
							<div class="card-text text-center">
								<span class="text-primary">Rp.<?= number_format($d['harga']);?></span><br>
								Dibeli <div class="badge badge-success"><?= $d['jumlah'];?></div><br>
								<div class="btn-group mt-3">
									<button class="btn btn-warning sub" alt="<?= $d['id'];?>"><i class="fa fa-minus"></i></button>									
									<button class="btn btn-danger del_cart" alt="<?= $d['id'];?>"><i class="fa fa-trash"></i></button>
									<button class="btn btn-success add" alt="<?= $d['id'];?>"><i class="fa fa-plus"></i></button>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="row">
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
						<div class="alert alert-danger" id="pesan_tunai"><i class="fa fa-exclamation-circle"></i> Input harus diisi!</div>
						<div class="form-group" id="kre">
							<label for="kredit">Pilih Angsuran</label>
							<select class="form-control" id="kredit">
								<option value="">...</option>
								<option value="3">3x</option>
								<option value="6">6x</option>
								<option value="12">12x</option>
							</select>
							<label for="dp">Pilih Uang Muka(DP)</label>
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
				<div class="alert alert-danger" id="pesan"></div>
				<div class="jumbotron py-4" id="detail">
					<h5>Detail Pembayaran</h5>
					<div class="col-md-6">
						<input type="hidden" id="b_bunga">
						<table class="table table-borderless">
							<tr>
								<td>Angsuran/Tenor</td>
								<td>:</td>
								<td id="h_kre" alt=""></td>
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
							<tr class="d-none">
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
				<button class="btn btn-primary btn-block" id="byr"><i class="fa fa-handshake"></i> Lanjutkan</button>
			</div>
		</div>
		<?php } else { ?>
			<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> Keranjang anda masih kosong, silahkan isi keranjang anda <a href="?page=barang">disini</a></div>
		<?php } } ?>
</div>