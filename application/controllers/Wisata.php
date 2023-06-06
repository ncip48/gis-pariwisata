<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('m_wisata');
		$this->load->model('m_icon');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Edit Data Wisata',
			'wisata'	=> $this->m_wisata->get_all_data(),

			'isi'	=> 'wisata/v_index'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('nama_tempat', 'Nama Tempat', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('alamat', 'alamat', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('desa', 'Desa', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kec', 'Kecamatan', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kab', 'Kabupaten', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('prov', 'Provinsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './gambar/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'title' => 'Input Data Wisata',
					'icon'	=> $this->m_icon->get_all_data(),
					'error_upload' => $this->upload->display_errors(),
					'isi'	=> 'wisata/v_add'
				);
				$this->load->view('layout2/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_tempat' => $this->input->post('nama_tempat'),
					'alamat' => $this->input->post('alamat'),
					'desa' => $this->input->post('desa'),
					'kec' => $this->input->post('kec'),
					'kab' => $this->input->post('kab'),
					'prov' => $this->input->post('prov'),
					'deskripsi' => $this->input->post('deskripsi'),
					'latitude' => $this->input->post('latitude'),
					'longitude' => $this->input->post('longitude'),
					'id_icon' => $this->input->post('id_icon'),
					'gambar' => $upload_data['uploads']['file_name'],
					'harga' => $this->input->post('harga'),
				);
				$this->m_wisata->add($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Disimpan !!!');
				redirect('wisata');
			}
		}
		$data = array(
			'title' => 'Input Data Wisata',
			'icon'	=> $this->m_icon->get_all_data(),
			'isi'	=> 'wisata/v_add'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	public function edit($id_wisata)
	{
		$this->form_validation->set_rules('nama_tempat', 'Nama Tempat', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('alamat', 'alamat', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('desa', 'Desa', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kec', 'Kecamatan', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kab', 'Kabupaten', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('prov', 'Provinsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './gambar/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 2000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('gambar')) {
				$data = array(
					'title' => 'Edit Data Wisata',
					'icon'	=> $this->m_icon->get_all_data(),
					'wisata' => $this->m_wisata->detail($id_wisata),
					'error_upload' => $this->upload->display_errors(),
					'isi'	=> 'wisata/v_edit'
				);
				$this->load->view('layout2/v_wrapper', $data, FALSE);
			} else {
				// jika ada pergantian diganti
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_wisata'	=> $id_wisata,
					'nama_tempat' => $this->input->post('nama_tempat'),
					'alamat' => $this->input->post('alamat'),
					'desa' => $this->input->post('desa'),
					'kec' => $this->input->post('kec'),
					'kab' => $this->input->post('kab'),
					'prov' => $this->input->post('prov'),
					'deskripsi' => $this->input->post('deskripsi'),
					'latitude' => $this->input->post('latitude'),
					'longitude' => $this->input->post('longitude'),
					'id_icon' => $this->input->post('id_icon'),
					'gambar' => $upload_data['uploads']['file_name'],
					'harga' => $this->input->post('harga'),
				);
				$this->m_wisata->edit($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
				redirect('wisata');
			}
			// jika foto tidak diganti
			$data = array(
				'id_wisata'	=> $id_wisata,
				'nama_tempat' => $this->input->post('nama_tempat'),
				'alamat' => $this->input->post('alamat'),
				'desa' => $this->input->post('desa'),
				'kec' => $this->input->post('kec'),
				'kab' => $this->input->post('kab'),
				'prov' => $this->input->post('prov'),
				'deskripsi' => $this->input->post('deskripsi'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'id_icon' => $this->input->post('id_icon'),
				'harga' => $this->input->post('harga'),
			);
			$this->m_wisata->edit($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Diedit !!!');
			redirect('wisata');
		}
		$data = array(
			'title' => 'Edit Data Wisata',
			'wisata' => $this->m_wisata->detail($id_wisata),
			'isi'	=> 'wisata/v_edit',
			'icon' => $this->m_icon->get_all_data(),
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	//Delete one item
	public function delete($id_wisata)
	{
		$data = array('id_wisata' => $id_wisata);
		$this->m_wisata->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('wisata');
	}
}

/* End of file Controllername.php */
