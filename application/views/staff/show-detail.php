<table class="table table-responsive-sm table-borderless">
    <tr>
        <th>Nama Lengkap</th>
        <td><?= $staff->nama ?></td>
    </tr>
    <tr>
        <th>Telepon</th>
        <td><?= $staff->tlp_staff ?></td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td><?= $staff->alamat ?></td>
    </tr>
    <tr>
        <th>Kelurahan</th>
        <td><?= ($staff->kel_staff == null) ? "Tidak dicantumkan" : $staff->kel_staff ?></td>
    </tr>
    <tr>
        <th>Kecamatan</th>
        <td><?= ($staff->kec_staff == null) ? "Tidak dicantumkan" : $staff->kec_staff ?></td>
    </tr>
    <tr>
        <th>Kota</th>
        <td><?= $staff->kota_staff ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?= $staff->email_staff ?></td>
    </tr>
    <tr>
        <th>Jabatan</th>
        <td><?= ($staff->jabatan == null) ? "Belum ditentukan" : $staff->jabatan ?></td>
    </tr>
</table>        