<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();                
        $this->load->library('form_validation');
        check_not_login();
    }
    
    public function index()
    {
        $getStaff = retrieveData('staff');
        $data["staffs"] = $getStaff->data;
        $this->template->load('template', 'staff/staff_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required|callback_nip_check');


        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    }

}