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
        <div class="row mt-4">
            <div class="col-12">
              <a href="<?= site_url('staff/add')?>" class="btn btn-primary">
                <i class="fas fa-plus"></i>  Tambah Data
              </a>
              <a href="#" class="btn btn-info float-right" data-placement="top" title="Lihat Data Staff"
                              data-toggle="modal" 
                              data-remote="<?= site_url('staff/struktural')?>"
                              data-target="#mymodal"
                              data-title="Daftar Struktural Laboratorium">
                <i class="fas fa-eye mr-2"></i>  Lihat Struktural
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
                      <th width="20%">Nama</th>                                           
                      <th width="15%">Hak Akses</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach($staffs as $staff):?>
                    <tr>                        
                        <td><?= $staff->nip ?></td>
                        <td><?= $staff->nama ?></td>                                               
                        <td>
                            <?php
                                $currentDate = date('Y-m-d H:i:s');
                                
                                $access_valid = ($currentDate >= $staff->tgl_mulai && $currentDate <= $staff->tgl_selesai);
                                
                                if($staff->id_jablab == null){
                                    echo '<span class="badge badge-danger">Dont have Access yet</span>';
                                }elseif($staff->id_jablab !== null && $access_valid == false){
                                  echo '<span class="badge badge-danger">Expired</span>';
                                }elseif($staff->id_jablab != null && $access_valid == true && $staff->password == null){
                                    echo '<p class="badge badge-warning">Punya Akses, Belum mendaftar</p>';
                                }else{
                                    echo '<span class="badge badge-success">Have Access</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if($staff->id_jablab == null || $access_valid == false ): ?>      
                                <a href="<?= site_url('staff/makeAccess/'.$staff->nip)?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Buat Hak Akses Staff">
                                    <i class="fas fa-user-lock"></i>
                                </a>
                            <?php endif;?>
                            <?php if($staff->id_jablab != null && $access_valid == true ): ?>      
                                <a href="<?= site_url('staff/editJabatan/'.$staff->nip)?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Jabatan Staff">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                            <?php endif;?>  
                            <a href="#mymodal" class="btn btn-info"  data-placement="top" title="Lihat Data Staff"
                              data-toggle="modal" 
                              data-remote="<?= site_url('staff/showStaff/'.$staff->nip)?>"
                              data-target="#mymodal"
                              data-title="Detail Staff <?= $staff->nama?>">
                                <i class="fas fa-eye"></i>
                            </a>                          
                            <a href="<?= site_url('staff/edit/'.$staff->nip) ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Ubah Data Staff">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a href="<?= site_url('staff/delete/'.$staff->nip) ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data Staff" onclick="return confirm('Apakah anda ingin menghapus data ini?')">
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

