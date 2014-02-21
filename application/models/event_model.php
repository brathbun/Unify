<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {

	public function get_events() {
		$this->db->select('*');
		$this->db->from('events');
		$this->db->join('categories', 'categories.id = events.category_id', 'inner');
		$this->db->order_by('events.id', 'asc');
		$this->db->limit(25, 0); // 25 results, no offset
		$query = $this->db->get();
		$data = '';
		foreach($query->result() as $v) {
			$data['eventname'][] = $v->eventname;
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

	public function save_event($data) {
		//Insert into DB
		return $this->db->insert('events', $data);
	}
}