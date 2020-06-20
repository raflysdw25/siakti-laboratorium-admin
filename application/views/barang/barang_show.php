
<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table text-nowrap table-bordered">
            <tr>
                <th>Jenis Barang</th>
                <td><?= $barang->jenis ?></td>
            </tr>            
            <tr>
                <th>Status Barang</th>
                <td><span class="badge <?= ($barang->status == "TERSEDIA") ? "badge-success": "badge-danger" ?>"><?= $barang->status ?></span></td>
            </tr>
            <tr>
                <th>Tahun Pengadaan</th>
                <td><?= $barang->thn_pengadaan ?></td>
            </tr>            
            <tr>
                <th>Jumlah</th>
                <td><?= ($barang->jumlah == 0)? 0 : $barang->jumlah." ".$barang->satuan ?></td>
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
                    <img src="<?= 'data:image/png;base64,'.base64_encode($generator->getBarcode($barang->barcode, $generator::TYPE_CODE_128))?>" alt="<?= "Barcode Barang ".$barang->barcode?>" title="<?= "Barcode Barang ".$barang->barcode?> ">                    
                </td>
            </tr>
        </table>
    </div>    
</div>

<form action="" method="post" class="p-2">
    <div class="row">
        <?php if($barang->status == "RUSAK" || $barang->status == "HABIS" ): ?>
        <div class="col-4">
            <a href="<?= site_url('barang/ubahStatus/'.$barang->kode_brg."/TERSEDIA"); ?>" class="btn btn-success btn-block">TERSEDIA</a>
        </div>
        <?php endif;?>

        <?php if(($barang->status !== "TERSEDIA" || $barang->status !== "DIGUNAKAN") && ($barang->status !== "RUSAK")): ?>
        <div class="col-4">
            <a href="<?= site_url('barang/ubahStatus/'.$barang->kode_brg."/RUSAK"); ?>"  class="btn btn-danger btn-block">RUSAK</a>
        </div>
        <?php endif;?>

        <?php if(($barang->status !== "TERSEDIA" || $barang->status !== "DIGUNAKAN") && ($barang->asal_pengadaan == "Barang Habis Pakai" && $barang->status !== "HABIS")): ?>
        <div class="col-4">
            <a href="<?= site_url('barang/ubahStatus/'.$barang->kode_brg."/HABIS"); ?>"  class="btn btn-warning btn-block">HABIS</a>
        </div>
        <?php endif;?>
    </div>        
</form>

