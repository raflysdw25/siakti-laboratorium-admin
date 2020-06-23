  
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row my-4">      
      <div class="col-12 text-center">
        <h1 class="m-0 text-dark font-weight-bold">Informasi Peminjam</h1>
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
      <div class="col-12 text-center" style="margin-top:170px">        
        <h4 class="">Silahkan pilih</h4>
        <div class="section-button mt-4">
          <a href="<?= site_url('client/stripe-card/'.$page) ?>" class="btn btn-primary btn-lg p-4 w-25">
            <i class="fas fa-user fa-1x"></i> <span class="p-2">MAHASISWA</span> 
          </a>          
          <a href="<?= site_url('client/nip-input/'.$page) ?>" class="btn btn-primary btn-lg p-4 w-25">
            <i class="fas fa-user-graduate fa-1x"></i> <span class="p-2">STAFF</span> 
          </a>          
        </div>
      </div>
    </div>   
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->    