<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Edit Staff Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Edit Staff</li>
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
                        <label for="nip">Nomor Induk Pegawai <span class="text-danger">*</span></label>
                        <input type="number" name="nip" id="nip" class="form-control" value="<?= $staff->nip ?>" readonly>
                        <input type="hidden" name="usr_name" id="usr_name" class="form-control" value="<?= $staff->usr_name ?>">
                        <input type="hidden" name="password" id="password" class="form-control" value="<?= $staff->password ?>">
                        <small class="<?= form_error('nip') ? "form-text text-danger" : ''?>"><?= form_error('nip')?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Staff <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $staff->nama ?>" >
                        <small class="<?= form_error('nama') ? "form-text text-danger" : ''?>"><?= form_error('nama')?></small>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="alamat">Alamat Staff <span class="text-danger">*</span></label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $staff->alamat ?>" >
                                <small class="<?= form_error('alamat') ? "form-text text-danger" : ''?>"><?= form_error('alamat')?></small>                    
                            </div>
                            <div class="col-lg-6">
                                <label for="kota_staff">Kota Staff <span class="text-danger">*</span></label>
                                <input type="text" name="kota_staff" id="kota_staff" class="form-control" value="<?= $staff->kota_staff ?>">                                                    
                            </div>                            
                            <div class="col-lg-6 mt-2">
                                <label for="kec_staff">Kecamatan Staff</label>
                                <input type="text" name="kec_staff" id="kec_staff" class="form-control" value="<?= $staff->kec_staff ?>" >                                                    
                            </div>
                            <div class="col-lg-6 mt-2">
                                <label for="kel_staff">Kelurahan Staff</label>
                                <input type="text" name="kel_staff" id="kel_staff" class="form-control" value="<?= $staff->kel_staff ?>">                                                    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tlp_staff">Telepon Staff <span class="text-danger">*</span></label>
                        <input type="tel" name="tlp_staff" id="tlp_staff" class="form-control" value="<?= $staff->tlp_staff ?>" >
                        <small class="<?= form_error('tlp_staff') ? "form-text text-danger" : ''?>"><?= form_error('tlp_staff')?></small>
                    </div>
                    <div class="form-group">
                        <label for="email_staff">Email Staff <span class="text-danger">*</span></label>
                        <input type="email" name="email_staff" id="email_staff" class="form-control" value="<?= $staff->email_staff ?>" >
                        <small class="<?= form_error('email_staff') ? "form-text text-danger" : ''?>"><?= form_error('email_staff')?></small>
                    </div>
                    <div class="form-group">
                        <label for="prodi_prodi_id">Program Studi </label>
                        <select name="prodi_prodi_id" id="prodi_prodi_id" class="custom-select">
                            <option value="" selected>Pilih Program Studi</option>
                            <?php foreach($prodi as $prd): ?>
                                <option value="<?= $prd->prodi_id ?>" <?= ($staff->prodi_prodi_id == $prd->prodi_id) ? ' selected' : '' ?>><?= $prd->namaprod ?></option>
                            <?php endforeach;?>
                        </select>                        
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