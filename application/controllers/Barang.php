<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();                
        $this->load->library('form_validation');
        check_not_login();        
    }
    
    public function index()
    {            
        $allBarang = retrieveData('laboratorium/barang');        
        $data["barang"] = $allBarang->data;
        
        $this->template->load('template', 'barang/index',$data);
    }

    public function showBarang($kode_brg){        
        $detailBarang = retrieveData('laboratorium/barang?kode_brg='.$kode_brg);

        $barang = $detailBarang->data[0];          
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $data = ["barang" => $barang, 'generator' => $generator]; //Digunakan untuk mengenerate barcode        
        $this->load->view('barang/barang_show',$data);
    }

    

    public function add()
    {        
    	$this->form_validation->set_rules('kode_brg', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');                        
        $this->form_validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $this->form_validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');
        $this->form_validation->set_rules('kondisi', 'Kondisi Barang', 'required');        
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        
        if($this->form_validation->run() == FALSE)
    	{
            // Mendapatkan ID Terbaru        
            $kode_brg = retrieveData('laboratorium/barang/maxId');            
            $maxId = $kode_brg->data[0]->max;
            $nextId = ($maxId == null) ? 1 :  $maxId + 1;

            $getSupplier = retrieveData('laboratorium/supplier');
            $suppliers = $getSupplier->data;

            $getJenisBarang = retrieveData('laboratorium/jenisbarang');
            $jenisbarang = $getJenisBarang->data;

            $data = ['suppliers' => $suppliers, 'nextId' => $nextId, 'jenisbarang' => $jenisbarang];
    		$this->template->load('template', 'barang/barang_add', $data);
		} else {   
            $post = $this->input->post(); 

            // Buat barang sesuai jumlah yang ditentukan
            for($i = 0; $i < $post["jumlah"]; $i++){
                $post["supplier_id_supp"] = ($post["supplier_id_supp"] == null) ? null : $post["supplier_id_supp"];                            
                // Buat Barcode            
                $nama_brg = $post['nama_brg'];                        
    
                $words = explode(" ", $nama_brg);
                $namabrg_acronym = ucwords($words[0][0])."".ucwords($words[0][1]);
                                
                $newKodeBarang = "";
                if($post['kode_brg'] < 10){
                    $newKodeBarang = "000"."".$post['kode_brg'];
                }else if($post['kode_brg'] >= 10 && $post['kode_brg'] < 100){
                    $newKodeBarang = "00"."".$post['kode_brg'];
                }else if($post['kode_brg'] >= 100 && $post['kode_brg'] < 999){
                    $newKodeBarang = "0"."".$p1ost['kode_brg'];
                }else{
                    $newKodeBarang = $post['kode_brg'];
                }
            
                $post["barcode"] = $newKodeBarang."".$namabrg_acronym."".substr($post['thn_pengadaan'],2,3);
                $post["status"] = "TERSEDIA";
                $input_barang = postData('laboratorium/barang', $post);
                
                $post["kode_brg"]++;
            }

            if($input_barang->responseCode == "00"){
                $this->session->set_flashdata('success', 'Barang Berhasil ditambahkan');
                redirect('barang');                        
            }
    	}
    }

    public function edit($kode_brg)
    {                
    	$this->form_validation->set_rules('kode_brg', 'Kode Barang', 'required');
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'required');        
        $this->form_validation->set_rules('kondisi', 'Kondisi Barang', 'required');
        $this->form_validation->set_rules('status', 'Status Barang', 'required');        
        $this->form_validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $this->form_validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');        
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        
        if($this->form_validation->run() == FALSE)
    	{
            // Suppliers            
            $getSupplier = retrieveData('laboratorium/supplier');
            $suppliers = $getSupplier->data;

            // Barang
            $getBarang = retrieveData('laboratorium/barang?kode_brg='.$kode_brg);            
            $barang = $getBarang->data[0];

            // Jenis Barang
            $getJenisBarang = retrieveData('laboratorium/jenisbarang');
            $jenisbarang = $getJenisBarang->data;

            $data = ['suppliers' => $suppliers, 'barang' => $barang, 'jenisbarang' => $jenisbarang];
    		$this->template->load('template', 'barang/barang_edit', $data);
		} else {
            $post = $this->input->post();
            $post["supplier_id_supp"] = ($post["supplier_id_supp"] == null) ? null : $post["supplier_id_supp"];
                        
            $put_barang = updateData('laboratorium/barang', $post);
            if($put_barang->responseCode == "00"){
                $this->session->set_flashdata('success', 'Data Barang Berhasil diubah');
                redirect('barang');                        
            }else{
                $this->session->set_flashdata('failed', 'Data Barang Gagal diubah');
                redirect('barang/edit/'.$kode_brg);
            }
    	}
    }

    // ROMBAK INFO : BUAT BARANG RUSAK LANGSUNG UBAH KONDISI 
    public function ubahKondisi($kode_brg)
    {
        $post = $this->input->post();
        $getBarang = retrieveData('laboratorium/barang?kode_brg='.$kode_brg);
        $barang = $getBarang->data[0];
        if($barang->status == "DIGUNAKAN"){
            $this->session->set_flashdata('failed', 'Barang tidak tersedia, kondisi tidak dapat diubah');
            redirect('barang');
        }else{
            $post["kode_brg"] = $kode_brg;
            $kondisi = $post["kondisi"];
    
            if($kondisi == "BAIK"){
                $post["status"] = "TERSEDIA";            
            }else{
                $post["status"] = "TIDAK TERSEDIA";
            }
            
            $updateStatus = updateData('laboratorium/barang/updateStatus', $post);        
            if($updateStatus->responseCode == "00"){
                $this->session->set_flashdata('success', 'Kondisi berhasil diubah');
                redirect('barang');
            }
        }
    }
            

    public function delete($kode_brg)
    {    
        $post = $this->input->post(null, true);

        $post['kode_brg'] = $kode_brg;
        
        $delete_barang = deleteData('laboratorium/barang', $post);
        if($delete_barang->responseCode == "00")        {
            $this->session->set_flashdata('success', 'Hapus Barang berhasil dilakukan');
            redirect('barang'); 
        }else{
            $this->session->set_flashdata('failed', 'Hapus Barang Gagal dilakukan');
            redirect('barang'); 
        }
    }

    function barcode_print($kode_brg){;    
        $barcode_barang = retrieveData('laboratorium/barang?kode_brg='.$kode_brg);

        $barang = $barcode_barang->data[0];

        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $data = ['barang' => $barang, 'generator' => $generator];
        $html = $this->load->view('barang/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode -'.$barang->barcode, 'A4', 'potrait');
    }
}