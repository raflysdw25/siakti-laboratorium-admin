<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Tambah Staff Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Tambah Staff</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- /.row -->
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="font-weight-bold">Data Diri Staff</h5>
            </div>
            <div class="card-body">
                <p class="text-danger">* Wajib diisi</p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="nama_jab">Nama Jabatan <span class="text-danger">*</span></label>
                        <input type="hidden" name="id_jablab_struk" value="<?= $struktural->id_jablab_struk ?>">
                        <input type="text" name="nama_jab" id="nip" class="form-control" autofocus value="<?= $struktural->nama_jab ?>">                        
                        <small class="<?= form_error('nama_jab') ? "form-text text-danger" : ''?>"><?= form_error('nama_jab')?></small>
                    </div>                    

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                        <a href="<?= site_url('staff') ?>" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>   