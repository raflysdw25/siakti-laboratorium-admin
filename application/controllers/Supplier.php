 <?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Supplier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['Supplier_m']);
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $suppliers = $this->Supplier_m->get();        
        // $maxId = number_format($this->Supplier_m->maxId()[0]->max);
        // var_dump($maxId + 1); exit;
        $data =  ['suppliers' => $suppliers];
        $this->template->load('template', 'supplier/index',$data);
    }

    public function add()
    {
        $validation = $this->form_validation;    	
        $validation->set_rules('id_supp', 'Nama Perusahaan', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');
        $validation->set_rules('tlpn', 'Telepon', 'required');
        $validation->set_rules('email', 'Email', 'required');
        $validation->set_rules('pic', 'Person In Charge', 'required');
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');    	
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($validation->run() == FALSE)
    	{
            $maxId = number_format($this->Supplier_m->maxId()[0]->max);
            $nextId = ($maxId == null) ? 1 :  $maxId + 1;
            $data = ['nextId' => $nextId];
            $this->template->load('template','supplier/supplier_form_add', $data);
		} else {			
            $result = $this->Supplier_m->add();            
            $this->session->set_flashdata('success', 'Perusahaan Berhasil ditambahkan');
            redirect('supplier');                        
    	}
    	
    }

    

    public function edit($id_supp)
    {
        
        $validation = $this->form_validation;    	
        $validation->set_rules('id_supp', 'ID Perusahaan', 'required');
        $validation->set_rules('nama_supp', 'Nama Perusahaan', 'required');
        $validation->set_rules('alamat', 'Alamat', 'required');
        $validation->set_rules('tlpn', 'Telepon', 'required');
        $validation->set_rules('email', 'Email', 'required');
        $validation->set_rules('pic', 'Person In Charge', 'required');
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');    	
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($validation->run() == FALSE)
    	{            
            $supplier = $this->Supplier_m->get($id_supp)[0];            
            $data['supplier'] = $supplier;
            $this->template->load('template','supplier/supplier_form_edit', $data);
		} else {			
            $result = $this->Supplier_m->edit();            
            $this->session->set_flashdata('success', 'Perusahaan Berhasil diubah');
            redirect('supplier');                        
    	}
    	
    }

    public function delete($id_supp)
    {                
        $result = $this->Supplier_m->delete($id_supp);                        
        if($result->responseCode == "00"){
            $this->session->set_flashdata('success', 'Proses berhasil dilakukan');
            redirect('supplier');             
        }
    }
}