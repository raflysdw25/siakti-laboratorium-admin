<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark font-weight-bold">Tambah Data Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
            <li class="breadcrumb-item active">Supplier Barang</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <form action="" method="POST">
    <?php $this->view('alert') ?>
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-boxes"></i> Detail Supplier
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        <p class="text-danger mb-2">* Wajib diisi</p>
                        
                        <div class="form-group">
                            <label for="nama_supp">Nama Supplier <span class="text-danger">*</span></label>
                            <input type="text" name="nama_supp" class="form-control" id="nama_supp" placeholder="Masukkan  Nama Perusahaan">
                            <small class="<?= form_error('nama_supp') ? "form-text text-danger" : ''?>"><?= form_error('nama_supp') ? form_error('nama_supp') : 'Nama supplier tidak boleh lebih dari 100 huruf'?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                            <small class="<?= form_error('alamat') ? "form-text text-danger" : ''?>"><?= form_error('alamat')?></small>
                        </div>
                        <div class="form-group">
                            <label for="tlpn">Nomor Telepon <span class="text-danger">*</span></label>
                            <input type="tel"  class="form-control" name="tlpn" id="tlpn" placeholder="Masukkan Nomor Telepon">
                            <small class="<?= form_error('tlpn') ? "form-text text-danger" : ''?>"><?= form_error('tlpn')?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Perusahaan</label>
                            <input type="email"  class="form-control" name="email" id="email" placeholder="Masukkan Email Perusahaan">
                            <small class="<?= form_error('email') ? "form-text text-danger" : ''?>"><?= form_error('email')?></small>
                        </div>
                        <div class="form-group">
                            <label for="pic"><i>Person in Charge</i> <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control" name="pic" id="pic" placeholder="Masukkan PIC Perusahaan">
                            <small class="<?= form_error('pic') ? "form-text text-danger" : ''?>"><?= form_error('pic')?></small>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        <a href="<?= site_url('supplier')?>" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->