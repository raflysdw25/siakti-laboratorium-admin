 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark font-weight-bold">Daftar Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
            <li class="breadcrumb-item active">Supplier Barang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <a href="<?= site_url('supplier/add') ?>" class="btn btn-primary mb-2">
            <i class="fas fa-plus"></i> Tambah Supplier
          </a>
          <?php $this->view('alert') ?>
          <div class="card">
            <div class="card-body table-responsive">
              <table class="table text-nowrap table-bordered datatable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Person In Charge</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 1;
                  
                 foreach($suppliers as $supplier): ?>
                  <tr>                    
                    <td><?= $supplier->id_supp ?></td>
                    <td><?= $supplier->nama_supp ?></td>
                    <td><?= ($supplier->alamat == null) ? "<span class='badge badge-danger'>Alamat tidak diketahui</span>" : $supplier->alamat ?></td>
                    <td><?= $supplier->tlpn ?></td>
                    <td><?= ($supplier->email == null) ? "<span class='badge badge-danger'>Email tidak diketahui</span>" : $supplier->email ?></td>
                    <td><?= $supplier->pic ?></td>
                    <td>
                      <a href="<?= site_url('supplier/edit/'.$supplier->id_supp)?>" class="btn btn-primary">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <a href="<?= site_url('supplier/delete/'.$supplier->id_supp)?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger">
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
