<div class="content-header">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-12">
                <a href="<?= site_url('staff/addstruktural')?>" class="btn btn-primary">
                <i class="fas fa-plus"></i>  Tambah Posisi
                </a>                         
            </div>
        </div>        
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
            <table class="table text-nowrap" id="datatable">
                <thead>
                <tr>                      
                    <th>ID Struktural</th>
                    <th>Nama Jabatan</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($strukturals as $struktural):?>
                <tr>
                    <td><?= $struktural->id_jablab_struk ?></td>
                    <td><?= $struktural->nama_jab ?></td>
                    <td>
                        <a href="<?= site_url('staff/editstruktural/'.$struktural->id_jablab_struk) ?>" class="btn btn-info" data-toggle="tooltip" title="Edit Jabatan" data-placement="top">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <?php if($struktural->nama_jab !== 'PLP'): ?>
                        <a href="<?= site_url('staff/hapusstruktural/'.$struktural->id_jablab_struk) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger" data-toggle="tooltip" title="Hapus Jabatan" data-placement="top">
                            <i class="fas fa-trash"></i>
                        </a>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
    
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<script>
    $(function () {
        $('#datatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>