<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row my-4">
      <div class="col-12 text-center">
        <div class="flat-design m-auto w-25" style="cursor: pointer;">
            <img src="<?= base_url()?>assets/dist/img/flatdesign_creditcard.png" alt="" class="img-fluid">
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
        <h4 class="font-weight-lighter">Silahkan <em>swipe</em> KTM atau ATM anda pada mesin yang telah disiapkan </h4>
        <form action="" class="mt-4" method="POST">
            <div class="form-group">
                <input type="text" name="no_ktm" class="form-control form-control-lg w-50 m-auto" placeholder="No KTM Anda" autofocus>
                <small>Silahkan daftarkan kartu anda jika belum didaftarkan dengan <a href="<?= site_url('client/daftar')?>">Daftar Disini !</a> </small>
            </div>            
        </form>
      </div>
    </div>   
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->