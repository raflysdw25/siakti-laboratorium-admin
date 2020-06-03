
<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table text-nowrap table-bordered">
            <tr>
                <th>Jenis Barang</th>
                <td><?= $barang->jenis ?></td>
            </tr>
            <tr>
                <th>Satuan</th>
                <td><?= $barang->satuan ?></td>
            </tr>
            <tr>
                <th>Jumlah Barang</th>
                <td><?= $barang->jml ?></td>
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
                <td><?= $barang->supplier_nama_supp ?></td>
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
                    <img src="<?= 'data:image/png;base64,'.base64_encode($generator->getBarcode($barang->kode_brg, $generator::TYPE_CODE_128))?>" alt="<?= "Barcode Barang ".$barang->kode_brg?>" title="<?= "Barcode Barang ".$barang->kode_brg?> ">                    
                </td>
            </tr>
        </table>
    </div>
</div>
