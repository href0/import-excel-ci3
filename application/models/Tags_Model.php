<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tags_Model extends CI_Model
{

    public function insert($data)
    {
        $insert = $this->db->insert_batch('tags', $data);
        if ($insert) {
            return true;
        }
    }
    public function getData()
    {
        return $this->db
            ->group_by('tag')
            ->get('tags')->result_array();
    }
}
