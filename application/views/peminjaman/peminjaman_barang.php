<div class="card">
  <div class="card-body table-responsive p-0">
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>Barcode</th>
              <th>Nama Barang</th>
              <th>Jenis Barang</th>                           
              <th>Kondisi Barang</th>
          </tr>
      </thead>    
      <tbody>
        <?php if($barang): ?>
        <?php foreach($barang as $brg) :?>
            <tr>
              <td><?= $brg->barcode ?></td>
              <td><?= $brg->nama_brg ?></td>
              <td><?= ($brg->nama_jenis == null) ? "Jenis Barang tidak ditentukan" : $brg->nama_jenis ?></td>                            
              <td>
              <span class="badge <?= ($brg->kondisi == 'BAIK') ? "badge-success" : (($brg->kondisi == "HABIS")? "badge-warning" : "badge-danger")?>"><?= $brg->kondisi?></span>
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
