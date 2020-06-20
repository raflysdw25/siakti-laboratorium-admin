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
        $this->load->model(['Peminjaman_m','PeminjamanDetail_m', 'Barang_m', 'mahasiswa_m', 'staff_m']);
        $this->load->library('form_validation');
    }

    public function detailBarang($kd_pjm){        
        $pinjambrg_detail = $this->PeminjamanDetail_m->get($kd_pjm);        
        $data = array(
            "barang" => array()
        );
        foreach ($pinjambrg_detail as $detail) {
            $data["barang"][] = $this->Barang_m->get($detail->barang_kode_brg)[0];
        }                        
        $this->load->view('peminjaman/peminjaman_barang',$data);
    }

    public function detailPeminjam($mahasiswa_nim='', $staff_nip='')
    {
        if($mahasiswa_nim == null){
            $staff = $this->staff_m->get($staff_nip)[0];
            $data['staff'] = $staff;            
        }else{
            $mahasiswa = $this->mahasiswa_m->get($mahasiswa_nim)[0];
            $data['mahasiswa'] = $mahasiswa;                    
        }        

        $this->load->view('peminjaman/detail_peminjam', $data);
    }

    public function index()
    {        
        $data['peminjaman'] = $this->Peminjaman_m->get();
        $this->template->load('template', 'peminjaman/index', $data);
    }

    

	public function delete($kd_pjm)
    {                   
        $detail = $this->PeminjamanDetail_m->get($kd_pjm);
        if($detail->data !== null){
            $deleteDetail = $this->PeminjamanDetail_m->delete($kd_pjm);
            if($deleteDetail->responseCode == "00"){
                $result = $this->Peminjaman_m->delete($kd_pjm);            
                $this->session->set_flashdata('success', 'Proses berhasil dilakukan');
                redirect('peminjaman');
            }
        }else{
            $result = $this->Peminjaman_m->delete($kd_pjm);            
            $this->session->set_flashdata('failed', 'Peminjaman batal dilakukan');
            redirect('peminjaman');
        }
    }

}