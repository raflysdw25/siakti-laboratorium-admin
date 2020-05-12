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
                <h3 class="box-title">Data Staff</h3>
                <div class="pull-right">
                    <a href="<?=site_url('staff/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <?php print_r($row->result()) ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Kota</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>ID Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            # code...
                        <tr>
                            <td><?$no++?></td>
                            <td><?=$data->nip?></td>
                            <td><?=$data->nama?></td>
                            <td><?=$data->alamat?></td>
                            <td><?=$data->kec_staff?></td>
                            <td><?=$data->kel_staff?></td>
                            <td><?=$data->kota_staff?></td>
                            <td><?=$data->tlp_staff?></td>
                            <td><?=$data->email_staff?></td>
                            <td><?=$data->usr_name?></td>
                            <td><?=$data->password?></td>
                            <td><?=$data->prodi_prodi_id?></td>
                            <td class="text-center" width="60px">
                                 <form action="<?=site_url('staff/del')?>" method="post">
                                <a href="<?=site_url('staff/edit/' .$data->nip)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                               
                                    <input type="hidden" name="nip" value="<?$data->nip?>">
                                    <button onclick="return confirm('Apakah Anda Yakin Menghapus?')" 
                                    class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
        
    </section>