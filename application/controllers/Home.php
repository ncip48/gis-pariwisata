<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_wisata');
		$this->load->model('m_json');
		$this->load->model('m_etiket');
	}

	public function index()
	{
		$data = array(
			'title' => 'Pemetaan',
			'wisata' => $this->m_wisata->get_all_data(),
			'isi'	=> 'v_home'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function mapjson()
	{
		$data = array(
			'title' => 'Map JSON',
			'json' => $this->m_json->get_json(),
			'isi'	=> 'v_mapjson',
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function wisata()
	{

		$keyword = $this->input->get('keyword');

		if ($keyword) {
			$wisata =	$this->m_wisata->get_search($keyword);
		} else {
			$wisata = $this->m_wisata->get_all_data();
		}

		$data = array(
			'title' => 'List Tempat Wisata',
			'wisata' => $wisata,
			'isi'	=> 'v_wisata',
			'keyword' => $keyword
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function detail($id_wisata)
	{
		$wisata = $this->m_wisata->detail($id_wisata);
		$data = array(
			'wisata' => $wisata,
			'title' =>  $wisata->nama_tempat,
			'isi'	=> 'v_detail'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function e_tiket()
	{
		$valid = $this->form_validation;
		$valid->set_rules('id_wisata', 'Nama Tempat', 'required', array('required' => '%s Harus Dipilih'));
		$valid->set_rules('nama_pemesan', 'Nama Pemesan', 'required', array('required' => '%s Harus Diisi'));
		//no_pemesan, tanggal_rencana, provinsi, kabupaten, kecamatan, jumlah_orang
		$valid->set_rules('no_pemesan', 'No Pemesan', 'required', array('required' => '%s Harus Diisi'));
		$valid->set_rules('tanggal_rencana', 'Tanggal Rencana', 'required', array('required' => '%s Harus Diisi'));
		$valid->set_rules('jumlah_orang', 'Jumlah Orang', 'required', array('required' => '%s Harus Diisi'));

		//retrieve the input nama_pengunjung[]
		$nama_pengunjung = $this->input->post('nama_pengunjung') ?? array();
		//loop over the input nama_pengunjung[]
		foreach ($nama_pengunjung as $key => $value) {
			//set the validation rules for each nama_pengunjung[]
			$valid->set_rules('nama_pengunjung[' . $key . ']', 'Nama Pengunjung ' . ($key + 1), 'required', array('required' => '%s Harus Diisi')) ?? array();
		}

		if ($valid->run()) {
			$i = $this->input;
			$data = array(
				'id_wisata' => $i->post('id_wisata'),
				'kode_pesanan' => "ETK-" . date('YmdHis'),
				'nama_pemesan' => $i->post('nama_pemesan'),
				'no_pemesan' => $i->post('no_pemesan'),
				'tanggal_rencana' => $i->post('tanggal_rencana'),
				'tanggal_expired' => date('Y-m-d H:i:s', strtotime('+7 hours')),
				'jumlah_orang' => $i->post('jumlah_orang'),
				'total' => $i->post('total'),

			);
			$insert = $this->m_etiket->add($data);
			$data_pengunjung = array();
			foreach ($nama_pengunjung as $key => $value) {
				$data_pengunjung[] = array(
					'id_etiket' => $insert,
					'nama_pengunjung' => $value
				);
			}
			$this->db->insert_batch('tbl_pengunjung', $data_pengunjung);
			redirect('home/detail_e_tiket?id=' . $insert);
		}

		$wisata = $this->m_wisata->get_all_data();
		$data = array(
			'title' => 'E-Tiket',
			'isi'	=> 'v_etiket.php',
			'wisata' => $wisata
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	public function about()
	{
		$data = array(
			'title' => '',
			'isi'	=> 'v_About'
		);
		$this->load->view('layout/v_wrapper', $data, FALSE);
	}

	function generate_qrcode($data)
	{
		/* Load QR Code Library */
		$this->load->library('ciqrcode');

		/* Data */
		$hex_data   = bin2hex($data);
		$save_name  = $hex_data . '.png';

		/* QR Code File Directory Initialize */
		$dir = 'assets/media/qrcode/';
		if (!file_exists($dir)) {
			mkdir($dir, 0775, true);
		}

		/* QR Configuration  */
		$config['cacheable']    = true;
		$config['imagedir']     = $dir;
		$config['quality']      = true;
		$config['size']         = '1024';
		$config['black']        = array(255, 255, 255);
		$config['white']        = array(255, 255, 255);
		$this->ciqrcode->initialize($config);

		/* QR Data  */
		$params['data']     = $data;
		$params['level']    = 'L';
		$params['size']     = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $save_name;

		$this->ciqrcode->generate($params);

		/* Return Data */
		$return = array(
			'content' => $data,
			'file'    => $dir . $save_name
		);
		return $return;
	}

	public function detail_e_tiket()
	{
		$this->load->library('tanggalindo');
		$tiket = $this->m_etiket->detail($this->input->get('id'));

		$tiket->tanggal_expired = $this->tanggalindo->tanggalJamIndonesia($tiket->tanggal_expired, 3);

		$qr = $this->generate_qrcode($tiket->kode_pesanan);

		$data = array(
			'title' => 'Detail E-Tiket',
			'isi'	=> 'v_detail_etiket',
			'tiket' => $tiket,
			'qr'  => $qr
		);

		$this->load->view('layout/v_wrapper', $data, FALSE);
	}
}
