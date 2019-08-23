<div class="col-md-12">
	<?php if($_SESSION['pesan']){?>
	<div class="alert alert-warning"><?= $_SESSION['pesan'];?></div>
	<?php }
	unset($_SESSION['pesan']);
	?>
	<div class="card border-0 rounded-0" >
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-row">
						<label class="col-md-3 my-auto">Pencarian</label>
						<div class="col-md-9">
							<input type="text" name="cari" class="form-control" id="findme">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-row">
						<label class="col-md-3 my-auto">Kategori</label>
						<div class="col-md-9">
							<?php
							$kat = mysql_query("SELECT * FROM tbkategori ORDER BY 1");
							$i = 0;
							while($d = mysql_fetch_array($kat)){
								$badge = array('primary','success','warning','danger','info','secondary','dark');
								$i = rand(0,6);
								?>
								<a href="?page=barang&idkat=<?= $d['id'];?>" class="badge badge-<?= $badge[$i];?>"><?= ucfirst($d['kategori']);?></a>
							<?php }
							if($_GET['idkat']){?>
								<a href="?page=barang" class="badge badge-success"><i class="fa fa-arrow-left"></i></a>
							<?php } ?>
						</div>
					</div>
				</div>
<!-- 				<div class="col-md-12 mt-3">
				</div> -->
			</div>
		</div>
	</div>

	<div class="alert alert-danger my-3" id="msgfind"><i class="fa fa-times"></i> Pencarian tidak ditemukan</div>
	
	<div class="row" id="isi-bar">
		<?php
		$kat = $_GET['idkat'];
		// hilangkan stok sementara
		/*if($kat){
			$que = "SELECT a.id,a.nama_barang,a.harga,c.stok,a.img FROM tbproduk a, tbkategori b, tbstok c WHERE a.id_kategori=b.id AND a.id=c.id_poroduk AND a.id_kategori='$kat' GROUP BY a.id";
		} else {
			$que = "SELECT a.id,a.nama_barang,a.harga,c.stok,a.img FROM tbproduk a, tbkategori b, tbstok c WHERE a.id_kategori=b.id AND a.id=c.id_poroduk GROUP BY a.id";
		}*/

		if($kat){
			$que = "SELECT a.id,a.nama_barang,a.harga,a.img,a.stok FROM tbproduk a, tbkategori b WHERE a.id_kategori=b.id AND a.id_kategori='$kat' GROUP BY a.id";
		} else {
			$que = "SELECT a.id,a.nama_barang,a.harga,a.img,a.stok FROM tbproduk a, tbkategori b WHERE a.id_kategori=b.id GROUP BY a.id";
		}
		$sql = mysql_query($que);
		while($d = mysql_fetch_array($sql)){?>
		<div class="col-md-4 my-3">
			<div class="card">
				<!-- <div class="card-header"><div class="card-title text-center text-capitalize"><?= $d['nama_barang'];?></div></div> -->
				<a href="?page=view-barang&idpr=<?= $d['id'];?>" class="nav-link px-0 py-0">
					<div class="card-body px-0 py-0">
						<img src="../admin/img/produk/<?= $d['img'];?>" class="img-fluid d-block mx-auto" style="height:280px">
						<div class="card-text text-center mt-2">
							<h6><?= ucfirst($d['nama_barang']);?></h6>
							<div class="dropdown-divider border-primary"></div>
							<div class="row mt-2">
								<div class="col-md-6">
									<span class="text-muted">Harga</span>
									<div class="dropdown-divider"></div>
									<span class="text-primary">Rp.<?= number_format($d['harga']);?></span>
								</div>
								<div class="col-md-6">
									<span class="text-muted">Stok</span>
									<div class="dropdown-divider"></div>
									Tersedia <div class="badge badge-primary"><?= $d['stok'];?></div>
								</div>
							</div>
							<!-- <div class="dropdown-divider"></div>
							<div class="text-muted">Cicilan : <span class="badge badge-warning">3x</span> <span class="badge badge-info">6x</span> <span class="badge badge-danger">12x</span></div> -->
						</div>
					</div>
				</a>
			</div>
		</div>
	<?php } ?>
	</div>
  <!-- <h2 class="page-section-heading text-center text-uppercase text-secondary mt-5">KATEGORI</h2> -->

</div>
<!-- <?php
$sql = mysql_query("SELECT * FROM tbkategori ORDER BY 1");
while($d = mysql_fetch_array($sql)){?>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header"><h5 class="card-title text-center text-capialize"><?= $d['kategori'];?></h5></div>
			<div class="row">
				<?php
				$sqli = mysql_query("SELECT * FROM tbproduk WHERE id_kategori='$d[id]'");
				$r = mysql_num_rows($sqli);
				while($di = mysql_fetch_array($sqli)){?>
					<div class="col-md-<?= $r > 1 ? 6 : 12;?>">
						<a href="?page=view-barang&idpr=<?= $di['id'];?>"><img src="pic/1.jpg" class="img-thumbnail"></a>
						<p class="small text-muted text-center text-capitalize"><?= $di['nama_barang'];?></p>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?> -->