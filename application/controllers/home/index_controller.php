<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		$data['main_content'] = 'home/index_view';
		$this->load->view('templates/standard', $data);
	}

}