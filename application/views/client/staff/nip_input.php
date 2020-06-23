<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row my-4">
      <div class="col-12 text-center">
        <div class="flat-design m-auto w-25" style="cursor: pointer;">
            <img src="<?= base_url()?>assets/dist/img/security_form.png" alt="" class="img-fluid">
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
      <div class="col-12 text-center" >
        <h2 class="font-weight-bold">Silahkan Masukkan NIP Anda </h2>
        <form action="" class="mt-4" method="POST">
            <div class="form-group w-50 m-auto">
                <input type="text" name="nip" class="form-control form-control-lg" placeholder="Nomor Induk Pegawai" autofocus>
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-2"><?= ucfirst($page) ?> Alat</button>                
            </div>            
        </form>
      </div>
    </div>   
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->