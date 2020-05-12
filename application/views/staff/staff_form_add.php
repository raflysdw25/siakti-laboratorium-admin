<section class="content-header">
    <h1>Staff
        <small>Karyawan TIK</small>
    </h1>
    <ol class="breakcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Staff</li>
    </ol>
</section>

<!-- <Main content> -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Add Staff</h3>
                <div class="pull-right">
                    <a href="<?=site_url('staff/add')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                       
                        <form action="" method="post">
                            <div class="form-group" <?=form_eror('nip')? 'has-eror' : null?>">
                                <label>NIP</label>
                                <input type="number" name="NIP" value=<?=set_value('nip')?>" class="form-control">
                                <?=form_eror('nip')?>
                            </div>
                            <div class="form-group" <?=form_eror('nama')? 'has-eror' : null?>">
                                <label>Nama</label>
                                <input type="text" name="Nama" value=<?=set_value('nama')?>" class="form-control">
                                <?=form_eror('nama')?>
                            </div>
                             <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="Alamat" class="form-control" ><?=set_value('alamat')?></textarea>
                            </div>
                            <div class="form-group" <?=form_eror('kec_staff')? 'has-eror' : null?>">
                                <label>Kecamatan</label>
                                <input type="text" name="Kecamatan" value=<?=set_value('kec_staff')?>" class="form-control">
                                <?=form_eror('kec_staff')?>
                            </div>
                            <div class="form-group" <?=form_eror('kel_staff')? 'has-eror' : null?>">
                                <label>Kelurahan</label>
                                <input type="text" name="Kelurahan" value=<?=set_value('kel_staff')?>" class="form-control">
                                <?=form_eror('kel_staff')?>
                            </div>
                            <div class="form-group" <?=form_eror('kota_staff')? 'has-eror' : null?>">
                                <label>Kota</label>
                                <input type="text" name="Kota" value=<?=set_value('kota_staff')?>" class="form-control">
                                <?=form_eror('kota_staff')?>
                            </div>
                             <div class="form-group" <?=form_eror('tlp_staff')? 'has-eror' : null?>">
                                <label>Telepon</label>
                                <input type="number" name="Telepon" value=<?=set_value('tlp_staff')?>" class="form-control">
                                <?=form_eror('tlp_staff')?>
                            </div>
                             <div class="form-group" <?=form_eror('email_staff')? 'has-eror' : null?>">
                                <label>Email</label>
                                <input type="text" name="Email" value=<?=set_value('email_staff')?>" class="form-control">
                                <?=form_eror('email_staff')?>
                            </div>
                            <div class="form-group" <?=form_eror('usr_name')? 'has-eror' : null?>">
                                <label>Usename</label>
                                <input type="text" name="Username" value=<?=set_value('usr_name')?>" class="form-control">
                                <?=form_eror('usr_name')?>
                            </div>
                             <div class="form-group" <?=form_eror('password')? 'has-eror' : null?>">
                                <label>Password *</label>
                                <input type="password" name="password" 
                                value=<?=set_value('password')?>"class="form-control">
                                 <?=form_eror('password')?>
                            </div>
                             <div class="form-group" <?=form_eror('prodi_prodi_id')? 'has-eror' : null?>">
                                <label>ID Prodi</label>
                                <input type="text" name="ID Prodi" value=<?=set_value('prodi_prodi_id')?>" class="form-control">
                                <?=form_eror('prodi_prodi_id')?>
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