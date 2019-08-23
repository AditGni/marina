<div class="row">
	<?php
	if($_GET['act']=='add' || $_GET['act']=='edit'){
		include "page/pelanggan/add_pelanggan.php";
	} else if($_GET['act']=='delete'){
		$id = $_GET['idp'];
		mysql_query("DELETE FROM tbpelanggan WHERE id='$id'");
		header("location:?page=pelanggan");
	} else if($_GET['act']=='proses'){
		if($_GET['aksi']=='add'){
			$nama = $_POST['nama'];
			$jk = $_POST['jk'];
			$hp = $_POST['hp'];
			$alamat = $_POST['alamat'];

			mysql_query("INSERT INTO tbpelanggan VALUES('','$nama','$jk','$alamat','$hp')");
			header("location:?page=pelanggan");
		} else if($_GET['aksi']=='edit'){
			$id = $_POST['idp'];
			$nama = $_POST['nama'];
			$jk = $_POST['jk'];
			$hp = $_POST['hp'];
			$alamat = $_POST['alamat'];

			mysql_query("UPDATE tbpelanggan SET nama='$nama',kelamin='$jk',phone='$hp',alamat='$alamat' WHERE id='$id'");
			header("location:?page=pelanggan");
		}
	} else {
	?>
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm" id="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jenis Kelamin</th>
								<th>Alamat</th>
								<th>No. HP</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysql_query("SELECT * FROM tbpelanggan ORDER BY id ASC");
							$no = 1;
							while($d = mysql_fetch_array($sql)){?>
								<tr>
									<td><?= $no++;?></td>
									<td><?= ucfirst($d['nama']);?></td>
									<td>
										<?php
										if($d['kelamin']=='p'){
											echo 'Pria';
										} else {
											echo 'Wanita';
										}
										?>
									</td>
									<td><?= $d['alamat'];?></td>
									<td><?= $d['phone'];?></td>
									<td class="text-center"><a href="?page=pelanggan&act=edit&idp=<?= $d['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="?page=pelanggan&act=delete&idp=<?= $d['id'];?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus pelanggan ini?')"><i class="fa fa-trash"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<a href="?page=pelanggan&act=add" class="btn btn-primary mb-2"><i class="fa fa-plus"></i></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</div>