<div class="box">
    <div class="box-header">
        <h3 class="box-title">Peminjaman</h3>
        <div class="pull-right">
            <a href="supplier/add" class="btn btn-primary btn-flat">
                <i class="fa fa-user-plus"></i>Create
            </a>
        </div>
    </div>
    <div class="box-body table-responsive">
        <?php print_r($row->result()) ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Pinjaman</th>
                    <th>tanggal start pinjam</th>
                    <th>tanggal kembali end</th>
                    <th>tanggal kembali real</th>
                    <th>ruangan namaruang</th>
                    <th>mahasiswa nim</th>
                    <th>mahasiswa nim</th>
                    <th>tujuan pinjam</th>
                    <th>staff nip</th>
                    <th>jadwal kuliah kode jadwal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    # code...
                <tr>
                    <td><?$no++?></td>
                    <td><?=$data->kode_pinjam?></td>
                    <td><?=$data->tgl_pinjam_start?></td>
                    <td><?=$data->tgl_kembali_end?></td>
                    <td><?=$data->tgl_kembali_real?></td>
                    <td><?=$data->ruangan_namaruang?></td>
                    <td><?=$data->mahasiswa_nim?></td>
                    <td><?=$data->tujuan_pinjam?></td>
                    <td><?=$data->staff_nip?></td>
                    <td><?=$data->jadwal_kul_kodejdwl?></td>
                    <td class="text-center" width="60px">
                        <a href="<?=site_url('user/edit/')?>" class="btn btn-primary btn-xs">
                            <i class="fa fa-pencil"></i>Update
                        </a>
                        <a href="<?=site_url('user/edit/')?>" class="btn btn-danger btn-xs">
                            <i class="fa fa-pencil"></i>Delete
                        </a>
                    </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
        
    </div>
</div>