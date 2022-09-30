<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $l = $this->load;
        $l->model('user_model');
        $l->model('provinsi_model');
        $l->model('model_app');
        $this->load->model(array(
            'produk_model' => 'produk',
            'order_model' => 'order',
        ));
    }

    public function detail($id)
    {
        $data                       = array();
        $email                      = $this->session->userdata('email');
        $data                       = $this->user_model->get($email);
        $data['get_detail_product'] = $this->produk_model->get_single_product($id);
        $data['get_all_category']   = $this->produk_model->get_all_category();
        $isi['title'] = "Detail Produk";
        $this->load->view('templates/header_userdashboard', $isi);
        $this->load->view('produk_detail', $data, $isi);
        $this->load->view('templates/footer_userdashboard');
    }

    function tambah_rating()
    {
        if ($this->input->post('rating') != '') {
            $data = array('rating' => $this->input->post('rating'));
            $where = array('id_ulasan' => $this->input->post('id'));
            $this->model_app->update('ulasan', $data, $where);
        }
    }

    public function rating()
    {
        $data                       = array();
        $data['record']             = $this->model_app->view('ulasan');
        $isi['title'] = "Detail Produk";
        $this->load->view('user/terima', $data);
    }

    public function userdetail($id)
    {
        $data                       = array();
        $email                      = $this->session->userdata('email');
        $data                       = $this->user_model->get($email);
        $data['get_detail_product'] = $this->produk_model->get_single_product($id);
        $data['get_nama_penjual']   = $this->produk_model->get_nama_penjual($id);
        $data['get_all_category']   = $this->produk_model->get_all_category();
        $data['record']             = $this->model_app->view('ulasan');
        $data['row']                = $this->model_app->get_ulasan();
        $isi['title']               = "Detail Produk";
        // var_dump($data['get_nama_penjual']);die;
        $this->load->view('templates/header_userdashboard', $isi);
        $this->load->view('user/product_detail', $data);
        $this->load->view('templates/footer_userdashboard');
    }

    public function reviewproduk($id)
    {
        $data                       = array();
        $email                      = $this->session->userdata('email');
        $data                       = $this->user_model->get($email);
        $data['get_detail_product'] = $this->produk_model->get_single_product($id);
        $data['get_all_category']   = $this->produk_model->get_all_category();
        $data['record']             = $this->model_app->view('ulasan');
        $data['row']                = $this->model_app->get_ulasan();
        $isi['title']               = "Detail Produk";


        $f = $this->form_validation;
        $this->form_validation->set_message('check_captcha', 'text dont match captcha');
        $f->set_rules(
            'nama_lengkap',
            'NamaLengkap',
            'required|trim|min_length[10]',
            [
                'required' => 'Nama Lengkap tidak boleh kosong',
                'min_length' => 'Nama Lengkap minimal 10 karakter'
            ]
        );
        $f->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email harus dengan format @'
            ]
        );


        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_userdashboard', $isi);
            $this->load->view('user/product_detail', $data);
            $this->load->view('templates/footer_userdashboard');
        } else {
            $i         = $this->input;
            $data = array(
                'nama_lengkap'              => $i->post('nama_lengkap'),
                'email'                     => $email,
                'judul'                     => $i->post('judul'),
                'isi_ulasan'                => $i->post('isi_ulasan'),
            );
            $this->produk_model->tambahreview($data);
            $this->session->set_flashdata('add-review-success', 'berhasil');
            redirect('produk/userdetail/' . $id);
        }
    }

    // Ke Keranjang
    public function save_cart()
    {
        $data                       = array();
        $produk_id                  = $this->input->post('produk_id');
        $results                    = $this->produk_model->get_product_by_id($produk_id);
        $data['id']                 = $results->produk_id;
        $data['name']               = $results->produk_nama;
        $data['price']              = $results->produk_harga;
        $data['qty']                = $this->input->post('qty');
        $data['model']              = $this->input->post('harga_model');
        $data['options']            = array('produk_gambar' => $results->produk_gambar);
        $this->cart->insert($data);
        redirect('produk/cart');
    }

    // Ke Keranjang
    public function save_cartulos()
    {
        $data                       = array();
        $produk_id                  = $this->input->post('produk_id');
        $results                    = $this->produk_model->get_product_by_id($produk_id);
        $data['id']                 = $results->produk_id;
        $data['name']               = $this->input->post('nama_ulos');
        $data['price']              = $this->input->post('total_ulos');
        $data['qty']                = $this->input->post('qty');
        $data['options']            = array('produk_gambar' => $results->produk_gambar);
        $this->cart->insert($data);
        redirect('produk/cart');
    }
    // Ke Checkout
    public function cart()
    {
        $data                       = array();
        $order_id                   = $this->input->post('order_id');
        $data['carts']              = $this->cart->contents();
        $data['model']              = $this->produk_model->get_ulos_by_id($order_id);
        $isi['title']               = "Keranjang Produk";
        $this->load->view('templates/header_userdashboard', $isi);
        $this->load->view('user/cart', $data);
        $this->load->view('templates/footer_userdashboard');
    }

    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');
        $this->cart->update($data);
        redirect('produk/cart');
    }

    public function remove_cart()
    {
        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('produk/cart');
    }

    public function checkout($action = '')
    {
        switch ($action) {
            default:
                $coupon = $this->input->post('coupon_code') ? $this->input->post('coupon_code') : $this->session->userdata('_temp_coupon');
                if ($this->session->userdata('_temp_quantity') || $this->session->userdata('_temp_coupon')) {
                    $this->session->unset_userdata('_temp_coupon');
                    $this->session->unset_userdata('_temp_quantity');
                }
                $items = [];
                $this->cart->update($items);

                if (empty($coupon)) {
                    $discount = 0;
                    $disc = 'Tidak menggunakan kupon';
                } else {
                    if ($this->produk->is_coupon_exist($coupon)) {
                        if ($this->produk->is_coupon_active($coupon)) {
                            if ($this->produk->is_coupon_expired($coupon)) {
                                $discount = 0;
                                $disc = 'Kupon kadaluarsa';
                            } else {
                                $coupon_id = $this->produk->get_coupon_id($coupon);
                                $this->session->set_userdata('coupon_id', $coupon_id);

                                $credit = $this->produk->get_coupon_credit($coupon);
                                $discount = $credit;
                                $disc = '<span class="badge badge-success">' . $coupon . '</span> Rp ' . format_rupiah($credit);
                            }
                        } else {
                            $discount = 0;
                            $disc = 'Kupon sudah tidak aktif';
                        }
                    } else {
                        $discount = 0;
                        $disc = 'Kupon tidak terdaftar';
                    }
                }

                $items = [];

                foreach ($this->cart->contents() as $item) {
                    $items[$item['id']]['qty'] = $item['qty'];
                    $items[$item['id']]['price'] = $item['price'];
                }

                $subtotal = $this->cart->total();
                $title = array(
                    'title'            => 'Checkout Produk',
                );
                $email                  = $this->session->userdata('email');
                $params                 = $this->user_model->get($email);
                $params['cart_order']   = $this->cart->contents();
                $params['subtotal']     = $subtotal;
                $params['total']        = $this->input->post('total');
                $this->session->set_userdata('order_quantity', $items);
                $this->session->set_userdata('total_price', $params['total']);
                // $this->load->view('templates/header_userdashboard', $title);
                $this->load->view('user/checkout', $params);
                // $this->load->view('templates/footer_userdashboard');
                break;

            case 'order':
                $quantity                       = $this->session->userdata('order_quantity');
                $user_id                        = get_current_user_id();
                $coupon_id                      = $this->session->userdata('coupon_id');
                $produk_nama                     = $this->input->post('product_name');
                $order_number                   = $this->_create_order_number($quantity, $user_id, $coupon_id);
                $order_date                     = date('Y-m-d H:i:s');
                $total_price                    = $this->input->post('total_input');
                $total_items                    = count($quantity);
                $name                           = $this->input->post('nama_lengkap');
                $phone_number                   = $this->input->post('notelp');
                $address                        = $this->input->post('alamat');
                $ongkir                          = $this->input->post('pilih_ongkir');
                $note                           = $this->input->post('note');
                $province                       = $this->input->post('provinsi', true);
                $regency                        = $this->input->post('kabupaten', true);
                $courier                        = $this->input->post('kurir', true);

                $delivery_data = array(
                    'user' => array(
                        'nama_lengkap' => $name,
                        'notelp' => $phone_number,
                        'alamat' => $address
                    ),
                    'note' => $note
                );

                $delivery_data = json_encode($delivery_data);

                $order = array(
                    'user_id'           => $user_id,
                    'nama_produk'        => $produk_nama,
                    'order_number'      => $order_number,
                    'order_date'        => $order_date,
                    'total_price'       => $total_price,
                    'total_items'       => $total_items,
                    'delivery_data'     => $delivery_data,
                    'resi'  => '0',
                    'province'          => $province,
                    'regency'           => $regency,
                    'courier'           => $courier,
                    'ongkir'            => $ongkir,

                );

                $order = $this->user_model->create_order($order);

                $n = 0;
                foreach ($quantity as $id => $data) {
                    $items[$n]['order_id'] = $order;
                    $items[$n]['produk_id'] = $id;
                    $items[$n]['order_qty'] = $data['qty'];
                    $items[$n]['order_price'] = $data['price'];
                    $n++;
                    
                    $produk = $this->produk_model->getOneProduct($id);
                    $cek = array('produk_kuantitas' => $produk->produk_kuantitas -= $data['qty']);
                    $this->produk_model->editQty($cek,$id);
                }

                $this->user_model->create_order_items($items);

                $this->db->where('user', $this->session->userdata('email'));
                $this->cart->destroy();
                $this->session->unset_userdata('order_quantity');
                $this->session->unset_userdata('total');
                $this->session->set_flashdata('order_flash', 'Order berhasil ditambahkan');
                redirect('user/order_view/' . $order);
                break;
        }
    }

    public function cart_api()
    {
        $action = $this->input->get('action');

        switch ($action) {
            case 'add_item':
                $id = $this->input->post('id');
                $qty = $this->input->post('qty');
                $sku = $this->input->post('sku');
                $name = $this->input->post('name');
                $price = $this->input->post('price');

                $item = array(
                    'id' => $id,
                    'qty' => $qty,
                    'price' => $price,
                    'name' => $name
                );
                $this->cart->insert($item);
                $total_item = count($this->cart->contents());

                $response = array('code' => 200, 'message' => 'Item dimasukkan dalam keranjang', 'total_item' => $total_item);
                break;
            case 'display_cart':
                $carts = [];

                foreach ($this->cart->contents() as $items) {
                    $carts[$items['rowid']]['id'] = $items['id'];
                    $carts[$items['rowid']]['name'] = $items['name'];
                    $carts[$items['rowid']]['qty'] = $items['qty'];
                    $carts[$items['rowid']]['price'] = $items['price'];
                    $carts[$items['rowid']]['subtotal'] = $items['subtotal'];
                }

                $response = array('code' => 200, 'carts' => $carts);
                break;
            case 'cart_info':
                $total_price = $this->cart->total();
                $total_item = count($this->cart->contents());

                $data['total_price'] = $total_price;
                $data['total_item'] = $total_item;

                $response['data'] = $data;
                break;
            case 'remove_item':
                $rowid = $this->input->post('rowid');

                $this->cart->remove($rowid);

                $total_price = $this->cart->total();
                $ongkir = (int) ($total_price >= get_settings('min_shop_to_free_shipping_cost')) ? 0 : get_settings('shipping_cost');
                $data['code'] = 204;
                $data['message'] = 'Item dihapus dari keranjang';
                $data['total']['subtotal'] = 'Rp ' . format_rupiah($total_price);
                $data['total']['ongkir'] = ($ongkir > 0) ? 'Rp ' . format_rupiah($ongkir) : 'Gratis';
                $data['total']['total'] = 'Rp ' . format_rupiah($total_price + $ongkir);

                $response = $data;
                break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }

    public function _create_order_number($quantity, $user_id, $coupon_id)
    {
        $this->load->helper('string');

        $alpha = strtoupper(random_string('alpha', 3));
        $num = random_string('numeric', 3);
        $count_qty = count($quantity);


        $number = $alpha . date('j') . date('n') . date('y') . $count_qty . $user_id . $coupon_id . $num;
        //Random 3 letter . Date . Month . Year . Quantity . User ID . Coupon Used . Numeric

        return $number;
    }
}
