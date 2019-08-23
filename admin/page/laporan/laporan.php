<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-body">
				<div class="form-group form-row">
					<label class="col-md-1 my-auto">Laporan:</label>
					<div class="col-md-11">
						<select class="form-control" id="lap">
							<option value="no">...</option>
							<option>Produk</option>
							<option>Pelanggan</option>
							<option>Kategori</option>
						</select>
					</div>
				</div>
				<button class="btn btn-primary" onclick="printContent('print')"><i class="fa fa-print"></i> Cetak</button>
				<div id="print" class="mt-3">
					<table class="table table-bordered mt-5" id="isi">
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-12" id="hide">
		<table class="table table-bordered" id="produk">
			<thead>
				<tr>
					<th>No</th>
					<th>Kategori</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>Deskripsi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = mysql_query("SELECT * FROM tbproduk a, tbkategori b WHERE a.id_kategori=b.id ORDER BY a.id ASC");
				$no = 1;
				while($d = mysql_fetch_array($sql)){?>
					<tr>
						<td><?= $no++;?></td>
						<td><?= $d['kategori'];?></td>
						<td><?= $d['nama_barang'];?></td>
						<td>Rp.<?= number_format($d['harga']);?></td>
						<td><?= $d['stok'];?></td>
						<td><?= $d['deskripsi'];?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered" id="kategori">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Kategori</th>
					<th>Kategori</th>
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
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<table class="table table-bordered" id="pelanggan">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>No. HP</th>
					<th>Alamat</th>
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
							if($d['kelamin']=='l'){
								echo "Laki-laki";
							} else {
								echo "Perempuan";
							}
							?>
						</td>
						<td><?= $d['phone'];?></td>
						<td><?= $d['alamat'];?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>