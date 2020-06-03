<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Supplier_m extends CI_Model {

	private $_client;

	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://api-siakti.raflywebdeveloper.com/api/',
        ]);
    }
	
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', shal($post['password']));
		$query = $this->db->get();
		return $query; 
	}

	public function get($nama_supp = null)
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

	public function add($post)
	{
		$params['nm_supplier'] = $post['nm_supplier'];
		$params['almt_supplier'] = $post['almt_supplier'] != "" ? $post['almt_supplier'] :null;
		$this->db->insert('user', $params);
	}
}