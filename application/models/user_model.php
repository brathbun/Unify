<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	function login($username, $password)
	{
		$this->load->library('bcrypt');
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$stored_hash = $query->row('password');

		$this->db->flush_cache();

		$this->db->select('id, username, password');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			if($this->bcrypt->check_password($password, $stored_hash)) {
				return $query->result();
			}
			return false;
		} else {
			return false;
		}
	}

	function checkforExistingUser($username)
	{
		$this->db->select('username');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}	

	function addUser($username,$password,$gamerhandle)
	{
		$this->load->library('bcrypt');
		$bpassword = $this->bcrypt->hash_password($password);
		$data = array(
		   'username' => $username,
		   'password' => $bpassword,
		   'gamerhandle' => $gamerhandle
		);
		$this->db->insert('users', $data);
		return ($this->db->affected_rows() != 1) ? false : true;
	}
}