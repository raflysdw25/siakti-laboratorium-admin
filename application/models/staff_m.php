<?php defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Staff_m extends CI_Model {
	
	public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://127.0.0.1/siakti-api-laboratorium/index.php/api/'
        ]);
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

	// public function add($post)
	// {
	// 	$params['nip'] = $post['NIP'];
	// 	$params['nama'] = $post['Nama'];
	// 	$params['alamat'] = $post['Nama'];
	// 	$params['kec_staff'] = $post['Nama'];
	// 	$params['kel_staff'] = $post['Nama'];
	// 	$params['kota_staff'] = $post['Nama'];
	// 	$params['tlp_staff'] = $post['Nama'];
	// 	$params['email_staff'] = $post['Nama'];
	// 	$params['usr_name'] = $post['username'];
	// 	$params['password'] = sha1($post['password']);
	// 	$params['prodi_prodi_id'] = $post['ID Prodi'];
	// 	$this->db->insert('staff', $params);
	// }

	// public function delete($id)
    // {
    //     $this->db->where('nip', $nip);
    //     $this->db->delete('staff');
    // }

    // public function edit($post)
	// {
	// 	$params['nip'] = $post['NIP'];
	// 	$params['nama'] = $post['Nama']; //name = database fullname = user_form_add
	// 	$params['alamat'] = $post['Nama'];
	// 	$params['kec_staff'] = $post['Nama'];
	// 	$params['kel_staff'] = $post['Nama'];
	// 	$params['kota_staff'] = $post['Nama'];
	// 	$params['tlp_staff'] = $post['Nama'];
	// 	$params['email_staff'] = $post['Nama'];
	// 	$params['usr_name'] = $post['username'];
	// 	if (!empty($post['password'])) {
	// 		# code...
	// 		$params['password'] = sha1($post['password']);
	// 	}
	// 	$params['prodi_prodi_id'] = $post['ID Prodi'];
	// 	$this->db->where('nip', $post['nip']);
	// 	$this->db->update('staff', $params);
	// }

}