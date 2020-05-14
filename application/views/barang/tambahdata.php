<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah data barang</h3>
        <div class="pull-right">
            <a href="supplier/add" class="btn btn-primary btn-flat">
            </a>
        </div>
    </div>

      <div class="container-fluid">
        <!-- /.row -->
        <form action="#" method="POST">
            <div class="row">
                <div class="col-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-boxes"></i> Detail Barang
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_barang">ID Barang</label>
                                <input type="number" name="id_barang" class="form-control" id="id_barang" placeholder="Masukkan ID Barang">
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" id="nama_barang" placeholder="Masukkan Nama Barang">
                            </div>
                            <div class="form-group">
                                <label for="jumlah_barang">Jumlah Barang</label>
                                <input type="number" min="0" class="form-control" name="jumlah_barang" id="jumlah_barang" placeholder="Masukkan Jumlah Barang">
                            </div>
                            <div class="form-group">
                                <label for="spesifikasi_barang">Spesifikasi Barang</label>
                                <textarea name="spesifikasi_barang" id="spesifikasi_barang" cols="30" rows="10" class="form-control ckeditor"></textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-shopping-cart"></i> Detail Penerimaan
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="Tahun">Tanggal</label>
                                <div class="input-group date" id="datepicker" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" placeholder="Pilih Tanggal"/>
                                  <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="supplier_barang">Supplier</label>
                                <input type="text" class="form-control" id="supplier_barang" placeholder="Supplier Barang">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="p-2">
                    <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                    <a href="index.html" class="btn btn-danger btn-lg">Batal</a>
                </div>
            </div>
        </form>
      </div>