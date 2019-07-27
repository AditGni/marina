<div class="col-md-12">
	<div class="alert alert-warning" id="pesan"></div>
	<div class="row">
		<?php
		$sql = mysql_query("SELECT a.id,a.nama_barang,a.harga,c.stok,a.img FROM tbproduk a, tbkategori b, tbstok c WHERE a.id_kategori=b.id AND a.id=c.id_poroduk GROUP BY a.id");
		while($d = mysql_fetch_array($sql)){?>
		<div class="col-md-4 my-3">
			<div class="card">
				<div class="card-header"><div class="card-title text-center text-capitalize"><?= $d['nama_barang'];?></div></div>
				<a href="?page=view-barang&id=<?= $d['id'];?>&idpr=<?= $d['id'];?>">
					<img src="../panel/pic/<?= $d['img'];?>" class="img-fluid d-block mx-auto my-1" style="height:280px">
					<div class="card-body">
						<div class="card-text text-center">
							<span class="text-primary">Rp.<?= number_format($d['harga']);?></span><br>
							Tersedia <div class="badge badge-primary"><?= $d['stok'];?></div><br>
							<!-- <div class="text-muted">Cicilan : <span class="badge badge-warning">3x</span> <span class="badge badge-info">6x</span> <span class="badge badge-danger">12x</span></div> -->
						</div>
					</div>
				</a>
				<?php if($_SESSION['admin']){?>
				<div class="btn-group rounded-0">
					<button class="btn btn-outline-warning ker" alt="<?= $d['id'];?>">Keranjang</button>
					<button class="btn btn-outline-success ker" alt="<?= $d['id'];?>">Beli</button>
				</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
	</div>
  <h2 class="page-section-heading text-center text-uppercase text-secondary mt-5">KATEGORI</h2>

  <!-- Icon Divider -->
  <div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon">
      <i class="fas fa-star"></i>
    </div>
    <div class="divider-custom-line"></div>
  </div>
</div><!-- Portfolio Section Heading -->
<?php
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
<?php } ?>