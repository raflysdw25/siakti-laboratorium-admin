 <?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // check_not_login();
        $this->load->model(['Peminjaman_m', 'Barang_m']);
        $this->load->library('form_validation');
    }

    public function showPeminjaman($kd_pjm){
        $data['pinjambrg'] = $this->Peminjaman_m->get($kd_pjm)[0];
        $data['generator'] = new Picqer\Barcode\BarcodeGeneratorPNG(); //Digunakan untuk mengenerate barcode
        $this->load->view('peminjaman/peminjaman_show',$data);
    }

    public function index()
    {
        # code...
        $data['peminjaman'] = $this->Peminjaman_m->get();
        $this->template->load('template', 'peminjaman/index', $data);
    }

	public function delete($kd_pjm)
	    {        
	        $result = $this->Peminjaman_m->delete($kd_pjm);        
	        $this->session->set_flashdata('success', 'Proses berhasil dilakukan');
	        redirect('peminjaman'); 
	    }

}