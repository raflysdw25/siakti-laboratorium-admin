<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="m-0 text-dark font-weight-bold">DATA PEMINJAM BARANG LABORATORIUM</h1>
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
      <div class="col-12 text-justify">
        <div class="card" style="width: 550px; margin: 0 auto;">
            <div class="card-body">
                <table class="table table-borderless table-responsive-sm mt-4 ">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td><?= $mahasiswa->nama_mhs ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Induk</th>
                        <td><?= $mahasiswa->nim ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?= $mahasiswa->tlp_mhs ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><?= $mahasiswa->add_mhs ?></td>
                    </tr>
                    <tr>
                      <th>Email</th>
                      <td><?= $mahasiswa->email_mhs ?></td>
                    </tr>
                </table>
                <a href="#" class="btn btn-primary btn-block btn-lg" style="margin-top: 100px;">Pinjam Alat</a>
            </div>
        </div>
      </div>
    </div>   
  </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->