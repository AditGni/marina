<div class="row">
	<?php
	if($_GET['act']=='add' || $_GET['act']=='edit'){
		include "page/kategori/add_kategori.php";
	} else if($_GET['act']=='delete'){
		$id = $_GET['kat'];
		mysql_query("DELETE FROM tbkategori WHERE id='$id'");
		header("location:?page=kategori");
	} else if($_GET['act']=='proses'){
		if($_GET['aksi']=='add'){
			// $id = $_POST['idkat'];
			$kat = $_POST['kat'];
			$sql = mysql_query("INSERT INTO tbkategori VALUES('','$kat')");
			header("location:?page=kategori");
		} else if($_GET['aksi']=='edit'){
			$id = $_POST['idkatl'];
			$kat = $_POST['kat'];
			mysql_query("UPDATE tbkategori SET kategori='$kat' WHERE id='$id'");
			header("location:?page=kategori");
		}
	} else {
	?>
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>ID Kategori</th>
								<th>Kategori</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysql_query("SELECT * FROM tbkategori ORDER BY id ASC");
							$no = 1;
							while($d = mysql_fetch_array($sql)){?>
								<tr>
									<td><?= $no++;?></td>
									<td><?= $d['id'];?></td>
									<td><?= ucfirst($d['kategori']);?></td>
									<td class="text-center"><a href="?page=kategori&act=edit&kat=<?= $d['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="?page=kategori&act=delete&kat=<?= $d['id'];?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus kategori ini?')"><i class="fa fa-trash"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<a href="?page=kategori&act=add" class="btn btn-primary mb-2"><i class="fa fa-plus"></i></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>