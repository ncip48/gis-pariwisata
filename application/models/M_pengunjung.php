<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengunjung extends CI_Model
{

	public function get_pengunjung_by_id_etiket($id_etiket)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengunjung');
		$this->db->where('id_etiket', $id_etiket);
		$query = $this->db->get();
		return $query->result();
	}
}
