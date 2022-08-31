<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    //load database
    public function get_all_best_products()
    {
        $this->db->select('*,produk.produk_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id=produk.produk_kategori');
        $this->db->order_by('produk.produk_id', 'ASC');
        $this->db->where('produk.produk_status', 1);
        $this->db->where('produk_terbaik', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_list_products()
    {
        $this->db->select('*,produk.produk_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id=produk.produk_kategori');
        $this->db->order_by('produk.produk_id', 'ASC');
        $this->db->where('produk.produk_status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_list_ulos()
    {
        $this->db->select('*,produk.produk_status');
        $this->db->from('produk');
        $this->db->order_by('produk.produk_id', 'ASC');
        $this->db->where('produk.produk_status', 1);
        $this->db->where('produk.produk_kategori', 3);
        $this->db->limit(4);
        $info = $this->db->get();
        return $info->result();
    }
}
