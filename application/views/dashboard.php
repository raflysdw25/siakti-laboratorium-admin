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
                      <th>No</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Tersedia</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>01</td>
                      <td>AA001</td>
                      <td>View Sonic</td>
                      <td><span class="badge badge-info">25 Buah</span></td>
                      <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="#" class="btn btn-primary">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>02</td>
                      <td>AA002</td>
                      <td>BenQ</td>
                      <td><span class="badge badge-info">10 Buah</span></td>
                      <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="#" class="btn btn-primary">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>03</td>
                      <td>AA003</td>
                      <td>Panasonic Air Conditioner</td>
                      <td><span class="badge badge-info">25 Buah</span></td>
                      <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="#" class="btn btn-primary">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>04</td>
                      <td>AA004</td>
                      <td>Samsung Display Monitor</td>
                      <td><span class="badge badge-info">30 Buah</span></td>
                      <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="#" class="btn btn-primary">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>05</td>
                      <td>AA005</td>
                      <td>Logitech Keyboard</td>
                      <td><span class="badge badge-info">25 Buah</span></td>
                      <td>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                          <i class="fas fa-eye"></i>
                        </button>
                        <a href="#" class="btn btn-primary">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="#" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
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

    <!-- Modals -->
    <div class="modal fade" id="detail-modals">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Detail Barang AA001</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table text-nowrap table-bordered">
                  <tr>
                    <th>Nama Barang</th>
                    <td>View Sonic</td>
                  </tr>
                  <tr>
                    <th>Jenis Barang</th>
                    <td>Proyektor</td>
                  </tr>
                  <tr>
                    <th>Jumlah Barang</th>
                    <td>25 Buah</td>
                  </tr>
                  <tr>
                    <th>Tahun Pengadaan</th>
                    <td>2015</td>
                  </tr>
                  <tr>
                    <th>Asal Pengadaan</th>
                    <td>Barang Inventaris Negara</td>
                  </tr>
                  <tr>
                    <th>Supplier</th>
                    <td>PT. Sinar Jaya</td>
                  </tr>
                  <tr>
                    <th>Spesifikasi</th>
                    <td>
                      <ol>
                        <li>Tenaga Listrik : 200 Volt</li>
                      </ol>
                    </td>
                  </tr>
                  <tr>
                    <th>Barcode</th>
                    <td>
                      <img src="<?= base_url() ?>assets/dist/img/barcode contoh.png" alt="Barcode Barang AA001" class="img-fluid w-50">
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>