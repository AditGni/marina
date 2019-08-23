<?php
$act = $_GET['act'];
if($act=='edit'){
	$id = $_GET['idpro'];
	$sql = mysql_query("SELECT * FROM tbproduk WHERE id='$id'");
	$dt = mysql_fetch_array($sql);
	$aksi = 'edit';
} else {
	$aksi = 'add';
}
?>
<div class="col-md-8 offset-md-2">
	<div class="card shadow">
		<div class="card-body">
			<form method="POST" action="?page=produk&act=proses&aksi=<?= $aksi;?>" enctype="multipart/form-data">
				<input type="hidden" name="idpro" value="<?= $id;?>">
				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Kategori</label>
					<div class="col-md-10">
						<select class="form-control" name="kat">
							<option value="no">...</option>
							<?php
							$sql = mysql_query("SELECT * FROM tbkategori ORDER BY id ASC");
							while($d = mysql_fetch_array($sql)){?>
								<option value="<?= $d['id'];?>" <?= $dt['id_kategori']==$d['id'] ? 'selected' : '';?>><?= ucfirst($d['kategori']);?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Nama Produk</label>
					<div class="col-md-10">
						<input type="text" name="nama" class="form-control" value="<?= @$dt['nama_barang'];?>">
					</div>
				</div>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Harga</label>
					<div class="col-md-10">
						<input type="text" name="harga" class="form-control" value="<?= @$dt['harga'];?>">
					</div>
				</div>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Stok</label>
					<div class="col-md-10">
						<input type="text" name="stok" class="form-control" value="<?= @$dt['stok'];?>">
					</div>
				</div>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Deskripsi</label>
					<div class="col-md-10">
						<input type="text" name="des" class="form-control" value="<?= @$dt['deskripsi'];?>">
					</div>
				</div>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Gambar</label>
					<div class="col-md-10">
						<input type="file" name="img">
					</div>
					<input type="hidden" name="img_lama" value="<?= $dt['img'];?>">
				</div>
				<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i></button>
				<a href="?page=produk" class="btn btn-danger"><i class="fa fa-backward"></i></a>
			</form>
		</div>
	</div>
</div>