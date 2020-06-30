<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Daftar Staff Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Data Staff</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-12">
              <a href="<?= site_url('staff/add')?>" class="btn btn-primary">
                <i class="fas fa-plus"></i>  Tambah Data
              </a>
            </div>
        </div>
        <div class="mt-2">
          <?php $this->view('alert'); ?>
        </div>        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive">
                <table class="table text-nowrap datatable">
                  <thead>
                    <tr>                      
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Email</th>
                      <th>Program Studi</th>
                      <th>Hak Akses</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach($staffs as $staff):?>
                    <tr>                        
                        <td><?= $staff->nip ?></td>
                        <td><?= $staff->nama ?></td>
                        <td><?= $staff->alamat.", ".$staff->kel_staff.", ".$staff->kec_staff.", ".$staff->kota_staff ?></td>
                        <td><?= $staff->tlp_staff ?></td>
                        <td><?= $staff->email_staff ?></td>
                        <td><?= $staff->nama_prodi ?></td>
                        <td>
                            <?php 
                                if($staff->password == null){
                                    echo '<span class="badge badge-danger">Dont get Access yet</span>';
                                }else{
                                    echo '<span class="badge badge-success">Get Access</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if($staff->password == null): ?>      
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-user-lock"></i>
                                </a>
                            <?php endif;?>
                            <a href="#" class="btn btn-info">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>                        
                    </tr>                                                          
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

