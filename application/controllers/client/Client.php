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

    public function index(){
        $this->template->load('template_client', 'client/index');
    }
    
    

    public function stripeCard()
    {
        $validation = $this->form_validation;
        $validation->set_rules('no_ktm', 'No Kartu', 'required');

        // $no_ktm = '';

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
            $this->template->load('template_client', 'client/stripe_card');
		} else {			
            redirect('client/card_data/'.$no_ktm);                    
    	} 
    }
    

    public function panduan()
    {        
        $this->template->load('template_client', 'client/panduan');
    }

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

    public function card_data($no_ktm)
    {
        if($no_ktm != null){
           $result = $this->Mahasiswa_m->kartuMahasiswa_get($no_ktm);              
            if($result->responseCode == '200'){                
                $data['mahasiswa'] = $result->data[0];
                $this->template->load('template_client', 'client/card_data',$data);                                                   
            }else if($result->responseCode == '204'){
                $this->session->set_flashdata('failed', 'KTM belum didaftarkan');
                redirect('client');
            }  
        }else{
            redirect('client/stripe_card');
        }   
    }

    // Membuat row peminjaman berdasarkan nim dan kode_peminjaman
    public function createPeminjamanMahasiswa($mahasiswa_nim)
    {
        $maxId = number_format($this->Peminjaman_m->maxId()[0]->max);
        $nextId = ($maxId == null) ? 1 :  $maxId + 1;        
        $result = $this->Peminjaman_m->addPeminjamanMahasiswa($nextId,$mahasiswa_nim);        
        if($result->responseCode == "00"){
            redirect(site_url('client/formMahasiswa/'.$nextId));
        }
    }

    public function cancelPeminjamanMahasiswa($kd_pjm){
        $detail = $this->PeminjamanDetail_m->get($kd_pjm);
        if($detail->data !== null){
            $deleteDetail = $this->PeminjamanDetail_m->delete($kd_pjm);
            if($deleteDetail->responseCode == "00"){
                $result = $this->Peminjaman_m->delete($kd_pjm);            
                $this->session->set_flashdata('failed', 'Peminjaman dibatalkan dilakukan');
                redirect('client');
            }
        }else{
            $result = $this->Peminjaman_m->delete($kd_pjm);            
            $this->session->set_flashdata('failed', 'Peminjaman batal dilakukan');
            redirect('client');
        }
    }

    public function form_peminjaman($kd_pjm)
    {
        $validation = $this->form_validation;
        $validation->set_rules('kode_brg', 'Kode Barang', 'required');
        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($validation->run() == FALSE)
    	{
            $peminjaman = $this->Peminjaman_m->get($kd_pjm)[0];
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
            $this->template->load('template_client', 'client/form_peminjaman', $data);
        }else{
            // Code
        }

    }

}