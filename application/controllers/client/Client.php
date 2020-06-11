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
        $this->load->model('Mahasiswa_m');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->template->load('template_client', 'client/index');
    }
    

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

    public function stripeCard()
    {
        $validation = $this->form_validation;
        $validation->set_rules('no_ktm', 'No Kartu', 'required');

        // $no_ktm = '';

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
            redirect(site_url('client/card_data/'.$no_ktm));                    
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

    public function form_peminjaman()
    {
        $this->template->load('template_client', 'client/form_peminjaman');
    }

}