  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row my-4">
          <div class="col-12 text-center">
            <h1 class="m-0 text-dark font-weight-bold">INFORMASI PEMINJAMAN</h1>
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
          <div class="col-12">
            <div class="card w-75 mx-auto">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                          <label for="keperluan">Keperluan</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-clipboard"></i></span>
                            </div>
                            <select name="keperluan" class="custom-select" id="">
                                <option selected>Pilih...</option>
                                <option value="KBM">KBM</option>
                                <option value="Acara Jurusan">Acara Jurusan</option>
                                <option value="Acara Himpunan">Acara Himpunan</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-chalkboard"></i></span>
                                </div>
                                <select name="keperluan" class="custom-select" id="">
                                    <option selected>Pilih...</option>
                                    <option value="AA001">AA001</option>
                                    <option value="AA002">AA002</option>
                                    <option value="AA003">AA003</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dosen">Dosen</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <select name="keperluan" class="custom-select" id="">
                                    <option selected>Pilih...</option>
                                    <option value="Budi">Pak Budi</option>
                                    <option value="Siti">Ibu Siti</option>
                                    <option value="Ginanjar">Pak Ginanjar</option>
                                </select>
                            </div>
                        </div>
                        <!-- Date and time range -->
                        <div class="form-group">
                            <label>Waktu Peminjaman</label>
        
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservationtime">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
        

                        <div class="form-group">
                            <label for="">
                                <h4>Barang yang Dipinjam</h4>
                            </label>
                            <div class="">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservationtime">
                                    <a href="#" class="btn btn-primary ml-3 px-4">Pinjam</a>
                                </div>
                                
                            </div>
                            <table class="table mt-4">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jenis Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>AA001</td>
                                        <td>View Sonic</td>
                                        <td>Proyektor</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>AA002</td>
                                        <td>Kabel Terminal</td>
                                        <td>Kabel</td>
                                        <td>
                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <small class="text-muted">Silahkan scan barcode barang yang ingin dipinjam</small>
                        </div>

                        <div class="form-group">
                            <!-- <button id="confirm" class="btn btn-primary btn-lg btn-block">Konfirmasi</button> -->
                            <a id="confirm" class="btn btn-primary btn-lg btn-block">Konfirmasi</a>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>   
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
  </div>