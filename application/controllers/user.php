<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class User extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('user_model','',TRUE);
    }

	function login()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			redirect($this->config->item('base_url'), 'refresh');
		} else {
			
			$data['username'] = 'Guest';
      
			$data['main_content'] = 'home/login';
			$this->load->view('templates/standard', $data);			
		}
	}

	function logout()
 	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect($this->config->item('base_url'), 'refresh');
	}

	function signup()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			redirect($this->config->item('base_url'), 'refresh');
		} else {
			
			$data['username'] = 'Guest';
			
			$data['main_content'] = 'home/signup';
			$this->load->view('templates/standard', $data);			
		}
	}

	function verifyLogin()
	{
	   $this->load->library('form_validation');
	   
	   //$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	   //$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->user_model->login($username, $password);

		if($result) {
			$sess_array = array();
			foreach($result as $row) {
		   		$sess_array = array(
			     	'id' => $row->id,
			     	'username' => $row->username
		   		);
		   		$this->session->set_userdata('logged_in', $sess_array);
		   		redirect($this->config->item('base_url'), 'refresh');
			}
		} else {
			$this->form_validation->set_message('verifyLogin', 'Invalid username or password');

			$data['username'] = 'Guest';
			$data['main_content'] = 'home/verifylogin';
			$this->load->view('templates/standard', $data);

		}	   

	   if($this->form_validation->run() == FALSE)
	   {
			if ($this->session->userdata('logged_in')) {
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
				
				$data['main_content'] = 'home/index_view';
				$this->load->view('templates/standard', $data);
			} else {
				
				$data['username'] = 'Guest';
				
				$data['main_content'] = 'home/verifylogin';
				$this->load->view('templates/standard', $data);
			}
	   } else {
	     	//Go to private area
			$data['main_content'] = 'home/index_view';
			$this->load->view('templates/standard', $data);	   	
	   }	

	}

	function check_database($password)
	{
		//Field validation succeeded.&nbsp; Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->user_model->login($username, $password);

		if($result) {
			$sess_array = array();
			foreach($result as $row) {
		   		$sess_array = array(
			     	'id' => $row->id,
			     	'username' => $row->username
		   		);
		   		$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}

	function registerUser()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|callback_checkUsername');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	   if($this->form_validation->run() == FALSE) {
			
			//Field validation failed.
			$data['username'] = 'Guest';
			
			$data['main_content'] = 'home/verifysignup';
			$this->load->view('templates/standard', $data);
	   } else {
	     	//Add to Database!
	   		$username = $this->input->post('username');
	   		$password = $this->input->post('password');
	   		$gamerhandle = $this->input->post('gamerhandle');
			$insert = $this->user_model->addUser($username,$password,$gamerhandle);
			
			//Log you in and send you on your way!
			if($insert == true) {
				$result = $this->user_model->login($username, $password);
				if($result) {
					$sess_array = array();
					foreach($result as $row) {
				   		$sess_array = array(
					     	'id' => $row->id,
					     	'username' => $row->username,
					     	'gamerhandle' => $row->gamerhandle
				   		);
					}
					$this->session->set_userdata('logged_in', $sess_array);					
				}
				redirect($this->config->item('base_url'), 'refresh');
			} else {
				$this->form_validation->set_message('registerUser', 'There was an error adding your form to our database.  Crap! Try again later please.');
				$data['main_content'] = 'error';
				$this->load->view('templates/standard', $data);
			}
		}		
	}

	function checkUsername($username)
	{
		$username = $this->input->post('username');
		//Field validation succeeded above, so time to validate against database
		$result = $this->user_model->checkforExistingUser($username);

		if($result) {
			$this->form_validation->set_message('checkUsername', 'Username already in use. I bet you really wanted that one too...');
			return false;
		} else {
			return true;
		}
	}

}