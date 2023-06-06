<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Icon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_icon');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Edit Data Icon',
			'icon'	=> $this->m_icon->get_all_data(),
			'isi'	=> 'icon/v_index'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_icon', 'Nama User', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './marker/';
			$config['allowed_types']        = 'png';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('marker')) {
				$data = array(
					'title' => 'Input Data Icon',
					'error_upload' => $this->upload->display_errors(),
					'isi'	=> 'icon/v_add'
				);
				$this->load->view('layout2/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './marker/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_icon' => $this->input->post('nama_icon'),
					'icon' => $upload_data['uploads']['file_name'],
				);
				$this->m_icon->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
				redirect('icon');
			}
		}
		$data = array(
			'title' => 'Input Data Icon',
			'isi'	=> 'icon/v_add'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	public function edit($id_icon)
	{
		$this->form_validation->set_rules('nama_icon', 'Nama User', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './marker/';
			$config['allowed_types']        = 'png';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('marker')) {
				$data = array(
					'title' => 'Edit Data Icon',
					'error_upload' => $this->upload->display_errors(),
					'icon' => $this->m_icon->detail($id_icon),
					'isi'	=> 'icon/v_edit'
				);
				$this->load->view('layout2/v_wrapper', $data, FALSE);
			} else {
				// jika ada pergantian diganti
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './marker/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_icon'	=> $id_icon,
					'nama_icon' => $this->input->post('nama_icon'),
					'icon' => $upload_data['uploads']['file_name'],
				);
				$this->m_icon->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('icon');
			}
			// jika foto tidak diganti
			$data = array(
				'id_icon'	=> $id_icon,
				'nama_icon' => $this->input->post('nama_icon'),
			);
			$this->m_icon->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('icon');
		}
		$data = array(
			'title' => 'Edit Data Icon',
			'icon' => $this->m_icon->detail($id_icon),
			'isi'	=> 'icon/v_edit'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_icon)
	{
		$data = array('id_icon' => $id_icon);
		$this->m_icon->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('icon');
	}
}

/* End of file Controllername.php */
