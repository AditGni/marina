<div class="row">
	<?php
	if($_GET['act']=='add' || $_GET['act']=='edit'){
		include "page/produk/add_produk.php";
	} else if($_GET['act']=='delete'){
		$id = $_GET['idpro'];
		mysql_query("DELETE FROM tbproduk WHERE id='$id'");
		header("location:?page=produk");
	} else if($_GET['act']=='proses'){
		if($_GET['aksi']=='add'){
			$tgl = date('Y-m-d');
			$kat = $_POST['kat'];
			$nama = $_POST['nama'];
			$harga = $_POST['harga'];
			$stok = $_POST['stok'];
			$des = $_POST['des'];
			$img = $_FILES['img']['name'];
			$dir = "img/produk/".$img;
			$sql = mysql_query("INSERT INTO tbproduk VALUES('','$kat','$nama','$harga','$stok','$des','$tgl','$img')");
			if($sql && $img){
				move_uploaded_file($_FILES['img']['tmp_name'], $dir);
				header("location:?page=produk");
			}
		} else if($_GET['aksi']=='edit'){
			$id = $_POST['idpro'];
			$tgl = date('Y-m-d');
			$kat = $_POST['kat'];
			$nama = $_POST['nama'];
			$harga = $_POST['harga'];
			$stok = $_POST['stok'];
			$des = $_POST['des'];
			$i_lama = $_POST['img_lama'];
			$img = $_FILES['img']['name'];
			$dir = "img/produk/".$img;
			if(!$img){
				$img = $i_lama;
			}
			$sql = mysql_query("UPDATE tbproduk SET id_kategori='$kat',nama_barang='$nama',harga='$harga',stok='$stok',deskripsi='$des',tanggal='$tgl',img='$img' WHERE id='$id'");
			if($sql && $img){
				move_uploaded_file($_FILES['img']['tmp_name'], $dir);
			}
			header("location:?page=produk");
		}
	} else {
	?>
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable">
						<thead>
							<tr class="text-center">
								<th>No</th>
								<th>Kategori</th>
								<th>Produk</th>
								<th>Harga</th>
								<th>Deskripsi</th>
								<th>Stok</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysql_query("SELECT a.id,a.nama_barang,a.harga,a.deskripsi,b.kategori,a.stok FROM tbproduk a, tbkategori b WHERE a.id_kategori=b.id ORDER BY a.id ASC");
							$no = 1;
							while($d = mysql_fetch_array($sql)){?>
								<tr>
									<td><?= $no++;?></td>
									<td><?= ucfirst($d['kategori']);?></td>
									<td><?= ucfirst($d['nama_barang']);?></td>
									<td>Rp.<?= number_format($d['harga']);?></td>
									<td><?= ucfirst($d['deskripsi']);?></td>
									<td><?= $d['stok'];?></td>
									<td class="text-center"><a href="?page=produk&act=edit&idpro=<?= $d['id'];?>" class="btn btn-warning"><i class="fa fa-edit"></i></a> <a href="?page=produk&act=delete&idpro=<?= $d['id'];?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus produk ini?')"><i class="fa fa-trash"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<a href="?page=produk&act=add" class="btn btn-primary mb-2"><i class="fa fa-plus"></i></a>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>