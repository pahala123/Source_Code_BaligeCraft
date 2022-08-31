<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class Snap extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-gorrJOQBbW85UKaQiRC6RZLg', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}


	public function token()
	{
		$invoice = $_GET['invoice'];
		$gettransaction = $this->db->get_where('orders', ['id' => $invoice]);
		$getinvoice = $this->db->get_where('orders', ['order_number' => $invoice])->row_array();
		$getuser = $this->db->get_where('user', ['id' => $getinvoice['user_id']])->row_array();

		$total = intval($getinvoice['total_price']);

		$transaction_details = array(
			'order_id' => $getinvoice['id'],
			'gross_amount' => $total
		);

		$items = [];
		foreach ($gettransaction->result_array() as $c) {
			$items[] = array(
				'id' => intval($c['id']),
				'price' => intval($c['total_price']),
				'quantity' => intval($c['total_items']),
				'name' => substr($c['nama_produk'], 0, 50)
			);
		}

		$items[] = [
			'id' => 999,
			'price' => intval($getinvoice['total_price']),
			'quantity' => 1,
			'name' => 'Ongkos Kirim (' . strtoupper($getinvoice['courier']) . ')'
		];

		$customer_details = array(
			'first_name'    => $getuser['nama_lengkap'],
			'email'         => $getuser['email'],
			'phone'         => $getuser['notelp']
		);

		$credit_card['secure'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$payload = array(
			'transaction_details' => $transaction_details,
			'item_details'		 => $items,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry,
			'total_price' 		=> $getinvoice['total_price']
		);

		error_log(json_encode($payload));
		$snapToken = $this->midtrans->getSnapToken($payload);
		error_log($snapToken);
		echo $snapToken;
		return $payload;
	}

	public function finish()
	{
		$invoice = $_GET['invoice'];
		if (!$invoice) {
			redirect(base_url());
		}
		$result = json_decode($this->input->post('result_data'));
		$this->db->set('link_pay', $result->pdf_url);
		$this->db->set('order_status', 'pending');
		$this->db->where('order_number', $invoice);
		$this->db->update('orders');
		redirect(base_url() . 'user/order/' . $invoice);
	}
}
