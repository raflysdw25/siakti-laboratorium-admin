<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Daftar Peminjaman Laboratorium</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="box-body table-responsive">
                  <table class="table text-nowrap datatable">
                      <thead>
                          <!-- <tr>
                              <th>No</th>
                              <th>Kode Peminjaman</th>
                              <th>Tanggal Peminjaman</th>
                              <th>Tanggal Pengembalian</th>
                              <th>Tanggal Pengembalian Real</th>
                              <th>Nama Ruangan</th>
                              <th>NIM Mahasiswa</th>
                              <th>Tujuan Pinjam</th>
                              <th>NIP Staff</th>
                              <th>Kode Jadwal Kuliah</th>
                          </tr> -->
                          <tr>
                              <th>No</th>
                              <th>Kode Peminjaman</th>
                              <th>Nama Peminjam</th>
                              <th>Tanggal Peminjaman</th>
                              <th>Tanggal Pengembalian </th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                          <tr>
                                <td>01</td>
                                <td>AA123</td>
                                <td>Nur Ismi Fahmia</td>
                                <td>13 Mei 2020</td>
                                <td>14 Mei 2020</td>
                         <!-- 
                          <tr>
                              <td><?$no?></td>
                              <td><?=$data->kode_pinjam?></td>
                              <td><?=$data->tgl_pinjam_start?></td>
                              <td><?=$data->tgl_kembali_end?></td>
                              <td><?=$data->tgl_kembali_real?></td>
                              <td><?=$data->ruangan_namaruang?></td>
                              <td><?=$data->mahasiswa_nim?></td>
                              <td><?=$data->tujuan_pinjam?></td>
                              <td><?=$data->staff_nip?></td>
                              <td><?=$data->jadwal_kul_kodejdwl?></td> --> 
                              <td>
                                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail-modals">
                                    <i class="fas fa-eye"></i>
                                  </button>
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

<!-- Modals -->
    <div class="modal fade" id="detail-modals">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold">Detail Peminjaman AA123</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table text-nowrap table-bordered">
                  <tr>
                    <th>Kode Peminjaman</th>
                    <td>AA123</td>
                  </tr>
                  <tr>
                    <th>Nama Peminjam</th>
                    <td>Nur Ismi Fahmia</td>
                  </tr>
                  <tr>
                    <th>Tanggal Peminjaman</th>
                    <td>13 Mei 2020</td>
                  </tr>
                  <tr>
                    <th>Tanggal Pengembalian</th>
                    <td>2015</td>
                  </tr>
                  <tr>
                    <th>Nama Ruangan</th>
                    <td>GSG 212</td>
                  </tr>
                  <tr>
                    <th>NIM Mahasiswa</th>
                    <td>4617010037</td>
                  </tr>
                  <tr>
                    <th>Tujuan Peminjaman</th>
                    <td>Mengerjakan Laporan Magang</td>
                  </tr>
                  <tr>
                    <th>NIP Staff</th>
                    <td>3174019282171247018</td>
                  </tr>
                  <tr>
                    <th>Kode Jadwal Kuliah</th>
                    <td>TIK102</td>
                  </tr>
                  <tr>
                    <th>Barcode</th>
                    <td>
                      <img src="<?= base_url() ?>assets/dist/img/barcode contoh.png" alt="Barcode Peminjaman AA123" class="img-fluid w-50">
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