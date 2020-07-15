<?php date_default_timezone_set("Asia/Jakarta"); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-12 text-center">
                <h1 class="m-0 text-dark font-weight-bold">INFORMASI PEMINJAMAN STAFF</h1>                
            </div><!-- /.col -->
            <div class="col-12">
            <?php if ($this->session->flashdata('failedPeminjaman')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-exclamation"></i> <?= $this->session->flashdata('failedPeminjaman')?>        
                </div>
            <?php endif; ?>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card mx-auto">
                    <div class="card-body">                
                        <span class="text-danger">* Wajib Diisi</span>
                        <form action="" method="POST" autocomplete="off">
                            <input type="hidden" name="kd_pjm" value="<?= $peminjaman->kd_pjm ?>">
                            <input type="hidden" name="staff_nip" value="<?= $peminjaman->staff_nip ?>">
                            <div class="form-group">
                                <label for="keperluan">Keperluan</label> <span class="text-danger">*</span>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clipboard"></i></span>
                                    </div>
                                    <select name="keperluan" class="custom-select" id="keperluan">
                                        <option selected>Pilih...</option>
                                        <option value="KBM">KBM</option>
                                        <option value="Acara Jurusan">Acara Jurusan</option>
                                        <option value="Acara Himpunan">Acara Himpunan</option>
                                        <option value="Skripsi">Skripsi</option>
                                        <option value="PKL">PKL</option>
                                        <option value="Operasional">Operasional</option>
                                    </select>
                                </div>
                                <small class="<?= form_error('keperluan') ? "form-text text-danger" : ''?>"><?= form_error('keperluan')?></small>
                            </div>
                            <div class="form-group">
                                <label for="ruangan_idruangan">Ruangan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
                                    </div>
                                    <select name="ruangan_idruangan" class="custom-select" id="ruangan_idruangan">
                                        <option value="" selected>Pilih...</option>
                                        <?php foreach($ruangan as $ruang):?>
                                            <option value="<?= $ruang->id_ruangan ?>"><?= $ruang->namaruang ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <small class="text-muted">Jika peminjaman lebih dari satu hari, tidak perlu memilih ruangan</small>
                                <small class="<?= form_error('ruangan_idruangan') ? "form-text text-danger" : ''?>"><?= form_error('ruangan_idruangan')?></small>
                            </div>
                                                    
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Waktu Pengembalian</label> <span class="text-danger">*</span>
                                    <div class="input-group date" id="timepicker" data-target-input="nearest">                                                                
                                        <input type="text" class="form-control datetimepicker-input" name="tgl_blk" data-target="#timepicker" data-toggle="datetimepicker"/>
                                    </div>
                                    <!-- /.input group -->
                                    <small class="<?= form_error('tgl_blk') ? "form-text text-danger" : ''?>"><?= form_error('tgl_blk')?></small>
                                </div>
                                <!-- /.form group -->
                            </div>                                                    
                            <div class="form-group mt-2">
                                <button type="submit" name="confirm" id="confirm" class="btn btn-primary btn-lg" onclick="return confirm('Apakah anda yakin ingin melanjutkan peminjaman ini?')">Konfirmasi</button>                        
                                <a href="<?= site_url('client/cancel/'.$peminjaman->kd_pjm) ?>" class="btn btn-danger btn-lg" onclick="return confirm('Apakah anda yakin ingin membatalkan peminjaman ini?')">Batal</a>
                            </div>

                        </form>

                        

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <span class="text-danger">* Wajib memilih barang</span>
                        <?php $this->view('client/barang_dipinjam') ?>
                    </div>
                </div>
            </div>
        </div>   
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(function () {
        $('#timepicker').datetimepicker({
            icons: {
                time: "fas fa-clock",
                date: "fas fa-calendar",
                up: "fas fa-arrow-up",
                down: "fas fa-arrow-down"
            }
        })
    })
</script>    
  