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
        # code...
        $data['barang'] = $this->Barang_m->get();
        $this->template->load('template', 'barang/index',$data);
    }

    public function showBarang($id){
        $data['barang'] = $this->Barang_m->get($id)[0];
        $data['generator'] = new Picqer\Barcode\BarcodeGeneratorPNG(); //Digunakan untuk mengenerate barcode
        $this->load->view('barang/barang_show',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;
    	$validation->set_rules('kode_brg', 'Kode Barang', 'required');
        $validation->set_rules('nama_brg', 'Nama_Barang', 'required');
        $validation->set_rules('jenis', 'Jenis Barang', 'required');
        $validation->set_rules('spesifikasi', 'Spesifikasi Barang', 'required');
        $validation->set_rules('jml', 'Jumlah Barang', 'required');
        $validation->set_rules('satuan', 'satuan', 'required');
        $validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');
        $validation->set_rules('supplier_nama_supp', 'Supplier', 'required');
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        
        if($validation->run() == FALSE)
    	{
            $suppliers = $this->supplier_m->get();
            $data = ['suppliers' => $suppliers];
    		$this->template->load('template', 'barang/barang_add', $data);
		} else {			
            $result = $this->Barang_m->add();            
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
        $validation->set_rules('jml', 'Jumlah Barang', 'required');
        $validation->set_rules('satuan', 'satuan', 'required');
        $validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');
        $validation->set_rules('supplier_nama_supp', 'Supplier', 'required');
    	
    	
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
            $result = $this->Barang_m->edit();            
            $this->session->set_flashdata('success', 'Data Barang Berhasil diubah');
            redirect('barang');                        
    	}
    }

    public function delete($kode_brg)
    {        
        $result = $this->Barang_m->delete($kode_brg);        
        $this->session->set_flashdata('success', 'Proses berhasil dilakukan');
        redirect('barang'); 
    }
}