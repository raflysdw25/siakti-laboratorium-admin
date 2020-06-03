<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Barang_m extends CI_Model {

	private $_client;

	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'
        ]);
    }
	
	

	public function get($id = null)
	{
		if($id){
			$response = $this->_client->request('GET', 'laboratorium/barang', [
				'query' => [
					'kode_brg' => $id
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'laboratorium/barang');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}

	public function add()
	{		
		$data = [
			"kode_brg" => $this->input->post('kode_brg',true),
			"nama_brg" => $this->input->post('nama_brg',true),
			"jenis" => $this->input->post('jenis',true),
			"spesifikasi" => $this->input->post('spesifikasi',true),
			"jml" => $this->input->post('jml',true),
			"satuan" => $this->input->post('satuan',true),
			"thn_pengadaan" => date("Y-m-d", strtotime($this->input->post('thn_pengadaan',true))),
			"asal_pengadaan" => $this->input->post('asal_pengadaan',true),
			"supplier_nama_supp" => $this->input->post('supplier_nama_supp',true),			
		];		

		$response = $this->_client->request('POST', 'laboratorium/barang',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
	}

	public function delete($kode_brg)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/barang', [
            'form_params' => [
                'kode_brg' => $kode_brg,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
    }

    public function edit()
	{
		$data = [
			"kode_brg" => $this->input->post('kode_brg',true),
			"nama_brg" => $this->input->post('nama_brg',true),
			"jenis" => $this->input->post('jenis',true),
			"spesifikasi" => $this->input->post('spesifikasi',true),
			"jml" => $this->input->post('jml',true),
			"satuan" => $this->input->post('satuan',true),
			"thn_pengadaan" => date("Y-m-d", strtotime($this->input->post('thn_pengadaan',true))),
			"asal_pengadaan" => $this->input->post('asal_pengadaan',true),
			"supplier_nama_supp" => $this->input->post('supplier_nama_supp',true),			
		];		

		$response = $this->_client->request('PUT', 'laboratorium/barang',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
	}

}