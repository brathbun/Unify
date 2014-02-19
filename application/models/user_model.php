<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function pullAllUsers($var1, $var2) {
		$this->db->select('*');
		$this->db->where('var1', $var1);
		$this->db->where('var2', $var2);
		$this->db->get('users')->result();
	}


}