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
                <h3 class="box-title">Add Users</h3>
                <div class="pull-right">
                    <a href="<?=site_url('user/add')?>" class="btn btn-warning btn-flat">
                        <i class="fa fa-undo"></i>Back
                    </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <?php echo validation_errors(); ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Usename</label>
                                <input type="text" name="username" class="form-contol">
                            </div>
                             <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-contol">
                            </div>
                            <div class="form-group">
                                <label>Password Confirmation</label>
                                <input type="password" name="passconf" class="form-contol">
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