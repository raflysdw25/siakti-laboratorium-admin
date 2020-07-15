<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row my-4">
        <div class="col-12 text-center">
        <div class="flat-design m-auto w-25" style="cursor: pointer;">
            <img src="<?= base_url()?>assets/dist/img/flatdesign_success.png" alt="" class="img-fluid">
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
    <div class="row mb-4">
        <div class="col-12 text-center" >
            <h4 class="font-weight-lighter">Pinjaman sukses! </h4>
            <?php if ($this->session->flashdata('confirm')) : ?>
                <h4 class="font-weight-bold"> <?= $this->session->flashdata('confirm') ?> </h4>
            <?php else:?>
                <h4 class="font-weight-bold"> <?= $this->session->flashdata('approval') ?> </h4>
            <?php endif; ?>
            <a href="<?= site_url('client') ?>" class="btn btn-primary">Beranda</a>
        </div>
    </div>   
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->