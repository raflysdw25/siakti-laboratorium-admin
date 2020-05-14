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
    <form action="#" method="POST">
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
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" id="nama_supplier" placeholder="Masukkan  Nama Supplier">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group">
                            <label for="notelp">Nomor Telepone</label>
                            <input type="tel"  class="form-control" name="notelp" id="notelp" placeholder="Masukkan Nomor Telepone">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Supplier</label>
                            <input type="email"  class="form-control" name="email" id="email" placeholder="Masukkan Email Supplier">
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        <a href="supplier.html" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </div>
            </div>
            
        </div>
    </form>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->