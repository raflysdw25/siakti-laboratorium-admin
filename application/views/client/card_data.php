                   <?php
                    $content = $_POST["nama_mahasiswa"];
                    if ($content[0] == '%') {
                    $start = "%B";
                    $end = "^";
                    function getBetween($content,$start,$end)
                    {
                         $r = explode($start, $content);
                         if (isset($r[1]))
                         {
                              $r = explode($end, $r[1]);
                              return $r[0];
                         }
                    return '';
                    }
                    $kartu = getBetween($content, $start, $end);}
                    else
                    {
                      $kartu = $content;
                    }
                    ?>


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
                        <td>Muhammad Rafly Sadewa</td>
                    </tr>
                    <tr>
                        <th>Nomor Induk</th>
                        <td>4617010058</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>081218860714</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>Jl. Panaragan Penggilingan No. 07 RT 01 RW 06</td>
                    </tr>
                    <tr>
                      <th>Nomor KTM</th>
                      <td><?php echo $kartu ?></td>
                    </tr>
                </table>
                <a href="form_peminjaman" class="btn btn-primary btn-block btn-lg" style="margin-top: 100px;">Pinjam Alat</a>
            </div>
        </div>
      </div>
    </div>   
  </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->