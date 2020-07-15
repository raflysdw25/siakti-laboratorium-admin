 <?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        // $this->load->model(['Peminjaman_m','PeminjamanDetail_m', 'Barang_m', 'mahasiswa_m', 'Staff_m']);
        $this->load->library('form_validation');
        check_not_login();
    }

    public function detailBarang($kd_pjm){                        
        $barang = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$kd_pjm);
                
        $data["barang"] = $barang->data;      
                               
        $this->load->view('peminjaman/peminjaman_barang',$data);
    }

    public function detailPeminjam($kd_pjm)
    {        
        $data = array();        
        $peminjam = retrieveData('laboratorium/peminjaman?kd_pjm='.$kd_pjm);

        $peminjam = $peminjam->data[0];        
        if($peminjam->mahasiswa_nim == null){ //mahasiswa_nim null            
            $staff = retrieveData('staff?nip='.$peminjam->staff_nip);                  
            $data['staff'] = $staff->data[0];
            $data['mahasiswa'] = null;                                
        }else{ //staff_nip null                        
            $mahasiswa = retrieveData('mahasiswa?nim='.$peminjam->mahasiswa_nim);            
            $data['mahasiswa'] = $mahasiswa->data[0]; 
            $data['staff'] = null;                   
        } 
                

        $this->load->view('peminjaman/detail_peminjam', $data);
    }

    public function index()
    {                                
        $peminjaman = retrieveData('laboratorium/peminjaman');
            

        $data["peminjaman"] = $peminjaman->data;

        $this->template->load('template', 'peminjaman/index', $data);
    }

    
    public function approval($kd_pjm){
        $post["kd_pjm"] = $kd_pjm;
        $post["status"] = "APPROVE";

        $putPeminjaman = updateData('laboratorium/peminjaman/updatestatus', $post);
        if($putPeminjaman->responseCode == "00"){
            $this->session->set_flashdata('success', 'Peminjaman sudah diizinkan');
            redirect('peminjaman');
        }
    }


	public function delete($kd_pjm)
    {
        $post = $this->input->post(null, true);

        $post['kd_pjm'] = $kd_pjm; //Untuk menghapus peminjaman
        
        $post['pinjambrg_kd_pjm'] = $kd_pjm;  //Untuk menghapus detail peminjaman             
                
        $details = retrieveData('laboratorium/peminjamandetail?pinjambrg_kd_pjm='.$kd_pjm);
        $details = $details->data;

        if($details == null){            
            $deletePeminjaman = deleteData('laboratorium/peminjaman', $post);
            if($deletePeminjaman->responseCode == "00"){
                $this->session->set_flashdata('success', 'Peminjaman berhasil dihapus');
                redirect('peminjaman');
            }else{
                $this->session->set_flashdata('failed', 'Peminjaman gagal dihapus');
                redirect('peminjaman');
            }            
        }else{ 
            foreach($details as $detail){
                // Mengubah Status Barang jadi Tersedia
                $post["kode_brg"] = $detail->barang_kode_brg;
                $post["status"] = "TERSEDIA";
                $putBarang = updateData('laboratorium/barang/updatestatus',$post);
            }                      
            $deleteDetail = deleteData('laboratorium/peminjamandetail', $post);
            if($deleteDetail->responseCode == "00"){                                
                $delete_peminjaman = deleteData('laboratorium/peminjaman',$post);
                $this->session->set_flashdata('success', 'Peminjaman berhasil dihapus');
                redirect('peminjaman');
            }
        }
    }

}