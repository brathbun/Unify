<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Index_controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
		} else {
			$data['username'] = 'Guest';
		}

		$this->load->model('event_model');
		$data['events'] = $this->event_model->get_events();

		$data['main_content'] = 'home/index_view';
		$this->load->view('templates/standard', $data);
	}

}