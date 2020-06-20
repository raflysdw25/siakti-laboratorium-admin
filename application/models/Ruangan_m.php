<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Ruangan_m extends CI_Model {

	private $_client;

	// 'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'  --> backup uri
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/',
        ]);
    }
		

	public function get($id_ruangan = null)
	{
		if($id_ruangan){
			$response = $this->_client->request('GET', 'laboratorium/ruangan', [
				'query' => [
					'id_ruangan' => $id_ruangan
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'laboratorium/ruangan');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
    }
}
?>