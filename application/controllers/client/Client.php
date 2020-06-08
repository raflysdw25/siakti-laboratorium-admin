<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Client extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        // $this->load->model(['Barang_m', 'supplier_m']);
        // $this->load->library('form_validation');
    }

    public function index(){
        
    }

    public function showData()
    {
        $this->template->load('template_client', 'client/card_data');
    }
}