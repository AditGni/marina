<div class="col-md-12">
	<?php
	$sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pel='$idp'");
	$r = mysql_num_rows($sql);
	if($r){
	?>
<!-- 	<div class="alert alert-success" id="pesan">
		<p class="h3 font-weight-bold"><i class="fa fa-check"></i> Transaksi anda sukses!</p>
		<div class="row">
			<div class="col-md-12" id="isikan">
				
			</div>
		</div>
	</div> -->
	<div class="card my-2" id="view_cart">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6" id="isi_keranjang">
					<table class="table table-hover table-striped">
						<tr>
							<th class="text-center">No</th>
							<th>Barang</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Sub Total</th>
							<th></th>
						</tr>
						<?php
						$sqli = mysql_query("SELECT * FROM tbkeranjang a, tbproduk b WHERE  a.kode_pel='$idp' AND a.kode_pro=b.id ORDER BY 1");
						$n = 1;
						$j = 0;
						$h = 0;
						$t = 0;
						while($dt = mysql_fetch_array($sqli)){
							$j += $dt['jumlah'];
							$h += $dt['harga'];
							$t += $dt['jumlah']*$dt['harga'];
						?>
						<tr>
							<td class="text-center"><?= $n++;?></td>
							<td class="text-capitalize"><?= $dt['nama_barang'];?></td>
							<td><?= $dt['jumlah'];?></td>
							<td>Rp.<?= number_format($dt['harga']);?></td>
							<td class="text-right">Rp.<?= number_format($dt['jumlah']*$dt['harga']);?></td>
							<td><a href="?page=proses&act=hapus_item_ker&id=<?= $dt['kode_pro'];?>" class="btn btn-danger" id="del_item"><i class=" fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="2" class="font-weight-bold text-center">Total</td>
							<td class="font-weight-bold"><?= $j;?></td>
							<td class="font-weight-bold">Rp.<?= number_format($h);?></td>
							<td class="font-weight-bold text-right">Rp.<?= number_format($t);?></td>
						</tr>
						<tr id="t_bayar">
							<td colspan="2" class="font-weight-bold text-center">Dibayar</td>
							<td class="font-weight-bold text-right" colspan="3" id="isi"></td>
						</tr>
						<tr id="t_kembali"> 
							<td colspan="2" class="font-weight-bold text-center">Kembali</td>
							<td class="font-weight-bold text-right" colspan="3" id="isi"></td>
						</tr>
					</table>
				</div>
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
							<td id="total" alt="<?= $tot;?>">Rp.<?= number_format($tot);?></td>
						</tr>
					</table>
					<div id="alt_kurang" class="alert alert-warning"></div>
					<!-- <input type="text" name="bayar" class="form-control" placeholder="Bayar" id="cash" alt=""> -->
					<?php
					$sql = "SELECT * FROM tbbank ORDER BY 1";
					?>
					<div class="alert alert-info">
						<h6>Jenis Pembayaran:</h6>
						<ul>
							<li>Bayar Di tempat</li>
							<li>Transfer Bank :
								<ul>
									<?php
									$que = mysql_query($sql);
									while($d = mysql_fetch_array($que)){?>
										<li><?= ucfirst($d['nama_bank'])." - ".$d['nama_pemilik'];?></li>
									<?php } ?>
								</ul>
							</li>
						</ul>
					</div>
					<div class="form-row">
						<label class="col-md-4 my-auto">Pilih Pembayaran</label>
						<select class="form-control col-md-8" id="j_bayar">
							<option value="not">...</option>
							<option value="cod">Bayar di tempat</option>
							<option value="tf">Transer</option>
						</select>
					</div>
					<div class="form-row mt-3" id="bank">
						<label class="col-md-4 my-auto">Pilih Bank</label>
						<select class="form-control col-md-8" id="p_bank">
							<option value="not">...</option>
							<?php
							$que = mysql_query($sql);
							while($d = mysql_fetch_array($que)){?>
								<option value="<?= $d['id_bank'];?>"><?= strtoupper($d['nama_bank']);?></option>
							<?php } ?>
						</select> 
					</div>
					<div class="alert alert-info mt-3" id="pesan">
						<p class="my-auto"><i class="fa fa-exclamation-circle"></i> Barang akan diproses setelah klik tombol Bayar</p>
					</div>
					<button class="btn btn-success btn-block mt-2" id="byr_ker"><i class="fa fa-handshake"></i> Bayar</button>
				</div>
			</div>
		</div>
	</div>
	<?php } else {		
		$sql = mysql_query("SELECT * FROM tbpenjualan WHERE idp='$idp' AND status<>'y'");
		$r = mysql_num_rows($sql);
		$d = mysql_fetch_array($sql);
		$_SESSION['idpen'] = $d['id'];
		if($r > 0 && $d['status']=='n' || $d['status']=='k' || $d['status']=='p'){
			include "laman/status_pesanan.php";
		} else {?>
		<div class="alert alert-warning"><i class="fa fa-exclamation-circle"></i> Keranjang anda masih kosong, silahkan isi keranjang anda <a href="?page=barang">disini</a></div>
	<?php } }?>
</div>