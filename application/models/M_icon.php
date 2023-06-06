<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_icon extends CI_Model
{

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_icon');
		$this->db->order_by('id_icon', 'desc');
		return $this->db->get()->result();
	}

	public function add($data)
	{
		$this->db->insert('tbl_icon', $data);
	}

	public function detail($id_icon)
	{
		$this->db->select('*');
		$this->db->from('tbl_icon');
		$this->db->where('id_icon', $id_icon);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_icon', $data['id_icon']);
		$this->db->update('tbl_icon', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_icon', $data['id_icon']);
		$this->db->delete('tbl_icon', $data);
	}
}

/* End of file M_icon.php */
