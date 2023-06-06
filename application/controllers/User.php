<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Data User',
			'user'	=> $this->m_user->get_all_data(),
			'isi'	=> 'user/v_index'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './foto/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				$data = array(
					'title' => 'Input Data User',
					'error_upload' => $this->upload->display_errors(),
					'isi'	=> 'user/v_add'
				);
				$this->load->view('layout2/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './foto/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_user' => $this->input->post('nama_user'),
					'email' => $this->input->post('email'),
					'no_telpon' => $this->input->post('no_telpon'),
					'password' => $this->input->post('password'),
					'foto' => $upload_data['uploads']['file_name'],
				);
				$this->m_user->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
				redirect('user');
			}
		}
		$data = array(
			'title' => 'Input Data User',
			'isi'	=> 'user/v_add'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	public function edit($id_user)
	{
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('no_telpon', 'No Telpon', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './foto/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('foto')) {
				$data = array(
					'title' => 'Edit Data User',
					'error_upload' => $this->upload->display_errors(),
					'user' => $this->m_user->detail($id_user),
					'isi'	=> 'user/v_edit'
				);
				$this->load->view('layout2/v_wrapper', $data, FALSE);
			} else {
				// jika ada pergantian diganti
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './foto/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_user'	=> $id_user,
					'nama_user' => $this->input->post('nama_user'),
					'email' => $this->input->post('email'),
					'no_telpon' => $this->input->post('no_telpon'),
					'password' => $this->input->post('password'),
					'foto' => $upload_data['uploads']['file_name'],
				);
				$this->m_user->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('user');
			}
			// jika foto tidak diganti
			$data = array(
				'id_user'	=> $id_user,
				'nama_user' => $this->input->post('nama_user'),
				'email' => $this->input->post('email'),
				'no_telpon' => $this->input->post('no_telpon'),
				'password' => $this->input->post('password'),
			);
			$this->m_user->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('user');
		}
		$data = array(
			'title' => 'Edit Data User',
			'user' => $this->m_user->detail($id_user),
			'isi'	=> 'user/v_edit'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('user');
	}
}

/* End of file Controllername.php */
