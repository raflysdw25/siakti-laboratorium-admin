<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Tambah Barang Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Tambah Barang</li>
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
        <form action="" method="post">
            <div class="row">
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-boxes"></i> Detail Barang
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kode_brg">Kode Barang</label>
                                <input type="number" name="kode_brg" class="form-control" id="kode_brg" placeholder="Masukkan ID Barang" value="<?= $nextId ?>" readonly>
                                <small class="<?= form_error('kode_brg') ? "form-text text-danger" : ''?>"><?= form_error('kode_brg')?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" placeholder="Masukkan Nama Barang">
                                <small class="<?= form_error('nama_brg') ? "form-text text-danger" : ''?>"><?= form_error('nama_brg')?></small>
                            </div>                            
                            <div class="form-group">
                                <label for="jenis">Jenis Barang</label>
                                <select name="jenis" id="jenis" class="custom-select">
                                    <option value="" selected>--Pilih Jenis Barang--</option>
                                    <option value="Kabel">Kabel</option>
                                    <option value="Proyektor">Proyektor</option>
                                    <option value="Laptop">Laptop</option>
                                </select>
                                <small class="<?= form_error('jenis') ? "form-text text-danger" : ''?>"><?= form_error('jenis')?></small>
                            </div>                            
                            <div class="form-group">
                                <label for="spesifikasi">Spesifikasi Barang</label>
                                <textarea name="spesifikasi" id="spesifikasi" cols="30" rows="5" class="form-control"></textarea>
                                <small class="<?= form_error('spesifikasi') ? "form-text text-danger" : ''?>"><?= form_error('spesifikasi')?></small>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-shopping-cart"></i> Detail Penerimaan
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="thn_pengadaan">Tahun Pengadaan</label>
                                <div class="input-group" id="thn_pengadaan">
                                  <input type="number" name="thn_pengadaan" class="form-control" min="2014" max="2099" value="<?= date('Y') ?>"/>
                                  <small class="<?= form_error('thn_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('thn_pengadaan')?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="asal_pengadaan">Asal Pengadaan Barang</label>
                                <select name="asal_pengadaan" id="asal_pengadaan" class="custom-select">
                                    <option value="" selected>--Pilih asal Barang--</option>
                                    <option value="BHP">BHP</option>
                                    <option value="TA">TA</option>
                                    <option value="Supplier">Supplier</option>
                                </select>
                                <small class="<?= form_error('asal_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('asal_pengadaan')?></small>
                            </div>
                            <div class="form-group">
                                <label for="supplier_id_supp">Supplier</label>
                                <select class="custom-select" name="supplier_id_supp" id="supplier_id_supp">
                                    <option value="" selected>--Pilih--</option>
                                    <?php foreach($suppliers as $supplier): ?>
                                        <option value="<?= $supplier->id_supp ?>"><?= $supplier->nama_supp ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="<?= form_error('supplier_id_supp') ? "form-text text-danger" : ''?>"><?= form_error('supplier_id_supp')?></small>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="p-2">
                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                        <a href="<?= site_url('barang') ?>" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </div>                
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>    