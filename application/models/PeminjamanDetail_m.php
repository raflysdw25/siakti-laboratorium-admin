<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class PeminjamanDetail_m extends CI_Model {

	private $_client;

	// 'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'  --> backup uri
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/',
        ]);
    }
		

	public function get($pinjambrg_kd_pjm)
	{
        $response = $this->_client->request('GET', 'laboratorium/peminjamandetail', [
            'query' => [
                'pinjambrg_kd_pjm' => $pinjambrg_kd_pjm
            ]
        ]);					

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
    }
    
    public function getDetail($id_detail)
	{
		if($id_detail){
			$response = $this->_client->request('GET', 'laboratorium/peminjamandetail/detailGet', [
				'query' => [
					'id_detail' => $id_detail
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'laboratorium/peminjamandetail/detailGet');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}


    public function delete($pinjambrg_kd_pjm)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/peminjamandetail', [
            'form_params' => [
                'pinjambrg_kd_pjm' => $pinjambrg_kd_pjm,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }

    public function deleteDetail($id_detail)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/peminjamandetail/deleteDetail', [
            'form_params' => [
                'id_detail' => $id_detail,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }
}