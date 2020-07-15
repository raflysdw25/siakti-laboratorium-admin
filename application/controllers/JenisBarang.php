<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class JenisBarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();                
        $this->load->library('form_validation');
        check_not_login();        
    }

    public function index()
    {            
        $allJenisBarang = retrieveData('laboratorium/jenisbarang');

        $data["jenisbarang"] = $allJenisBarang->data;
        
        $this->template->load('template', 'jenisbarang/index',$data);
    }

    public function delete($id_jenis)
    {
        $post = $this->input->post(null,TRUE);
        $post["id_jenis"] = $id_jenis;
        $deleteJenisBarang = deleteData('laboratorium/jenisbarang', $post);

        if($deleteJenisBarang->responseCode == "00"){
            $this->session->set_flashdata('success', 'Jenis Barang Berhasil dihapus');
            redirect('jenisbarang');                        
        }else{
            $this->session->set_flashdata('failed', 'Jenis Barang masih digunakan');
            redirect('jenisbarang');                        
        }
    }

    function namajenis_check(){
        $post = $this->input->post(null,TRUE);
        $post["id_jenis"] = ($post["id_jenis"] == null) ? null : $post["id_jenis"];
        
        $ambil_nama = postData('laboratorium/jenisbarang/namajenis', $post);        
        if($ambil_nama->responseCode == "200"){
            $this->form_validation->set_message('namajenis_check', '{field} ini sudah dipakai, silahkan ganti' );
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function add(){
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|callback_namajenis_check');        

        if($this->form_validation->run() === FALSE)
        {
            $this->template->load('template', 'jenisbarang/jenisbarang_form_add');
        }else{
            $post = $this->input->post();
            $input_jenisbarang = postData('laboratorium/jenisbarang', $post);

            if($input_jenisbarang->responseCode == "00")
            {
                $this->session->set_flashdata('success', 'Jenis Barang Berhasil ditambahkan');
                redirect('jenisbarang');
            }else{
                $this->session->set_flashdata('failed', 'Jenis Barang Gagal ditambahkan');
                redirect('jenisbarang/add');
            }
        }
    }

    public function edit($id_jenis){
        $this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'required|callback_namajenis_check');
        $this->form_validation->set_rules('id_jenis', 'ID Jenis', 'required');

        if($this->form_validation->run() === FALSE)
        {            
            $getJenisBarang = retrieveData('laboratorium/jenisbarang?id_jenis='.$id_jenis);            
            $data["jenisbarang"] = $getJenisBarang->data[0];
            $this->template->load('template', 'jenisbarang/jenisbarang_form_edit', $data);
        }else{
            $post = $this->input->post();
            $updateJenis = updateData('laboratorium/jenisbarang', $post);

            if($updateJenis->responseCode == "00")
            {
                $this->session->set_flashdata('success', 'Jenis Barang Berhasil diubah');
                redirect('jenisbarang');
            }else{
                $this->session->set_flashdata('failed', 'Jenis Barang Gagal diubah');
                redirect('jenisbarang/add');
            }
        }
    }
}