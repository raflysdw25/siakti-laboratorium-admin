<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();                
        $this->load->library('form_validation');        
        date_default_timezone_set("Asia/Jakarta");
    }

    // Menampilkan halaman utama peminjaman
    public function index(){
        $this->template->load('template_client', 'client/index');
    }
    
    // Menampilkan Halaman utama
    public function panduan()
    {        
        $this->template->load('template_client', 'client/panduan');
    }
    
    // Proses mendaftarkan kartu tanda mahasiswa 
    public function daftar()
    {        
    	$this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('no_ktm', 'No Kartu', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');

        if($this->form_validation->run() == FALSE)
    	{
            $this->template->load('template_client', 'client/daftar');
		} else {			            
            $post = $this->input->post(); 
            $put_nokartu = updateData('mahasiswa/updateKartu', $post);            

            if($put_nokartu->responseCode = '00'){
                $this->session->set_flashdata('success', 'KTM Berhasil didaftarkan');
                redirect('client');                                        
            }else{
                $this->session->set_flashdata('failed', 'KTM Gagal didaftarkan');
                redirect('client/daftar');                                        
            }          
    	}        
    }
    

    public function pilihPeminjam($page)
    {
        $data["page"] = $page;
        $this->template->load('template_client', 'client/pilihan', $data);
    }


    // PEMINJAMAN MAHASISWA

    // Menampilkan halaman identifikasi kartu tanda mahasiswa dengan cara di swipe
    public function stripeCard($page)
    {        
        $this->form_validation->set_rules('no_ktm', 'No Kartu', 'required');
        
        // Mendapatkan no ktm dari swipe card
        function getBetween($content,$start,$end)
        {
            $r = explode($start, $content);
            if (isset($r[1]))
                {
                    $r = explode($end, $r[1]);
                    return $r[0];
                }
            return '';
        }


        $content = $this->input->post      ('no_ktm');
        if ($content[0] == '%') {
            $start = "%B";
            $end = "^";
            
            $no_ktm = getBetween($content, $start, $end);
        }else{
            $no_ktm = $content;
        }



        if($this->form_validation->run() == FALSE){            
            $this->template->load('template_client', 'client/mahasiswa/stripe_card');
		} else {
            if($page == "pinjam"){
                redirect('client/card_data/'.$no_ktm);                    
            }else{
                redirect('client/kembalikan-data/'.$no_ktm);
            }			
    	} 
    }
    
    // Menampilkan data mahasiswa yang melakukan peminjaman
    public function card_data($no_ktm)
    {        
        $mahasiswa = retrieveData('mahasiswa/kartuMahasiswa?no_ktm='.$no_ktm);
                              
        if($mahasiswa->responseCode == '200'){                
            $data['mahasiswa'] = $mahasiswa->data[0];            
            $this->template->load('template_client', 'client/mahasiswa/card_data',$data);                                                   
        }else{
            $this->session->set_flashdata('failed', 'KTM belum didaftarkan');
            redirect('client');
        }          
    }

    

    // Membuat row peminjaman berdasarkan nim dan kode_peminjaman
    public function createPeminjamanMahasiswa($mahasiswa_nim)
    {               
        
        $check_peminjam = retrieveData('laboratorium/peminjaman/pinjammahasiswa?mahasiswa_nim='.$mahasiswa_nim);        
        $last_mahasiswa_meminjam = end($check_peminjam->data);
        if($last_mahasiswa_meminjam->status == "SUCCESS" || $last_mahasiswa_meminjam->status == "NEED APPROVAL" ){
            $this->session->set_flashdata('failed', 'Mahasiswa sedang melakukan peminjaman');
            redirect('client'); 
        }else{            
            $post = $this->input->post();
            $post["mahasiswa_nim"] = $mahasiswa_nim;            
           
            $newPeminjaman = postData('laboratorium/peminjaman', $post);         
            $getPeminjaman = $newPeminjaman->data;
            $kd_pjm = $getPeminjaman->kd_pjm;

            if($newPeminjaman->responseCode == "00"){
                redirect(site_url('client/form-mahasiswa/'.$kd_pjm));
            }
        }

    }

    // Proses peminjaman Mahasiswa
    public function form_peminjaman($kd_pjm)
    {                
        $this->form_validation->set_rules('kd_pjm', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('staff_penanggungjawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('tgl_blk', 'Waktu Pengembalian', 'required');        
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');        
        $this->form_validation->set_rules('mahasiswa_nim', 'Mahasiswa', 'required');
        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');                

        if($this->form_validation->run() === FALSE){                        
            $peminjaman = retrieveData('laboratorium/peminjaman?kd_pjm='.$kd_pjm);
            $peminjaman = $peminjaman->data[0];
            
            if($peminjaman == null){
                redirect('client');
            }else{                                                
                // Ambil data ruangan                
                $ruangan = retrieveData('laboratorium/ruangan');
                $ruangan = $ruangan->data;

                // Ambil data untuk staff penanggung jawab
                $staff = retrieveData('staff');
                $staff = $staff->data;
        
                $data = [
                    'peminjaman' => $peminjaman,
                    'ruangan' => $ruangan,
                    'staff' => $staff
                ];
                $this->template->load('template_client', 'client/mahasiswa/form_peminjaman', $data);
            }
        }else{
            $post = $this->input->post();
            $post['tgl_pjm'] = date('Y-m-d H:i:s');
            $post['tgl_blk'] = date_format(date_create($post['tgl_blk']), 'Y-m-d H:i:s');

            // Menentukan Status Peminjaman, 
            $difference = abs(strtotime($post["tgl_blk"]) - strtotime($post["tgl_pjm"]))/3600;
            
            // jika lebih dari 12 jam, maka perlu approval (Atur status NEED Approval)
            if($difference > 12){
                $post["status"] = "NEED APPROVAL";                
            }else{
                $post["status"] = "SUCCESS";
            }
            
            // Cek apakah sudah pinjam alat atau belum                        
            $detailPeminjaman = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$post["kd_pjm"]);
            $detailPeminjaman = $detailPeminjaman->data;
            
            if($detailPeminjaman == null){ //Jika belum melakukan peminjaman               
                $this->session->set_flashdata('failedPeminjaman', 'Silahkan Tentukan barang yang ingin dipinjam');
                redirect('client/form-mahasiswa/'.$post["kd_pjm"]);
            }else{
                // Update Data Pinjam Barang                
                $post["staff_nip"] = ($post["staff_nip"] == null) ? null : $post["staff_nip"];                
                $updatePeminjaman = updateData('laboratorium/peminjaman', $post);
                
                if($updatePeminjaman->responseCode == "00"){
                    if($post["status"] == "NEED APPROVAL"){
                        $this->session->set_flashdata('approval', 'Diharapkan untuk menghubungi laboratorium, untuk mendapatkan persetujuan');
                        redirect('client/success');
                    }else{
                        $this->session->set_flashdata('confirm', 'Diharapkan untuk mengembalikan barang tepat pada waktunya');
                        redirect('client/success');
                    }
                }
            }
        }       

    }
    // --END PEMINJAMAN MAHASISWA

    // PENGEMBALIAN PEMINJAMAN

    // Menampilkan Barang yang dikembalikan
    public function kembalikan_data($no_ktm)
    {
        // $result = $this->Mahasiswa_m->kartuMahasiswa_get($no_ktm);
        $getMahasiswa = retrieveData('mahasiswa/kartuMahasiswa?no_ktm='.$no_ktm);
        
        $mahasiswa = $getMahasiswa->data[0];
        
        // GET Data Peminjaman
        $getPeminjam = retrieveData('laboratorium/peminjaman/pinjammahasiswa?mahasiswa_nim='.$mahasiswa->nim);                    
        $peminjaman = $getPeminjam->data;        
        
        $numItems = count($peminjaman);
        $i = 0;
        
        foreach(array_reverse($peminjaman) as $key => $pinjambrg){
            if($pinjambrg->status == "FINISH" || $pinjambrg->status == "NEED APPROVAL"){
                if(++$i === $numItems){
                    // var_dump($key); exit;
                    $this->session->set_flashdata('failed', 'Tidak ada peminjaman mahasiswa yang harus dikembalikan');
                    redirect('client');
                }
                continue;
            }else{
                               
                $data = ['mahasiswa' => $mahasiswa, 'pinjambrg' => $pinjambrg];
                $this->template->load('template_client', 'client/mahasiswa/kembalikan_data', $data);

            }
            
        }       

    }

    // Verifikasi apakah barang yang discan di barcode sesuai dengan data barang yang dipinjam
    public function confirm_return()
    {
        $post = $this->input->post();

        // Ambil barang berdasarkan barcode yang di scan
        $barcode = $post["barcode"];        
        $getBarang = retrieveData('laboratorium/barang/barcodeBarang?barcode='.$barcode);
        $barang = $getBarang->data[0];

        // Ambil peminjaman detail berdasarkan id_detail
        $id_detail = $post["id_detail"];
        $getDetail = retrieveData('laboratorium/peminjamandetail/detailGet?id_detail='.$id_detail);
        $detail = $getDetail->data[0];

        if($barang->kode_brg == $detail->barang_kode_brg){
            $post["kode_brg"] = $barang->kode_brg;
            $post["status"] = "TERSEDIA";
            $post["kondisi"] = $barang->kondisi;
    
            $putBarang = updateData('laboratorium/barang/updateStatus', $post);
    
            if($putBarang->responseCode == "00"){
                echo json_encode($putBarang);
            }
        }else{
            return false;
        }
    }

    // Prose Pengembalian Barang
    public function updatePengembalian($kd_pjm, $id)
    {
        $post = $this->input->post(null,true);

        $getPeminjaman = retrieveData('laboratorium/peminjaman?kd_pjm='.$kd_pjm);
        $peminjaman = $getPeminjaman->data[0];
                

        if($peminjaman->status == "SUCCESS" || $peminjaman->status == "APPROVE"){
            // Cek Apakah barang sudah diverifikasi
            $getDetail = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$kd_pjm);
            $details = $getDetail->data;
            foreach($details as $detail){
                $getBarang = retrieveData('laboratorium/barang?kode_brg='.$detail->barang_kode_brg);
                $barang = $getBarang->data[0];                

                if($barang->asal_pengadaan == "Barang Habis Pakai"){
                    $post["kode_brg"] = $barang->kode_brg;
                    $post["status"] = "TIDAK TERSEDIA";
                    $post["kondisi"] = "HABIS";
                    $putBarang = updateData('laboratorium/barang/updatestatus', $post);                                    
                }elseif($barang->status == "DIGUNAKAN"){
                    $this->session->set_flashdata('failed', 'Terdapat barang yang belum diverifikasi');
                    if($peminjaman->no_ktm == $id){
                        redirect('client/kembalikan-data/'.$id);
                    }else{
                        redirect('client/return-data/'.$id);
                    }
                }
            }                                    
            $post['tgl_blk_real'] = date('Y-m-d H:i:s');
            $post["kd_pjm"]  = $kd_pjm;
                        
            $updatePengembalian = updateData('laboratorium/peminjaman/updateKembali', $post);
            if($updatePengembalian->responseCode == "00"){
                $this->session->set_flashdata('success', 'Pengembalian Berhasil dilakukan');
                redirect('client');            
            }
        }else{
            $this->session->set_flashdata('failed', 'Tidak Dapat Mengembalikan Alat');
            redirect('client');
        }
    }


    // Melakukan pembatalan peminjaman
    public function cancelPeminjamanMahasiswa($kd_pjm){
        $post = $this->input->post(null,true);
        $post["kd_pjm"] = $kd_pjm;
        $post["pinjambrg_kd_pjm"] = $kd_pjm;        
        $getDetails = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$kd_pjm);
        $details = $getDetails->data;
        
        if($details == null){                         
            $deletePeminajaman = deleteData('laboratorium/peminjaman', $post);
            if($deletePeminajaman->responseCode == "00" ){
                $this->session->set_flashdata('failed', 'Peminjaman batal dilakukan');
                redirect('client');
            }else{
                $this->session->set_flashdata('failed', 'Peminjaman gagal dibatalkan');
                redirect(site_url('client/form-mahasiswa/'.$kd_pjm));
            }
        }else{
            foreach($details as $detail){
                // Mengubah Status Barang jadi Tersedia
                $post["kode_brg"] = $detail->barang_kode_brg;
                $post["status"] = "TERSEDIA";
                $putBarang = updateData('laboratorium/barang/updatestatus',$post);
            }
            
            $deleteDetail = deleteData('laboratorium/peminjamandetail', $post);
            if($deleteDetail->responseCode == "00"){                
                $deletePeminjaman = deleteData('laboratorium/peminjaman',$post);            
                $this->session->set_flashdata('failed', 'Peminjaman batal dilakukan');
                redirect('client');
            }            
        }        
    }

    
    // PEMINJAMAN DOSEN
    public function nipInput($page){
        $validation = $this->form_validation;
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $nip = $this->input->post('nip');
        
        if($this->form_validation->run() == FALSE){  
            $data["page"] = $page;
            $this->template->load('template_client', 'client/staff/nip_input', $data);
		} else {
            if($page == "pinjam"){                 

                $check_peminjam = retrieveData('laboratorium/peminjaman/pinjamstaff?staff_nip='.$nip);        
                $last_meminjam = end($check_peminjam->data);
                
                if($last_meminjam->status == "SUCCESS" || $last_meminjam->status == "NEED APPROVAL"){
                    $this->session->set_flashdata('failed', 'Staff sudah melakukan peminjaman');
                    redirect('client'); 
                }else{                    
                    $post = $this->input->post();
                    $post["staff_nip"] = $nip;                    
                
                    $newPeminjaman = postData('laboratorium/peminjaman', $post); 
                    if($newPeminjaman->responseCode == "00"){
                        $getPeminjaman = $newPeminjaman->data;
                        $kd_pjm = $getPeminjaman->kd_pjm;        
                        redirect(site_url('client/form-staff/'.$kd_pjm));
                    }
                }                            
            }else{
                redirect('client/return-data/'.$nip);
            }			
    	}
    }


    public function form_staff($kd_pjm)
    {
        date_default_timezone_set("Asia/Jakarta");        
        $this->form_validation->set_rules('kd_pjm', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('staff_nip', 'NIP Staff tidak ada', 'required');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('tgl_blk', 'Tanggal Kembali', 'required');        


        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($this->form_validation->run() == FALSE){            
            $peminjaman = retrieveData('laboratorium/peminjaman?kd_pjm='.$kd_pjm);
            $peminjaman = $peminjaman->data[0];

            if($peminjaman == null){
                redirect('client');
            }else{                
                // Ambil data ruangan                
                $ruangan = retrieveData('laboratorium/ruangan');
                $ruangan = $ruangan->data;                
        
                $data = [
                    'peminjaman' => $peminjaman,                    
                    'ruangan' => $ruangan                    
                ];
                $this->template->load('template_client', 'client/staff/form_staff', $data);
            }
        }else{
            $post = $this->input->post();
                       
            // Cek apakah sudah pinjam alat atau belum                        
            $detailPeminjaman = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$post["kd_pjm"]);
            $detailPeminjaman = $detailPeminjaman->data;
            if($detailPeminjaman == null){                
                $this->session->set_flashdata('failedPeminjaman', 'Silahkan Tentukan barang yang ingin dipinjam');
                redirect('client/form-staff/'.$post["kd_pjm"]);
            }else{
                // Update Data Pinjam Barang
                // $post["staff_penanggungjawab"] = ($post["staff_penanggungjawab"] == "") ? null : $post["staff_penanggungjawab"];
                // $post["mahasiswa_nim"] = ($post["mahasiswa_nim"] == "") ? null : $post["mahasiswa_nim"];

                $post['tgl_pjm'] = date('Y-m-d H:i:s');
                $post['tgl_blk'] = date_format(date_create($post['tgl_blk']), 'Y-m-d H:i:s');
                $difference = abs(strtotime($post["tgl_blk"]) - strtotime($post["tgl_pjm"]))/3600;
                
                if($difference > 6){
                    $post["status"] = "NEED APPROVAL";
                }else{
                    $post["status"] = "SUCCESS";
                }

                $updatePeminjaman = updateData('laboratorium/peminjaman', $post);
                
                if($updatePeminjaman->responseCode == "00"){
                    if($post["status"] == "NEED APPROVAL"){
                        $this->session->set_flashdata('approval', 'Diharapkan untuk menghubungi laboratorium, untuk mendapatkan persetujuan');
                        redirect('client/success');
                    }else{
                        $this->session->set_flashdata('confirm', 'Diharapkan untuk mengembalikan barang tepat pada waktunya');
                        redirect('client/success');
                    }
                }
            }
        }
    }
    
    // Pengembalian Staff
    public function return_data($nip)
    {                        
        $getPeminjam = retrieveData('laboratorium/peminjaman/pinjamStaff?staff_nip='.$nip);                         
        $peminjaman = $getPeminjam->data;   
        // $key = array_keys($peminjaman); 
        // $last_key = end($key);
        $numItems = count($peminjaman);
        $i = 0;
        // var_dump($key); exit;
        foreach(array_reverse($peminjaman) as $key => $pinjambrg){
            if($pinjambrg->status == "FINISH" || $pinjambrg->status == "NEED APPROVAL"){
                if(++$i === $numItems){
                    // var_dump($key); exit;
                    $this->session->set_flashdata('failed', 'Tidak ada peminjaman staff yang harus dikembalikan');
                    redirect('client');
                }
                continue;
            }else{                
                $data = ['pinjambrg' => $pinjambrg];
                $this->template->load('template_client', 'client/staff/return_data', $data);

            }
            
        }
        
    }

    // --END PEMINJAMAN DOSEN

    // --END PENGEMBALIAN

    // AJAX PROSES

    // Penambahan Detail Barang yang dipinjam untuk proses ajax
    public function tambahBarang()
    {
        $post = $this->input->post(null,true);        
                        
        $barcode = $post["barcode"];        
        $getBarang = retrieveData('laboratorium/barang/barcodeBarang?barcode='.$barcode);
        $barang = $getBarang->data[0];        

        if($barang->status == "TERSEDIA"){
            // Ubah Status Barang jadi DIGUNAKAN
            $post["kode_brg"] = $barang->kode_brg;
            $post["status"] = "DIGUNAKAN";
            $post["kondisi"] = $barang->kondisi;
            $putBarang = updateData('laboratorium/barang/updateStatus', $post);            
    
            // Tambah Detail Peminjaman Barang        
            $post["barang_kode_brg"] = $barang->kode_brg;
            $pinjambrg_detail = postData('laboratorium/peminjamandetail',$post);        
                            
    
            if($pinjambrg_detail->responseCode == "00" && $putBarang->responseCode == "00"){
                echo json_encode($pinjambrg_detail); 
            }            
        }

    }

    // Detail Peminjaman untuk proses Ajax
    public function detail_barang_pinjam($kd_pjm)
    {        
        $getDetail = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$kd_pjm);
        $pinjambrg_detail = $getDetail->data;       
        echo json_encode($pinjambrg_detail); 
    }

    // Delete detail barang yang dipinjam untuk proses Ajax
    public function deleteDetail()
    {
        $post = $this->input->post(null, true);
        

        // Ubah Status Barang jadi TERSEDIA
        $getDetail = retrieveData('laboratorium/peminjamandetail/detailGet?id_detail='.$post["id_detail"]);
        $detail = $getDetail->data[0];
        
        $post["kode_brg"] = $detail->barang_kode_brg;
        $post["status"] = "TERSEDIA";
        $putBarang = updateData('laboratorium/barang/updatestatus', $post);
        
        
        if($putBarang->responseCode == "00"){
            $deleteDetail = deleteData('laboratorium/peminjamandetail/deleteDetail', $post);
            echo json_encode($deleteDetail);
        }
            
    }

    // -- END AJAX PROSES

    // CONFIRM PAGE

    // Sukses Peminjaman
    public function success_confirm(){
        $this->template->load('template_client', 'client/success_confirm');
    }
}
