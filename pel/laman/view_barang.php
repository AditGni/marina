<?php
$id = $_GET['idpr'];
// tanpa stok
$sql = mysql_query("SELECT a.id as idp,b.id as idk,a.nama_barang,b.kategori,a.harga,a.deskripsi,a.img FROM tbproduk a, tbkategori b WHERE a.id_kategori=b.id AND a.id='$id'");
// $sql = mysql_query("SELECT a.id as idp,b.id as idk,a.nama_barang,b.kategori,a.harga,a.deskripsi,a.img,c.stok FROM tbproduk a, tbkategori b, tbstok c WHERE a.id_kategori=b.id AND a.id=c.id_poroduk AND a.id='$id'");
$d = mysql_fetch_array($sql);
?>
<div class="col-md-8 offset-md-2">
	<div class="card">
		<!-- <div class="card-header text-capitalize h4"><div class="card-title"><?= $d['kategori'];?></div></div> -->
		<div class="card-header text-capitalize h4">
			<div class="breadcrumb no-background h6">
				<a href="?page=barang" class="breadcrumb-item link">Home</a>
				<a href="?page=barang&idkat=<?= $d['idk'];?>" class="breadcrumb-item link"><?= $d['kategori'];?></a>
				<span class="breadcrumb-item"><?= $d['nama_barang'];?></span>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<img src="../admin/img/produk/<?= $d['img'];?>" class="img-fluid mx-auto d-block" style="height:250px">
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
					<div class="row">
						<div class="col-md-12">
							<div class="btn-icon-split">
								<div class="icon not-back my-auto"><i class="fa fa-eye"></i></div>
								<div class="text pl-0 small">Dilihat<br>15</div>
							</div>
							<div class="btn-icon-split">
								<div class="icon not-back my-auto"><i class="fa fa-shopping-cart"></i></div>
								<div class="text pl-0 small">Dibeli<br>15</div>
							</div>
							<div class="btn-icon-split">
								<div class="icon not-back my-auto"><i class="fa fa-box-open"></i></div>
								<div class="text pl-0 small">Kondisi<br>Baru</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>
		<?php if(!empty($_SESSION['admin'])){?>
		<div class="card-footer">
			<div class="row">
				<div class="col-md-12">
					<div class="row" id="has">
						<div class="col-md-6"><button class="btn btn-success btn-block ker" alt="<?= $id;?>">Tambahkan ke keranjang</button></div>
						<div class="col-md-6"><button class="btn btn-warning btn-block ker" alt="<?= $id;?>">Beli</button></div>
					</div>
					<button class="btn btn-success btn-block" id="hasnt"><i class="fa fa-eye"></i> Item sudah ditambahkan, Lihat item ini di keranjang</button>
				</div>
			</div>
		</div>
		<?php } ?>
		<!-- <a href="?page=barang" class="btn btn-secondary rounded-0">Kembali</a> -->
	</div>
</div>