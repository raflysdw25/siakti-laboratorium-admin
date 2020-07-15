<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark font-weight-bold">Tambah Data Jenis Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
            <li class="breadcrumb-item active">Barang</li>
            <li class="breadcrumb-item active">Jenis Barang</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <?php $this->view('alert'); ?>
    <!-- /.row -->
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <div class="card card-primary col-lg-8 mx-auto p-0">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-boxes"></i> Detail Jenis Barang
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <p class="text-danger mb-2">* Wajib diisi</p>                        
                        <div class="form-group">
                            <label for="nama_jenis">Nama Jenis Barang <span class="text-danger">*</span></label>
                            <input type="text" name="nama_jenis" class="form-control" id="nama_jenis" placeholder="Masukkan  Nama Jenis Barang">
                            <small class="<?= form_error('nama_jenis') ? "form-text text-danger" : ''?>"><?= form_error('nama_jenis')?></small>
                        </div>                       
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        <a href="<?= site_url('jenisbarang')?>" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->