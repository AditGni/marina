<?php
function thumbnailImage($nama_file,$tipe_file) {
    $d = "../gbr/";
  $image   = $d . $nama_file;
  $dthumb="../gbr/thumb/".$nama_file;
 
  $gambar_asli = imagecreatefromjpeg($image);
  $lebar     = imageSX($gambar_asli);
  $tinggi    = imageSY($gambar_asli);
 
  $tmb_lebar   = 110;
  $tmb_tinggi  = ($tmb_lebar/$lebar)*$tinggi;
 
  $image_tmb   = imagecreatetruecolor($tmb_lebar,$tmb_tinggi);
  imagecopyresampled($image_tmb,$gambar_asli,0,0,0,0,$tmb_lebar,$tmb_tinggi,$lebar,$tinggi);
 
  imagejpeg($image_tmb,$dthumb);
 
 
  imagedestroy($gambar_asli);
  imagedestroy($image_tmb);
 
  return $image_asli;
  }
?>