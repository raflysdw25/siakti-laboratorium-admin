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
        $this->load->model(['Staff_m']);
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->load->view('login');
	}
	
	public function process()
	{
			$query = $this->Staff_m->login();
			if ($query) { //benar
				# code...
				redirect(site_url('barang'));
			} else{ //salah
				$this->session->set_flashdata("failed", "Username / Password Salah");
				redirect(site_url('login'));
			}
	}
}