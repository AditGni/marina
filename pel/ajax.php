<?php
error_reporting(0);
session_start();
mysql_connect('localhost','root','');
mysql_select_db('toko');
$mod = $_POST['mod'];
if($mod=='in_car'){
  $id = $_POST['id'];
  $idp = $_SESSION['id'];
  $sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pro='$id' AND kode_pel='$idp'");
  $ow = mysql_num_rows($sql);
  if($ow){
    $d = mysql_fetch_array($sql);
    $t = $d['jumlah'] + 1;
    mysql_query("UPDATE tbkeranjang SET jumlah='$t' WHERE kode_pro='$id' AND kode_pel='$idp'");
  } else {
    mysql_query("INSERT INTO tbkeranjang VALUES('','$id','$idp',1)");
  }
  echo "berhasil";
} else if($mod=='login'){
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $sql = mysql_query("SELECT * FROM tbadmin WHERE admin='$user' AND pass='$pass'");
  $r = mysql_num_rows($sql);
  if($r){
    $d = mysql_fetch_array($sql);
    $_SESSION['id'] = $d['idp'];
    $_SESSION['admin'] = $d['user'];
    $_SESSION['pass'] = $d['pass'];
    $_SESSION['ket'] = $d['ket'];
    header("location:index.php");
    $retur = $d['ket'];
  } else {
    $retur = 'no';
  }
  echo $retur;
} else if($mod=='cek_jumlah_cart'){
  // $sql = mysql_query("SELECT SUM(jumlah) as jml FROM tbkeranjang WHERE kode_pel='$_SESSION[id]'");
  $sql = mysql_query("SELECT count(*) as jml FROM tbkeranjang WHERE kode_pel='$_SESSION[id]'");
  $d = mysql_fetch_array($sql);
  if($d['jml'] > 0){
      echo $d['jml'];
  }
} else if($mod=='in_pen'){
  $isi = $_POST['isi'];
  $idp = $_SESSION['id'];
  $tgl = date('Y-m-d');
  $item = $_POST['item'];
  $lama = $_POST['lama'];
  $dp = $_POST['dp'];
  $bunga = $_POST['bunga'];
  $bb = $_POST['bb'];
  $tot_kotor = $_POST['tot_kotor'];
  $tot_bersih = $_POST['tot_bersih'];
  $tunai = $_POST['tunai'];
  $ang = $_POST['angsur'];
  if($isi=='t'){
    $item = '-';
    $lama = '-';
    $dp = '-';
    $bunga = '-';
    $bb = '-';
    $tot_kotor = '-';
    $ang = '-';
    $tot_bersih = $tunai;
  }

  mysql_query("INSERT INTO tbpenjualan VALUES('','$tgl','$lama','$idp','$dp','$bb','$bunga','$tot_kotor','$ang','$tot_bersih','$isi','-','n')");
  $id = $_SESSION['id'];
  $que = mysql_query("SELECT * FROM tbpenjualan WHERE idp='$idp' ORDER BY id DESC");
  $row = mysql_num_rows($que);
  $d = mysql_fetch_array($que);
  $sql = mysql_query("SELECT * FROM tbkeranjang a, tbproduk b WHERE a.kode_pro=b.id AND a.kode_pel='$idp'");
  while($dt = mysql_fetch_array($sql)){
    $tot = $dt['jumlah'] * $dt['harga'];
    mysql_query("INSERT INTO tbdetailpenjualan VALUES('','$d[id]','$dt[kode_pro]','$dt[jumlah]','$dt[harga]','$tot')");
  }

  mysql_query("DELETE FROM tbkeranjang WHERE kode_pel='$idp'");
} else if($mod=='del_cart'){
  $id = $_POST['id'];
  mysql_query("DELETE FROM tbkeranjang WHERE id='$id'");
} else if($mod=='cek_view_bar'){
  $id = $_POST['id'];
  $idp = $_SESSION['id'];
  $sql = mysql_query("SELECT * FROM tbkeranjang WHERE kode_pro='$id' AND kode_pel='$idp'");
  $r = mysql_num_rows($sql);
  echo $r;
} else if($mod=='tambang'){
  $id = $_POST['id'];
  $act = $_POST['act'];
  $que = mysql_query("SELECT * FROM tbkeranjang WHERE id='$id'");
  $d = mysql_fetch_array($que);

  if($act=='add'){
    $data = $d['jumlah'] + 1;
    $sql = "UPDATE tbkeranjang SET jumlah='$data' WHERE id='$id'";
  } else if($act=='sub'){
    $data = $d['jumlah'] - 1;
    if($data==0){
      $sql = "DELETE FROM tbkeranjang WHERE id='$id'";

    } else {
      $sql = "UPDATE tbkeranjang SET jumlah='$data' WHERE id='$id'";
    }
  }
  mysql_query($sql);
  ?>
  <input type="hidden" id="row" value="<?= $data;?>">
  <div class="row"><?php
  $idp = $_SESSION['id'];
  $sql = mysql_query("SELECT b.id,a.nama_barang,a.harga,b.jumlah,a.img,a.stok FROM tbproduk a, tbkeranjang b WHERE a.id=b.kode_pro AND b.kode_pel='$idp' ORDER BY 1");
  $item = 0;
  $tot = 0;
  while($d = mysql_fetch_array($sql)){
    $item += $d['jumlah'];
    $tot += $d['jumlah']*$d['harga'];
    ?>
    <div class="col-md-4">
      <p class="text-center text-uppercase"><?= substr($d['nama_barang'], 0,30);?></p>
      <img src="../admin/img/produk/<?= $d['img'];?>" class="img-fluid">
      <div class="card-text text-center">
        <span class="text-primary">Rp.<?= number_format($d['harga']);?></span><br>
        Dibeli <div class="badge badge-success"><?= $d['jumlah'];?></div><br>
        <div class="btn-group mt-3">
          <button class="btn btn-warning sub" alt="<?= $d['id'];?>"><i class="fa fa-minus"></i></button>                  
          <button class="btn btn-danger del_cart" alt="<?= $d['id'];?>"><i class="fa fa-trash"></i></button>
          <button class="btn btn-success add" alt="<?= $d['id'];?>"><i class="fa fa-plus"></i></button>
        </div>
      </div>
    </div>
  <?php } ?></div>
  <script type="text/javascript">
    $(".btn.add").click(function(){
      var id = $(this).attr('alt')
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=tambang&act=add&id="+id,
        success: function(ada){
          $("#view_cart").html(ada)
          var r = $("#row").val()
          $("#item").html(r)
        }
      })
    })

    $(".btn.sub").click(function(){
      var id = $(this).attr('alt')
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=tambang&act=sub&id="+id,
        success: function(ada){
          $("#view_cart").html(ada)
          var r = $("#row").val()
          $("#item").html(r)
          if(r==0){
            window.location = "?page=keranjang";
          }
        }
      })
    })
  </script>
  <?php 
} else if($mod=='findme'){
  $isi = $_POST['isi'];
  /*if(!$isi){
    $isi = "jlkajklj";
  }*/
  $sql = mysql_query("SELECT a.id,a.nama_barang,a.harga,a.img,a.stok FROM tbproduk a, tbkategori b WHERE a.id_kategori=b.id AND nama_barang LIKE '%$isi%' GROUP BY a.id");
  $r = mysql_num_rows($sql);?>
  <input type="hidden" id="row" value="<?= $r;?>"><?php
  while($d = mysql_fetch_array($sql)){
  ?>
  <div class="col-md-4 my-3">
    <div class="card">
      <!-- <div class="card-header"><div class="card-title text-center text-capitalize"><?= $d['nama_barang'];?></div></div> -->
      <a href="?page=view-barang&idpr=<?= $d['id'];?>" class="nav-link px-0 py-0">
        <div class="card-body px-0 py-0">
          <img src="../admin/img/produk/<?= $d['img'];?>" class="img-fluid d-block mx-auto" style="height:280px">
          <div class="card-text text-center mt-2">
            <h6><?= ucfirst($d['nama_barang']);?></h6>
            <div class="dropdown-divider border-primary"></div>
            <div class="row mt-2">
              <div class="col-md-6">
                <span class="text-muted">Harga</span>
                <div class="dropdown-divider"></div>
                <span class="text-primary">Rp.<?= number_format($d['harga']);?></span>
              </div>
              <div class="col-md-6">
                <span class="text-muted">Stok</span>
                <div class="dropdown-divider"></div>
                Tersedia <div class="badge badge-primary"><?= $d['stok'];?></div>
              </div>
            </div>
            <!-- <div class="dropdown-divider"></div>
            <div class="text-muted">Cicilan : <span class="badge badge-warning">3x</span> <span class="badge badge-info">6x</span> <span class="badge badge-danger">12x</span></div> -->
          </div>
        </div>
      </a>
    </div>
  </div><?php }
}
?>