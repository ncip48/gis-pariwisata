<?php

class User_login
{
	protected $ci;

	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_login');
	}

	public function login($email, $password)
	{
		$cek = $this->ci->m_login->login($email, $password);
		if ($cek) {
			$email = $cek->email;
			$nama_user = $cek->nama_user;
			$foto = $cek->foto;
			//buat session
			$this->ci->session->set_userdata('email', $email);
			$this->ci->session->set_userdata('nama_user', $nama_user);
			$this->ci->session->set_userdata('foto', $foto);
			// redirec ke halaman home
			redirect('admin');
		} else {
			//jika salah password
			$this->ci->session->set_flashdata('pesan', 'Email Atau Password Salah !!!');
			redirect('auth/login');
		}
	}

	public function cek_login()
	{
		if ($this->ci->session->userdata('email') == "") {
			$this->ci->session->set_flashdata('pesan', 'Anda Belum Login, Silahkan Login Dulu !!!');
			redirect('auth/login');
		}
	}

	public function cek_sudah_login()
	{
		if ($this->ci->session->userdata('email')) {
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('email');
		$this->ci->session->unset_userdata('user_name');
		$this->ci->session->unset_userdata('foto');
		$this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!');
		redirect('auth/login');
	}
}

/* End of file LibraryName.php */
