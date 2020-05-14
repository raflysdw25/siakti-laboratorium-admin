 <?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Peminjaman extends CI_Controller
{
    
    public function index()
    {
        # code...
        $this->template->load('template', 'peminjaman/index');
    }


}