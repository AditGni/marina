<?php
if($_GET['page']){
	$page = $_GET['page'];
	if($page=='daftar-transaksi'){
		$judul = 'Daftar Transaksi';
		$link = 'page/transaksi/transaksi.php';
	} else if($page=='produk'){
		$judul = 'Produk';
		$link = 'page/produk/produk.php';
	} else if($page=='kategori'){
		$judul = 'Kategori';
		$link = 'page/kategori/kategori.php';
	} else if($page=='pelanggan'){
		$judul = 'Pelanggan';
		$link = 'page/pelanggan/pelanggan.php';
	} else if($page=='laporan'){
		$judul = 'Laporan';
		$link = 'page/laporan/laporan.php';
	} else if($page=='logout'){
		session_destroy();
		header("location:../pel/");
	}
}
?>