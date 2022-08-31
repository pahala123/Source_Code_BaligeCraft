<?php

class Kategori_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}
