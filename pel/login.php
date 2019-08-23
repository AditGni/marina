<div class="col-md-6 mt-5 pt-2 offset-md-3">
  <div class="card">
    <?php if(!empty($_SESSION['pesan'])){?>
    <div class="card-header">
      <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?= $_SESSION['pesan'];?></div>
    </div>
    <?php } ?>
    <form action="?page=proses&act=login" method="POST">
      <div class="card-body">
        <div class="form-group">
          <input type="text" name="user" class="form-control <?= $_SESSION['error']['user'] ? 'is-invalid' : ''?>" placeholder="Username" value="<?= @$_SESSION['user'];?>">
        </div>
        <div class="form-group">
          <input type="password" name="pass" class="form-control <?= $_SESSION['error']['pass'] ? 'is-invalid' : ''?>" placeholder="Password">
        </div>
        <div class="row">
          <div class="col-md-6">
            <button class="btn btn-success btn-block" type="submit">Masuk</button>
          </div>
          <div class="col-md-6">
            <a href="?page=barang" class="btn btn-danger btn-block">Batal</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
$_SESSION['error'] = '';
$_SESSION['pesan'] = '';
$_SESSION['user'] = '';
?>