<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_jalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_auth', 'm_flashdata', 'm_db']);
        // $this->load->library('Api');
    }

    public function index()
    {
        $data['setting'] = $this->m_db->getWhere('setting', [
            'id' => 1
        ]);
        $data['jalan'] = $this->m_db->getAll('jalan');
        $data['total_pr'] = $this->m_db->getSumColumn('jalan', 'panjang_ruas');
        $data['total_ruas'] = $this->m_db->getNumRows('jalan');
        $data['title'] = 'Data Jalan Kabupaten AAA';
        $this->load->view('frontend_templates/V_header', $data);
        $this->load->view('frontend/V_data_jalan');
        $this->load->view('frontend_templates/V_footer');
    }

    public function detail($id)
    {
        $data['setting'] = $this->m_db->getWhere('setting', [
            'id' => 1
        ]);
        $data['jalan'] = getDataJalanApi($id, true);
        $data['pangkal_ruas'] = $data['jalan']['nama_pangkal_ruas'];
        $data['ujung_ruas'] = $data['jalan']['nama_ujung_ruas'];
        $data['kecamatan'] = implode(', ', $data['jalan']['kecamatan']);
        $data['title'] = 'Detail Data Jalan ' . $data['pangkal_ruas'] . ' - ' . $data['ujung_ruas'];
        $this->load->view('frontend_templates/V_header', $data);
        $this->load->view('frontend/V_detail_data_jalan');
        $this->load->view('frontend_templates/V_footer');
    }

    public function pengaduan()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            redirect('error_403');
        }
        $data = $this->input->post();
        $path = './public/uploads';
        $this->m_db->upload_config($path);
        $temp_image = $this->m_db->upload_file($path, 'foto_pendukung');
        $insertData = [
            'nama_lengkap' => $data['nama_lengkap'],
            'alamat_lengkap' => $data['alamat_lengkap'],
            'nomor_handphone' => $data['nomor_handphone'],
            'email' => $data['email'],
            'isi_pengaduan' => $data['isi_pengaduan'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'foto_pendukung' => $temp_image['file_name']
        ];
        $this->m_db->add('pengaduan', $insertData);
        $this->m_flashdata->set('success', 'Pengaduan anda berhasil disimpan!');
        redirect('data_jalan');
    }
}
