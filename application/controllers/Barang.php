<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Staff extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('Barang_m');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        # code...
        $data['row'] = $this->Barang_m->get();
        $this->load->view('template', 'barang/barang_data');
    }

    public function add()
    {
    	
    	$this->form_validation->set_rules('kode_brg', 'Kode Barang', 'required|is_unique');
        $this->form_validation->set_rules('nama_brg', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi Barang', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $this->form_validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');
        $this->form_validation->set_rules('supplier_nama_supp', 'Supplier', 'required');
    	
    	
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
    	$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
    	$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if($this->form_validation->run() == FALSE)
    	{
    		$this->template->load('template', 'barang/barang_form_add');
		} else {
			$post = $this->input->post(null, TRUE);
            $this->Barang_m->add($post);
            if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil disimpan');
                </script>";
            }
                echo "<script>windows.location='".site_url('barang')."';
                </script>";
    	}
    }

    public function edit($kode_brg)
    {
        
        $this->form_validation->set_rules('kode_brg', 'Kode Barang', 'required|is_unique');
        $this->form_validation->set_rules('nama_brg', 'Nama_Barang', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('spesifikasi', 'Spesifikasi Barang', 'required');
        $this->form_validation->set_rules('jml', 'Jumlah Barang', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('thn_pengadaan', 'Tahun Pengadaan', 'required');
        $this->form_validation->set_rules('asal_pengadaan', 'Asal Pengadaan', 'required');
        $this->form_validation->set_rules('supplier_nama_supp', 'Supplier', 'required');
        
        
        $this->form_validation->set_message('required', '%s masih kosong, silakan isi');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan diganti yang lain');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');


        if($this->form_validation->run() == FALSE)
        {
            $query = $data['row'] = $this->Barang_m->get();
            if ($query->num_rows() > 0) {
                # code...
                $data['row'] = query->row();
            $this->template->load('template', 'barang/barang_form_edit', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');
                </script>"; 
                echo "windows.location='".site_url('barang')."';
                </script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->Barang_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil disimpan');
                </script>";
            }
                echo "<script>windows.location='".site_url('barang')."';
                </script>";
        }
    }

    public function delete()
    {
        $id = $this->input->post('kode_brg');
        $this->User_m->delete($kode_brg);
        if ($this->db->affected_rows() > 0) {
                # code...
                echo "<script>
                    alert('Data berhasil dihapus');
                </script>";
            }
                echo "<script>windows.location='".site_url('barang')."';
                </script>";
    }
}