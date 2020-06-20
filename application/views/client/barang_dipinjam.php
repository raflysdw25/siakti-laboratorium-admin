<h4>Barang yang Dipinjam</h4>

<a href="javascript:void(0);" id="btn-add" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add">
    <span class="fa fa-plus"></span> Pinjam Barang
</a>

<table class="table mt-4">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah yang di pinjam</th>
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


<!-- MODAL ADD -->
<form>
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Barang yang ingin dipinjam</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="form-group">
                    <label for="barcode" >Barcode Barang</label>
                    <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Product Code" autofocus>                                
                </div>                
                <div class="form-group">
                    <label>Jumlah yang dipinjam</label>                                
                    <input type="number" name="jumlah" id="price" class="form-control" placeholder="Price">                                
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
        </div>
        </div>
    </div>
    </div>
</form>
<!--END MODAL ADD-->