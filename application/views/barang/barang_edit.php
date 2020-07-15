<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Edit Barang Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Edit Barang</li>
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
                <div class="col-lg-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-boxes"></i> Detail Barang
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">                                
                                    <div class="form-group">
                                        <label for="kode_brg">Kode Barang</label>
                                        <input type="number" name="kode_brg" class="form-control" id="kode_brg" placeholder="Masukkan ID Barang" readonly value="<?= $barang->kode_brg?>">
                                        <small class="<?= form_error('kode_brg') ? "form-text text-danger" : ''?>"><?= form_error('kode_brg')?></small>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">                                
                                    <div class="form-group">
                                        <label for="kondisi">Kondisi Barang</label>
                                        <input type="text" name="kondisi" id="kondisi" class="form-control <?= ($barang->kondisi == 'BAIK') ? "bg-success" : (($barang->kondisi == "HABIS")? "bg-warning" : "bg-danger")?> " value="<?= $barang->kondisi ?>" readonly>
                                        <small class="<?= form_error('kondisi') ? "form-text text-danger" : ''?>"><?= form_error('kondisi')?></small>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">                                
                                    <div class="form-group">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control font-weight-bold" value="<?= $barang->barcode ?>" readonly>
                                        <small class="<?= form_error('barcode') ? "form-text text-danger" : ''?>"><?= form_error('barcode')?></small>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" class="form-control <?= ($barang->status == 'TERSEDIA') ? "bg-success" : (($barang->status == "DIGUNAKAN")? "bg-primary" : "bg-danger")?> " value="<?= $barang->status ?>" readonly>
                                        <small class="<?= form_error('status') ? "form-text text-danger" : ''?>"><?= form_error('status')?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" value="<?= $barang->nama_brg?>">
                                <small class="<?= form_error('nama_brg') ? "form-text text-danger" : ''?>"><?= form_error('nama_brg')?></small>
                            </div>
                            <div class="form-group">
                                <label for="jenis_id_jenis">Jenis Barang</label>
                                <select name="jenis_id_jenis" id="jenis_id_jenis" class="custom-select"> 
                                    <option value="" <?= ($barang->jenis_id_jenis == null )? "selected" : '' ?>>--Pilih Jenis Barang--</option>                                    
                                    <?php foreach($jenisbarang as $jenis): ?>
                                        <option value="<?= $jenis->id_jenis ?>" <?= ($jenis->id_jenis == $barang->jenis_id_jenis) ? "selected" : '' ?>><?= $jenis->nama_jenis ?></option>
                                    <?php endforeach;?>
                                </select>
                                <small class="<?= form_error('jenis_id_jenis') ? "form-text text-danger" : ''?>"><?= form_error('jenis_id_jenis')?></small>
                            </div>
                            <div class="form-group">
                                <label for="spesifikasi">Spesifikasi Barang</label>
                                <textarea name="spesifikasi" id="spesifikasi" cols="30" rows="5" class="form-control"><?= $barang->spesifikasi?></textarea>
                                <small class="<?= form_error('spesifikasi') ? "form-text text-danger" : ''?>"><?= form_error('spesifikasi')?></small>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-4">
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
                                  <input type="number" min="2000" max="2099" name="thn_pengadaan" class="form-control" value="<?= $barang->thn_pengadaan ?>" />
                                  <small class="<?= form_error('thn_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('thn_pengadaan')?></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="asal_pengadaan">Asal Pengadaan Barang</label>
                                <select name="asal_pengadaan" id="asal_pengadaan" class="custom-select">                                                                        
                                    <option value="Barang Habis Pakai" <?= ($barang->asal_pengadaan == "Barang Habis Pakai")? "selected" : '' ?> >Barang Habis Pakai</option>
                                    <option value="Hibah TA" <?= ($barang->asal_pengadaan == "Hibah TA")? "selected" : '' ?>>Hibah TA</option>
                                    <option value="Supplier" <?= ($barang->asal_pengadaan == "Supplier")? "selected" : '' ?>>Supplier</option>
                                    <option value="Hibah Pemerintah" <?= ($barang->asal_pengadaan == "Hibah Pemerintah")? "selected" : '' ?>>Hibah Pemerintah</option>
                                </select>
                                <small class="<?= form_error('asal_pengadaan') ? "form-text text-danger" : ''?>"><?= form_error('asal_pengadaan')?></small>
                            </div>                            
                            <div class="form-group">
                                <label for="supplier_id_supp">Supplier</label>
                                <select class="custom-select" name="supplier_id_supp" id="supplier_id_supp">
                                    <option value="" <?= ($barang->supplier_id_supp == null )? "selected" : '' ?>>--Pilih Supplier--</option>                                    
                                    <?php foreach($suppliers as $supplier): ?>                                        
                                        <option value="<?= $supplier->id_supp ?>" <?= ($supplier->id_supp == $barang->supplier_id_supp)? "selected" : '' ?>><?= $supplier->nama_supp ?></option>
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

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>    
    <script>
        $(document).ready(function(){
            $("#asal_pengadaan").change(function(){
                $(this).find("option:selected").each(function(){
                    let optionValue = $(this).attr("value");                                  
                    if(optionValue === "Barang Habis Pakai"){                        
                        $(".bhpInput").show() 
                    } else{
                       $(".bhpInput").hide()
                    }
                });
            }).change();
        });
    </script>  -->