<form action="<?= site_url('barang/ubahStatus') ?>" method="post">
    <div class="form-group">
        <label for="#">Kode Barang</label>
        <input type="number" name="kode_brg" id="kode_brg" class="form-control" value="<?= $barang->kode_brg ?>" readonly> 
    </div>                                   
    <div class="form-group">
        <label>Jumlah</label>                                
        <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" min="1" max="<?= $barang->jumlah?>">                                
    </div>
    <button type="submit" id="btn_save" class="btn btn-primary">Simpan</button>
</form>