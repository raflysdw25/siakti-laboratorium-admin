<section class="content-header">
    <h1>Barang
        <small>Data Barang</small>
    </h1>
    <ol class="breakcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
    </ol>
</section>

<!-- <Main content> -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Barang</h3>
                <div class="pull-right">
                    <a href="<?=site_url('barang/add')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php // echo validation_errors(); ?>
                        <form action="" method="post">
                            <div class="form-group" <?=form_eror('kode_brg')? 'has-eror' : null?>">
                                <label>Kode Barang</label>
                                <input type="text" name="Kode Barang" 
                                value="<?=$this->input->post('kode_brg')?>" class="form-control">
                                <?=form_eror('kode_brg')?>
                            </div>
                            <div class="form-group" <?=form_eror('nama_brg')? 'has-eror' : null?>">
                                <label>Nama Barang</label>
                                <input type="text" name="Nama Barang" 
                                value="<?=$this->input->post('nama_brg')?>" class="form-control">
                                <?=form_eror('nama_brg')?>
                            </div>
                            <div class="form-group" <?=form_eror('jenis')? 'has-eror' : null?>">
                                <label>Jenis Barang</label>
                                <input type="text" name="Jenis Barang" 
                                value="<?=$this->input->post('jenis')?>" class="form-control">
                                <?=form_eror('jenis')?>
                            </div>
                             <div class="form-group">
                                <label>Spesifikasi Barang</label>
                                <textarea name="Spesifikasi Barang" 
                                value="<?=$this->input->post('spesifikasi')?>" class="form-control">
                                </textarea>
                            </div>
                            <div class="form-group" <?=form_eror('jml')? 'has-eror' : null?>">
                                <label>Jumlah Barang</label>
                                <input type="number" name="Jumlah Barang" 
                                value="<?=$this->input->post('jml')?>" class="form-control">
                                <?=form_eror('jml')?>
                            </div>
                            <div class="form-group" <?=form_eror('satuan')? 'has-eror' : null?>">
                                <label>Satuan</label>
                                <input type="text" name="Satuan" 
                                value="<?=$this->input->post('satuan')?>" class="form-control">
                                <?=form_eror('satuan')?>
                            </div>
                             <div class="form-group" <?=form_eror('thn_pengadaan')? 'has-eror' : null?>">
                                <label>Tahun Pengadaan</label>
                                <input type="number" name="Tahun Pengadaan" 
                                value="<?=$this->input->post('thn_pengadaan')?>" class="form-control">
                                <?=form_eror('thn_pengadaan')?>
                            </div>
                             <div class="form-group" <?=form_eror('area_pengadaan')? 'has-eror' : null?>">
                                <label>Area Pengadaan</label>
                                <input type="text" name="Area Pengadaan" 
                                value="<?=$this->input->post('area_pengadaan')?>" class="form-control">
                                <?=form_eror('area_pengadaan')?>
                            </div>
                            <div class="form-group" <?=form_eror('supplier_nama_supp')? 'has-eror' : null?>">
                                <label>Supplier</label>
                                <input type="text" name="Supplier" 
                                value="<?=$this->input->post('supplier_nama_supp')?>" class="form-control">
                                <?=form_eror('supplier_nama_supp')?>
                            </div>
                             
                            <div class="form-group">
                                <button type="submit" class="btn btn-succes btn-flat">
                                    <i class="fa fa-paper-plane"></i>Save</button>
                                <button type="reset" class="btn btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>
        </div>
        
    </section>