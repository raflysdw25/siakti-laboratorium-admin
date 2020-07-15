<h4>Barang yang Dipinjam</h4>

<a href="javascript:void(0);" id="btn-add" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add">
    <span class="fa fa-plus"></span> Pinjam Barang
</a>

<table class="table mt-4 datatable">
    <thead class="thead-dark">
        <tr>
            <th>ID Detail</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="detailBarang">
        
    </tbody>
</table>
<small class="text-muted">Silahkan scan barcode barang yang ingin dipinjam</small>


<!-- MODAL ADD -->
<form autocomplete="off">
    <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang yang ingin dipinjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                                        
                    <div class="form-group"> 
                        <label for="barcode">Barcode Barang</label>                       
                        <input type="hidden" name="pinjambrg_kd_pjm" id="pinjambrg_kd_pjm" class="form-control" value="<?= $peminjaman->kd_pjm?>">                                
                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode barang" autofocus>                                
                        <p id="barcodeInput"></p>
                    </div>
                    <div class="form-group"> 
                        <label for="status">Status Barang</label>                                                                              
                        <p id="status"></p>
                        <p id="errorMessage" class="text-danger"></p>
                    </div>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
    </div>
</form>
<!--END MODAL ADD-->

<!--MODAL DELETE-->
<form action="" method="post">
    <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete this record?</strong>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_detail" id="id_detail" class="form-control">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--END MODAL DELETE-->


<script type="text/javascript">    
    $(document).ready(function(){
        showDetailBarang();

        

        $("#barcode").change(function(){
            $('[name="barcode"]').each(function(){
                if($(this).val().length > 0){
                    let barcode = $('#barcode').val();
                    // $('#barcode').prop('readonly', true);                    
                    $('#barcode').attr('type', 'hidden');
                    $('#status').show();
                    $('#status').text('BARCODE VALID');
                    $('#errorMessage').hide();
                    $('#barcodeInput').show();
                    $('#barcodeInput').text(barcode);
                }
            });
        }).change();

        $('.modal').on('shown.bs.modal', function() {
              $(this).find('[autofocus]').focus();
        });
        
        $("#btn-add").on('click', function(){
            $('[name="barcode"]').val("");            
            $('[name="barcode"]').prop('readonly', false);
            $('#barcode').attr('type', 'text');
            $('#barcodeInput').hide();
            $('#errorMessage').hide();
            $('#status').show(); 
            $('#status').text('Silahkan Scan Barcode Barang'); 
        });

        function showDetailBarang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= site_url('client/detail/'.$peminjaman->kd_pjm)?>',
                async : true,
                dataType : 'json',                
                success : function(details){
                    let html = '';                                       
                    details.forEach( function(detail,index){
                             html += `<tr>
                                    <td>${detail.id_detail}</td>
                                    <td>${detail.barcode}</td>
                                    <td>${detail.nama_brg}</td>
                                    <td>${detail.nama_jenis}</td>                                    
                                    <td>                                        
                                        <a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id_detail="${detail.id_detail}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>`;                                                        
                    });
                    $('#detailBarang').html(html);
                }
 
            });
        }

        $('#btn_save').on('click',function(){
            let pinjambrg_kd_pjm = $('#pinjambrg_kd_pjm').val();
            let barcode = $('#barcode').val();                        
            $.ajax({
                type : "POST",
                url  : "<?= site_url('client/tambah-barang')?>",
                dataType : "JSON",
                data : {
                    pinjambrg_kd_pjm:pinjambrg_kd_pjm,
                    barcode:barcode                    
                },
                success: function(data){
                    $('[name="barcode"]').val("");                    
                    $('[name="barcode"]').prop('readonly', false);
                    $('#Modal_Add').modal('hide');
                    showDetailBarang();
                },
                error: function(message){
                    console.log(message);
                    $('#errorMessage').show();
                    $('#barcode').attr('type', 'text');
                    $('#status').hide();
                    $('#barcodeInput').hide();
                    $('#errorMessage').text("Barang tidak dapat dipinjam");
                    $('#barcode').val("");                    
                    $('#barcode').prop('readonly', false);
                    $('#barcode').focus();
                }
            });
            return false;
        });

        //get data for delete record
        $('#detailBarang').on('click','.item_delete',function(){
            let id_detail = $(this).data('id_detail');
             
            $('#Modal_Delete').modal('show');
            $('[name="id_detail"]').val(id_detail);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            let id_detail = $('#id_detail').val();
            $.ajax({
                type : "POST",
                url  : "<?= site_url('client/delete-detail')?>",
                dataType : "JSON",
                data : {id_detail:id_detail},
                success: function(deleteDetail){
                    $('[name="id_detail"]').val("");
                    $('#Modal_Delete').modal('hide');
                    showDetailBarang();
                }, 
                error: function(message){
                    console.log(message);
                }                
            });
            return false;
        });
    });

    let delay = (function(){
        let timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        };
    })();

    $("#barcode").on("input", function() {
    delay(function(){
            if ($("#barcode").val().length < 2) {
                $("#barcode").val("");
            }
        }, 66 );
    });
    
    $('#barcode').on("cut copy paste",function(e) {
      e.preventDefault();
   });
</script>