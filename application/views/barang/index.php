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
        <div class="row">
            <div class="col-12">
              <a href="<?= site_url('barang/add')?>" class="btn btn-primary">
                <i class="fas fa-plus"></i>  Tambah Data
              </a>
              <!-- <a href="<?= site_url('barang/generateAllBarcode')?>" class="btn btn-primary">
                Generate All Barcode
              </a> -->
            </div>
        </div>
        <div class="mt-2">
          <?php $this->view('alert'); ?>
        </div>        
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
                      <th>Barcode</th>
                      <th>Nama Barang</th>
                      <th>Status Barang</th>
                      <th>Kondisi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($barang as $brg):?>
                    <tr>                      
                      <td><?= ($brg->barcode == null) ? "Belum dibuat" : $brg->barcode ?></td>
                      <td><?= $brg->nama_brg ?></td>
                      <td><span class="badge <?= ($brg->status == "TERSEDIA")? "badge-success" : (($brg->status == "DIGUNAKAN") ? "badge-primary" : "badge-danger") ?>"><?= $brg->status ?></span></td>
                      <td><span class="badge <?= ($brg->kondisi == 'BAIK') ? "badge-success" : (($brg->kondisi == "HABIS")? "badge-warning" : "badge-danger")?>"><?= $brg->kondisi?></span></td>
                      <td>
                        <form action="<?= site_url('barang/ubahkondisi/'.$brg->kode_brg) ?>" method="post" class="mt-2">
                          <a href="#mymodal" 
                              class="btn btn-info" 
                              data-toggle="modal" 
                              data-remote="<?= site_url('barang/showBarang/'.$brg->kode_brg)?>"
                              data-target="#mymodal"
                              data-title="Detail Barang <?= $brg->kode_brg?>"
                              data-toggle="tooltip" data-placement="top" title="Lihat Detail Barang">
                              <i class="fas fa-eye"></i>
                          </a>                        
                          <a href="<?= site_url('barang/edit/'.$brg->kode_brg)?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit Barang">
                            <i class="fas fa-pencil-alt"></i>
                          </a>
                          <a href="<?= site_url('barang/delete/'.$brg->kode_brg)?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Barang">
                            <i class="fas fa-trash"></i>
                          </a>
                          <?php if($brg->kondisi == "BAIK" && $brg->asal_pengadaan !== "Barang Habis Pakai"): ?>                                                  
                            <input type="hidden" name="kondisi" value="RUSAK">
                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Ubah Kondisi Rusak" onclick="return confirm('Apakah anda ingin mengubah kondisi barang ini menjadi rusak ?')">
                              <i class="fas fa-times-circle"></i>
                            </button>
                          <?php elseif($brg->kondisi == "RUSAK" && $brg->asal_pengadaan !== "Barang Habis Pakai"): ?>
                            <input type="hidden" name="kondisi" value="BAIK">
                            <button type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Ubah Kondisi Baik" onclick="return confirm('Apakah anda ingin mengubah kondisi barang ini menjadi baik ?')">
                              <i class="fas fa-check-circle"></i>
                            </button>
                          <?php elseif($brg->kondisi !== "HABIS" && $brg->asal_pengadaan == "Barang Habis Pakai" ):?>
                            <input type="hidden" name="kondisi" value="HABIS">
                            <button type="submit" class="btn btn-warning font-weight-bold" data-toggle="tooltip" data-placement="right" title="Ubah Kondisi Habis" onclick="return confirm('Apakah anda ingin mengubah kondisi barang ini menjadi habis ?')">
                              HABIS
                            </button>
                          <?php endif;?>
                        </form>
                      </td>                        
                    </tr>                                                          
                  <?php endforeach; ?>
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

