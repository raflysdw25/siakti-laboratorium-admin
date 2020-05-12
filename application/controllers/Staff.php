<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('staff_m');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        # code...
        $data['row'] = $this->staff_m->get();
        $this->load->view('template', 'staff/staff_data');
    }

    public function add()
    {
    	
    	$this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
       
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kec_staff', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kel_staff', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kota_staff', 'Kota', 'required');

        $this->form_validation->set_rules('tlp_staff', 'Telepon', 'required');
        $this->form_validation->set_rules('email_staff', 'Email', 'required|is_unique');

        $this->form_validation->set_rules('usr_name', 'Username', 'required|min_length[5]|is_unique[user.user_data');
    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    	

        $this->form_validation->set_rules('prodi_prodi_id', 'ID Prodi', 'required|min_length[5]');
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');

    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() == FALSE)
    	{
    		$this->template->load('template', 'staff/staff_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
            $this->staff_m->add($post);
            if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil disimpan');
                </script>";
            }
                echo "<script>windows.location='".site_url('staff')."';
                </script>";
    	}
    }

    public function edit($nip)
    {
        
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
       
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kec_staff', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kel_staff', 'Kelurahan', 'required');
        $this->form_validation->set_rules('kota_staff', 'Kota', 'required');

        $this->form_validation->set_rules('tlp_staff', 'Telepon', 'required');
        $this->form_validation->set_rules('email_staff', 'Email', 'required|is_unique');

        $this->form_validation->set_rules('usr_name', 'Username', 'required|min_length[5]|callback_username_check');
       
       if ($this->input->post('password')) {
           
        $this->form_validation->set_rules('password', 'Password', '|min_length[5]');
        }

        $this->form_validation->set_rules('prodi_prodi_id', 'ID Prodi', 'required|min_length[5]');
        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() == FALSE)
        {
            $query = $data['row'] = $this->staff_m->get();
            if ($query->num_rows() > 0) {
                # code...
                $data['row'] = query->row();
            $this->template->load('template', 'staff/staff_form_edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');
                </script>"; 
                echo "windows.location='".site_url('staff')."';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->staff_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil disimpan');
                </script>";
            }
                echo "<script>windows.location='".site_url('staff')."';
                </script>";
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM staff WHERE usr_name = '$post[Username]' AND nip != '$post[nip]'")

        if ($query->num_rows() > 0) {
            # code...
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai silakan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function delete()
    {
        $id = $this->input->post('nip');
        $this->User_m->delete($nip);
        if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil dihapus');
                </script>";
            }
                echo "<script>windows.location='".site_url('staff')."';
                </script>";
    }
}