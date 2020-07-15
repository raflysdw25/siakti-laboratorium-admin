<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark font-weight-bold">Laporan Barang Laboratorium</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
            <li class="breadcrumb-item">Reports</li>
            <li class="breadcrumb-item active">Detail Kondisi Barang</li>              
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->                
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <a href="<?= site_url('reports') ?>" class="btn btn-danger mb-4">Kembali</a>
        <div class="card">
            <div class="card-header <?= ($kondisi == "BAIK")? "bg-success" : (($kondisi == "HABIS") ? "bg-warning" : (($kondisi == "RUSAK") ? "bg-danger" : "bg-primary" ) ) ?>">
                <h4 class="card-title font-weight-bold "><?= $kondisi?></h4>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered datatable">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($barang_list as $barang):?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $barang->nama_brg++ ?></td>
                            <td><?= $barang->jumlah_brg++ ?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>