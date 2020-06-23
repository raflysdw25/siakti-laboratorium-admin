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
        $this->load->model(['Peminjaman_m','PeminjamanDetail_m', 'Barang_m', 'mahasiswa_m', 'Staff_m']);
        $this->load->library('form_validation');
    }

    public function detailBarang($kd_pjm){        
        $data["barang"] = $this->PeminjamanDetail_m->get($kd_pjm);        
                               
        $this->load->view('peminjaman/peminjaman_barang',$data);
    }

    public function detailPeminjam($kd_pjm)
    {
        $peminjam = $this->Peminjaman_m->get($kd_pjm)[0];
        if($peminjam->mahasiswa_nim == null){
            $staff = $this->Staff_m->get($peminjam->staff_nip)[0];            
            $data['staff'] = $staff;
            $data['mahasiswa'] = null;                                
        }else{
            $mahasiswa = $this->mahasiswa_m->get($peminjam->mahasiswa_nim)[0];
            $data['mahasiswa'] = $mahasiswa; 
            $data['staff'] = null;                   
        } 
        
        // var_dump($data); exit;

        $this->load->view('peminjaman/detail_peminjam', $data);
    }

    public function index()
    {        
        $data['peminjaman'] = $this->Peminjaman_m->get();
        $this->template->load('template', 'peminjaman/index', $data);
    }

    

	public function delete($kd_pjm)
    {                   
        $details = $this->PeminjamanDetail_m->get($kd_pjm);
        if($details !== null){
            // Mengubah jumlah barang dengan menambahkan kembali data yang telah dipinjam
            foreach ($details as $detail) {
                $post = $this->input->post(null,true);
                $barang = $this->Barang_m->get($detail->barang_kode_brg)[0];
                $post["kode_brg"] = $barang->kode_brg;
                $post["jumlah"] = $barang->jumlah + $detail->jumlah;
                $post["status"] = "TERSEDIA";
                $result = $this->Barang_m->updateStatus($post); 
            }

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