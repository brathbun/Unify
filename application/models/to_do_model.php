<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class To_do_model extends CI_Model {

	public function get_tasks() {
		$this->db->select('*');
		$this->db->from('tasks');
		$this->db->join('categories', 'categories.id = tasks.category_id', 'inner');
		$this->db->order_by('tasks.id', 'asc');
		$this->db->limit(25, 0); // 25 results, no offset
		$query = $this->db->get();

		foreach($query->result() as $v) {
			$data['task'][] = $v->task;
			$data['category'][] = $v->category;
		}

		return $data;
	}

	public function get_categories_dropdown() {
		$categories = $this->db->get('categories')->result();
		$dropdown = array();
		//Dynamic dropdown needs data to be in an array
		foreach ($categories as $category) {
			$dropdown[$category->id] = $category->category;
		}
		return $dropdown;
	}

	public function save_data($data) {
		//Insert into DB
		return $this->db->insert('tasks', $data);
	}
}