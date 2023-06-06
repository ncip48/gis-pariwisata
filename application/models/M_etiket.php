<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_etiket extends CI_Model
{

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_etiket');
		$this->db->join('tbl_wisata', 'tbl_wisata.id_wisata = tbl_etiket.id_wisata', 'left');

		$this->db->order_by('id_etiket', 'desc');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_etiket', $data);
		return $this->db->insert_id();
	}

	public function detail($id_etiket)
	{
		$this->db->select('*');
		$this->db->from('tbl_etiket');
		$this->db->join('tbl_wisata', 'tbl_wisata.id_wisata = tbl_etiket.id_wisata', 'left');
		$this->db->where('id_etiket', $id_etiket);
		return $this->db->get()->row();
	}

	public function detail_kode($kode_pesanan)
	{
		$this->db->select('*');
		$this->db->from('tbl_etiket');
		$this->db->join('tbl_wisata', 'tbl_wisata.id_wisata = tbl_etiket.id_wisata', 'left');
		$this->db->where('kode_pesanan', $kode_pesanan);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_etiket', $data['id_etiket']);
		$this->db->update('tbl_etiket', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_etiket', $data['id_etiket']);
		$this->db->delete('tbl_etiket', $data);
	}
}

/* End of file M_etiket.php */
