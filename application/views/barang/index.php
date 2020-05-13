<section class="content-header">
    <h1>Barang
        <small>Data Barang</small>
    </h1>
    <ol class="breakcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Barang</li>
    </ol>
</section>

<!-- <Main content> -->
    <section class="content">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Barang</h3>
                <div class="pull-right">
                    <a href="<?=site_url('staff/add')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <?php print_r($row->result()) ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Spesifikasi Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Satuan</th>
                            <th>Tahun Pengadaan</th>
                            <th>Asal Pengadaan</th>
                            <th>Supplier</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            # code...
                        <tr>
                            <td><?$no++?></td>
                            <td><?=$data->kode_brg?></td>
                            <td><?=$data->nama_brg?></td>
                            <td><?=$data->jenis?></td>
                            <td><?=$data->spesifikasi?></td>
                            <td><?=$data->jml?></td>
                            <td><?=$data->satuan?></td>
                            <td><?=$data->thn_pengadaan?></td>
                            <td><?=$data->asal_pengadaan?></td>
                            <td><?=$data->supplier_nama_supp?></td>
                            <td class="text-center" width="60px">
                                 <form action="<?=site_url('barang/del')?>" method="post">
                                <a href="<?=site_url('barang/edit/' .$data->kode_brg)?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil"></i>
                                </a>
                               
                                    <input type="hidden" name="kode_brg" value="<?$data->kode_brg?>">
                                    <button onclick="return confirm('Apakah Anda Yakin Menghapus?')" 
                                    class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                </table>
                
            </div>
        </div>
        
    </section>