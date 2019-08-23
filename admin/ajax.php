<?php
error_reporting(0);
mysql_connect('localhost','root','');
mysql_select_db('toko');
$hal = $_POST['hal'];
if($_POST['hal']=='tunai_antar'){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET status='p' WHERE id='$id'");
} else if($_POST['hal']=='konfir_byr'){
	$id = $_POST['id'];
	mysql_query("UPDATE tbpenjualan SET status='p' WHERE id='$id'");
	echo $id;
} else if($hal=='detail_transaksi'){
  $id = $_POST['id'];
  $sql = mysql_query("SELECT a.id as id_penjualan, a.tanggal,a.lama,a.idp,a.uang_muka,a.bunga,a.besar_bunga,a.angsuran,a.tot_kotor,a.tot_bersih,b.nama,b.alamat,b.phone FROM tbpenjualan a, tbpelanggan b WHERE a.id='$id' AND a.idp=b.id");
  $r1 = mysql_num_rows($sql);
  $d = mysql_fetch_array($sql);
  ?>
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <div class="card">
        <div class="card-body">
          <h4 id="subtitle">Transaksi Anda belum selesai</h4>
          <div id="notif"></div>

          <div class="row mt-5">
            <div class="col-md-6" id="pl">
              <h6>Pelanggan</h6>
              <table class="table table-sm table-borderless">
                <tbody>
                  <tr>
                    <td>Nama</td>
                    <td><?= ucfirst($d['nama']);?></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td><?= ucfirst($d['alamat']);?></td>
                  </tr>
                  <tr>
                    <td>No. Hp</td>
                    <td><?= $d['phone'];?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6" id="jp">
              <h6>Jenis Pembayaran</h6>
              <table class="table table-sm table-borderless">
                <thead>
                  <tr>
                    <td>Total Harga Barang</td>
                    <td>Rp.<?= number_format($d['tot_kotor']);?><td>
                  </tr>
                  <tr>
                    <td>Angsuran/Tenor</td>
                    <td><?= $d['lama'];?></td>
                  </tr>
                  <tr>
                    <td>Uang Muka(DP)</td>
                    <td>Rp.<?= number_format($d['uang_muka']);?></td>
                  </tr>
                  <tr>
                    <td>Bunga(%)</td>
                    <td>Rp.<?= number_format($d['besar_bunga'])." (".$d['bunga']."%)";?></td>
                  </tr>
                  <tr>
                    <td>Total</td>
                    <td>Rp.<?= number_format($d['tot_bersih']);?></td>
                  </tr>
                  <tr>
                    <td>Angsuran/bulan</td>
                    <td>Rp.<?= number_format($d['angsuran']);?></td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
          <h6>Rincian Pesanan</h6>
          <div class="table-responsive">
	          <table class="table table-sm table-borderless">
	            <thead>
	              <tr>
	                <th>No</th>
	                <th>Kategori</th>
	                <th>Nama Produk</th>
	                <th>Harga</th>
	                <th>Qty</th>
	                <th>Sub total</th>
	              </tr>
	            </thead>
	            <tbody>
	              <?php
	              $sql1 = mysql_query("SELECT * FROM tbdetailpenjualan a, tbproduk b, tbkategori c WHERE a.id_penjualan='$d[id_penjualan]' AND a.id_produk=b.id AND b.id_kategori=c.id ORDER BY b.id ASC");
	              $n = 1;
	              $tot = 0;
	              while($dt = mysql_fetch_array($sql1)){
	                $tot += $dt['harga_jual']*$dt['banyak'];
	                ?>
	                <tr>
	                  <td><?= $n++;?></td>
	                  <td><?= ucfirst($dt['kategori']);?></td>
	                  <td><?= ucfirst($dt['nama_barang']);?></td>
	                  <td>Rp.<?= number_format($dt['harga_jual']);?></td>
	                  <td><?= $dt['banyak'];?></td>
	                  <td>Rp.<?= number_format($dt['banyak']*$dt['harga_jual']);?></td>
	                </tr>
	              <?php
	              }
	              ?>
	            </tbody>
	          </table>
	      </div>
        </div>
      </div>
    </div>
  </div><?php
}
?>