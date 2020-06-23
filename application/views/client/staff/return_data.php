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
                                <td><?= $pinjambrg->nama_staff ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td><?= $pinjambrg->tlp_staff ?></td>
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
                            <td><?= $pinjambrg->namaruang ?></td>
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
                        <table class="table mt-4">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jenis Barang</th>
                                    <th>Jumlah Barang Pinjaman</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach($detailBarang as $detail): ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $detail->barang_kode_brg?></td>
                                    <td><?= $detail->nama_brg?></td>
                                    <td><?= $detail->jenis?></td>
                                    <td><?= $detail->jumlah?></td>                                    
                                </tr>                                
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <a href="<?= site_url('client/kembalikan-barang/'.$pinjambrg->kd_pjm) ?>" class="mt-2 btn btn-primary btn-lg ml-auto">Kembalikan Alat</a>
                    </div>
                </div>  
            </div>
        </div> 
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->