<?php

function setWIB()
{
    date_default_timezone_set("Asia/Jakarta");
}
setWIB();

function getDataJalanApi($id_jalan = '', $return_mode = false)
{
    $ci = get_instance();
    if ($id_jalan == '') {
        $jalan = $ci->m_db->getAll('jalan');
        foreach ($jalan as $key => $val) {
            //kecamatan
            $kecamatan = $ci->m_db->getWhereRes('jalan_kecamatan', [
                'id_jalan' => $val['id'],
            ]);
            $kecamatanArr = [];
            foreach ($kecamatan as $key2 => $val2) {
                $kecamatanArr[] = $ci->m_db->getWhere('kecamatan', [
                    'id' => $val2['id_kecamatan'],
                ])['nama'];
            }
            $jalan[$key]['kecamatan'] = $kecamatanArr;
            //kategori jalan
            $jalan[$key]['kategori_jalan'] = $ci->m_db->getWhere('kategori_jalan', [
                'id' => $val['id_kategori_jalan']
            ])['nama'];
            unset($jalan[$key]['id_kategori_jalan']);
            //foto jalan
            $fotoJalan = $ci->m_db->getWhereRes('foto_jalan', [
                'id_jalan' => $val['id'],
            ]);
            foreach ($fotoJalan as $key3 => $val3) {
                $fotoJalan[$key3] = $val3['path'];
            }
            $jalan[$key]['foto_jalan'] = $fotoJalan;
        }
    } else {
        $jalan = $ci->m_db->getWhere('jalan', [
            'id' => $id_jalan
        ]);
        //kecamatan
        $kecamatan = $ci->m_db->getWhereRes('jalan_kecamatan', [
            'id_jalan' => $jalan['id'],
        ]);
        $kecamatanArr = [];
        foreach ($kecamatan as $key => $val) {
            $kecamatanArr[] = $ci->m_db->getWhere('kecamatan', [
                'id' => $val['id_kecamatan'],
            ])['nama'];
        }
        $jalan['kecamatan'] = $kecamatanArr;
        //kategori jalan
        $jalan['kategori_jalan'] = $ci->m_db->getWhere('kategori_jalan', [
            'id' => $jalan['id_kategori_jalan']
        ])['nama'];
        unset($jalan['id_kategori_jalan']);
        //foto jalan
        $fotoJalan = $ci->m_db->getWhereRes('foto_jalan', [
            'id_jalan' => $jalan['id'],
        ]);
        foreach ($fotoJalan as $key2 => $val2) {
            $fotoJalan[$key2] = $val2['path'];
        }
        $jalan['foto_jalan'] = $fotoJalan;
    }
    if ($return_mode) {
        return $jalan;
    } else {
        header('Content-Type: application/json');
        echo json_encode($jalan, JSON_PRETTY_PRINT);
    }
}

function getDataPenangananApi($id_penanganan = '')
{
    $ci = get_instance();
    if ($id_penanganan == '') {
        $penanganan = $ci->m_db->getAll('penanganan');
        foreach ($penanganan as $key => $val) {
            //jalan
            $penanganan[$key]['jalan'] = getDataJalanApi($val['id_jalan'], true);
            // detail penanganan
            $detailArr = $ci->m_db->getWhereRes('detail_penanganan', [
                'id_penanganan' => $val['id']
            ]);
            // tipe penanganan
            foreach ($detailArr as $key2 => $val2) {
                $detailArr[$key2]['tipe_penanganan'] = $ci->m_db->getWhere('tipe_penanganan', [
                    'id' => $val2['id_tipe_penanganan']
                ])['nama'];
                unset($detailArr[$key2]['id']);
                unset($detailArr[$key2]['id_penanganan']);
                unset($detailArr[$key2]['id_tipe_penanganan']);
            }
            $penanganan[$key]['detail'] = $detailArr;
            unset($penanganan[$key]['id_jalan']);
        }
    } else {
        $penanganan = $ci->m_db->getWhere('penanganan', [
            'id' => $id_penanganan
        ]);
        //jalan
        $penanganan['jalan'] = getDataJalanApi($penanganan['id_jalan'], true);
        // detail penanganan
        $detailArr = $ci->m_db->getWhereRes('detail_penanganan', [
            'id_penanganan' => $penanganan['id']
        ]);
        // tipe penanganan
        foreach ($detailArr as $key => $val) {
            $detailArr[$key]['tipe_penanganan'] = $ci->m_db->getWhere('tipe_penanganan', [
                'id' => $val['id_tipe_penanganan']
            ])['nama'];
            unset($detailArr[$key]['id']);
            unset($detailArr[$key]['id_penanganan']);
            unset($detailArr[$key]['id_tipe_penanganan']);
        }
        $penanganan['detail'] = $detailArr;
        unset($penanganan['id_jalan']);
    }
    header('Content-Type: application/json');
    echo json_encode($penanganan, JSON_PRETTY_PRINT);
}
