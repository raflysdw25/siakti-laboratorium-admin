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

    // Melihat Detail Staff
    public function showStaff($nip)
    {
        $getStaff = retrieveData('staff?nip='.$nip);
        $data['staff'] = $getStaff->data[0];
        $this->load->view('staff/show-detail', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $this->form_validation->set_rules('nama', 'Nama Staff', 'required');
        $this->form_validation->set_rules('kota_staff', 'Kota Staff', 'required');
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

    // Memberikan hak akses ke staff
    public function makeAccess($nip)
    {        
        $this->form_validation->set_rules('staff_nip', 'Nomor Induk Pegawai', 'required');                
        $this->form_validation->set_rules('tgl_mulai', 'Mulai Jabatan', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Selesai Jabatan', 'required');
        $this->form_validation->set_rules('jablab_struk_id', 'Nama Jabatan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        $post = $this->input->post();
        if($this->form_validation->run() == FALSE){
            // Mendapatkan ID Terbaru                    

            $getJabStruk = retrieveData('laboratorium/strukturallab');
            $struktural = $getJabStruk->data;            

            $getStaff = retrieveData('staff?nip='.$nip);
            $staff = $getStaff->data[0];

            $data = ['staff' => $staff, 'struktural' => $struktural];
            $this->template->load('template', 'staff/makeaccess', $data);            
        }else{
            //Check sudah pernah buat akses atau belum
            $checkJabatanLab =  retrieveData('laboratorium/jabatanlab?staff_nip='.$nip);                        
            $post['tgl_mulai'] = date_format(date_create($post['tgl_mulai']), 'Y-m-d H:i:s');            
            $post['tgl_selesai'] = date_format(date_create($post['tgl_selesai']), 'Y-m-d H:i:s'); 
            
            // Jika sebelumnya sudah diberikan akses, namun expired
            if(sizeof($checkJabatanLab->data) === 1){                
                $post['id_jablab'] = $checkJabatanLab->data[0]->id_jablab;                
                $updateAccess = updateData('laboratorium/jabatanlab', $post);                
                if($updateAccess->responseCode == "00"){
                    $this->session->set_flashdata('success', 'Akses Staff berhasil diperbaharui');
                    redirect('staff');
                }
            }else{
                $createAccess = postData('laboratorium/jabatanlab', $post);                         
                if($createAccess->responseCode == "00"){
                    $this->session->set_flashdata('success', 'Akses Staff berhasil ditambahkan');
                    redirect('staff');
                }                
            }
        }
    }

    // Untuk mengubah data diri staff
    public function edit($nip)
    {
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');
        $this->form_validation->set_rules('nama', 'Nama Staff', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Staff', 'required');
        $this->form_validation->set_rules('kota_staff', 'Kota Staff', 'required');
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

    // Untuk mengubah jabatan dari staff
    public function editJabatan($nip)
    {
        $this->form_validation->set_rules('staff_nip', 'Nomor Induk Pegawai', 'required');                
        $this->form_validation->set_rules('id_jablab', 'Jabatan Lab', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Mulai Jabatan', 'required');
        $this->form_validation->set_rules('tgl_selesai', 'Selesai Jabatan', 'required');
        $this->form_validation->set_rules('jablab_struk_id', 'Nama Jabatan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        $post = $this->input->post();
        if($this->form_validation->run() == FALSE){
            // Mendapatkan ID Terbaru                    

            $getJabStruk = retrieveData('laboratorium/strukturallab');
            $struktural = $getJabStruk->data;            

            $getStaff = retrieveData('staff?nip='.$nip);
            $staff = $getStaff->data[0];

            $getJabatan = retrieveData('laboratorium/jabatanlab?id_jablab='.$staff->id_jablab);
            $jabatanlab = $getJabatan->data[0];


            $data = ['staff' => $staff, 'struktural' => $struktural, 'jabatanlab' => $jabatanlab];            
            $this->template->load('template', 'staff/editjabatan', $data);            
        }else{            
            $post['tgl_mulai'] = date_format(date_create($post['tgl_mulai']), 'Y-m-d H:i:s');            
            $post['tgl_selesai'] = date_format(date_create($post['tgl_selesai']), 'Y-m-d H:i:s');            
            
            $updateJabatan = updateData('laboratorium/jabatanlab', $post);             
            
            if($updateJabatan->responseCode == "00"){
                $this->session->set_flashdata('success', 'Jabatan Staff berhasil diubah');
                redirect('staff');
            }
        }
    }

    public function delete($nip)
    {
        $post = $this->input->post();
        $post["nip"] = $nip;

        $deleteJabatan = deleteData('laboratorium/jabatanlab', $post);
        $deleteData = deleteData('staff',$post);
        if($deleteData->responseCode == "00" && $deleteJabatan->responseCode == "00"){
            $this->session->set_flashdata('success', 'Data Staff berhasil dihapus');
            redirect('staff');
        }else{
            $this->session->set_flashdata('failed', 'Data Staff masih digunakan');
            redirect('staff');
        }
    }


    public function struktural()
    {
        $getStruktural = retrieveData('laboratorium/strukturallab');
        $data['strukturals'] = $getStruktural->data;
        $this->load->view('struktural/index', $data);
    }

    public function addstruktural(){
        $this->form_validation->set_rules('nama_jab', 'Nama Jabatan', 'required|max_length[20]|callback_namajabatan_check');
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} huruf');

        if($this->form_validation->run() === FALSE){
            $this->template->load('template', 'struktural/add');
        }else{
            $post = $this->input->post();
            // Insert Data
            $addStruktural = postData('laboratorium/strukturallab', $post);
            if($addStruktural->responseCode =="00"){
                $this->session->set_flashdata('success', 'Jabatan berhasil ditambahkan');
                redirect('staff');
            }
        }
    }

    public function editstruktural($id_jablab_struk){
        $this->form_validation->set_rules('nama_jab', 'Nama Jabatan', 'required|max_length[20]|callback_namajabatan_check');
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} huruf');

        if($this->form_validation->run() === FALSE){
            $getStruktural = retrieveData('laboratorium/strukturallab?id_jablab_struk='.$id_jablab_struk);
            $data["struktural"] = $getStruktural->data[0];
            $this->template->load('template', 'struktural/edit' , $data);
        }else{
            $post = $this->input->post();
            // Insert Data
            $editStruktural = updateData('laboratorium/strukturallab', $post);
            
            if($editStruktural->responseCode =="00"){
                $this->session->set_flashdata('success', 'Jabatan berhasil diubah');
                redirect('staff');
            }
        }
    }

    public function hapusstruktural($id_jablab_struk){
        $post = $this->input->post();
        $post["id_jablab_struk"] = $id_jablab_struk;
        $deleteData = deleteData('laboratorium/strukturallab', $post);

        if($deleteData->responseCode == "00"){
            $this->session->set_flashdata('success', 'Jabatan berhasil dihapus');
            redirect('staff'); 
        }
    }

    function namajabatan_check(){
        $post = $this->input->post(null,TRUE);
        $post["id_jablab_struk"] = ($this->input->post('id_jablab_struk') == null) ? null : $this->input->post('id_jablab_struk');
        
        $ambil_nama = postData('laboratorium/strukturallab/namastruktural', $post);        
        if($ambil_nama->responseCode == "200"){
            $this->form_validation->set_message('namajabatan_check', '{field} ini sudah dipakai, silahkan ganti' );
            return FALSE;
        }else{
            return TRUE;
        }
    }

}