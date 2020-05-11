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
                <h3 class="box-title">Data Users</h3>
                <div class="pull-right">
                    <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-res">
                <?php print_r($row->result()) ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            # code...
                        <tr>
                            <td><?$no++?></td>
                            <td><?=$data->username?></td>
                            <td><?=$data->password?></td>
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
        
    </section>