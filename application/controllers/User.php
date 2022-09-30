<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
        $l = $this->load;
        $this->session->unset_userdata('profil');
        $l->model('user_model');
        $l->model('auth_model');
        $l->model('corak_model');
        $l->library('form_validation');
        $this->load->model(array(
            'order_model' => 'order',
            'payment_model' => 'payment',
        ));
    }

    private function _profil($data)
    {
        $data['title'] = "Profil";
        $kelas['best_products'] = $this->auth_model->get_all_best_products();
        $kelas['list_products'] = $this->auth_model->get_all_list_products();
        $this->load->view('templates/header_userdashboard', $data);
        $this->load->view('user/editprofile', $data);
        $this->load->view('templates/footer_userdashboard');
    }

    private function _profil_($title, $view)
    {
        $l = $this->load;
        $email                  = $this->session->userdata('email');
        $data                   = $this->user_model->get($email);
        $kelas['user']          = $this->user_model->get($email);
        $kelas['best_products'] = $this->auth_model->get_all_best_products();
        $kelas['list_products'] = $this->auth_model->get_all_list_products();

        $data['title'] = $title;
        $l->view('templates/header_user', $data);
        $l->view('user/' . $view, $kelas);
        $l->view('templates/footer_user');
    }

    private function user($title, $view)
    {
        $l = $this->load;
        $email = $this->session->userdata('email');
        $data = $this->user_model->get($email);
        $kelas['user'] = $this->user_model->get($email);
        $data['title'] = $title;
        $l->view('templates/header_userdashboard', $data);
        $l->view('user/' . $view, $kelas);
        $l->view('templates/footer_userdashboard');
    }

    public function index()
    {
        $this->_profil_('Home', 'home');
    }

    public function ulos()
    {
        $data                  = array();
        $isi['title'] = "Daftar Ulos";
        $data['list_ulos'] = $this->auth_model->get_all_list_ulos();
        $this->load->view('templates/header_userdashboard', $isi);
        $this->load->view('user/ulos', $data, $isi);
        $this->load->view('templates/footer_userdashboard');
    }

    public function detailulos($id)
    {
        $data                       = array();
        $data['get_detail_ulos'] = $this->produk_model->get_single_product($id);
        $data['model']           = $this->corak_model->get_model()->result();
        $isi['title'] = "Detail Produk";
        $this->load->view('user/model_ulos', $data, $isi);
    }

    public function akun()
    {
        $this->user('Dashboard', 'dashboard');
    }

    public function editprofile()
    {
        $this->user('Edit Profile', 'editprofile');
    }

    public function detailpesanan()
    {
        $this->user('Detail Order', 'detailpesanan');
    }

    public function order()
    {
        $params['title'] = 'Pesanan Saya';
        $config['base_url'] = site_url('user/order');
        $config['total_rows'] = $this->order->count_all_orders();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $orders['orders'] = $this->order->get_all_orders($config['per_page'], $page);
        $orders['pagination'] = $this->pagination->create_links();
        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('user/pesanan', $orders);
        $this->load->view('templates/footer_userdashboard');
    }

    public function transaction()
    {
        $data['title'] = 'Transaksi - ';
        $data['transaction'] = $this->User_model->getOrder();
        $this->load->view('templates/header_userdashboard', $data);
        $this->load->view('user/pesanan', $data);
        $this->load->view('templates/footer_userdashboard');
    }

    public function order_view($id)
    {
        $data = $this->order->order_data($id);
        $items = $this->order->order_items($id);

        $order['ord'] = $this->user_model->getOrderByInvoice($id);
        $order['product_order'] = $this->user_model->getProductByInvoice($id);
        $params['title'] = 'Order #' . $data->order_number;
        $order['data'] = $data;
        $order['produk'] = $data;
        $order['items'] = $items;
        $order['delivery_data'] = json_decode($data->delivery_data);

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('user/detailpesanan', $order);
        $this->load->view('templates/footer_userdashboard');
    }

    public function finish_transaction()
    {
        $invoice = $_GET['invoice'];
        $resi = $_GET['resi'];
        $this->db->set('pesanan_status', 4);
        $this->db->where('order_number', $invoice);
        $this->db->where('resi', $resi);
        $this->db->update('orders');
        $this->session->set_flashdata('finish-transaction', 'berhasil');
        redirect(base_url() . 'user/order');
    }

    public function pembayaran()
    {
        $params['title'] = 'Pembayaran Saya';

        $config['base_url'] = site_url('customer/payments/index');
        $config['total_rows'] = $this->payment->count_all_payments();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $payments['payments'] = $this->payment->get_all_payments($config['per_page'], $page);
        $payments['flash'] = $this->session->flashdata('payment_flash');
        $payments['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('user/pembayaran', $payments);
        $this->load->view('templates/footer_userdashboard');
    }

    public function confirmpayment()
    {
        $order = $this->input->get('orders');

        $params['title'] = 'Konfirmasi Pembayaran';

        $payments['orders'] = $this->order->order_with_bank_payments();
        $payments['banks'] = (array) json_decode(get_settings('payment_banks'));
        $payments['order_id'] = $order;
        $payments['payments'] = $this->payment->payment_list();
        $payments['flash'] = $this->session->flashdata('payment_flash');

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('user/konfirmasipembayaran', $payments);
        $this->load->view('templates/footer_userdashboard');
    }

    public function do_confirm()
    {
        $this->form_validation->set_error_delimiters('<div class="font-weight-bold text-danger">', '</div>');
        $this->form_validation->set_rules('order_id', 'Order', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->confirmpayment();
        } else {
            $order_id = $this->input->post('order_id');
            $transfer = $this->input->post('transfer');
            $config['upload_path'] = './assets/upload/payments/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5096;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('picture_name')) {
                $data = $this->upload->data();
                $file_name = $data['file_name'];

                $picture_name = $file_name;
            } else {
                show_error($this->upload->display_errors());
            }

            $data = json_encode($data);
            $payment = array(
                'order_id' => $order_id,
                'payment_price' => $transfer,
                'payment_date' => date('Y-m-d H:i:s'),
                'picture_name' => $picture_name,
                'payment_data' => $data
            );

            $this->payment->register_payment($order_id, $payment);
            $this->session->set_flashdata('payment_flash', 'Konfirmasi berhasil dilakukan. Admin akan memverifikasinya dalam waktu 1x24 jam');

            redirect('user/pembayaran');
        }
    }

    public function pembayaran_view($id)
    {
        $data = $this->payment->payment_data($id);
        $banks = json_decode(get_settings('payment_banks'));
        $banks = (array) $banks;

        $params['title'] = 'Pembayaran Order #' . $data->order_number;

        $payment['data'] = $data;
        $payment['banks'] = $banks;

        $payment['payment'] = json_decode($data->payment_data);

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('user/detailpembayaran', $payment);
        $this->load->view('templates/footer_userdashboard');
    }

    public function profile()
    {
        $email = $this->session->userdata('email');
        $user = $this->user_model->get($email);

        // Validasi

        $i = $this->input;
        $this->session->set_userdata('username', $i->post('username'));
        $this->session->set_userdata('upload_image_file_manager', true);
        $data = array(
            'username' => $i->post('username'),
            'email' => $email,
            'tempat_lahir' => $i->post('tempat_lahir'),
            'tanggal_lahir' => $i->post('tanggal_lahir'),
            'nama_lengkap' => $i->post('nama_lengkap'),
            'notelp' => $i->post('notelp'),
            'alamat' => $i->post('alamat'),
            'kodepos' => $i->post('kodepos'),
            'bio' => $i->post('bio'),
        );

        $f = $this->form_validation;
        $f->set_rules(
            'username',
            'Username',
            'required|trim|min_length[5]',
            [
                'required' => 'Username tidak boleh kosong',
                'min_length' => 'Username minimal 5 karakter'
            ]
        );
        $f->set_rules(
            'tempat_lahir',
            'TempatLahir',
            'required|trim',
            [
                'required' => 'Tempat Lahir tidak boleh kosong',
            ]
        );
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
            'alamat',
            'Alamat',
            'required|trim|min_length[5]',
            [
                'required' => 'Alamat tidak boleh kosong',
                'min_length' => 'Alamat minimal 10 karakter'
            ]
        );
        $f->set_rules(
            'kodepos',
            'KodePos',
            'required|integer',
            [
                'required' => 'Kode Pos tidak boleh kosong',
                'integer' => 'Kode Pos hanya boleh angka'
            ]
        );
        $f->set_rules(
            'notelp',
            'Nomor Telepon',
            'required|integer',
            [
                'required' => 'Nomor Telepon tidak boleh kosong',
                'integer' => 'Nomor telepon hanya boleh angka'
            ]
        );

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './assets/upload/user/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('error', 'berhasil');
                redirect(base_url('user/editprofile'));
            } else {
                $post_image            = $this->upload->data();
                $data['foto'] = $post_image['file_name'];
            }
        }
        if ($f->run() == true) {
            $this->user_model->edit($data);
            $this->session->set_flashdata('edit-profil', 'berhasil');
            redirect(base_url('user/editprofile'));
        } else {
            $l = $this->load;
            $email = $this->session->userdata('email');
            $data = $this->user_model->get($email);
            $kelas['user'] = $this->user_model->get($email);
            $data['title'] = 'Edit Profile';
            $l->view('templates/header_userdashboard', $data);
            $l->view('user/editprofile', $kelas);
            $l->view('templates/footer_userdashboard');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('logout-user', 'berhasil');
        redirect(base_url('/'));
    }
}
