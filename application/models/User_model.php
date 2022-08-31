<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
	public $user_id;
	//load database
	public function __construct()
	{
		parent::__construct();

		$this->user_id = get_current_user_id();
	}

	public function data()
	{
		$id = get_current_user_id();

		$data = $this->db->where('id', $id)->get('user')->row();
		return $data;
	}

	public function getAll()
	{
		return $this->db->get('user');
	}

	public function get($email)
	{
		$user = $this->db->get_where('user', array('email' => $email))->row_array();
		return $user;
	}

	public function getID($id)
	{
		$user = $this->db->get_where('user', array('id' => $id))->row_array();
		return $user;
	}

	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}

	public function hapus($email)
	{
		$this->db->delete('user', array('email' => $email));
	}

	public function setFree($email, $action, $value)
	{
		$this->db->set($action, $value);
		$this->db->where('email', $email);
		$this->db->update('user');
	}

	public function edit($data)
	{
		$this->db->where('email', $data['email']);
		$this->db->update('user', $data);
	}

	public function create_order(array $data)
	{
		$this->db->insert('orders', $data);

		return $this->db->insert_id();
	}

	public function create_order_items($data)
	{
		return $this->db->insert_batch('order_item', $data);
	}

	public function getOrderByInvoice($id)
	{
		$user = $this->session->userdata('id');
		return $this->db->get_where('orders', ['id' => $id, 'user_id' => $user])->row_array();
	}

	public function getProductByInvoice($id)
	{
		$user = $this->session->userdata('id');
		return $this->db->get_where('order_item', ['user_id' => $user, 'id' => $id]);
	}

	public function getOrder()
	{
		$id = $this->session->userdata('id');
		$this->db->where('status !=', 4);
		$this->db->where('user_id', $id);
		$this->db->order_by('id', 'desc');
		return $this->db->get('orders');
	}
}
