<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Peminjaman_m extends CI_Model {

	private $_client;

	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'
        ]);
    }
	
	// public function view($post)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('peminjaman');
	// 	$this->db->where('kode_pinjam', $post['Kode Peminjaman']);
	// 	$this->db->where('tgl_pinjam_start', $post['Tanggal Peminjaman']);
	// 	$this->db->where('tgl_kembali_end', $post['Tanggal Pengembalin']);
	// 	$this->db->where('tgl_kembali_real', $post['Tanggal Pengembalin Real']);
	// 	$this->db->where('ruangan_namaruang', $post['Nama Ruangan']);
	// 	$this->db->where('mahasiswa_nim', $post['NIM Mahasiswa']);
	// 	$this->db->where('tujuan_pinjam', $post['Tujuan Peminjaman']);
	// 	$this->db->where('staff_nip', $post['NIP Staff']);
	// 	$this->db->where('jadwal_kul_kodejdwl', $post['Kode Jadwal Kuliah']);
	// 	$query = $this->db->get();
	// 	return $query; 
	// }

	public function get($id = null)
	{
		if($id){
			$response = $this->_client->request('GET', 'laboratorium/peminjaman', [
				'query' => [
					'kd_pjm' => $id
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'laboratorium/peminjaman');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}


    public function delete($kd_pjm)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/peminjaman', [
            'form_params' => [
                'kd_pjm' => $kd_pijm,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
    }
}