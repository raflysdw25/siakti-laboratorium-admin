<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>

<?php this->load->view('template.php') ?>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Supplier</h3>
                <div class="pull-right">
                    <a href="supplier/add" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <?php print_r($row->result()) ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            # code...
                        <tr>
                            <td><?$no++?></td>
                            <td><?=$data->nm_supplier?></td>
                            <td><?=$data->almt_supplier?></td>
                            <td><?=$data->telp_supplier?></td>
                            <td><?=$data->email_supplier?></td>
                            <td class="text-center" width="60px">
                                <a href="<?=site_url('user/edit/')?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>Update
                                </a>
                                <a href="<?=site_url('user/edit/')?>" class="btn btn-danger btn-xs">
                                    <i class="fa fa-pencil"></i>Delete
                                </a>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
                
            </div>
        </div>

</body>
</html>