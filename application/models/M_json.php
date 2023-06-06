<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_json extends CI_Model
{

	public function get_all_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_json');
		$this->db->order_by('id_json', 'desc');
		return $this->db->get()->result();
	}

	public function get_json()
	{
		$this->db->select('*');
		$this->db->from('tbl_json');
		$this->db->where('id_json', 1);
		return $this->db->get()->row();
	}

	public function add($data)
	{
		$this->db->insert('tbl_json', $data);
	}

	public function detail($id_json)
	{
		$this->db->select('*');
		$this->db->from('tbl_json');
		$this->db->where('id_json', $id_json);
		return $this->db->get()->row();
	}

	public function edit($data)
	{
		$this->db->where('id_json', $data['id_json']);
		$this->db->update('tbl_json', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_json', $data['id_json']);
		$this->db->delete('tbl_json', $data);
	}
}

/* End of file M_json.php */
