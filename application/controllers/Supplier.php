 <?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();        
        // $this->load->model(['Supplier_m']);
        $this->load->library('form_validation');
        check_not_login();
    }
    
    public function index()
    {        
        $suppliers = retrieveData('laboratorium/supplier');

        $data["suppliers"] = $suppliers->data;
        $this->template->load('template', 'supplier/index',$data);
    }

    public function add()
    {                
        $this->form_validation->set_rules('nama_supp', 'Nama Supplier', 'required|callback_namasupplier_check|max_length[100]');        
        $this->form_validation->set_rules('tlpn', 'Telepon', 'required');        
        $this->form_validation->set_rules('pic', 'Person In Charge', 'required');
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} kata');    	
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() === FALSE)
    	{                        
            $this->template->load('template','supplier/supplier_form_add');
		} else {			            
            $post = $this->input->post();
            $post["alamat"] = ($post["alamat"] == null) ? null : $post["alamat"];
            $post["email"] = ($post["email"] == null) ? null : $post["email"];

            $input_supplier = postData('laboratorium/supplier', $post);
            if($input_supplier->responseCode == "00"){
                $this->session->set_flashdata('success', 'Supplier Berhasil ditambahkan');
                redirect('supplier');                        
            }else{
                $this->session->set_flashdata('failed', 'Supplier Gagal ditambahkan');
                redirect('supplier/add');                        
            }
    	}
    	
    }

    

    public function edit($id_supp)
    {
                   	
        $this->form_validation->set_rules('id_supp', 'ID Supplier', 'required');
        $this->form_validation->set_rules('nama_supp', 'Nama Supplier', 'required|callback_namasupplier_check');        
        $this->form_validation->set_rules('tlpn', 'Telepon', 'required');        
        $this->form_validation->set_rules('pic', 'Person In Charge', 'required');
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');    	
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() == FALSE)
    	{                        
            $getSupplier = retrieveData('laboratorium/supplier?id_supp='.$id_supp);
            $supplier = $getSupplier->data[0];            
            $data['supplier'] = $supplier;
            $this->template->load('template','supplier/supplier_form_edit', $data);
		} else {			            
            $post = $this->input->post();
            $post["alamat"] = ($post["alamat"] == null) ? null : $post["alamat"];
            $post["email"] = ($post["email"] == null) ? null : $post["email"];
            
            $edit_supplier = updateData('laboratorium/supplier',$post);
            
            if($edit_supplier->responseCode == "00"){
                $this->session->set_flashdata('success', 'Perusahaan Berhasil diubah');
                redirect('supplier');                        
            }else{
                $this->session->set_flashdata('failed', 'Perusahaan Gagal diubah');
                redirect('supplier/edit/'.$id_supp);                        
            }
    	}
    	
    }

    function namasupplier_check(){
        $post = $this->input->post(null,TRUE);
        $post["id_supp"] = ($this->input->post('id_supp') == null) ? null : $this->input->post('id_supp');
        
        $ambil_nama = postData('laboratorium/supplier/namasupp', $post);        
        if($ambil_nama->responseCode == "200"){
            $this->form_validation->set_message('namasupplier_check', '{field} ini sudah dipakai, silahkan ganti' );
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function delete($id_supp)
    {                
        $post = $this->input->post(null, true);

        $post['id_supp'] = $id_supp;
        $delete_supllier = deleteData('laboratorium/supplier', $post);

        if($delete_supllier->responseCode == "00"){
            $this->session->set_flashdata('success', 'Supplier berhasil dihapus');
            redirect('supplier');             
        }else{
            $this->session->set_flashdata('failed', 'Supplier gagal dihapus');
            redirect('supplier');             
        }
    }
}