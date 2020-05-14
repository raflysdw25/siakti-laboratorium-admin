<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_m extends CI_Model {
	
	public function view($post)
	{
		$this->db->select('*');
		$this->db->from('peminjaman');
		$this->db->where('kode_pinjam', $post['Kode Peminjaman']);
		$this->db->where('tgl_pinjam_start', $post['Tanggal Peminjaman']);
		$this->db->where('tgl_kembali_end', $post['Tanggal Pengembalin']);
		$this->db->where('tgl_kembali_real', $post['Tanggal Pengembalin Real']);
		$this->db->where('ruangan_namaruang', $post['Nama Ruangan']);
		$this->db->where('mahasiswa_nim', $post['NIM Mahasiswa']);
		$this->db->where('tujuan_pinjam', $post['Tujuan Peminjaman']);
		$this->db->where('staff_nip', $post['NIP Staff']);
		$this->db->where('jadwal_kul_kodejdwl', $post['Kode Jadwal Kuliah']);
		$query = $this->db->get();
		return $query; 
	}

	public function get($id = null)
	{
		$this->db->from('peminjaman');
		if($id != null){
			$this->db->where('kode_brg', $kode_pinjam);
		}
		$query = $this->db->get();
		return $query;
	}

	public function delete($id)
    {
        $this->db->where('kode_pinjam', $kode_pinjam);
        $this->db->delete('peminjaman');
    }
}