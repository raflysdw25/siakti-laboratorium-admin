<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Barang_m extends CI_Model {

	private $_client;

	// 'base_uri' => 'http://127.0.0.1/siakti-api/index.php/api/'  --> backup uri
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/'
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

	public function maxId(){
		$response = $this->_client->request('GET', 'laboratorium/barang/maxId');
		$result = json_decode($response->getBody()->getContents());                
        return $result->data;
	}


	public function add()
	{	
		$nama_brg = $this->input->post('nama_brg',true);
		$asal_pengadaan = $this->input->post('asal_pengadaan',true);
		$thn_pengadaan = $this->input->post('thn_pengadaan',true);
		$spesifikasi = addslashes($this->input->post('spesifikasi',true));
		$words = explode(" ", $nama_brg);
        $namabrg_acronym = "";

        foreach ($words as $w) {
            $namabrg_acronym .= $w[0];
		}
		$barcode = $namabrg_acronym."".$asal_pengadaan."".substr($thn_pengadaan,2,3);			
		
		$data = [
			"kode_brg" => $this->input->post('kode_brg',true),
			"nama_brg" => $nama_brg,
			"jenis" => $this->input->post('jenis',true),
			"spesifikasi" => $this->input->post('spesifikasi',true),			
			"barcode" => $barcode,
			"thn_pengadaan" => $thn_pengadaan,
			"asal_pengadaan" => $asal_pengadaan,
			"supplier_id_supp" => $this->input->post('supplier_id_supp',true),			
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
		$nama_brg = $this->input->post('nama_brg',true);
		$asal_pengadaan = $this->input->post('asal_pengadaan',true);
		$thn_pengadaan = $this->input->post('thn_pengadaan',true);
		$spesifikasi = $this->input->post('spesifikasi',true);
		$words = explode(" ", $nama_brg);
        $namabrg_acronym = "";

        foreach ($words as $w) {
            $namabrg_acronym .= $w[0];
		}
		$barcode = $namabrg_acronym."".$asal_pengadaan."".substr($thn_pengadaan,2,3);

		$data = [
			"kode_brg" => $this->input->post('kode_brg',true),
			"nama_brg" => $nama_brg,
			"jenis" => $this->input->post('jenis',true),
			"spesifikasi" => $this->input->post('spesifikasi',true),			
			"status" => $this->input->post('status',true),
			"barcode" => $barcode,
			"thn_pengadaan" => $thn_pengadaan,
			"asal_pengadaan" => $asal_pengadaan,
			"supplier_id_supp" => $this->input->post('supplier_id_supp',true),			
		];		

		$response = $this->_client->request('PUT', 'laboratorium/barang',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
	}

	public function updateStatus($kode_brg, $status)
	{
		$data = [
			"kode_brg" => $kode_brg,
			"status" => $status
		];

		$response = $this->_client->request('PUT', 'laboratorium/barang/updateStatus',[
            'form_params' => $data
		]);
		
		$result = json_decode($response->getBody()->getContents(),true);
                
        return $result;
	}

}