<?php
error_reporting(0);
session_start();
mysql_connect('localhost','root','');
mysql_select_db('toko');
if(!empty($_GET['act'])){
  $act = $_GET['act'];
  if($act=='login'){
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = mysql_query("SELECT * FROM tbadmin WHERE admin='$user' AND pass='$pass'");
    $r = mysql_num_rows($sql);
    if($r){
      $d = mysql_fetch_array($sql);
      $_SESSION['id'] = $d['idp'];
      $_SESSION['admin'] = $d['admin'];
      $_SESSION['pass'] = $d['pass'];
      if($d['ket']=='admin'){
        header("location:../admin");
      } else if($d['ket']=='pelanggan'){
        header("location:?page=barang");
      }
      $_SESSION['ket'] = $d['ket'];
    } else {
      $_SESSION['pesan'] = 'Username dan Password tidak terdaftar!';
      header("location:?page=barang");
    }
  } else if($act=='regis'){
    $nama = $_POST['nama'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $telp = $_POST['telp'];

    if(trim($nama)==''){
      $_SESSION['error']['nama'] = true;
    }
    if(trim($user)==''){
      $_SESSION['error']['user'] = true;
    }
    if(trim($pass)==''){
      $_SESSION['error']['pass'] = true;
    }
    if(trim($alamat)==''){
      $_SESSION['error']['alamat'] = true;
    }
    if(trim($jk)==''){
      $_SESSION['error']['jk'] = true;
    }
    if(trim($telp)==''){
      $_SESSION['error']['telp'] = true;
    }

    if(!empty($_SESSION['error'])){
      $_SESSION['nama'] = $nama;
      $_SESSION['user'] = $user;
      $_SESSION['alamat'] = $alamat;
      $_SESSION['jk'] = $jk;
      $_SESSION['telp'] = $telp;
      header("location:?page=registrasi");
    } else {
      mysql_query("INSERT INTO tbpelanggan VALUES('','$nama','$jk','$alamat','$telp','pelanggan')");
      $sql = mysql_query("SELECT * FROM tbpelanggan WHERE nama='$nama' AND kelamin='$jk' AND alamat='$alamat' AND phone='$telp'");
      $d = mysql_fetch_array($sql);
      $idp = $d['id'];
      mysql_query("INSERT INTO tbadmin VALUES('','$user','$pass','pelanggan','$idp')");
      $_SESSION['id'] = $idp;
      $_SESSION['admin'] = $nama;
      header("location:?page=barang");
    }
  } else if($act=='logout'){
    session_destroy();
    header("location:?page=barang");
  } else if($act=='hapus_item_ker'){
    $id = $_GET['id'];
    mysql_query("DELETE FROM tbkeranjang WHERE kode_pro='$id' AND kode_pel='$_SESSION[id]'");
    header("location:?page=keranjang");
  }
}