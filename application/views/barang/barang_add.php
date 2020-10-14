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
                            <span class="text-danger">* Wajib di isi</span>
                            <div class="form-group">
                                <label for="kode_brg">Kode Barang</label>
                                <input type="number" name="kode_brg" class="form-control" id="kode_brg" placeholder="Masukkan ID Barang" value="<?= $nextId ?>" readonly>
                                <small class="<?= form_error('kode_brg') ? "form-text text-danger" : ''?>"><?= form_error('kode_brg')?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_brg">Nama Barang</label> <span class="text-danger">*</span>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" placeholder="Masukkan Nama Barang">
                                <small class="<?= form_error('nama_brg') ? "form-text text-danger" : ''?>"><?= form_error('nama_brg')?></small>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi Barang</label> <span class="text-danger">*</span>
                                <select name="kondisi" id="kondisi" class="custom-select">
                                    <option value="" selected>--Pilih asal Barang--</option>
                                    <option value="BAIK">Baik</option>
                                    <option value="RUSAK">Rusak</option>
                                    <option value="HABIS">Habis</option>                                    
                                </select>
                                <small class="<?= form_error('kondisi') ? "form-text text-danger" : ''?>"><?= form_error('kondisi')?></small>
                            </div>                            
                            <div class="form-group">
                                <label for="jenis_id_jenis">Jenis Barang</label> 
                                <select name="jenis_id_jenis" id="jenis_id_jenis" class="custom-select">
                                    <option value="" selected>--Pilih Jenis Barang--</option>
                                    <?php foreach($jenisbarang as $jenis): ?>
                                        <option value="<?= $jenis->id_jenis ?>"><?= $jenis->nama_jenis ?></option>
                                    <?php endforeach;?>
                                </select>
                                <small class="<?= form_error('jenis_id_jenis') ? "form-text text-danger" : ''?>"><?= form_error('jenis_id_jenis')?></small>
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
                                <label for="thn_pengadaan">Tahun Pengadaan</label> <span class="text-danger">*</span>
                                <div class="input-group" id="thn_pengadaan">
                                  <input type="number" name="thn_pengadaan" class="form-control" min="2000" max="2099" value="<?= date('Y') ?>"/>
                                  <small class="<?= form_error('thn_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('thn_pengadaan')?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="asal_pengadaan">Asal Pengadaan Barang</label> <span class="text-danger">*</span>
                                <select name="asal_pengadaan" id="asal_pengadaan" class="custom-select">
                                    <option value="" selected>--Pilih asal Barang--</option>
                                    <option value="Barang Habis Pakai">Barang Habis Pakai</option>
                                    <option value="Hibah TA">Hibah TA</option>
                                    <option value="Supplier">Supplier</option>
                                    <option value="PNJ">PNJ</option>
                                    <option value="Hibah Pemerintah">Hibah Pemerintah</option>
                                </select>
                                <small class="<?= form_error('asal_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('asal_pengadaan')?></small>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Barang</label> <span class="text-danger">*</span>
                                <input type="number" min="1" name="jumlah" class="form-control" value="1" id="jumlah" placeholder="Masukkan Jumlah Barang" >                                
                            </div>                            
                            <div class="form-group">
                                <label for="supplier_id_supp">Supplier</label>
                                <select class="custom-select" name="supplier_id_supp" id="supplier_id_supp">
                                    <option value="" selected>--Pilih--</option>
                                    <?php foreach($suppliers as $supplier): ?>
                                        <option value="<?= $supplier->id_supp ?>"><?= $supplier->nama_supp ?></option>
                                    <?php endforeach; ?>
                                </select>                                
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

