<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	public function login()
	{

		$valid = $this->form_validation;
		$valid->set_rules('email', 'Email', 'required', array('required' => '%s Harus Diisi'));
		$valid->set_rules('password', 'Password', 'required', array('required' => '%s Harus Diisi'));

		if ($valid->run()) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			//prosess ke simple_login

			$this->user_login->login($email, $password);
		}
		$data = array('title' => 'Login ');
		$this->load->view('v_login', $data, FALSE);
	}

	public function logout()
	{
		$this->user_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
