<section class="content-header">
    <h1>Users
        <small>Pengguna</small>
    </h1>
    <ol class="breakcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- <Main content> -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Users</h3>
                <div class="pull-right">
                    <a href="<?=site_url('user/add')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php // echo validation_errors(); ?>
                        <form action="" method="post">
                            <div class="form-group" <?=form_eror('nama_user')? 'has-eror' : null?>">
                                <label>Nama</label>
                                <input type="hidden" name="user_id" value="<?=$row->user_id?">
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