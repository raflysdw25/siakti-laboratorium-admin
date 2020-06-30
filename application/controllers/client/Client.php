<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        // $this->load->model(['Mahasiswa_m', 'Peminjaman_m', 'Barang_m', 'PeminjamanDetail_m', 'Ruangan_m', 'Staff_m']);
        $this->load->library('form_validation');
        check_not_login();
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


        $content = $this->input->post('no_ktm');
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

    // Menampilkan Barang yang dikembalikan
    public function kembalikan_data($no_ktm)
    {
        // $result = $this->Mahasiswa_m->kartuMahasiswa_get($no_ktm);
        $getMahasiswa = retrieveData('mahasiswa/kartuMahasiswa?no_ktm='.$no_ktm);
        
        $mahasiswa = $getMahasiswa->data[0];

        //GET data Peminjam (Mahasiswa)
        $retrieve_peminjam  = $this->customguzzle->getPlain('laboratorium/peminjaman/pinjammahasiswa?mahasiswa_nim='.$mahasiswa->nim,'application/json');

        // GET Data Peminjaman
        $getPeminjam = retrieveData('laboratorium/peminjaman/pinjammahasiswa?mahasiswa_nim='.$mahasiswa->nim);                    
        $terakhir_pinjam = end($getPeminjam->data);
        
        // GET Detail Peminjaman                
        $detailBarang = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$terakhir_pinjam->kd_pjm);        

        $data = ['mahasiswa' => $mahasiswa, 'pinjambrg' => $terakhir_pinjam, 'detailBarang' => $detailBarang->data];

        $this->template->load('template_client', 'client/mahasiswa/kembalikan_data', $data);

    }

    // Membuat row peminjaman berdasarkan nim dan kode_peminjaman
    public function createPeminjamanMahasiswa($mahasiswa_nim)
    {
        // Mendapatkan ID Terbaru
        $kd_pjm = retrieveData('laboratorium/peminjaman/maxId');        
        $maxId = $kd_pjm->data[0]->max;
        $nextId = ($maxId == null) ? 1 :  $maxId + 1;        
        
        $check_peminjam = retrieveData('laboratorium/peminjaman/pinjammahasiswa?mahasiswa_nim='.$mahasiswa_nim);        
        $last_mahasiswa_meminjam = end($check_peminjam->data);
        
        if($last_mahasiswa_meminjam->status == "SUCCESS"){
            $this->session->set_flashdata('failed', 'Mahasiswa sudah melakukan peminjaman');
            redirect('client'); 
        }else{            
            $post = $this->input->post();
            $post["mahasiswa_nim"] = $mahasiswa_nim;
            $post["kd_pjm"] = $nextId;
           
            $newPeminjaman = postData('laboratorium/peminjaman', $post);         
            if($newPeminjaman->responseCode == "00"){
                redirect(site_url('client/form-mahasiswa/'.$nextId));
            }
        }

    }

    // Prose Pengembalian Barang
    public function updatePengembalian($kd_pjm)
    {
        $post = $this->input->post(null,true);
        
        $getPeminjaman = retrieveData('laboratorium/peminjaman?kd_pjm='.$kd_pjm);
        $peminjaman = $getPeminjaman->data[0];
        if($peminjaman->status == "SUCCESS" ){                                    
            $post['tgl_blk_real'] = date('Y-m-d H:i:s');
            $post["kd_pjm"]  = $kd_pjm;
                        
            $updatePengembalian = updateData('laboratorium/peminjaman/updateKembali', $post);
            if($updatePengembalian->responseCode == "00"){
                $this->session->set_flashdata('success', 'Pengembalian Berhasil dilakukan');
                redirect('client');            
            }
        }else{
            $this->session->set_flashdata('failed', 'Tidak Ada Peminjaman');
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
            $deleteDetail = deleteData('laboratorium/peminjamandetail', $post);
            if($deleteDetail->responseCode == "00"){                
                $deletePeminjaman = deleteData('laboratorium/peminjaman',$post);            
                $this->session->set_flashdata('failed', 'Peminjaman batal dilakukan');
                redirect('client');
            }            
        }        
    }

    // Proses peminjaman Mahasiswa
    public function form_peminjaman($kd_pjm)
    {                
        $this->form_validation->set_rules('kd_pjm', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('staff_penanggungjawab', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('tgl_blk', 'Waktu Pengembalian', 'required');
        $this->form_validation->set_rules('ruangan_idruangan', 'Ruangan', 'required');
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
            
            // Cek apakah sudah pinjam alat atau belum                        
            $detailPeminjaman = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$post["kd_pjm"]);
            $detailPeminjaman = $detailPeminjaman->data;
            
            if($detailPeminjaman == null){ //Jika belum melakukan peminjaman               
                $this->session->set_flashdata('failedPeminjaman', 'Silahkan Tentukan barang yang ingin dipinjam');
                redirect('client/form-mahasiswa/'.$post["kd_pjm"]);
            }else{
                // Update Data Pinjam Barang                
                $$post["staff_nip"] = ($post["staff_nip"] == "") ? null : $post["staff_nip"];                
                $updatePeminjaman = updateData('laboratorium/peminjaman', $post);
                
                if($updatePeminjaman->responseCode == "00"){
                    $this->session->set_flashdata('success', 'Peminjaman Berhasil dilakukan');
                    redirect('client');
                }
            }
        }       

    }


    // PEMINJAMAN DOSEN
    public function nipInput($page){
        $validation = $this->form_validation;
        $this->form_validation->set_rules('nip', 'No Kartu', 'required');
        $nip = $this->input->post('nip');
        
        if($this->form_validation->run() == FALSE){  
            $data["page"] = $page;
            $this->template->load('template_client', 'client/staff/nip_input', $data);
		} else {
            if($page == "pinjam"){
                // Mendapatkan ID Terbaru
                $kd_pjm = retrieveData('laboratorium/peminjaman/maxId');        
                $maxId = $kd_pjm->data[0]->max;
                $nextId = ($maxId == null) ? 1 :  $maxId + 1;  

                $check_peminjam = retrieveData('laboratorium/peminjaman/pinjamstaff?staff_nip='.$nip);        
                $last_meminjam = end($check_peminjam->data);
                if($last_meminjam->status == "SUCCESS"){
                    $this->session->set_flashdata('failed', 'Staff sudah melakukan peminjaman');
                    redirect('client'); 
                }else{                    
                    $post = $this->input->post();
                    $post["staff_nip"] = $nip;
                    $post["kd_pjm"] = $nextId;
                
                    $newPeminjaman = postData('laboratorium/peminjaman', $post);         
                    if($newPeminjaman->responseCode == "00"){
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
        $this->form_validation->set_rules('kd_pjm', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('staff_nip', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('keperluan', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('tgl_blk', 'Kode Peminjaman', 'required');
        $this->form_validation->set_rules('ruangan_idruangan', 'Kode Peminjaman', 'required');


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
            $post['tgl_pjm'] = date('Y-m-d H:i:s');
            $post['tgl_blk'] = date_format(date_create($post['tgl_blk']), 'Y-m-d H:i:s');
                        
            // Cek apakah sudah pinjam alat atau belum                        
            $detailPeminjaman = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$post["kd_pjm"]);
            $detailPeminjaman = $detailPeminjaman->data;
            if($detailPeminjaman == null){                
                $this->session->set_flashdata('failedPeminjaman', 'Silahkan Tentukan barang yang ingin dipinjam');
                redirect('client/form-staff/'.$post["kd_pjm"]);
            }else{
                // Update Data Pinjam Barang
                $post["staff_penanggungjawab"] = ($post["staff_penanggungjawab"] == "") ? null : $post["staff_penanggungjawab"];
                $post["mahasiswa_nim"] = ($post["mahasiswa_nim"] == "") ? null : $post["mahasiswa_nim"];
                $updatePeminjaman = updateData('laboratorium/peminjaman', $post);
                
                if($updatePeminjaman->responseCode == "00"){
                    $this->session->set_flashdata('success', 'Peminjaman Berhasil dilakukan');
                    redirect('client');
                }
            }
        }
    }
    
    public function return_data($nip)
    {                        
        $getPeminjam = retrieveData('laboratorium/peminjaman/pinjamstaff?staff_nip='.$nip);                         
        
        $terakhir_pinjam = end($getPeminjam->data);
        
        $getDetail = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$terakhir_pinjam->kd_pjm);
        $detailBarang = $getDetail->data;
        $data = ['pinjambrg' => $terakhir_pinjam, 'detailBarang' => $detailBarang];

        $this->template->load('template_client', 'client/staff/return_data', $data);
    }

    // Penambahan Detail Barang yang dipinjam untuk proses ajax
    public function tambahBarang()
    {
        $post = $this->input->post(null,true);

        
        // Mendapatkan ID Terbaru
        $id_detail = retrieveData('laboratorium/peminjamandetail/maxId');        
        $maxId = $id_detail->data[0]->max;
        $nextId = ($maxId == null) ? 1 :  $maxId + 1;
        $post["id_detail"] = $nextId;
                                

        $barcode = $post["barcode"];        
        $getBarang = retrieveData('laboratorium/barang/barcodeBarang?barcode='.$barcode);
        $barang = $getBarang->data[0];        
        $post["barang_kode_brg"] = $barang->kode_brg;
        

        // Tambah Detail Peminjaman Barang        
        $pinjambrg_detail = postData('laboratorium/peminjamandetail',$post);        
                        

        if($pinjambrg_detail->responseCode == "00"){
            echo json_encode($pinjambrg_detail); 
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
                      
        $deleteDetail = deleteData('laboratorium/peminjamandetail/deleteDetail', $post);
        echo json_encode($deleteDetail);
            
    }
}