<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Staff_m extends CI_Model {
	
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/'
        ]);
    }
	
	public function login()
	{
		$data = [			
			"usr_name" => $this->input->post('usr_name',true),		
			"password" => $this->input->post('password',true),			
		];		

		$response = $this->_client->request('POST', 'staff/access',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}
	

	public function get($nip = null)
	{
		if($nip){
			$response = $this->_client->request('GET', 'staff', [
				'query' => [
					'nip' => $nip
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'staff');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}

	
}