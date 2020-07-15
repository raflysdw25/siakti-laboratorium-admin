
<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table text-nowrap table-bordered">
            <tr>
                <th>Jenis Barang</th>
                <td><?= ($barang->nama_jenis == null) ? "Jenis Barang Belum ditentukan" : $barang->nama_jenis ?></td>
            </tr>            
            <tr>
                <th>Kondisi Barang</th>
                <td><span class="badge <?= ($barang->kondisi == 'BAIK') ? "badge-success" : (($barang->kondisi == "HABIS")? "badge-warning" : "badge-danger")?>"><?= $barang->kondisi?></span></td>
            </tr>
            <tr>
                <th>Tahun Pengadaan</th>
                <td><?= $barang->thn_pengadaan ?></td>
            </tr>                                    
            <tr>
                <th>Asal Pengadaan</th>
                <td><?= $barang->asal_pengadaan ?></td>
            </tr>
            <tr>
                <th>Supplier</th>
                <td><?= ($barang->nama_supp == null)? 'Supplier tidak diketahui' : $barang->nama_supp ?></td>
            </tr>
            <tr>
                <th>Spesifikasi</th>
                <td>
                    <?= $barang->spesifikasi ?>
                </td>
            </tr>
            <tr>
                <th>Barcode</th>                
                <td>
                    <?php if($barang->kondisi != "HABIS"): ?>
                    <img src="<?= 'data:image/png;base64,'.base64_encode($generator->getBarcode($barang->barcode, $generator::TYPE_CODE_128))?>" alt="<?= "Barcode Barang ".$barang->barcode?>" title="<?= "Barcode Barang ".$barang->barcode?> ">
                    <p><?= $barang->barcode?></p>                    
                    <a href="<?= site_url('barang/barcode_print/'.$barang->kode_brg) ?>" class="btn btn-default btn-sm" target="_blank">
                        <i class="fas fa-print"></i> Print Barcode
                    </a>
                    <?php else: ?>
                        Tidak dapat melihat barcode
                    <?php endif;?>                    
                </td>
            </tr>
        </table>
    </div>    
</div>