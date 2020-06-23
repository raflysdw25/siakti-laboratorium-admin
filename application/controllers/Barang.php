<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['Barang_m', 'supplier_m']);
        $this->load->library('form_validation');
    }
    
    public function index()
    {        
        
        $data['barang'] = $this->Barang_m->get();
        $this->template->load('template', 'barang/index',$data);
    }

    public function showBarang($id){
        $barang = $this->Barang_m->get($id)[0];        
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $data = ["barang" => $barang, 'generator' => $generator]; //Digunakan untuk mengenerate barcode
        // var_dump($data); exit;
        $this->load->view('barang/barang_show',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;
    	$validation->set_rules('kode_brg', 'Kode Barang', 'required');
        $validation->set_rules('nama_brg', 'Nama_Barang', 'required');
        $validation->set_rules('jenis', 'Jenis Barang', 'required');
        $validation->set_rules('spesifikasi', 'Spesifikasi Barang', 'required');                
        $validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');        
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        
        if($validation->run() == FALSE)
    	{
            $maxId = number_format($this->Barang_m->maxId()[0]->max);
            $nextId = ($maxId == null) ? 1 :  $maxId + 1;
            $suppliers = $this->supplier_m->get();
            $data = ['suppliers' => $suppliers, 'nextId' => $nextId];
    		$this->template->load('template', 'barang/barang_add', $data);
		} else {   
            $post = $this->input->post(); 
            if($post["jumlah"] == 0){
                $post["status"] = "HABIS";
            }else{
                $post["status"] = "TERSEDIA";
            }         
            $result = $this->Barang_m->add($post);            
            $this->session->set_flashdata('success', 'Barang Berhasil ditambahkan');
            redirect('barang');                        
    	}
    }

    public function edit($kode_brg)
    {        
        $validation = $this->form_validation;
    	$validation->set_rules('kode_brg', 'Kode Barang', 'required');
        $validation->set_rules('nama_brg', 'Nama_Barang', 'required');
        $validation->set_rules('jenis', 'Jenis Barang', 'required');
        $validation->set_rules('spesifikasi', 'Spesifikasi Barang', 'required');        
        $validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');        
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        
        if($validation->run() == FALSE)
    	{
            $suppliers = $this->supplier_m->get();            
            $barang = $this->Barang_m->get($kode_brg)[0];
            $data = ['suppliers' => $suppliers, 'barang' => $barang];
    		$this->template->load('template', 'barang/barang_edit', $data);
		} else {
            $post = $this->input->post();            
            if($post["jumlah"] > 0){
                $post["status"] = "TERSEDIA";
            }			
            $result = $this->Barang_m->edit($post);            
            $this->session->set_flashdata('success', 'Data Barang Berhasil diubah');
            redirect('barang');                        
    	}
    }

    public function barangRusak($kode_brg)
    {
        $data["barang"] = $this->Barang_m->get($kode_brg)[0];        
        $this->load->view('barang/barang_rusak',$data);
    }

    public function ubahStatus()
    {   
        $post = $this->input->post();
        $barang = $this->Barang_m->get($post["kode_brg"])[0];
        $post["jumlah"] = $barang->jumlah - number_format($post["jumlah"]);        
        if($post["jumlah"] == 0){
            $post["status"] = "HABIS";
        }else{
            $post["status"] = "TERSEDIA";
        }        
        $result = $this->Barang_m->updateStatus($post);
        $this->session->set_flashdata('success', 'Jumlah Barang Berhasil diubah');
        redirect('barang');                        
    }

    public function delete($kode_brg)
    {        
        $result = $this->Barang_m->delete($kode_brg);        
        $this->session->set_flashdata('success', 'Proses berhasil dilakukan');
        redirect('barang'); 
    }

    function barcode_print($id){
        $barang = $this->Barang_m->get($id)[0];
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $data = ['barang' => $barang, 'generator' => $generator];
        $html = $this->load->view('barang/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode -'.$barang->barcode, 'A4', 'potrait');
    }
}