<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Mahasiswa_m extends CI_Model {

	private $_client;

	// 'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'  --> backup uri
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/'
        ]);
    }
	
	

	public function get($nim = null)
	{
		if($nim){
			$response = $this->_client->request('GET', 'mahasiswa', [
				'query' => [
					'nim' => $nim
				]
			]);			
		}else{
			$response = $this->_client->request('GET', 'mahasiswa');
		}

        $result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}

	public function kartuMahasiswa_get($no_ktm)
	{
		$response = $this->_client->request('GET', 'mahasiswa/kartuMahasiswa', [
			'query' => [
				'no_ktm' => $no_ktm
			]
		]);

		$result = json_decode($response->getBody()->getContents());
                
        return $result;
	}

	public function add()
	{		
		$data = [
			"nim" => $this->input->post('nim',true),
			"nama_brg" => $this->input->post('nama_brg',true),
			"jenis" => $this->input->post('jenis',true),
			"spesifikasi" => $this->input->post('spesifikasi',true),
			"jml" => $this->input->post('jml',true),
			"satuan" => $this->input->post('satuan',true),
			"thn_pengadaan" => date("Y-m-d", strtotime($this->input->post('thn_pengadaan',true))),
			"asal_pengadaan" => $this->input->post('asal_pengadaan',true),
			"supplier_nama_supp" => $this->input->post('supplier_nama_supp',true),			
		];		

		$response = $this->_client->request('POST', 'mahasiswa',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
	}

	public function delete($nim)
    {
		$response = $this->_client->request('DELETE', 'mahasiswa', [
            'form_params' => [
                'nim' => $nim,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
    }

    public function edit()
	{
		$data = [
			"nim" => $this->input->post('nim',true),
			"nama_brg" => $this->input->post('nama_brg',true),
			"jenis" => $this->input->post('jenis',true),
			"spesifikasi" => $this->input->post('spesifikasi',true),
			"jml" => $this->input->post('jml',true),
			"satuan" => $this->input->post('satuan',true),
			"thn_pengadaan" => date("Y-m-d", strtotime($this->input->post('thn_pengadaan',true))),
			"asal_pengadaan" => $this->input->post('asal_pengadaan',true),
			"supplier_nama_supp" => $this->input->post('supplier_nama_supp',true),			
		];		

		$response = $this->_client->request('PUT', 'mahasiswa',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
    }
    

    public function updateKartu()
    {
        $data = [
			"nim" => $this->input->post('nim'),
			"no_ktm" => $this->input->post('no_ktm')			
		];		

		$response = $this->_client->request('PUT', 'mahasiswa/updateKartu',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
    }

}