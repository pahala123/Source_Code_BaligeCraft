<?php
defined('BASEPATH') or exit('No direct script access allowed');

class penjual_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($email)
    {
        $penjual = $this->db->get_where('penjual', array('email' => $email))->row_array();
        return $penjual;
    }

    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    public function hapus($email)
    {
        $this->db->delete('penjual', array('email' => $email));
    }

    public function setFree($email, $action, $value)
    {
        $this->db->set($action, $value);
        $this->db->where('email', $email);
        $this->db->update('penjual');
    }

    public function edit($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->update('penjual', $data);
    }
}
