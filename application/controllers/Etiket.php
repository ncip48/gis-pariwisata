<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_etiket');
		$this->load->model('m_wisata');
		$this->load->model('m_pengunjung');
	}

	public function index()
	{
		$this->load->library('tanggalindo');
		$etiket = $this->m_etiket->get_all_data();

		//loop data
		foreach ($etiket as $key => $value) {
			$pengunjung = $this->m_pengunjung->get_pengunjung_by_id_etiket($value->id_etiket);

			$nama_pengunjung = array();
			foreach ($pengunjung as $key2 => $value2) {
				$nama_pengunjung[] = $value2->nama_pengunjung;
			}

			$etiket[$key]->tanggal_expired = $this->tanggalindo->tanggalJamIndonesia($value->tanggal_expired, 3);
			$etiket[$key]->tanggal_rencana = $this->tanggalindo->tanggalJamIndonesia($value->tanggal_rencana);
			$etiket[$key]->nama_pengunjung = implode(', ', $nama_pengunjung);
		}

		$data = array(
			'title' => 'Data E-Tiket',
			'etiket'	=> $etiket,
			'isi'	=> 'e_tiket/v_index'
		);
		$this->load->view('layout2/v_wrapper', $data, FALSE);
	}

	public function delete($id_etiket)
	{
		$data = array('id_etiket' => $id_etiket);
		$this->m_etiket->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus !!!');
		redirect('etiket');
	}

	public function simpan_etiket()
	{
		$valid = $this->form_validation;
		$valid->set_rules('id_wisata', 'Nama Tempat', 'required', array('required' => '%s Harus Dipilih'));
		$valid->set_rules('nama_pemesan', 'Nama Pemesan', 'required', array('required' => '%s Harus Diisi'));
		//no_pemesan, tanggal_rencana, provinsi, kabupaten, kecamatan, jumlah_orang
		$valid->set_rules('no_pemesan', 'No Pemesan', 'required', array('required' => '%s Harus Diisi'));
		$valid->set_rules('tanggal_rencana', 'Tanggal Rencana', 'required', array('required' => '%s Harus Diisi'));
		$valid->set_rules('jumlah_orang', 'Jumlah Orang', 'required', array('required' => '%s Harus Diisi'));

		//retrieve the input nama_pengunjung[]
		$nama_pengunjung = $this->input->post('nama_pengunjung');
		//loop over the input nama_pengunjung[]
		foreach ($nama_pengunjung as $key => $value) {
			//set the validation rules for each nama_pengunjung[]
			$valid->set_rules('nama_pengunjung[' . $key . ']', 'Nama Pengunjung', 'required', array('required' => '%s Harus Diisi'));
		}

		// //echo nama_pengunjung[0] nama_pengunjung[1] nama_pengunjung[2] etc
		// foreach ($nama_pengunjung as $key => $value) {
		// 	echo $key . ' ' . $value . '<br>';
		// }

		die();

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

	public function cetak_e_tiket()
	{
		$this->load->library('tanggalindo');
		$tiket = $this->m_etiket->detail_kode($this->input->get('kode'));

		$tiket->tanggal_rencana = $this->tanggalindo->tanggalJamIndonesia($tiket->tanggal_rencana);
		$tiket->tanggal_expired = $this->tanggalindo->tanggalJamIndonesia($tiket->tanggal_expired, 3);

		$qr = $this->generate_qrcode($tiket->kode_pesanan);

		$data = array(
			'title' => 'Detail E-Tiket',
			'isi'	=> 'v_cetak_etiket',
			'tiket' => $tiket,
			'qr' => $qr
		);

		$this->load->library('pdfgenerator');
		// filename dari pdf ketika didownload
		$file_pdf = 'etiket_' . $tiket->kode_pesanan;
		$html = $this->load->view('v_cetak_etiket', $data, TRUE);
		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, false);

		// $this->load->view('v_cetak_etiket', $data, false);
	}
}
