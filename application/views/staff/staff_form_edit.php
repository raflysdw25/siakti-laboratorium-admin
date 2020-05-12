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
                <h3 class="box-title">Edit Staff</h3>
                <div class="pull-right">
                    <a href="<?=site_url('staff/add')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php // echo validation_errors(); ?>
                        <form action="" method="post">
                            <div class="form-group" <?=form_eror('nip')? 'has-eror' : null?>">
                                <label>NIP</label>
                                <input type="text" name="NIP" 
                                value="<?=$this->input->post('nip')?>" class="form-control">
                                <?=form_eror('nip')?>
                            </div>
                            <div class="form-group" <?=form_eror('nama')? 'has-eror' : null?>">
                                <label>Nama</label>
                                <input type="text" name="Nama" 
                                value="<?=$this->input->post('nama')?>" class="form-control">
                                <?=form_eror('nama')?>
                            </div>
                             <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="Alamat" 
                                value="<?=$this->input->post('alamat')?>" class="form-control">
                                </textarea>
                            </div>
                            <div class="form-group" <?=form_eror('kec_staff')? 'has-eror' : null?>">
                                <label>Kecamatan</label>
                                <input type="text" name="Kecamatan" 
                                value="<?=$this->input->post('kec_staff')?>" class="form-control">
                                <?=form_eror('kec_staff')?>
                            </div>
                            <div class="form-group" <?=form_eror('kel_staff')? 'has-eror' : null?>">
                                <label>Kelurahan</label>
                                <input type="text" name="Kelurahan" 
                                value="<?=$this->input->post('kel_staff')?>" class="form-control">
                                <?=form_eror('kel_staff')?>
                            </div>
                            <div class="form-group" <?=form_eror('kota_staff')? 'has-eror' : null?>">
                                <label>Kota</label>
                                <input type="text" name="Kota" 
                                value="<?=$this->input->post('kota_staff')?>" class="form-control">
                                <?=form_eror('kota_staff')?>
                            </div>
                             <div class="form-group" <?=form_eror('tlp_staff')? 'has-eror' : null?>">
                                <label>Telepon</label>
                                <input type="number" name="Telepon" 
                                value="<?=$this->input->post('tlp_staff')?>" class="form-control">
                                <?=form_eror('tlp_staff')?>
                            </div>
                             <div class="form-group" <?=form_eror('email_staff')? 'has-eror' : null?>">
                                <label>Email</label>
                                <input type="text" name="Email" 
                                value="<?=$this->input->post('email_staff')?>" class="form-control">
                                <?=form_eror('email_staff')?>
                            </div>
                            <div class="form-group" <?=form_eror('usr_name')? 'has-eror' : null?>">
                                <label>Usename</label>
                                <input type="text" name="Username" 
                                value="<?=$this->input->post('usr_name')?>" class="form-control">
                                <?=form_eror('usr_name')?>
                            </div>
                             <div class="form-group" <?=form_eror('password')? 'has-eror' : null?>">
                                <label>Password * <small>(Biarkan kosong jika tidak ingin diganti)</small>
                                <input type="password" name="password" 
                                value="<?=$this->input->post('password')?>" class="form-control">
                                 <?=form_eror('password')?>
                            </div>
                             <div class="form-group" <?=form_eror('prodi_prodi_id')? 'has-eror' : null?>">
                                <label>ID Prodi</label>
                               <input type="text" name="ID Prodi" 
                                value="<?=$this->input->post('prodi_prodi_id')?>" class="form-control">
                                <?=form_eror('prodi_prodi_id')?>
                            </div>





                            <div class="form-group" <?=form_eror('nama_user')? 'has-eror' : null?>">
                                <label>Nama</label>
                                <input type="hidden" name="user_id" value="<?=$row->user_id?"> class="form-control">
                                <input type="text" name="nama_user" value="<?=$this->input->post('nama_user') ?? $row->name?>" class="form-control">
                                <?=form_eror('nama_user')?>
                            </div>
                            <div class="form-group" <?=form_eror('username')? 'has-eror' : null?>">
                                <label>Usename</label>
                                <input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control">
                                <?=form_eror('username')?>
                            </div>
                             <div class="form-group" <?=form_eror('password')? 'has-eror' : null?>">
                                <label>Password</label> <small>(Biarkan kosong jika tidak ingin diganti)</small>
                                <input type="password" name="password" 
                                value="<?=$this->input->post('password')?>" class="form-control">
                                 <?=form_eror('password')?>
                            </div>
                            <div class="form-group" <?=form_eror('passconf')? 'has-eror' : null?>">
                                <label>Password Confirmation</label>
                                <input type="password" name="passconf" 
                                value="<?=$this->input->post('passconf')?>" class="form-control">
                                 <?=form_eror('passconf')?>
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