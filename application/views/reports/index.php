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
        <?php $this->view('alert'); ?>  
        <div id="filter-section"  class="card">
            <div class="card-header bg-primary">
                <i class="fas fa-filter"></i> <span class="h5 font-weight-bold">Filter Barang</span>
            </div>
            <div class="card-body">
                <form action="<?= site_url('reports/filter_barang') ?>" method="post">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="form-group">
                                <label for="thn_pengadaan" class="mb-2">Tahun Pengadaan</label>    
                                <input type="number" name="thn_pengadaan" id="thn_pengadaan" class="form-control form-control-lg" min="2000" placeholder="Tahun Pengadaan">
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="form-group">
                                <label for="asal_pengadaan" class="mb-2">Asal Pengadaan</label>    
                                <select name="asal_pengadaan" id="asal_pengadaan" class="custom-select custom-select-lg">
                                    <option value="">-- Asal Pengadaan -- </option>
                                    <option value="Barang Habis Pakai">Barang Habis Pakai</option>
                                    <option value="Hibah TA">Hibah TA</option>
                                    <option value="Supplier">Supplier</option>
                                    <option value="Hibah Pemerintah">Hibah Pemerintah</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="form-group">
                                <label for="jenis_brg" class="mb-2">Jenis Barang</label>    
                                <select name="jenis_brg" id="jenis_brg" class="custom-select custom-select-lg">
                                    <option value="">-- Jenis Barang -- </option>
                                    <?php foreach($jenis_barang as $jb): ?>
                                        <option value="<?= $jb->id_jenis ?>"><?= $jb->nama_jenis ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>                    
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label for="" class=""></label>
                                <button type="submit" id="filter-button" class="btn btn-primary btn-lg btn-block mt-2">
                                    <i class="fas fa-filter mr-2"></i> Filter
                                </button>
                            </div>
                        </div>                            
                    </div>
                </form>
            </div>
        </div>

        <!-- Statistis -->
        <div id="statistik" class="row mt-4">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $jumlah ?></h3>

                <p>Barang</p>
              </div>
              <div class="icon">
                <i class="fas fa-boxes"></i>
              </div>
              <a href="<?= site_url('reports/showKondisi') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $baik ?></h3>

                <p>Kondisi Baik</p>
              </div>
              <div class="icon">
                <i class="fas fa-check"></i>
              </div>
              <a href="<?= site_url('reports/showKondisi/BAIK') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $habis ?></h3>

                <p>Kondisi Habis</p>
              </div>
              <div class="icon">
                <i class="fas fa-box-open"></i>
              </div>
              <a href="<?= site_url('reports/showKondisi/HABIS') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $rusak ?></h3>

                <p>Kondisi Rusak</p>
              </div>
              <div class="icon">
                <i class="fas fa-times-circle"></i>
              </div>
              <a href="<?= site_url('reports/showKondisi/RUSAK') ?>" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

            
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->




