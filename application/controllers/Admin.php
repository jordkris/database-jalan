<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_auth', 'm_flashdata', 'm_db']);
        if (!$this->session->userdata('user_id')) {
			redirect('auth');
		}
    }

    public function index()
    {
        $data['profile'] = $this->m_auth->get_session();
        $data['title'] = 'Dashboard';
        $this->load->view('backend_templates/V_header', $data);
        $this->load->view('backend_templates/V_topbar');
        $this->load->view('backend_templates/V_sidebar');
        $this->load->view('backend/V_dashboard');
        $this->load->view('backend_templates/V_footer');
    }
}
