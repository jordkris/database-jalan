<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_auth', 'm_flashdata', 'm_db']);
	}

	public function index()
	{
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			redirect('error_403');
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$profile = $this->m_db->getWhere('users', [
			'username' => $username,
		]);
		if ($profile) {
			if (md5($password) == $profile['password']) {
				$this->m_auth->set_session($profile['id']);
				redirect('admin');
			} else {
				$this->m_flashdata->set('danger', 'Password salah!');
				redirect('home');
			}
		} else {
			$this->m_flashdata->set('danger', 'Username ini tidak terdaftar di sistem!');
			redirect('home');
		}
	}
	public function logout()
	{
		$this->m_auth->unset_all_sessions();
		$this->m_flashdata->set('warning', 'Anda telah berhasil logout!');
		redirect('home', 'refresh');
	}

	public function session_destroy()
	{
		if (isset($_SESSION['message'])) {
			unset($_SESSION['message']);
		}
	}

	public function forceLogout()
	{
		$this->m_auth->unset_all_sessions();
		$temp = $this->session->flashdata('message');
		$this->session->set_flashdata('message', $temp);
		redirect('home', 'refresh');
	}
}
