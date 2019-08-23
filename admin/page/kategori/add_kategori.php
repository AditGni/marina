<?php
$act = $_GET['act'];
if($act=='edit'){
	$id = $_GET['kat'];
	$sql = mysql_query("SELECT * FROM tbkategori WHERE id='$id'");
	$dt = mysql_fetch_array($sql);
	$aksi = 'edit';
} else {
	$aksi = 'add';
}
?>
<div class="col-md-8 offset-md-2">
	<div class="card shadow">
		<div class="card-body">
			<form method="POST" action="?page=kategori&act=proses&aksi=<?= $aksi;?>">
				<input type="hidden" name="idkatl" value="<?= $id;?>">

				<?php if($act=='edit'){?>
				<div class="form-group form-row">
					<label class="col-md-2 my-auto">ID Kategori</label>
					<div class="col-md-10">
						<input type="text" name="idkat" class="form-control" value="<?= @$dt['id'];?>" <?= $aksi=='edit' ? 'disabled' : '';?>>
					</div>
				</div>
				<?php } ?>

				<div class="form-group form-row">
					<label class="col-md-2 my-auto">Kategori</label>
					<div class="col-md-10">
						<input type="text" name="kat" class="form-control" value="<?= @$dt['kategori'];?>">
					</div>
				</div>

				<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i></button>
				<a href="?page=kategori" class="btn btn-danger"><i class="fa fa-backward"></i></a>
			</form>
		</div>
	</div>
</div>