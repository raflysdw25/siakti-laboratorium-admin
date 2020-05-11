<?php defined('BASEPATH') OR exit('No direct script access allowed');

class user_m extends CI_Model {
	
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', shal($post['password']);
		$query = $this->db->get();
		return $query; 
	}

	public function get($id = null)
	{
		$this->db->from('user');
		if($id != null){
			$this->db->where('user_id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function add($post)
	{
		$params['nm_supplier'] = $post['nm_supplier'];
		$params['almt_supplier'] = $post['almt_supplier'] != "" ? $post['almt_supplier'] :null;
		$this->db->insert('user', $params);
	}
}