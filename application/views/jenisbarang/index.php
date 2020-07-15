<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Daftar Jenis Barang Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Barang</li>
              <li class="breadcrumb-item active">Jenis Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-12">
              <a href="<?= site_url('jenisbarang/add')?>" class="btn btn-primary">
                <i class="fas fa-plus"></i>  Tambah Jenis
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
            <div class="card mx-auto">
              <div class="card-body table-responsive">
                <table class="table text-nowrap datatable">
                  <thead>
                    <tr>
                      <th>ID Jenis</th>
                      <th>Nama Jenis</th>                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($jenisbarang as $jb):?>
                    <tr>
                      <td><?= $jb->id_jenis ?></td>
                      <td><?= $jb->nama_jenis ?></td>                     
                      <td>                                                                         
                          <a href="<?= site_url('jenisbarang/edit/'.$jb->id_jenis)?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Jenis Barang">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="<?= site_url('jenisbarang/delete/'.$jb->id_jenis)?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Jenis Barang">
                            <i class="fas fa-trash"></i>
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

