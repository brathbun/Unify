<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Events extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('event_model','',TRUE);
    }

	public function create_event() {

		$this->load->model('event_model');
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$eventname = $this->input->post('eventname');
			$category = $this->_clean_data($this->input->post('category'));

			$form_data = array(
				'eventname' => $eventname,
				'category_id' => $category
			);

			$this->event_model->save_event($form_data);
		}

		if ($this->session->userdata('logged_in')) {
			
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$data['events'] = $this->event_model->get_events();
			$data['dropdown'] = $this->event_model->get_categories_dropdown();
	
			$data['main_content'] = 'home/create_event';
			$this->load->view('templates/standard', $data);
		} else {
			$data['username'] = 'Guest';
			redirect($this->config->item('base_url'), 'refresh');
		}		
	}

	public function _clean_data($data) {
		return mysql_real_escape_string(strip_tags($data));
	}

}