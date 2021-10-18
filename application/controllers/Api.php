<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['m_auth', 'm_flashdata', 'm_db']);
    }

    public function index()
    {
        redirect('error_403');
    }

    public function getDataJalan($id_jalan = '')
    {
        getDataJalanApi($id_jalan);
    }

    public function getDataPenanganan($id_penanganan = '')
    {
        getDataPenangananApi($id_penanganan);
    }

    public function getDataLatLong($id_jalan = '')
    {
        $jalan = getDataJalanApi($id_jalan, true);
        $newJalan = [];
        if ($id_jalan == '') {
            foreach ($jalan as $key => $val) {
                $newJalan[$key]['loc'] = [floatval($val['latitude']), floatval($val['longitude'])];
                $newJalan[$key]['title'] = $val['nama_pangkal_ruas'] . ' - ' . $val['nama_ujung_ruas'];
            }
        } else {
            $newJalan['loc'] = [floatval($jalan['latitude']), floatval($jalan['longitude'])];
            $newJalan['title'] = $jalan['nama_pangkal_ruas'] . ' - ' . $jalan['nama_ujung_ruas'];
            $newJalan = [$newJalan];
        }

        header('Content-Type: application/json');
        echo json_encode($newJalan, JSON_PRETTY_PRINT);
    }
}
