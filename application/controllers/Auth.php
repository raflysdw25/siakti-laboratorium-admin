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
											
			if($post["usr_name"] == "ADMIN" && $post["password"] == "ADMIN"){
				$admin = new stdClass();
				$admin->tgl_mulai = date('Y-m-d H:i:s');
				$admin->tgl_selesai = date('Y-m-d H:i:s', strtotime($admin->tgl_mulai . ' +1 day'));
				
				$admin->nama = "ADMIN SERVER";
				$admin->jabatan = "ADMIN";
				$this->session->set_userdata(['admin_logged' => $admin]);
				redirect(site_url('staff'));
			}else{
				$currentDate = date('Y-m-d H:i:s');
				$getAdmin = postData('staff/access', $post);
				$admin = $getAdmin->data;							
				$admin_valid = ($currentDate >= $admin->tgl_mulai && $currentDate <= $admin->tgl_selesai);
				if ($getAdmin->responseCode == "200") { //benar							
					if($admin_valid == false || $admin->jabatan == null){
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
	}

	public function getAccess(){
		$this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('getaccess');
		}else{
			$post = $this->input->post();

			// Cek apakah Staff sudah mendapatkan akses
			$checkStaff = retrieveData('laboratorium/jabatanlab?staff_nip='.$post["nip"]);			
			
			if($checkStaff->responseCode == "200"){
				$post["password"] = password_hash($post["password"], PASSWORD_DEFAULT);
				$updateAccount = updateData('staff/updateAccount', $post);
				if($updateAccount->responseCode == "00"){
					$this->session->set_flashdata("success", "Password berhasil dibuat");
					redirect(site_url('auth'));
				}
			}else{
				$this->session->set_flashdata("failed", "NIP ini belum mendapatkan hak akses");
				redirect(site_url('auth'));
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('admin_logged');
		redirect(site_url('auth'));
	}
}