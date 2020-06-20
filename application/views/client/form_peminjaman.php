<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row my-4">
        <div class="col-12 text-center">
        <h1 class="m-0 text-dark font-weight-bold">INFORMASI PEMINJAMAN</h1>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card w-75 mx-auto">
            <div class="card-body">
                <form>
                    <input type="hidden" name="kd_pjm" value="<?= $peminjaman->kd_pjm ?>">
                    <input type="hidden" name="mahasiswa_nim" value="<?= $peminjaman->mahasiswa_nim ?>">
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                            </div>
                            <select name="keperluan" class="custom-select" id="keperluan">
                                <option selected>Pilih...</option>
                                <option value="KBM">KBM</option>
                                <option value="Acara Jurusan">Acara Jurusan</option>
                                <option value="Acara Himpunan">Acara Himpunan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ruangan_idruangan">Ruangan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
                            </div>
                            <select name="ruangan_idruangan" class="custom-select" id="">
                                <option selected>Pilih...</option>
                                <?php foreach($ruangan as $ruang):?>
                                    <option value="<?= $ruang->id_ruangan ?>"><?= $ruang->namaruang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="staff_penanggungjawab">Dosen</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <select name="staff_penanggungjawab" class="custom-select" id="">
                                <option selected>Pilih...</option>
                                <?php foreach($staff as $dsn):?>
                                    <option value="<?= $dsn->nip ?>"><?= $dsn->nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Waktu Pengembalian</label>
    
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservationtime">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
    

                    
                    
                    <?php $this->view('client/barang_dipinjam') ?>
                    

                    <div class="form-group">
                        <button id="confirm" class="btn btn-primary btn-lg">Konfirmasi</button>                        
                        <a href="<?= site_url('client/cancel/'.$peminjaman->kd_pjm) ?>" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>   
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

    
  