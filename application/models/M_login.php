<?php

class M_login extends CI_Model
{

	public function login($email, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('email' => $email, 'password' => $password));
		return $this->db->get()->row();
	}
}

/* End of file ModelName.php */
