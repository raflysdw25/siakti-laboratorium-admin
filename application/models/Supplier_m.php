<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Supplier_m extends CI_Model {

	private $_client;

	public function __construct()
    {
		// 'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'  --> backup uri
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/',
        ]);
    }
	
	public function get($nama_supp = '')
	{
		if($nama_supp){
			$response = $this->_client->request('GET', 'laboratorium/supplier', [
				'query' => [
					'nama_supp' => $nama_supp
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'laboratorium/supplier');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}

	public function add()
	{
		$data = [			
			"nama_supp" => $this->input->post('nama_supp',true),
			"alamat" => $this->input->post('alamat',true),
			"tlpn" => $this->input->post('tlpn',true),
			"email" => $this->input->post('email',true),
			"pic" => $this->input->post('pic',true),						
		];		

		$response = $this->_client->request('POST', 'laboratorium/supplier',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
	}

	public function edit()
	{
		$data = [			
			"nama_supp" => $this->input->post('nama_supp',true),
			"alamat" => $this->input->post('alamat',true),
			"tlpn" => $this->input->post('tlpn',true),
			"email" => $this->input->post('email',true),
			"pic" => $this->input->post('pic',true),						
		];		

		$response = $this->_client->request('PUT', 'laboratorium/supplier',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
	}

	public function delete($nama_supp)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/supplier', [
            'form_params' => [
                'nama_supp' => $nama_supp,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
    }
}