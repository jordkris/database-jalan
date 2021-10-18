<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_db extends CI_Model
{
    public function getAll($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function getWhere($table, $condition)
    {
        return $this->db->get_where($table, $condition)->row_array();
    }

    public function getWhereRes($table, $condition)
    {
        return $this->db->get_where($table, $condition)->result_array();
    }

    public function getSumColumn($table, $column)
    {
        return $this->db->select_sum($table . "." . $column)->get($table)->row_array()[$column];
    }

    public function getNumRows($table)
    {
        return $this->db->get($table)->num_rows();
    }

    public function isExist($table, $condition)
    {
        $count = $this->db->get_where($table, $condition)->num_rows();
        if ($count > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function add($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update($table, $data);
    }

    public function delete($table, $id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
    }

    public function upload_config($path)
    {
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);
    }

    public function upload_file($path, $postName)
    {
        if (!empty($_FILES[$postName]['name'])) {
            $_FILES['file']['name'] = $_FILES[$postName]['name'];
            $_FILES['file']['type'] = $_FILES[$postName]['type'];
            $_FILES['file']['tmp_name'] = $_FILES[$postName]['tmp_name'];
            $_FILES['file']['error'] = $_FILES[$postName]['error'];
            $_FILES['file']['size'] = $_FILES[$postName]['size'];
            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                // $this->resizeImage($path, $uploadData['file_name']);
                // unlink($path . '/' . $uploadData['file_name']);
                return $uploadData;
            } else {
                $uploadData['file_name'] = '';
                return $uploadData;
            }
        } else {
            $uploadData['file_name'] = '';
            return $uploadData;
        }
    }

    public function addSubHeadlineDetail($data, $subheadline_id, $mode = 'multi')
    {
        $path = './public/landingpage/generatedImages/product-image';
        $this->upload_config($path);
        if ($mode == 'multi') {
            for ($i = 1; $i <= countByPrefix($data, 'product-subheadline-detail'); $i++) {
                $temp_image = $this->upload_file($path, 'product-subheadline-detail-icon-' . $i);
                $temp = [
                    'subheadline-id' => $subheadline_id,
                    'text' => $data['product-subheadline-detail-' . $i],
                    'image' => $temp_image['file_name']
                ];
                $this->db->insert('product-subheadline-detail', $temp);
            }
        } else {
            $temp_image = $this->upload_file($path, 'product-subheadline-detail-icon-new');
            $temp = [
                'subheadline-id' => $subheadline_id,
                'text' => $data['product-subheadline-detail-new'],
                'image' => $temp_image['file_name']
            ];
            $this->db->insert('product-subheadline-detail', $temp);
        }
    }

    public function addProductDescription($data, $landingpage_id)
    {
        $temp = [
            'landingpage-id' => $landingpage_id,
            'text' => $data['product-description'],
        ];
        $this->db->insert('product-description', $temp);
    }
}