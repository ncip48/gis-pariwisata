<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_wisata');
	}

	public function index()
	{
		$data = array(
			'title' => 'Admin',
			'wisata' => $this->m_wisata->get_all_data(),
			'isi'	=> 'v_admin'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}
}
