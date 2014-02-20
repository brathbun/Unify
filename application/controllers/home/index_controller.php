<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$this->load->model('to_do_model');
		$data['info'] = $this->to_do_model->get_tasks();
		$data['dropdown'] = $this->to_do_model->get_categories_dropdown();

		$data['main_content'] = 'home/index_view';
		$this->load->view('templates/standard', $data);
	}

	public function create_task() {

		$this->load->model('to_do_model');
		
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('task', 'Task', 'required');
			$this->form_validation->set_rules('category', 'Category', 'required');

			if ($this->form_validation->run() == FALSE){
				$this->index();
			} else {
				$task = $this->_clean_data($this->input->post('task'));
				$category = $this->_clean_data($this->input->post('category'));

				$form_data = array(
					'task' => $task,
					'category_id' => $category
				);

				$this->to_do_model->save_data($form_data);
			}
		}

		$data['info'] = $this->to_do_model->get_tasks();
		$data['dropdown'] = $this->to_do_model->get_categories_dropdown();
		$data['main_content'] = 'home/index_view';
		$this->load->view('templates/standard', $data);
	}

	public function _clean_data($data) {
		return mysql_real_escape_string(strip_tags($data));
	}
}