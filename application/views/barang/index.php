<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Daftar Barang Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <div class="col-12">
              <a href="<?= site_url('barang/add')?>" class="btn btn-primary">
                <i class="fas fa-plus"></i>  Tambah Data
              </a>
            </div>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('success')?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
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
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Tersedia</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($barang as $brg):?>
                    <tr>
                      <td><?= $brg->kode_brg ?></td>
                      <td><?= $brg->nama_brg ?></td>
                      <td><span class="badge badge-info"><?= $brg->jml." ".$brg->satuan ?></span></td>
                      <td>
                        <a href="#mymodal" 
                            class="btn btn-info" 
                            data-toggle="modal" 
                            data-remote="<?= site_url('barang/showBarang/'.$brg->kode_brg)?>"
                            data-target="#mymodal"
                            data-title="Detail Barang <?= $brg->kode_brg?>">
                            <i class="fas fa-eye"></i>
                        </a>
                        <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                          <i class="fas fa-eye"></i>
                        </button> -->
                        <a href="<?= site_url('barang/edit/'.$brg->kode_brg)?>" class="btn btn-primary">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="<?= site_url('barang/delete/'.$brg->kode_brg)?>" onclick="confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger">
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

    