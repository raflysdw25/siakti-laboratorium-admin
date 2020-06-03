<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Tambah Barang Laboratorium</h1>
            <a href="<?= site_url('barang')?>" class="btn btn-primary btn-sm mt-2">
               <i class="fas fa-undo"></i> Kembali
            </a>
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
                                <input type="number" name="kode_brg" class="form-control" id="kode_brg" placeholder="Masukkan ID Barang" readonly value="<?= $barang->kode_brg?>">
                                <small class="<?= form_error('kode_brg') ? "form-text text-danger" : ''?>"><?= form_error('kode_brg')?></small>
                            </div>
                            <div class="form-group">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" placeholder="Masukkan Nama Barang" value="<?= $barang->nama_brg?>">
                                <small class="<?= form_error('nama_brg') ? "form-text text-danger" : ''?>"><?= form_error('nama_brg')?></small>
                            </div>
                            <div class="form-group">
                                <label for="jml">Jumlah Barang</label>
                                <input type="number" min="0" class="form-control" name="jml" id="jml" placeholder="Masukkan Jumlah Barang" value="<?= $barang->jml?>">
                                <small class="<?= form_error('jml') ? "form-text text-danger" : ''?>"><?= form_error('jml')?></small>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Barang</label>
                                <select name="jenis" id="jenis" class="custom-select">                                    
                                    <option value="Kabel" <?= ($barang->jenis == "Kabel")? "selected" : '' ?>>Kabel</option>
                                    <option value="Proyektor" <?= ($barang->jenis == "Proyektor")? "selected" : '' ?>>Proyektor</option>
                                    <option value="Laptop" <?= ($barang->jenis == "Laptop")? "selected" : '' ?>>Laptop</option>
                                </select>
                                <small class="<?= form_error('jenis') ? "form-text text-danger" : ''?>"><?= form_error('jenis')?></small>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan Barang</label>
                                <select name="satuan" id="satuan" class="custom-select">                                    
                                    <option value="pcs"  <?= ($barang->satuan == "pcs")? "selected" : '' ?> >pcs</option>
                                    <option value="buah" <?= ($barang->satuan == "buah")? "selected" : '' ?>>buah</option>
                                    <option value="meter" <?= ($barang->satuan == "meter")? "selected" : '' ?>>meter</option>
                                </select>
                                <small class="<?= form_error('satuan') ? "form-text text-danger" : ''?>"><?= form_error('satuan')?></small>
                            </div>
                            <div class="form-group">
                                <label for="spesifikasi">Spesifikasi Barang</label>
                                <textarea name="spesifikasi" id="spesifikasi" cols="30" rows="10" class="form-control"><?= $barang->spesifikasi?></textarea>
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
                                  <input type="date" name="thn_pengadaan" class="form-control" value="<?= $barang->thn_pengadaan ?>" />
                                  <small class="<?= form_error('thn_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('thn_pengadaan')?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="asal_pengadaan">Asal Pengadaan Barang</label>
                                <select name="asal_pengadaan" id="asal_pengadaan" class="custom-select">                                    
                                    <option value="BHP" <?= ($barang->asal_pengadaan == "BHP")? "selected" : '' ?> >BHP</option>
                                    <option value="TA" <?= ($barang->asal_pengadaan == "TA")? "selected" : '' ?>>TA</option>
                                    <option value="Supplier" <?= ($barang->asal_pengadaan == "Supplier")? "selected" : '' ?>>Supplier</option>
                                </select>
                                <small class="<?= form_error('asal_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('asal_pengadaan')?></small>
                            </div>
                            <div class="form-group">
                                <label for="supplier_nama_supp">Supplier</label>
                                <select class="custom-select" name="supplier_nama_supp" id="supplier_nama_supp">                                    
                                    <?php foreach($suppliers as $supplier): ?>
                                        <option value="<?= $supplier->nama_supp ?>" <?= ($supplier->nama_supp == $barang->supplier_nama_supp)? "selected" : '' ?>><?= $supplier->nama_supp ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="<?= form_error('supplier_nama_supp') ? "form-text text-danger" : ''?>"><?= form_error('supplier_nama_supp')?></small>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                    <a href="index.html" class="btn btn-danger btn-lg">Batal</a>
                </div>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>

    <script>
        // $(function() {
        //     $( "#thn_pengadaan" ).datepicker({dateFormat: 'yy'});
        // });​
    </script>