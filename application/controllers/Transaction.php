<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Transaction extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-gorrJOQBbW85UKaQiRC6RZLg', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function process()
	{
		var_dump('tes');die;
		$order_id = $this->input->post('order_id');
		$action = $this->input->post('action');
		switch ($action) {
			case 'status':
				$this->status($order_id);
				break;
			case 'approve':
				$this->approve($order_id);
				break;
			case 'expire':
				$this->expire($order_id);
				break;
			case 'cancel':
				$this->cancel($order_id);
				break;
		}
	}

	public function status($order_id)
	{
		$status = $this->midtrans->status($order_id);
		$this->db->set('order_status', $status->transaction_status);
		$this->db->where('id', $order_id);
		$this->db->update('orders');
		$this->session->set_flashdata('status-success', 'Berhasil!');
		redirect(base_url() . 'penjual/datapesanan');
	}

	public function cancel($order_id)
	{
		$status = $this->midtrans->cancel($order_id);
		$this->db->set('order_status', $status->transaction_status);
		$this->db->where('id', $order_id);
		$this->db->update('orders');
		$this->session->set_flashdata('status', "<div class='alert alert-secondary' role='alert'>
            Status pesanan dengan Order ID $order_id telah dibatalkan
            </div>");
		redirect(base_url() . 'penjual/datapesanan');
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r($this->midtrans->approve($order_id));
	}

	public function expire($order_id)
	{
		$status = $this->midtrans->expire($order_id);
		$this->db->set('order_status', $status->transaction_status);
		$this->db->where('id', $order_id);
		$this->db->update('orders');
		$this->session->set_flashdata('status', "<div class='alert alert-secondary' role='alert'>
            Status pesanan dengan Order ID $order_id telah diubah ke expired
            </div>");
		redirect(base_url() . 'penjual/datapesanan');
	}
}
