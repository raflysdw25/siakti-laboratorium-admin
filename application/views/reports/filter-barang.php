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
            <li class="breadcrumb-item active">Reports</li>              
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->                
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
    <div class="container-fluid">
        <a href="<?= site_url('reports') ?>" id="back-button" class="btn btn-danger mb-4 ">
            Kembali
        </a>

        <div class="mb-2">
        <?php if($posts["thn_pengadaan"]): ?>
            <span class="mr-2">Tahun Pengadaan : <?= $posts["thn_pengadaan"] ?></span>
        <?php endif; ?>

        <?php if($posts["asal_pengadaan"]): ?>
            <span class="mr-2">Asal Pengadaan : <?= $posts["asal_pengadaan"] ?></span>
        <?php endif; ?>

        <?php if($posts["jenis_brg"]): ?>
            <span class="mr-2">Jenis Barang : <?= $filters[0]->nama_jenis ?></span>
        <?php endif; ?>
        </div>


        <div class="card">
            <div class="card-body">
                <div class="col-12">
                    <table class="table table-responsive-sm table-bordered table-hover datatable">
                        <thead class="thead-dark">
                            <tr>
                                <th>Barcode</th>
                                <th>Nama Barang</th>
                                <th>Status</th>
                                <th>Kondisi</th>
                                <th>Supplier</th>
                            </tr>
                        </thead>
                        <tbody id="filter-content">
                            <?php foreach($filters as $filter): ?>
                                <tr>
                                    <td><?= $filter->barcode?></td>
                                    <td><?= $filter->nama_brg?></td>
                                    <td><?= $filter->status?></td>
                                    <td><?= $filter->kondisi?></td>
                                    <td><?= ($filter->nama_supp == null) ? "Supplier tidak ditentukan" : $filter->nama_supp?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
</section>