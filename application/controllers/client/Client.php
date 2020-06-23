<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['Mahasiswa_m', 'Peminjaman_m', 'Barang_m', 'PeminjamanDetail_m', 'Ruangan_m', 'Staff_m']);
        $this->load->library('form_validation');
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
        $validation = $this->form_validation;
    	$validation->set_rules('nim', 'NIM', 'required');
        $validation->set_rules('no_ktm', 'No Kartu', 'required');

        if($validation->run() == FALSE)
    	{
            $this->template->load('template_client', 'client/daftar');
		} else {			
            $result = $this->Mahasiswa_m->updateKartu();  
            if($result->responseCode = '00'){
                $this->session->set_flashdata('success', 'KTM Berhasil didaftarkan');
                redirect('client');                                        
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
        $validation = $this->form_validation;
        $validation->set_rules('no_ktm', 'No Kartu', 'required');
        
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


        $content = $this->input->post('no_ktm');
        if ($content[0] == '%') {
            $start = "%B";
            $end = "^";
            
            $no_ktm = getBetween($content, $start, $end);
        }else{
            $no_ktm = $content;
        }



        if($validation->run() == FALSE){            
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
        $result = $this->Mahasiswa_m->kartuMahasiswa_get($no_ktm);              
        if($result->responseCode == '200'){                
            $data['mahasiswa'] = $result->data[0];            
            $this->template->load('template_client', 'client/mahasiswa/card_data',$data);                                                   
        }else if($result->responseCode == '204'){
            $this->session->set_flashdata('failed', 'KTM belum didaftarkan');
            redirect('client');
        }          
    }

    // Menampilkan Barang yang dikembalikan
    public function kembalikan_data($no_ktm)
    {
        $result = $this->Mahasiswa_m->kartuMahasiswa_get($no_ktm);
        
        $mahasiswa = $result->data[0];
        $pinjambrg = $this->Peminjaman_m->getPeminjamMahasiswa($mahasiswa->nim);                 
        
        $terakhir_pinjam = end($pinjambrg);
        $detailBarang = $this->PeminjamanDetail_m->get($terakhir_pinjam->kd_pjm);

        $data = ['mahasiswa' => $mahasiswa, 'pinjambrg' => $terakhir_pinjam, 'detailBarang' => $detailBarang];

        $this->template->load('template_client', 'client/mahasiswa/kembalikan_data', $data);


    }

    // Membuat row peminjaman berdasarkan nim dan kode_peminjaman
    public function createPeminjamanMahasiswa($mahasiswa_nim)
    {
        $maxId = number_format($this->Peminjaman_m->maxId()[0]->max);
        $nextId = ($maxId == null) ? 1 :  $maxId + 1;

        $check_peminjam = $this->Peminjaman_m->getPeminjamMahasiswa($mahasiswa_nim);
        $last_mahasiswa_meminjam = end($check_peminjam);
        if($last_mahasiswa_meminjam->status == "SUCCESS"){
            $this->session->set_flashdata('failed', 'Mahasiswa sudah melakukan peminjaman');
            redirect('client'); 
        }else{
            $result = $this->Peminjaman_m->addPeminjamanMahasiswa($nextId,$mahasiswa_nim);        
            if($result->responseCode == "00"){
                redirect(site_url('client/form-mahasiswa/'.$nextId));
            }
        }

    }

    // Prose Pengembalian Barang
    public function updatePengembalian($kd_pjm)
    {
        $peminjaman = $this->Peminjaman_m->get($kd_pjm)[0];        
        if($peminjaman->status == "SUCCESS" ){
            $details = $this->PeminjamanDetail_m->get($kd_pjm);
            foreach ($details as $detail) {
                $post = $this->input->post(null,true);
                $barang = $this->Barang_m->get($detail->barang_kode_brg)[0];
                $post["kode_brg"] = $barang->kode_brg;
                $post["jumlah"] = $barang->jumlah + $detail->jumlah;
                $post["status"] = "TERSEDIA";
                $result = $this->Barang_m->updateStatus($post); 
            }
            
            $post = $this->input->post(null, true);
            $post['tgl_blk_real'] = date('Y-m-d H:i:s');

            $post["kd_pjm"]  = $kd_pjm;

            $this->Peminjaman_m->updatePengembalian($post);
            
            $this->session->set_flashdata('success', 'Pengembalian Berhasil dilakukan');
            redirect('client');            
        }else{
            $this->session->set_flashdata('failed', 'Tidak Ada Peminjaman');
            redirect('client');
        }
    }


    // Melakukan pembatalan peminjaman
    public function cancelPeminjamanMahasiswa($kd_pjm){
        
        $details = $this->PeminjamanDetail_m->get($kd_pjm);
        // var_dump($details); exit;
        if($details == null){
            $result = $this->Peminjaman_m->delete($kd_pjm);            
            $this->session->set_flashdata('failed', 'Peminjaman batal dilakukan');
            redirect('client');
        }else{
            foreach ($details as $detail) {
                $post = $this->input->post(null,true);
                $barang = $this->Barang_m->get($detail->barang_kode_brg)[0];
                $post["kode_brg"] = $barang->kode_brg;
                $post["jumlah"] = $barang->jumlah + $detail->jumlah;
                $post["status"] = "TERSEDIA";
                $result = $this->Barang_m->updateStatus($post); 
            }
            $deleteDetail = $this->PeminjamanDetail_m->delete($kd_pjm);
            if($deleteDetail->responseCode == "00"){
                $result = $this->Peminjaman_m->delete($kd_pjm);            
                $this->session->set_flashdata('failed', 'Peminjaman dibatalkan dilakukan');
                redirect('client');
            }            
        }
    }

    // Proses peminjaman Mahasiswa
    public function form_peminjaman($kd_pjm)
    {
        date_default_timezone_set("Asia/Jakarta");
        $validation = $this->form_validation;
        $validation->set_rules('kd_pjm', 'Kode Peminjaman', 'required');
        $validation->set_rules('staff_penanggungjawab', 'Penanggung Jawab', 'required');
        $validation->set_rules('tgl_blk', 'Waktu Pengembalian', 'required');
        $validation->set_rules('ruangan_idruangan', 'Ruangan', 'required');
        $validation->set_rules('keperluan', 'Keperluan', 'required');
        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($validation->run() == FALSE){
            $peminjaman = $this->Peminjaman_m->get($kd_pjm)[0];
            if($peminjaman == null){
                redirect('client');
            }else{
                $barang = $this->Barang_m->get();
                // Pinjambrg_detail
                $ruangan = $this->Ruangan_m->get();
                $staff = $this->Staff_m->get();
        
                $data = [
                    'peminjaman' => $peminjaman,
                    'barang' => $barang,
                    'ruangan' => $ruangan,
                    'staff' => $staff
                ];
                $this->template->load('template_client', 'client/mahasiswa/form_peminjaman', $data);
            }
        }else{
            $post = $this->input->post();
            $post['tgl_pjm'] = date('Y-m-d H:i:s');
            $post['tgl_blk'] = date_format(date_create($post['tgl_blk']), 'Y-m-d H:i:s');
            
            // Cek apakah sudah pinjam alat atau belum
            $detailPeminjaman = $this->PeminjamanDetail_m->get($post["kd_pjm"]);
            if($detailPeminjaman == null){                
                $this->session->set_flashdata('failedPeminjaman', 'Silahkan Tentukan barang yang ingin dipinjam');
                redirect('client/form-mahasiswa/'.$post["kd_pjm"]);
            }else{
                // Tambah Data Pinjam Barang
                $update = $this->Peminjaman_m->updatePeminjaman($post);
                if($update->responseCode == "00"){
                    $this->session->set_flashdata('success', 'Peminjaman Berhasil dilakukan');
                    redirect('client');
                }
            }
        }       

    }


    // PEMINJAMAN DOSEN
    public function nipInput($page){
        $validation = $this->form_validation;
        $validation->set_rules('nip', 'No Kartu', 'required');
        $nip = $this->input->post('nip');
        
        if($validation->run() == FALSE){  
            $data["page"] = $page;
            $this->template->load('template_client', 'client/staff/nip_input', $data);
		} else {
            if($page == "pinjam"){
                $maxId = number_format($this->Peminjaman_m->maxId()[0]->max);
                $nextId = ($maxId == null) ? 1 :  $maxId + 1;

                $check_peminjam = $this->Peminjaman_m->getPeminjamStaff($nip);
                $last_meminjam = end($check_peminjam);
                if($last_meminjam->status == "SUCCESS"){
                    $this->session->set_flashdata('failed', 'Staff sudah melakukan peminjaman');
                    redirect('client'); 
                }else{
                    $result = $this->Peminjaman_m->addPeminjamanStaff($nextId,$nip);        
                    if($result->responseCode == "00"){
                        redirect(site_url('client/form-staff/'.$nextId));
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
        $validation = $this->form_validation;
        $validation->set_rules('kd_pjm', 'Kode Peminjaman', 'required');
        $validation->set_rules('staff_nip', 'Kode Peminjaman', 'required');
        $validation->set_rules('keperluan', 'Kode Peminjaman', 'required');
        $validation->set_rules('tgl_blk', 'Kode Peminjaman', 'required');
        $validation->set_rules('ruangan_idruangan', 'Kode Peminjaman', 'required');


        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($validation->run() == FALSE){
            $peminjaman = $this->Peminjaman_m->get($kd_pjm)[0];            
            if($peminjaman == null){
                redirect('client');
            }else{
                $barang = $this->Barang_m->get();
                // Pinjambrg_detail
                $ruangan = $this->Ruangan_m->get();
                $staff = $this->Staff_m->get();
        
                $data = [
                    'peminjaman' => $peminjaman,
                    'barang' => $barang,
                    'ruangan' => $ruangan,
                    'staff' => $staff
                ];
                $this->template->load('template_client', 'client/staff/form_staff', $data);
            }
        }else{
            $post = $this->input->post();
            $post['tgl_pjm'] = date('Y-m-d H:i:s');
            $post['tgl_blk'] = date_format(date_create($post['tgl_blk']), 'Y-m-d H:i:s');
            
            // Cek apakah sudah pinjam alat atau belum
            $detailPeminjaman = $this->PeminjamanDetail_m->get($post["kd_pjm"]);
            if($detailPeminjaman == null){                
                $this->session->set_flashdata('failedPeminjaman', 'Silahkan Tentukan barang yang ingin dipinjam');
                redirect('client/form-staff/'.$post["kd_pjm"]);
            }else{
                // Tambah Data Pinjam Barang
                $update = $this->Peminjaman_m->updatePeminjaman($post);
                if($update->responseCode == "00"){
                    $this->session->set_flashdata('success', 'Peminjaman Berhasil dilakukan');
                    redirect('client');
                }
            }
        }
    }
    
    public function return_data($nip)
    {  
              
        $pinjambrg = $this->Peminjaman_m->getPeminjamStaff($nip);                 
        
        $terakhir_pinjam = end($pinjambrg);
        $detailBarang = $this->PeminjamanDetail_m->get($terakhir_pinjam->kd_pjm);

        $data = ['pinjambrg' => $terakhir_pinjam, 'detailBarang' => $detailBarang];

        $this->template->load('template_client', 'client/staff/return_data', $data);
    }

    // Penambahan Detail Barang yang dipinjam untuk proses ajax
    public function tambahBarang()
    {
        $post = $this->input->post(null,true);

        // Untuk mendapatkan ID Detail
        $maxId = number_format($this->PeminjamanDetail_m->maxId()[0]->max);
        $nextId = ($maxId == null) ? 1 :  $maxId + 1;
        $post["id_detail"] = $nextId;
                        
        $jumlah_pinjam = $post["jumlah_pinjam"];

        $barcode = $post["barcode"];
        $barang = $this->Barang_m->barcodeBarang($barcode)[0];
        $post["kode_brg"] = $barang->kode_brg;

        
        // Update Jumlah Barang                
        $post["jumlah"] = $barang->jumlah - number_format($jumlah_pinjam);
        if($post["jumlah"] <= 0){
            $post["status"] = "HABIS";
            $post["jumlah"] = 0;
            $post["jumlah_pinjam"] = $barang->jumlah;
        }else{
            $post["status"] = "TERSEDIA";
        }

        // Tambah Detail Peminjaman Barang
        $pinjambrg_detail = $this->PeminjamanDetail_m->addDetail($post);

        $result = $this->Barang_m->updateStatus($post);

        echo json_encode($pinjambrg_detail); 

    }

    // Detail Peminjaman untuk proses Ajax
    public function detail_barang_pinjam($kd_pjm)
    {
        $pinjambrg_detail = $this->PeminjamanDetail_m->get($kd_pjm);        
        echo json_encode($pinjambrg_detail); 
    }

    // Delete detail barang yang dipinjam untuk proses Ajax
    public function deleteDetail()
    {
        $post = $this->input->post();
        $detail = $this->PeminjamanDetail_m->getDetail($post['id_detail'])[0];
        $deleteDetail = $this->PeminjamanDetail_m->deleteDetail();

        // Update jumlah barang
        $barang = $this->Barang_m->get($detail->barang_kode_brg)[0];
        $post["kode_brg"] = $barang->kode_brg;
        $post["jumlah"] = $barang->jumlah + $detail->jumlah;
        $post["status"] = "TERSEDIA";
        $result = $this->Barang_m->updateStatus($post);        
        echo json_encode($deleteDetail);
    }
}