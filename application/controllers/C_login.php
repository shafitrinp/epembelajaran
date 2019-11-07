<?php defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->model('m_siswa');
		$this->load->model('m_guru');
		$this->load->model('m_admin');
	}

	public function index()
	{
		$this->form_validation->set_rules(
			'no_identitas',
			'No_identitas',
			'trim|required',
			['required' => 'Harus di isi']
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'trim|required',
			['required' => 'Password kosong']
		);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('login/V_login');
		} else {
			//validasi sukses
			$this->_login(); //method private
		}
		//$this->db->insert('user', $data)
		// echo 'auth/index';
		// $this->load->view('templates/auth_header');

		// $this->load->view('template/auth_footer');

	}

	public function _login()
	{
		$no_identitas = $this->input->post('no_identitas');
		$password = $this->input->post('password');

		$siswa = $this->db->get_where('siswa', ['id_siswa' => $no_identitas])->row_array();
		$admin = $this->db->get_where('admin', ['username' => $no_identitas])->row_array();
		$guru = $this->db->get_where('guru', ['id_guru' => $no_identitas])->row_array();

		if ($siswa) { //siswa
			//usernya ada
			if (md5($password) == $siswa['password']) {

				$data = [
					'id_siswa' => $siswa['id_siswa'],
					'id_kelas' => $siswa['id_kelas']
				];
				$this->session->userdata($data);
				redirect('C_siswa');
			} else {
				//tidak ada user
				$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Login Gagal</div>');
				redirect('C_login');
			}
		} else if ($admin) {

			if (md5($password) == $admin['password']) {
				$data = [
					'username' => $admin['username'],

				];
				$this->session->userdata($data);
				redirect('C_admin');
			} else {
				//tidak ada user
				$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Login Gagal</div>');
				redirect('C_login');
			}
		} else if ($guru) {

			if (md5($password) == $guru['password']) {
				if ($this->session->userdata('id_guru')) {
					redirect('C_guru');
				}
				$data = [
					'id_guru' => $guru['id_guru'],

				];
				$this->session->userdata($data);
				redirect('C_guru');
			} else {
				//tidak ada user
				$this->session->set_flashdata('message', '<div class= "alert alert-danger" role="alert">Login Gagal</div>');
				redirect('C_login');
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('C_login');
	}
}
