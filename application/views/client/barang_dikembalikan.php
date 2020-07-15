<table class="table mt-4">
    <thead class="thead-dark">
        <tr>                                    
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>                                    
            <th>Verifikasi Pengembalian</th>                                    
        </tr>
    </thead>
    <tbody id="detailBarang">                                
    </tbody>
</table>

<!-- MODAL ADD -->
<form autocomplete="off">
    <div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Barang yang ingin dikembalikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                                        
                    <div class="form-group"> 
                        <label for="barcode">Barcode Barang</label> 
                        <input type="hidden" name="id_detail" id="id_detail">                        
                        <input type="text" name="barcode" id="barcode" class="form-control" placeholder="Barcode barang" autofocus>                                
                        <p id="barcodeInput"></p>
                    </div>
                    <div class="form-group"> 
                        <label for="status">Status Barcode</label>                                                                              
                        <p id="status"></p>
                        <p id="errorMessage" class="text-danger"></p>
                    </div>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" type="submit" id="btn_save" class="btn btn-primary">Konfirmasi</button>
            </div>
        </div>
    </div>
    </div>
</form>
<!--END MODAL ADD-->

<script>
    $(document).ready(function(){
        showDetailBarang();

        $('.modal').on('shown.bs.modal', function() {
              $(this).find('[autofocus]').focus();
        });
        

        function showDetailBarang(){
            $.ajax({
                type  : 'ajax',
                url   : '<?= site_url('client/detail/'.$pinjambrg->kd_pjm)?>',
                async : true,
                dataType : 'json',                
                success : function(details){
                    let html = '';                                       
                    details.forEach( function(detail,index){
                             html += `<tr>                                    
                                    <td>${detail.barcode}</td>
                                    <td>${detail.nama_brg}</td>
                                    <td>${(detail.nama_jenis == null) ? `Jenis tidak ditentukan` : detail.nama_jenis}</td>                                    
                                    <td>
                                        ${(detail.status == 'DIGUNAKAN' && detail.asal_pengadaan != 'Barang Habis Pakai') ? `                                        
                                        <a href="javascript:void(0);" class="item_barang btn btn-primary btn-sm" data-id_detail="${detail.id_detail}">
                                            Konfirmasi Pengembalian
                                        </a>`
                                        : 'Barang terkonfirmasi'}
                                    </td>
                                </tr>`;                                                        
                    });
                    $('#detailBarang').html(html);
                }
 
            });
        }

        $('#detailBarang').on('click','.item_barang',function(){
            let id_detail = $(this).data('id_detail');
             
            $('#modal_confirm').modal('show');
            $('[name="id_detail"]').val(id_detail);
            $('[name="barcode"]').val("");                        
            $('#barcode').attr('type', 'text');
            $('#barcodeInput').hide();
            $('#errorMessage').hide();
            $('#status').show(); 
            $('#status').text('Silahkan Scan Barcode Barang'); 
        });        

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

        $('#btn_save').on('click',function(){            
            let barcode = $('#barcode').val();
            let id_detail = $('#id_detail').val();                        
            $.ajax({
                type : "POST",
                url  : "<?= site_url('client/confirm-return')?>",
                dataType : "JSON",
                data : {           
                    id_detail:id_detail,         
                    barcode:barcode                    
                },
                success: function(data){
                    $('[name="barcode"]').val("");                                        
                    $('#modal_confirm').modal('hide');
                    showDetailBarang();
                },
                error: function(message){
                    console.log(message);
                    $('#errorMessage').show();
                    $('#barcode').attr('type', 'text');
                    $('#status').hide();
                    $('#barcodeInput').hide();
                    $('#errorMessage').text("Barang tidak sesuai");
                    $('#barcode').val("");                    
                    $('#barcode').prop('readonly', false);
                    $('#barcode').focus();
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
</script>