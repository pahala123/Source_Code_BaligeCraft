<?php

class Corak_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function listing()
    {
        $this->db->select('*');
        $this->db->from('model');
        $this->db->order_by('id_model', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function tambah($data)
    {
        $this->db->insert('order_ulos', $data);
    }

    function get_model()
    {
        $query = $this->db->get('model');
        return $query;
    }

    function get_biaya($id_model)
    {
        $query = $this->db->get_where('model', array('id_model' => $id_model));
        return $query;
    }
}
