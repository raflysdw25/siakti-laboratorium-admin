<div class="card">
  <div class="card-body table-responsive p-0">
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>Kode</th>
              <th>Nama Barang</th>
              <th>Jenis Barang</th>
              <th>Jumlah yang dipinjam</th>              
              <th>Status Barang</th>
          </tr>
      </thead>    
      <tbody>
        <?php if($barang): ?>
        <?php foreach($barang as $brg) :?>
            <tr>
              <td><?= $brg->barang_kode_brg ?></td>
              <td><?= $brg->nama_brg ?></td>
              <td><?= $brg->jenis ?></td>
              <td><?= $brg->jumlah?></td>              
              <td>
                <span class="badge <?= ($brg->status == "TERSEDIA") ? "badge-success" : "badge-danger"?>"><?= $brg->status ?></span>
              </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr class="text-center">
                <td colspan="5">Belum menentukan barang yang dipinjam</td>
            </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>
</div>
