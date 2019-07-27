<?php
$id = $_GET['idpr'];
$sql = mysql_query("SELECT * FROM tbproduk a, tbkategori b, tbstok c WHERE a.id_kategori=b.id AND a.id=c.id_poroduk AND a.id='$id'");
$d = mysql_fetch_array($sql);
?>
<div class="col-md-8 offset-md-2">
	<div class="card">
		<div class="card-header text-capitalize h4"><div class="card-title"><?= $d['kategori'];?></div></div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<img src="../panel/pic/<?= $d['img'];?>" class="img-fluid mx-auto d-block" style="height:250px">
				</div>
				<div class="col-md-6">
					<table class="table table-sm table-hover table-borderless text-muted">
						<tr>
							<td>Nama</td>
							<td><?= $d['nama_barang'];?></td>
						</tr>
						<tr>
							<td>Stok</td>
							<td><?= $d['stok'];?></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td>Rp.<?= number_format($d['harga']);?></td>
						</tr>
						<tr>
							<td>Deskripsi</td>
							<td><?= $d['deskripsi'];?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<?php if(!empty($_SESSION['admin'])){?>
		<div class="card-footer">
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6"><button class="btn btn-success btn-block ker" alt="<?= $id;?>">Keranjang</button></div>
						<div class="col-md-6"><button class="btn btn-warning btn-block ker" alt="<?= $id;?>">Beli Sekarang</button></div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<a href="?page=barang" class="btn btn-secondary rounded-0">Kembali</a>
	</div>
</div>