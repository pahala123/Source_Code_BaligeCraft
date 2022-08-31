<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get($email)
    {
        $admin = $this->db->get_where('admin', array('email' => $email))->row_array();
        return $admin;
    }

    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    public function hapus($email)
    {
        $this->db->delete('admin', array('email' => $email));
    }

    public function setFree($email, $action, $value)
    {
        $this->db->set($action, $value);
        $this->db->where('email', $email);
        $this->db->update('admin');
    }

    public function edit($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->update('admin', $data);
    }

    public function count_all_orders()
    {
        return $this->db->get('orders')->num_rows();
    }

    public function get_all_orders()
    {
        $orders = $this->db->query("
            SELECT o.id, o.order_number, o.order_date, o.order_status, o.payment_method, o.total_price, o.total_items, u.username AS user
            FROM orders o
            JOIN user u
                ON u.id = o.user_id
            ORDER BY o.order_date DESC
        ");

        return $orders->result();
    }
}
