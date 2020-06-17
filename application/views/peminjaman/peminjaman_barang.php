<div class="card">
  <div class="card-body table-responsive p-0">
    <table class="table text-nowrap table-bordered">
      <thead>
          <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Jenis Barang</th>
              <th>Status Barang</th>
          </tr>
      </thead>    
      <tbody>
        <?php if($barang): ?>
        <?php foreach($barang as $brg) :?>
            <tr>
              <td><?= $brg->kode_brg ?></td>
              <td><?= $brg->nama_brg ?></td>
              <td><?= $brg->jenis ?></td>
              <td>
                <span class="badge <?= ($brg->status == "TERSEDIA") ? "badge-success" : "badge-danger"?>"><?= $brg->status ?></span>
              </td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
            <tr class="text-center">
                <td colspan="4">Belum menentukan barang yang dipinjam</td>
            </tr>
        <?php endif; ?>

      </tbody>
    </table>
  </div>
</div>
