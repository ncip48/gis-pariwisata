<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_wisata extends CI_Model
{

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_icon', 'tbl_icon.id_icon = tbl_wisata.id_icon', 'left');

		$this->db->order_by('id_wisata', 'desc');
		return $this->db->get()->result();
	}

	public function get_search($keyword)
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_icon', 'tbl_icon.id_icon = tbl_wisata.id_icon', 'left');

		$this->db->order_by('id_wisata', 'desc');
		$this->db->like('nama_tempat', $keyword);
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_wisata', $data);
	}

	public function detail($id_wisata)
	{
		$this->db->select('*');
		$this->db->from('tbl_wisata');
		$this->db->join('tbl_icon', 'tbl_icon.id_icon = tbl_wisata.id_icon', 'left');
		$this->db->where('id_wisata', $id_wisata);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_wisata', $data['id_wisata']);
		$this->db->update('tbl_wisata', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_wisata', $data['id_wisata']);
		$this->db->delete('tbl_wisata', $data);
	}
}

/* End of file M_wisata.php */
