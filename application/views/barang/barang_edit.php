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
                            <div class="row">
                                <div class="col-4">                                
                                    <div class="form-group">
                                        <label for="kode_brg">Kode Barang</label>
                                        <input type="number" name="kode_brg" class="form-control" id="kode_brg" placeholder="Masukkan ID Barang" readonly value="<?= $barang->kode_brg?>">
                                        <small class="<?= form_error('kode_brg') ? "form-text text-danger" : ''?>"><?= form_error('kode_brg')?></small>
                                    </div>
                                </div>
                                <div class="col-4">                                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" name="status" id="status" class="form-control <?= ($barang->status == 'TERSEDIA') ? "bg-success" : "bg-danger" ?> " value="<?= $barang->status ?>" readonly>
                                        <small class="<?= form_error('status') ? "form-text text-danger" : ''?>"><?= form_error('status')?></small>
                                    </div>
                                </div>
                                <div class="col-4">                                
                                    <div class="form-group">
                                        <label for="barcode">Barcode</label>
                                        <input type="text" name="barcode" id="barcode" class="form-control" value="<?= $barang->barcode ?>" readonly>
                                        <small class="<?= form_error('barcode') ? "form-text text-danger" : ''?>"><?= form_error('barcode')?></small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_brg">Nama Barang</label>
                                <input type="text" name="nama_brg" class="form-control" id="nama_brg" value="<?= $barang->nama_brg?>">
                                <small class="<?= form_error('nama_brg') ? "form-text text-danger" : ''?>"><?= form_error('nama_brg')?></small>
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
                                <label for="spesifikasi">Spesifikasi Barang</label>
                                <textarea name="spesifikasi" id="spesifikasi" cols="30" rows="5" class="form-control"><?= $barang->spesifikasi?></textarea>
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
                                  <input type="number" min="2014" max="2099" name="thn_pengadaan" class="form-control" value="<?= $barang->thn_pengadaan ?>" />
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
                                <label for="jumlah">Jumlah Barang</label>
                                <input type="number" name="jumlah" class="form-control" id="jumlah" value="<?= $barang->jumlah ?>" placeholder="Masukkan Jumlah Barang" min="0" >                                
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan Barang</label>
                                <input type="text" name="satuan" class="form-control" id="satuan" value="<?= $barang->satuan ?>" placeholder="Masukkan Satuan Barang" >                             
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