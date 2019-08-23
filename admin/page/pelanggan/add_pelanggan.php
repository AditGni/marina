<?php
$act = $_GET['act'];
if($act=='edit'){
	$id = $_GET['idp'];
	$sql = mysql_query("SELECT * FROM tbpelanggan WHERE id='$id'");
	$dt = mysql_fetch_array($sql);
	$aksi = 'edit';
} else {
	$aksi = 'add';
}
?>
<div class="col-md-8 offset-md-2">
	<div class="card shadow">
		<div class="card-body">
			<form method="POST" action="?page=pelanggan&act=proses&aksi=<?= $aksi;?>" enctype="multipart/form-data">
				<input type="hidden" name="idp" value="<?= $id;?>">

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Nama Pelanggan</label>
					<div class="col-md-10">
						<input type="text" name="nama" class="form-control" value="<?= @$dt['nama'];?>">
					</div>
				</div>
				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Jenis Kelamin</label>
					<div class="col-md-10">
						<select class="form-control" name="jk">
							<option value="no">...</option>
							<option value="p" <?= $dt['kelamin']=='p' ? 'selected' : '';?>>Pria</option>
							<option value="w" <?= $dt['kelamin']=='w' ? 'selected' : '';?>>Wanita</option>
						</select>
					</div>
				</div>
				<div class="form-group form-row">
					<label class="col-md-2 my-auto">No. Hp</label>
					<div class="col-md-10">
						<input type="text" name="hp" class="form-control" value="<?= @$dt['phone'];?>">
					</div>
				</div>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Alamat</label>
					<div class="col-md-10">
						<textarea class="form-control" row="3" name="alamat"><?= $dt['alamat'];?></textarea>
					</div>
				</div>
				
				<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i></button>
				<a href="?page=pelanggan" class="btn btn-danger"><i class="fa fa-backward"></i></a>
			</form>
		</div>
	</div>
</div>