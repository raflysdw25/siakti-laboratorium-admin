 <?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Supplier extends CI_Controller
{
    
    public function index()
    {
        # code...
        $this->template->load('template', 'supplier/index');
    }

    public function add()
    {
    	$this->template->load('template','supplier/supplier_form_add');
    }
}