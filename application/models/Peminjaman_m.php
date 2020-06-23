<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Peminjaman_m extends CI_Model {

	private $_client;

	// 'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'  --> backup uri
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/',
        ]);
    }
		

	public function get($kd_pjm = null)
	{
		if($kd_pjm){
			$response = $this->_client->request('GET', 'laboratorium/peminjaman', [
				'query' => [
					'kd_pjm' => $kd_pjm
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'laboratorium/peminjaman');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
    }

    public function getPeminjamMahasiswa($mahasiswa_nim)
	{
        $response = $this->_client->request('GET', 'laboratorium/peminjaman/pinjammahasiswa', [
            'query' => [
                'mahasiswa_nim' => $mahasiswa_nim
            ]
        ]);					

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
    }

    public function getPeminjamStaff($staff_nip)
	{
        $response = $this->_client->request('GET', 'laboratorium/peminjaman/pinjamstaff', [
            'query' => [
                'staff_nip' => $staff_nip
            ]
        ]);					

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
    }


    public function maxId(){
		$response = $this->_client->request('GET', 'laboratorium/peminjaman/maxId');
		$result = json_decode($response->getBody()->getContents());                
        return $result->data;
	}
    
    public function addPeminjamanMahasiswa($kd_pjm, $mahasiswa_nim)
    {
        $data = [
            'kd_pjm' => $kd_pjm,
            'mahasiswa_nim' => $mahasiswa_nim
        ];

        $response = $this->_client->request('POST', 'laboratorium/peminjaman',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }

    public function addPeminjamanStaff($kd_pjm, $staff_nip)
    {
        $data = [
            'kd_pjm' => $kd_pjm,
            'staff_nip' => $staff_nip
        ];

        $response = $this->_client->request('POST', 'laboratorium/peminjaman',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }

    public function updatePeminjaman($post){
        
        $mahasiswa_nim = ($post["mahasiswa_nim"] == "") ? null : $post["mahasiswa_nim"];
        $staff_nip = ($post["staff_nip"] == "") ? null : $post["staff_nip"];
        $staff_penanggungjawab = ($post["staff_penanggungjawab"] == "") ? null : $post["staff_penanggungjawab"];

        $data = [
            'kd_pjm' => $post["kd_pjm"],
            'mahasiswa_nim' => $mahasiswa_nim,
            'staff_nip' => $staff_nip,
            'staff_penanggungjawab' => $staff_penanggungjawab,
            'tgl_pjm' => $post["tgl_pjm"],
            'tgl_blk' => $post["tgl_blk"],
            'keperluan' => $post["keperluan"]                       ,
            'ruangan_idruangan' => $post["ruangan_idruangan"]
        ];

        $response = $this->_client->request('PUT', 'laboratorium/peminjaman',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }

    public function updatePengembalian($post){
        $data = [
            'kd_pjm' => $post["kd_pjm"],            
            'tgl_blk_real' => $post["tgl_blk_real"]
        ]; 

        $response = $this->_client->request('PUT', 'laboratorium/peminjaman/updateKembali',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }


    public function delete($kd_pjm)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/peminjaman', [
            'form_params' => [
                'kd_pjm' => $kd_pjm,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }
}