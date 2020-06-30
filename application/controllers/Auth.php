<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	
	function __construct()
    {
        parent::__construct();
        // check_not_login();        
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Jakarta");
    }

	public function index()
	{
		check_already_login();
		$this->load->view('login');
	}
	
	public function process()
	{
		
			$post = $this->input->post();		
			$currentDate = date('Y-m-d H:i:s');
			$getAdmin = postData('staff/access', $post);
			$admin = $getAdmin->data;	
			$admin_valid = ($currentDate >= $admin->tgl_mulai && $currentDate <= $admin->tgl_selesai);
			
					
			if ($getAdmin->responseCode == "200" ) { //benar							
				if($admin_valid == false || (strpos($admin->jabatan,'Laboratorium') == false)){
					$this->session->set_flashdata("failed", "Tidak memiliki hak akses");
					redirect(site_url('auth'));
				}else{
					$this->session->set_userdata(['admin_logged' => $admin]);
					redirect(site_url('/'));
				}	
			} else{ //salah				
				$this->session->set_flashdata("failed", "Username / Password Salah");
				redirect(site_url('auth'));
			}
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_logged');
		redirect(site_url('auth'));
	}
}