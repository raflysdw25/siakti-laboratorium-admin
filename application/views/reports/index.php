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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="card-title font-weight-bold">
                        KONDISI BAIK
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>                            
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>                                              
                            </tr>                    
                        </thead>
                        <tbody>
                        <?php foreach($baik as $bk): ?>
                            <tr>
                                <td><?= $bk->nama_brg ?></td>
                                <td><?= $bk->kondisi ?></td>
                            </tr>                                
                        <?php endforeach;?>                   
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-danger">
                    <h3 class="card-title font-weight-bold">
                        KONDISI RUSAK
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>                            
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>                                              
                            </tr>                    
                        </thead>
                        <tbody>
                        <?php foreach($rusak as $rsk): ?>
                            <tr>
                                <td><?= $rsk->nama_brg ?></td>
                                <td><?= $rsk->kondisi ?></td>
                            </tr>                                
                        <?php endforeach;?>                   
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title font-weight-bold">
                        KONDISI HABIS
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>                            
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>                                              
                            </tr>                    
                        </thead>
                        <tbody>
                        <?php foreach($habis as $hbs): ?>
                            <tr>
                                <td><?= $hbs->nama_brg ?></td>
                                <td><?= $hbs->kondisi ?></td>
                            </tr>                                
                        <?php endforeach;?>                    
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title font-weight-bold">
                        DATA BARANG
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>                            
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>                                              
                            </tr>                    
                        </thead>
                        <tbody>
                        <?php foreach($barang as $brg): ?>
                            <tr>
                                <td><?= $brg->nama_brg ?></td>
                                <td><?= $brg->jumlah_brg ?></td>
                            </tr>                                
                        <?php endforeach;?>                   
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title font-weight-bold">
                        DATA BARANG DIPINJAM
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>                            
                                <th>Nama Barang</th>
                                <th>Jumlah yang digunakan</th>                                              
                            </tr>                    
                        </thead>
                        <tbody>
                        <?php
                        if($details): 
                            foreach($details as $detail): ?>                                         
                            <tr>
                                <td><?= $detail->nama_brg ?></td>
                                <td><?= $detail->jumlah_brg ?></td>
                            </tr>
                        <?php endforeach; 
                        else:?>
                            <tr class="text-center">
                                <td colspan="2">Belum ada peminjaman</td>
                            </tr>
                        <?php endif;?>
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


