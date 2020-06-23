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

	public function barcodeBarang($barcode)
	{
		$response = $this->_client->request('GET', 'laboratorium/barang/barcodeBarang', [
			'query' => [
				'barcode' => $barcode
			]
		]);	

		$result = json_decode($response->getBody()->getContents());
                
        return $result->data;
	}


	public function add($post)
	{	
		$kode_brg = $post['kode_brg'];
		$nama_brg = $post['nama_brg'];
		$asal_pengadaan = $post['asal_pengadaan'];
		$thn_pengadaan = $post['thn_pengadaan'];		

		$words = explode(" ", $nama_brg);
		$namabrg_acronym = "";
		
		

        foreach ($words as $w) {
            $namabrg_acronym .= $w[0];
		}

		

		$barcode = $kode_brg."".$namabrg_acronym."".substr($thn_pengadaan,2,3);			
		$supplier_id_supp = ($post['supplier_id_supp']) == "" ? null : $post['supplier_id_supp'];

		$data = [
			"kode_brg" => $kode_brg,
			"nama_brg" => $nama_brg,
			"jenis" => $post['jenis'],
			"spesifikasi" => $post['spesifikasi'],			
			"barcode" => $barcode,
			"thn_pengadaan" => $thn_pengadaan,
			"asal_pengadaan" => $asal_pengadaan,
			"jumlah" => $post['jumlah'],
			"satuan" => $post['satuan'],
			"supplier_id_supp" => $supplier_id_supp,			
		];		

		$response = $this->_client->request('POST', 'laboratorium/barang',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
	}

	public function delete($kode_brg)
    {
		$response = $this->_client->request('DELETE', 'laboratorium/barang', [
            'form_params' => [
                'kode_brg' => $kode_brg,
            ]            
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
    }

    public function edit($post)
	{
		$kode_brg = $post['kode_brg'];
		$nama_brg = $post['nama_brg'];
		$asal_pengadaan = $post['asal_pengadaan'];
		$thn_pengadaan = $post['thn_pengadaan'];			
		$supplier_id_supp = ($post['supplier_id_supp']) == "" ? null : $post['supplier_id_supp'];


		$words = explode(" ", $nama_brg);		
        $namabrg_acronym = "";

        foreach ($words as $w) {
            $namabrg_acronym .= $w[0];
		}
					
		$data = [
			"kode_brg" => $kode_brg,
			"nama_brg" => $nama_brg,
			"jenis" => $post['jenis'],
			"spesifikasi" => $post['spesifikasi'],			
			"status" => $post['status'],
			"jumlah" => $post['jumlah'],
			"satuan" => $post['satuan'],
			"barcode" => $post['barcode'],
			"thn_pengadaan" => $thn_pengadaan,
			"asal_pengadaan" => $asal_pengadaan,
			"supplier_id_supp" => $supplier_id_supp ,			
		];		

		$response = $this->_client->request('PUT', 'laboratorium/barang',[
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents());
                
        return $result;
	}

	public function updateStatus($post)
	{
		$data = [
			"kode_brg" => $post['kode_brg'],
			"status" => $post["status"],
			"jumlah" => $post["jumlah"]
		];

		$response = $this->_client->request('PUT', 'laboratorium/barang/updateStatus',[
            'form_params' => $data
		]);
		
		$result = json_decode($response->getBody()->getContents());
                
        return $result;
	}

}