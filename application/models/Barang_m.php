<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {
	
	public function view($post)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->where('kode_brg', $post['Kode Barang']);
		$this->db->where('nama_brg', $post['Nama Barang']);
		$this->db->where('jenis', $post['Jenis Barang']);
		$this->db->where('spesifikasi', $post['Spesifikasi Barang']);
		$this->db->where('jml', $post['Jumlah Barang']);
		$this->db->where('satuan', $post['Satuan']);
		$this->db->where('thn_pengadaan', $post['Tahun Pengadaan']);
		$this->db->where('asal_pengadaan', $post['Asal Pengadaan']);
		$this->db->where('supplier_nama_supp', $post['Supplier']);
		$query = $this->db->get();
		return $query; 
	}

	public function get($id = null)
	{
		$this->db->from('barang');
		if($id != null){
			$this->db->where('kode_brg', $kode_brg);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['kode_brg'] = $post['Kode Barang'];
		$params['nama_brg'] = $post['Nama Barang'];
		$params['jenis'] = $post['Jenis Barang'];
		$params['spesifikasi'] = $post['Spesifikasi Barang'];
		$params['jml'] = $post['Jumlah Barang'];
		$params['satuan'] = $post['Satuan'];
		$params['thn_pengadaan'] = $post['Tahun Pengadaan'];
		$params['asal_pengadaan'] = $post['Asal Pengadaan'];
		$params['supplier_nama_supp'] = $post['Supplier'];
		$this->db->insert('barang', $params);
	}

	public function delete($id)
    {
        $this->db->where('kode_brg', $kode_brg);
        $this->db->delete('barang');
    }

    public function edit($post)
	{
		$params['kode_brg'] = $post['Kode Barang'];
		$params['nama_brg'] = $post['Nama Barang'];
		$params['jenis'] = $post['Jenis Barang'];
		$params['spesifikasi'] = $post['Spesifikasi Barang'];
		$params['jml'] = $post['Jumlah Barang'];
		$params['satuan'] = $post['Satuan'];
		$params['thn_pengadaan'] = $post['Tahun Pengadaan'];
		$params['asal_pengadaan'] = $post['Asal Pengadaan'];
		$params['supplier_nama_supp'] = $post['Supplier'];
		$this->db->where('kode_brg', $post['Kode Barang']);
		$this->db->update('barang', $params);
	}

}