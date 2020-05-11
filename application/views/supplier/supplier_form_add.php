<section class="content-header">
    <h1>Supplier
        <small>Form Supplier</small>
    </h1>
    <ol class="breakcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Supplier</li>
    </ol>
</section>

<!-- <Main content> -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Add Supplier</h3>
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
                                <label>Nama Supplier</label>
                                <input type="text" name="nm_supplier" class="form-control">
                            </div>
                             <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="almt_supplier" class="form-control" ><?=set_value('almt_supplier')?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="text" name="telp_supplier" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email_supplier" class="form-control">
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