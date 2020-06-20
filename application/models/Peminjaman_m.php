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

    public function updatePeminjamanMahasiswa(){
        
        $data = [
            'kd_pjm' => $this->input->post('kd_pjm'),
            'mahasiswa_nim' => $this->input->post('mahasiswa_nim'),
            
        ];
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