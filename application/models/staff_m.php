<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_m extends CI_Model {
	
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('staff');
		$this->db->where('nip', $post['NIP']);
		$this->db->where('nama', $post['Nama']);
		$this->db->where('alamat', $post['Alamat']);
		$this->db->where('kec_staff', $post['Kecamatan']);
		$this->db->where('kel_staff', $post['Kelurahan']);
		$this->db->where('kota_staff', $post['Kota']);
		$this->db->where('tlp_staff', $post['Telepon']);
		$this->db->where('email_staff', $post['Email']);
		$this->db->where('usr_name', $post['Username']);
		$this->db->where('password', shal($post['Password']);
		$this->db->where('prodi_prodi_id', $post['ID Prodi']);
		$query = $this->db->get();
		return $query; 
	}

	public function get($id = null)
	{
		$this->db->from('staff');
		if($id != null){
			$this->db->where('nip', $nip);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['nip'] = $post['NIP'];
		$params['nama'] = $post['Nama'];
		$params['alamat'] = $post['Nama'];
		$params['kec_staff'] = $post['Nama'];
		$params['kel_staff'] = $post['Nama'];
		$params['kota_staff'] = $post['Nama'];
		$params['tlp_staff'] = $post['Nama'];
		$params['email_staff'] = $post['Nama'];
		$params['usr_name'] = $post['username'];
		$params['password'] = sha1($post['password']);
		$params['prodi_prodi_id'] = $post['ID Prodi'];
		$this->db->insert('staff', $params);
	}

	public function delete($id)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('staff');
    }

    public function edit($post)
	{
		$params['nip'] = $post['NIP'];
		$params['nama'] = $post['Nama']; //name = database fullname = user_form_add
		$params['alamat'] = $post['Nama'];
		$params['kec_staff'] = $post['Nama'];
		$params['kel_staff'] = $post['Nama'];
		$params['kota_staff'] = $post['Nama'];
		$params['tlp_staff'] = $post['Nama'];
		$params['email_staff'] = $post['Nama'];
		$params['usr_name'] = $post['username'];
		if (!empty($post['password'])) {
			# code...
			$params['password'] = sha1($post['password']);
		}
		$params['prodi_prodi_id'] = $post['ID Prodi'];
		$this->db->where('nip', $post['nip']);
		$this->db->update('staff', $params);
	}

}