<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable">
						<thead>
							<tr class="text-center">
								<th class="align-middle">No</th>
								<th class="align-middle">Tanggal</th>
								<th class="align-middle">Nama Pelanggan</th>
								<th class="align-middle">Jumlah Barang</th>
								<th class="align-middle">Jenis Pembayaran</th>
								<th class="align-middle">Total</th>
								<th class="align-middle">Uang Muka</th>
								<th class="align-middle">Tenor</th>
								<th class="align-middle">Bunga(%)</th>
								<th class="align-middle">Besar Bunga</th>
								<th class="align-middle">Angsuran</th>
								<th class="align-middle">Status</th>
								<th class="align-middle">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sql = mysql_query("SELECT a.id,a.tanggal,a.lama,a.uang_muka,a.bunga,a.besar_bunga,a.angsuran,a.tot_bersih,a.jenis_pembayaran,a.status, b.nama,b.alamat,b.phone,SUM(c.banyak) as jml,a.bukti_pembayaran FROM tbpenjualan a, tbpelanggan b, tbdetailpenjualan c WHERE a.id=c.id_penjualan AND a.idp=b.id GROUP BY a.id ORDER BY a.id ASC");
							$no = 1;
							$r = mysql_num_rows($sql);
							while($d = mysql_fetch_array($sql)){?>
								<tr>
									<td><?= $no++;?></td>
									<td><?= date('d-m-Y',strtotime($d['tanggal']));?></td>
									<td><?= ucfirst($d['nama']);?></td>
									<td><?= $d['jml'];?></td>
									<td>
										<?php
										if($d['jenis_pembayaran']=='t'){
											echo "Tunai";
										} else {
											echo "Kredit";
										}
										?>
									</td>
									<td>Rp.<?= number_format($d['tot_bersih']);?></td>
									<td>
										<?php if($d['uang_muka']=='-'){
											echo "-";
										} else {?>
											Rp.<?= number_format($d['uang_muka']);?>
										<?php } ?>
									</td>
									<td><?= $d['lama'];?></td>
									<td><?= $d['bunga'];?></td>
									<td>
										<?php if($d['besar_bunga']=='-'){
											echo "-";
										} else {?>
											Rp.<?= number_format($d['besar_bunga']);?>
										<?php } ?>
									</td>
									<td>
										<?php if($d['angsuran']=='-'){
											echo "-";
										} else {?>
											Rp.<?= number_format($d['angsuran']);?>
										<?php } ?>
									</td>
									<td>
										<?php
										if($d['jenis_pembayaran']=='t'){
											if($d['status']=='n'){?>
												<a class="badge badge-info tunai_antar" href="#" alt="<?= $d['id'];?>">Konfirmasi Pengantaran</a>
											<?php } else if($d['status']=='p'){?>
												<div class="badge badge-info rounded-0">Proses pengantaran ke pelanggan</div>
											<?php } else {?>
												<div class="badge badge-success rounded-0"><i class="fa fa-check-circle"></i> Transaksi Sukses</div>
											<?php }
										} else if($d['jenis_pembayaran']=='k'){
											if($d['status']=='n'){
												if($d['bukti_pembayaran']!='-'){?>
													<a class="badge badge-info text-white isi-modal" data-toggle="modal" data-target="#konfirmasi_bayar" alt="<?= $d['id'].",".$d['bukti_pembayaran'];?>">Konfirmasi Bukti Pembayaran</a>
												<?php } else {?>
													<div class="badge badge-danger">Belum melakukan pembayaran</div>
												<?php }
											} else if($d['status']=='y'){?>
												<div class="badge badge-success"><i class="fa fa-check-circle"></i> Transaksi Sukses</div>
											<?php } else if($d['status']=='m'){?>
												<div class="badge badge-danger"><i class="fa fa-times"></i> Pembayaran tidak sesuai</div>
											<?php } else if($d['status']=='p'){?>
												<a href="#" class="badge badge-info kredit_antar" alt=<?= $d['id'];?>>Konfirmasi Pengantaran</a>
											<?php } else if($d['status']=='k'){?>
												<div class="badge badge-info"><i class="fa fa-exclamation"></i> Proses pengantaran</div>
											<?php }
										}
										?>
									</td>
									<td>
										<button class="btn btn-primary detail" data-toggle="modal" data-target="#detail" alt="<?= $d['id'];?>"><i class="fa fa-eye"></i></button>
										<!-- <button class="btn btn-warning"><i class="fa fa-file"></i></button> -->
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>