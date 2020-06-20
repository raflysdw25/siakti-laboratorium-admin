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
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Supplier</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($barang as $brg):?>
                    <tr>
                      <td><?= $brg->kode_brg ?></td>
                      <td><?= $brg->nama_brg ?></td>
                      <td><?= ($brg->nama_supp == null) ? 'None' : $brg->nama_supp ?></td>
                      <td><span class="badge <?= ($brg->status == 'TERSEDIA') ? "badge-success" : "badge-danger"?>"><?= $brg->status?></span></td>
                      <td>
                        <a href="#mymodal" 
                            class="btn btn-info" 
                            data-toggle="modal" 
                            data-remote="<?= site_url('barang/showBarang/'.$brg->kode_brg)?>"
                            data-target="#mymodal"
                            data-title="Detail Barang <?= $brg->kode_brg?>">
                            <i class="fas fa-eye"></i>
                        </a>                        
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

    