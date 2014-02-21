<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->model('event_model');
		$data['events'] = $this->event_model->get_events();
		$data['dropdown'] = $this->event_model->get_categories_dropdown();
		$data['eventname_field'] = array(
              'name'        => 'eventname',
              'placeholder' => 'e.g. Rhadley\'s Sunday Night Hearthstone Event',
            );

		$data['main_content'] = 'home/index_view';
		$this->load->view('templates/standard', $data);
	}

	public function create_event() {

		$this->load->model('event_model');
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('eventname', 'Eventname', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');

			if ($this->form_validation->run() == FALSE){
				$this->index();
			} else {
				$eventname = $this->input->post('eventname');
				$category = $this->_clean_data($this->input->post('category'));

				$form_data = array(
					'eventname' => $eventname,
					'category_id' => $category
				);

				$this->event_model->save_event($form_data);
			}
		}

		$data['events'] = $this->event_model->get_events();
		$data['dropdown'] = $this->event_model->get_categories_dropdown();
		$data['eventname_field'] = array(
              'name'        => 'eventname',
              'placeholder' => 'e.g. Rhadley\'s Sunday Night Hearthstone Event',
            );		
		$data['main_content'] = 'home/create_event';
		$this->load->view('templates/standard', $data);
	}

	public function _clean_data($data) {
		return mysql_real_escape_string(strip_tags($data));
	}
}