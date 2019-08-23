<div class="col-md-6 offset-md-3">
  <div class="card">
    <div class="card-body">
      <form action="?page=proses&act=regis" method="POST">
      <div class="form-group">
        <input type="text" name="nama" class="form-control <?= $_SESSION['error']['nama'] ? 'is-invalid' : ''?>" placeholder="Nama Lengkap" value="<?= @$_SESSION['nama'];?>">
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <input type="text" name="user" class="form-control <?= $_SESSION['error']['user'] ? 'is-invalid' : ''?>" placeholder="Username" value="<?= @$_SESSION['user'];?>">
        </div>
        <div class="col-md-6">
          <input type="password" name="pass" class="form-control <?= $_SESSION['error']['pass'] ? 'is-invalid' : ''?>" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <textarea class="form-control <?= $_SESSION['error']['alamat'] ? 'is-invalid' : ''?>" name="alamat" placeholder="Alamat"><?= @$_SESSION['alamat'];?></textarea>
      </div>
      <div class="form-group row">
        <div class="col-md-6">
          <label class="<?= $_SESSION['error']['jk'] ? 'text-danger' : ''?>">Jenis Kelamin</label>
          <div class="custom-control custom-radio">
            <input type="radio" name="jk" class="custom-control-input" id="l" value="pria" <?= $_SESSION['jk']=='pria' ? 'checked' : '';?>>
            <label for="l" class="custom-control-label">Pria</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" name="jk" class="custom-control-input" id="p" value="wanita" <?= $_SESSION['jk']=='wanita' ? 'checked' : '';?>>
            <label for="p" class="custom-control-label">Wanita</label>
          </div>
        </div>
        <div class="col-md-6">
          <input type="text" name="telp" class="form-control <?= $_SESSION['error']['telp'] ? 'is-invalid' : ''?>" placeholder="No. Telpon" value="<?= @$_SESSION['telp'];?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <button class="btn btn-success btn-block" type="submit">Masuk</button>
        </div>
        <div class="col-md-6">
          <a href="?page=barang" class="btn btn-danger btn-block">Batal</a>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
<?php
$_SESSION['error'] = '';
$_SESSION['nama'] = '';
$_SESSION['user'] = '';
$_SESSION['pass'] = '';
$_SESSION['alamat'] = '';
$_SESSION['jk'] = '';
$_SESSION['telp'] = '';
?>