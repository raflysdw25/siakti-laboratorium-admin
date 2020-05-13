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
                    <th>Kode Peminjaman</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Tanggal Pengembalian Real</th>
                    <th>Nama Ruangan</th>
                    <th>NIM Mahasiswa</th>
                    <th>Tujuan Pinjam</th>
                    <th>NIP Staff</th>
                    <th>Kode Jadwal Kuliah</th>
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
                        <a href="<?=site_url('peminjaman/look/')?>" class="btn btn-primary btn-xs">
                        <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?=site_url('peminjaman/edit/')?>" class="btn btn-primary btn-xs">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="<?=site_url('peminjaman/edit/')?>" class="btn btn-danger btn-xs">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
        
    </div>
</div>