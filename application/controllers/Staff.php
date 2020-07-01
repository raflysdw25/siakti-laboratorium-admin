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
        date_default_timezone_set("Asia/Jakarta");
        check_not_login();
        check_kalab();
    }
    
    public function index()
    {
        $getStaff = retrieveData('staff');
        $staffs = $getStaff->data;
        $data["staffs"] = $staffs;
        $this->template->load('template', 'staff/staff_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $this->form_validation->set_rules('nama', 'Nama Staff', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Staff', 'required');
        $this->form_validation->set_rules('tlp_staff', 'Telepon Staff', 'required');
        $this->form_validation->set_rules('email_staff', 'Email Staff', 'required');


        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        
        if($this->form_validation->run() == FALSE){
            $getProdi = retrieveData('programstudi');
            
            $data["prodi"] = $getProdi->data;

            $this->template->load('template', 'staff/staff_form_add', $data);
        }else{
            $post = $this->input->post();
            $post["kec_staff"] = ($post["kec_staff"] == null) ? '' : $post["kec_staff"];
            $post["kel_staff"] = ($post["kel_staff"] == null) ? '' : $post["kel_staff"];
            $post["kota_staff"] = ($post["kota_staff"] == null) ? '' : $post["kota_staff"];
            $post["usr_name"] = ($post["usr_name"] == null) ? '' : $post["usr_name"];
            $post["password"] = ($post["password"] == null) ? '' : $post["password"];
            $post["prodi_prodi_id"] = ($post["prodi_prodi_id"] == null) ? null : $post["prodi_prodi_id"];

            $insertStaff = postData('staff', $post);
            
            if($insertStaff->responseCode == "00"){
                $this->session->set_flashdata('success', 'Staff berhasil ditambahkan');
                redirect('staff'); 
            }
        }
    }

    public function makeAccess($nip)
    {        
        $this->form_validation->set_rules('staff_nip', 'Nomor Induk Pegawai', 'required');        
        $this->form_validation->set_rules('id_jabdsn', 'ID Jabatan', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Mulai Jabatan', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Selesai Jabatan', 'required');
        $this->form_validation->set_rules('jab_struk_id_jabstruk', 'Nama Jabatan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        $post = $this->input->post();
        if($this->form_validation->run() == FALSE){
            // Mendapatkan ID Terbaru        
            $id_jabdsn = retrieveData('jabatandosen/maxId');            
            $maxId = $id_jabdsn->data[0]->max;
            $nextId = ($maxId == null) ? 1 :  $maxId + 1;

            $getJabStruk = retrieveData('struktural');
            $struktural = $getJabStruk->data;            

            $getStaff = retrieveData('staff?nip='.$nip);
            $staff = $getStaff->data[0];

            $data = ["nextId" => $nextId, 'staff' => $staff, 'struktural' => $struktural];
            $this->template->load('template', 'staff/makeaccess', $data);            
        }else{            
            $post['tgl_mulai'] = date_format(date_create($post['tgl_mulai']), 'Y-m-d H:i:s');            
            $post['tgl_selesai'] = date_format(date_create($post['tgl_selesai']), 'Y-m-d H:i:s');            
            
            $createAccess = postData('jabatandosen', $post);            
            if($createAccess->responseCode == "00"){
                $this->session->set_flashdata('success', 'Akses Staff berhasil ditambahkan');
                redirect('staff');
            }
        }
    }

    public function edit($nip)
    {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $this->form_validation->set_rules('nama', 'Nama Staff', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Staff', 'required');
        $this->form_validation->set_rules('tlp_staff', 'Telepon Staff', 'required');
        $this->form_validation->set_rules('email_staff', 'Email Staff', 'required');

        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        
        if($this->form_validation->run() == FALSE){
            $getProdi = retrieveData('programstudi');            
            $data["prodi"] = $getProdi->data;

            $getStaff = retrieveData('staff?nip='.$nip);
            $data['staff'] = $getStaff->data[0];

            $this->template->load('template', 'staff/staff_form_edit', $data);
        }else{
            $post = $this->input->post();
            $post["kec_staff"] = ($post["kec_staff"] == null) ? '' : $post["kec_staff"];
            $post["kel_staff"] = ($post["kel_staff"] == null) ? '' : $post["kel_staff"];
            $post["kota_staff"] = ($post["kota_staff"] == null) ? '' : $post["kota_staff"];
            $post["usr_name"] = ($post["usr_name"] == null) ? '' : $post["usr_name"];
            $post["password"] = ($post["password"] == null) ? '' : $post["password"];
            $post["prodi_prodi_id"] = ($post["prodi_prodi_id"] == null) ? null : $post["prodi_prodi_id"];

            $updateStaff = updateData('staff', $post);
            
            if($updateStaff->responseCode == "00"){
                $this->session->set_flashdata('success', 'Staff berhasil diubah');
                redirect('staff'); 
            }
        }
    }

    public function delete($nip)
    {
        $post = $this->input->post();
        $post["nip"] = $nip;

        
        $deleteData = deleteData('staff',$post);
        if($deleteData->responseCode == "00"){
            $this->session->set_flashdata('success', 'Data Staff berhasil dihapus');
            redirect('staff');
        }else{
            $this->session->set_flashdata('failed', 'Data Staff masih digunakan');
            redirect('staff');
        }
    }

}