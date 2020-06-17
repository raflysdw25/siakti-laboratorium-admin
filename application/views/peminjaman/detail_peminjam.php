<div class="card">
    <div class="card-body table-responsive p-0">
        <table class="table text-nowrap table-bordered">
            <tr>
                <th>Nomor Induk Peminjam</th>
                <td>
                <?= ($mahasiswa !== null)? $mahasiswa->nim  : $staff->nip ?>
                </td>
           </tr>
           <tr>
                <th>Nama Peminjam</th>
                <td>
                    <?= ($mahasiswa !== null)? $mahasiswa->nama_mhs  : $staff->nama ?>
                </td>
           </tr>
           <tr>
                <th>Alamat Peminjam</th>
                <td>
                    <?= ($mahasiswa !== null)? $mahasiswa->add_mhs  : $staff->alamat ?>
                </td>
           </tr>
           <tr>
                <th>Telepon Peminjam</th>
                <td>
                    <?= ($mahasiswa !== null)? $mahasiswa->tlp_mhs  : $staff->tlp_staff ?>
                </td>
           </tr>           
           <tr>
                <th>Email Peminjam</th>
                <td>
                    <?= ($mahasiswa !== null)? $mahasiswa->email_mhs  : $staff->email_staff ?>
                </td>
           </tr>
           <tr>
                <th>Status Peminjam</th>
                <td>
                    <?= $peminjam ?>
                </td>
           </tr>                              
        </table>
    </div>
</div>
