<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function count_all_payments()
    {
        $id = $this->user_id;

        return $this->db->join('orders', 'orders.id = payments.order_id')->where('orders.user_id', $id)->get('payments')->num_rows();
    }

    public function get_all_payments()
    {
        $payments = $this->db->query("
            SELECT p.*, o.order_number, u.username AS user
            FROM payments p
            JOIN orders o
                ON o.id = p.order_id
            JOIN user u
                ON u.id = o.user_id
            ORDER BY p.payment_date DESC
        ");
        return $payments->result();
    }

    public function register_payment($id, array $data)
    {
        $this->db->where('id', $id)->update('orders', array('order_status' => 2));
        $this->db->insert('payments', $data);

        return $this->db->insert_id();
    }

    public function payment_list()
    {
        $id = $this->user_id;

        $payments = $this->db->query("
            SELECT p.*, o.order_number
            FROM payments p
            JOIN orders o
	            ON o.id = p.order_id
            WHERE o.user_id = '$id'
            LIMIT 5");

        return $payments->result();
    }

    public function is_payment_exist($id)
    {
        return ($this->db->where('id', $id)->get('payments')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function payment_data($id)
    {
        $data = $this->db->select('p.*, o.order_number')->join('orders o', 'o.id = p.order_id')->where('p.id', $id)->get('payments p')->row();

        return $data;
    }

    public function set_payment_status($id, $status, $order)
    {
        $this->db->where('id', $order)->update('orders', array('order_status' => 2));

        return $this->db->where('id', $id)->update('payments', array('payment_status' => $status));
    }
}
