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

     public function delete()
    {
        $id = $this->input->post('kode_pinjam');
        $this->Peminjaman_m->delete($kode_pinjam);
        if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil dihapus');
                </script>";
            }
                echo "<script>windows.location='".site_url('staff')."';
                </script>";
    }

}