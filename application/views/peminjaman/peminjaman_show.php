<div class="card">
  <div class="card-body table-responsive p-0">
    <table class="table text-nowrap table-bordered">
      <tr>
        <th>Kode Peminjaman</th>
           <td><?= $pinjambrg->kd_pjm ?></td>
      </tr>
      <tr>
        <th>NIM Mahasiswa</th>
           <td><?= $pinjambrg->mahasiswa_nim ?></td>
      </tr>  
      <tr>
        <th>Nama Mahasiswa</th>
           <td><?= $pinjambrg->nama_mahasiswa ?></td>
      </tr> 
      <tr>
        <th>Kode Barang</th>
           <td><?= $pinjambrg->barang_kode_brg ?></td>
      </tr>
      <tr>
        <th>Nama Barang</th>
           <td><?= $pinjambrg->nama_brg ?></td>
      </tr>
      <tr>
        <th>Tanggal Peminjaman</th>
           <td><?= $pinjambrg->tgl_pjm ?></td>
      </tr>
      <tr>
        <th>Tanggal Pengembalian</th>
           <td><?= $pinjambrg->tgl_blk ?></td>
      </tr>
      <tr>
        <th>Tanggal Pengembalian Real</th>
           <td><?= $pinjambrg->tgl_blk_real ?></td>
      </tr>
      <tr>
        <th>Nama Staff</th>
           <td><?= $pinjambrg->nama_staff ?></td>
      </tr>                 
     <!-- 
                  <tr>
                    <th>Barcode</th>
                    <td>
                      <img src="<?= base_url() ?>assets/dist/img/barcode contoh.png" alt="Barcode Peminjaman AA123" class="img-fluid w-50">
                    </td>
                  </tr> -->
               </td>
            </tr>
        </table>
    </div>
</div>
