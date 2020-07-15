<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row my-4">
          <div class="col-12 text-center">
            <h1 class="m-0 text-dark font-weight-bold">Informasi Peminjaman</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="card">
            <div class="card-body">
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th>Nama</th>
                                <td><?= $mahasiswa->nama_mhs ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= $mahasiswa->tlp_mhs ?></td>
                            </tr>
                            <tr>
                                <th>Keperluan</th>
                                <td><?= $pinjambrg->keperluan?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                    <table class="table table-borderless">
                        <tr>
                            <th>Ruangan</th>
                            <td><?= ($pinjambrg->namaruang == null) ? "Tidak memakai ruangan" : $pinjambrg->namaruang ?></td>
                        </tr>
                        <tr>
                            <th>Dosen</th>
                            <td><?= $pinjambrg->nama_penanggungjawab ?></td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td><?= $pinjambrg->tgl_pjm.' - '.$pinjambrg->tgl_blk ?></td>
                        </tr>
                    </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php $this->view('client/barang_dikembalikan') ?>

                        <a href="<?= site_url('client/kembalikan-barang/'.$pinjambrg->kd_pjm.'/'.$mahasiswa->no_ktm) ?>" class="mt-2 btn btn-primary btn-lg ml-auto" onclick="return confirm('Apakah anda yakin ingin melanjutkan proses ini?')">Kembalikan Alat</a>
                    </div>
                </div>  
            </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    