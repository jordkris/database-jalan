<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_auth', 'm_flashdata', 'm_db']);
    }

    public function index()
    {
        $data['setting'] = $this->m_db->getWhere('setting',[
            'id' => 1
        ]);
        $data['jalan'] = $this->m_db->getAll('jalan');
        $data['title'] = 'Peta Kabupaten AAA';
        $this->load->view('frontend_templates/V_header', $data);
        $this->load->view('frontend/V_peta');
        $this->load->view('frontend_templates/V_footer');
    }
}
