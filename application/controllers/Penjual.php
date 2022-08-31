<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjual extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $l = $this->load;
        $this->session->unset_userdata('profil');
        $l->model('penjual_model');
        $l->model('kategori_model');
        $l->model('produk_model');
        $l->model('auth_model');
        $l->library('form_validation');
        $this->load->model(array(
            'order_model' => 'order',
            'payment_model' => 'payment',
        ));
    }

    public function index()
    {
        $this->_profil_('Home', 'home');
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

    public function dataproduk()
    {
        $this->user('Data Produk', 'data_produk');
    }


    private function _profil($data)
    {
        $data['title'] = "Profil";
        $kelas['best_products'] = $this->auth_model->get_all_best_products();
        $kelas['list_products'] = $this->auth_model->get_all_list_products();
        $this->load->view('templates/header_userdashboard', $data);
        $this->load->view('penjual/editprofile', $data);
        $this->load->view('templates/footer_userdashboard');
    }

    private function _profil_($title, $view)
    {
        $l = $this->load;
        $email = $this->session->userdata('email');
        $data = $this->penjual_model->get($email);
        $kelas['penjual'] = $this->penjual_model->get($email);
        $kelas['best_products'] = $this->auth_model->get_all_best_products();
        $kelas['list_products'] = $this->auth_model->get_all_list_products();

        $data['title'] = $title;
        $l->view('templates/header_user', $data);
        $l->view('penjual/' . $view, $kelas);
        $l->view('templates/footer_user');
    }

    private function user($title, $view)
    {
        $l = $this->load;
        $email = $this->session->userdata('email');
        $data = $this->penjual_model->get($email);
        $kelas['penjual'] = $this->penjual_model->get($email);
        $kelas['produk'] = $this->produk_model->listing();
        $kelas['kategori'] = $this->kategori_model->listing();
        $data['title'] = $title;
        $l->view('templates/header_userdashboard', $data);
        $l->view('penjual/' . $view, $kelas);
        $l->view('templates/footer_userdashboard');
    }

    public function datapesanan()
    {
        $params['title'] = 'Kelola Order';
        $config['base_url'] = site_url('penjual/datapesanan');
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
        $this->load->view('penjual/data_pesanan', $orders);
        $this->load->view('templates/footer_userdashboard');
    }

    // Edit Produk
    public function edit($id)
    {
        $l = $this->load;
        $this->session->set_userdata('upload_image_file_manager', true);
        $kategori   = $this->kategori_model->listing();
        $produk     = $this->produk_model->detail($id);
        $isi = array(
            'title'            => 'Edit Produk',
            'kategori'        => $kategori,
            'produk'        => $produk,
        );

        $this->session->set_userdata('upload_image_file_manager', true);
        // Validasi
        $valid = $this->form_validation;
        $valid->set_rules('produk_nama', 'Nama Produk', 'required|trim', ['required' => 'Nama Produk tidak boleh kosong',]);
        $valid->set_rules('produk_warna', 'Warna Produk', 'required|trim', ['required' => 'Warna Produk tidak boleh kosong',]);
        $valid->set_rules('produk_berat', 'Berat Produk', 'required|trim|integer', ['required' => 'Berat Produk tidak boleh kosong', 'integer' => 'Berat Produk hanya boleh angka']);
        $valid->set_rules('produk_harga', 'Harga Produk', 'required|trim|integer', ['required' => 'Harga Produk tidak boleh kosong', 'integer' => 'Harga Produk hanya boleh angka']);
        $valid->set_rules('produk_kuantitas', 'Product Quantity', 'required|trim|integer', ['required' => 'Kuantitas Produk tidak boleh kosong', 'integer' => 'Kuantitas Produk hanya boleh angka']);
        $valid->set_rules('produk_kategori', 'Kategori Produk', 'trim|required');
        $valid->set_rules('produk_terbaik', 'Product Terbaik', 'trim');
        $valid->set_rules('produk_kategori', 'Kategori Produk', 'trim|required');
        $valid->set_rules('produk_terbaik', 'Product Terbaik', 'trim');
        if ($valid->run()) {

            if (!empty($_FILES['produk_gambar']['name'])) {

                $config['upload_path']   = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '12000'; // KB  
                $this->upload->initialize($config);

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('produk_gambar')) {
                    $this->session->set_flashdata('error', 'berhasil');
                    redirect(base_url('penjual/dataproduk'));
                } else {
                    $upload_data                = array('upload' => $this->upload->data());
                    // Image Editor
                    $config['image_library']      = 'gd2';
                    $config['source_image']       = './assets/upload/image/' . $upload_data['uploads']['file_name'];
                    $config['new_image']         = './assets/upload/image/thumbs/';
                    $config['create_thumb']       = TRUE;
                    $config['quality']           = "100%";
                    $config['maintain_ratio']   = TRUE;
                    $config['width']               = 360; // Pixel
                    $config['height']           = 360; // Pixel
                    $config['x_axis']           = 0;
                    $config['y_axis']           = 0;
                    $config['thumb_marker']       = '';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();


                    $i         = $this->input;

                    $data = array(
                        'produk_id'                 => $id,
                        'produk_kategori'           => $i->post('produk_kategori'),
                        'produk_nama'               => $i->post('produk_nama'),
                        'produk_deskripsi_pendek'   => $i->post('produk_deskripsi_pendek'),
                        'produk_deskripsi_panjang'  => $i->post('produk_deskripsi_panjang'),
                        'produk_status'             => $i->post('produk_status'),
                        'produk_berat'             => $i->post('produk_berat'),
                        'produk_warna'             => $i->post('produk_warna'),
                        'produk_harga'              => $i->post('produk_harga'),
                        'produk_kuantitas'          => $i->post('produk_kuantitas'),
                        'produk_terbaik'            => $i->post('produk_terbaik'),
                        'produk_gambar'             => $upload_data['upload']['file_name'],
                    );
                    $this->produk_model->edit($data);
                    $this->session->set_flashdata('edit-produk-success', 'berhasil');
                    redirect(base_url('penjual/dataproduk'));
                }
            } else {
                $i         = $this->input;
                $data = array(
                    'produk_id'                 => $id,
                    'produk_kategori'           => $i->post('produk_kategori'),
                    'produk_nama'               => $i->post('produk_nama'),
                    'produk_deskripsi_pendek'   => $i->post('produk_deskripsi_pendek'),
                    'produk_deskripsi_panjang'  => $i->post('produk_deskripsi_panjang'),
                    'produk_status'             => $i->post('produk_status'),
                    'produk_berat'             => $i->post('produk_berat'),
                    'produk_warna'             => $i->post('produk_warna'),
                    'produk_harga'              => $i->post('produk_harga'),
                    'produk_kuantitas'          => $i->post('produk_kuantitas'),
                    'produk_terbaik'            => $i->post('produk_terbaik'),
                );
                $this->produk_model->edit($data);
                $this->session->set_flashdata('edit-produk-success', 'berhasil');
                redirect(base_url('penjual/dataproduk'));
            }
        }
        // End masuk database

        $l->view('templates/header_userdashboard', $isi);
        $l->view('penjual/edit_produk', $isi);
        $l->view('templates/footer_userdashboard');
    }


    public function tambahproduk()
    {;
        $kategori = $this->kategori_model->listing();
        $isi = array(
            'title'            => 'Tambah Produk',
            'kategori'        => $kategori,
        );
        $this->load->view('templates/header_userdashboard', $isi);
        $this->load->view('penjual/add_produk', $isi);
        $this->load->view('templates/footer_userdashboard');
    }


    public function tambah()
    {
        $i         = $this->input;

        $data = array(
            'produk_kategori'           => $i->post('produk_kategori'),
            'produk_nama'               => $i->post('produk_nama'),
            'produk_deskripsi_pendek'   => $i->post('produk_deskripsi_pendek'),
            'produk_deskripsi_panjang'  => $i->post('produk_deskripsi_panjang'),
            'produk_status'             => $i->post('produk_status'),
            'produk_berat'              => $i->post('produk_berat'),
            'produk_warna'              => $i->post('produk_warna'),
            'produk_harga'              => $i->post('produk_harga'),
            'produk_kuantitas'          => $i->post('produk_kuantitas'),
            'produk_terbaik'            => $i->post('produk_terbaik'),
        );
        $this->session->set_userdata('upload_image_file_manager', true);
        $valid = $this->form_validation;
        $valid->set_rules(
            'produk_nama',
            'Nama Produk',
            'required|trim',
            [
                'required' => 'Nama Produk tidak boleh kosong',
            ]
        );
        $valid->set_rules(
            'produk_warna',
            'Warna Produk',
            'required|trim',
            [
                'required' => 'Warna Produk tidak boleh kosong',
            ]
        );
        $valid->set_rules(
            'produk_berat',
            'Berat Produk',
            'required|trim|integer',
            [
                'required' => 'Berat Produk tidak boleh kosong',
                'integer' => 'Berat Produk hanya boleh angka'
            ]
        );
        $valid->set_rules(
            'produk_harga',
            'Harga Produk',
            'required|trim|integer',
            [
                'required' => 'Harga Produk tidak boleh kosong',
                'integer' => 'Harga Produk hanya boleh angka'
            ]
        );
        $valid->set_rules(
            'produk_kuantitas',
            'Product Quantity',
            'required|trim|integer',
            [
                'required' => 'Kuantitas Produk tidak boleh kosong',
                'integer' => 'Kuantitas Produk hanya boleh angka'
            ]
        );
        $valid->set_rules('produk_kategori', 'Kategori Produk', 'trim|required');
        $valid->set_rules('produk_terbaik', 'Product Terbaik', 'trim');

        if (!empty($_FILES['produk_gambar']['name'])) {
            $config['upload_path']   = './assets/upload/image/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';

            $this->upload->initialize($config);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('produk_gambar')) {
                $this->session->set_flashdata('add-produk-image-failed', 'berhasil');
                redirect(base_url('penjual/tambahproduk'));
            } else {
                $post_image            = $this->upload->data();
                $data['produk_gambar'] = $post_image['file_name'];
            }
        }
        if ($valid->run() == true) {

            $result = $this->produk_model->save_product_info($data);

            if ($result) {
                $this->session->set_flashdata('add-produk-success', 'berhasil');
                redirect(base_url('penjual/dataproduk'));
            } else {
                $this->session->set_flashdata('add-produk-failed', 'berhasil');
                redirect(base_url('penjual/dataproduk'));
            }
        } else {
            $l = $this->load;
            $kategori = $this->kategori_model->listing();
            $isi = array(
                'title'            => 'Tambah Produk',
                'kategori'        => $kategori,
            );
            $l->view('templates/header_userdashboard', $isi);
            $l->view('penjual/add_produk', $isi);
            $l->view('templates/footer_userdashboard');
        }
    }

    // Delete Produk
    public function delete_product($id)
    {
        $delete_image = $this->get_image_by_id($id);
        unlink('assets/upload/image/' . $delete_image->produk_gambar);
        $result = $this->produk_model->delete_product_info($id);
        if ($result) {
            $this->session->set_flashdata('hapus-produk-success');
            redirect('penjual/dataproduk');
        } else {
            $this->session->set_flashdata('message');
            redirect('penjual/dataproduk');
        }
    }

    private function get_image_by_id($id)
    {
        $this->db->select('produk_gambar');
        $this->db->from('produk');
        $this->db->where('produk.produk_id', $id);
        $info = $this->db->get();
        return $info->row();
    }


    // Halaman Login Admin
    public function index_login()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => 'Email tidak boleh kosong',
                'valid_email' => 'Email harus dengan format @'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'password',
            'required|trim',
            [
                'required' => 'Password tidak boleh kosong'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Penjual";
            $this->load->view('templates/header_userdashboard', $data);
            $this->load->view('auth/login_penjual');
            $this->load->view('templates/footer_userdashboard');
        } else {
            $this->login();
        }
    }

    // Login Penjual
    private function login()
    {
        $i = $this->input;
        $email = $i->post('email');
        $password = $i->post('password');
        $penjual = $this->penjual_model->get($email);
        if ($penjual) {
            if ($penjual) {
                if (password_verify($password, $penjual['password'])) {
                    $data = [
                        'email' => $penjual['email'],
                        'nama' => $penjual['nama'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login-penjual', 'Berhasil!');
                    redirect('penjual');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                            Password anda Salah!</div>');
                    redirect('penjual/index_login');
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Akun anda tidak terdaftar!
                </div>');
            redirect('penjual/index_login');
        }
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
        $isi['title'] = "Detail Produk";
        $this->load->view('user/model_ulos', $data, $isi);
    }

    public function order()
    {
        $params['title'] = 'Pesanan Saya';
        $config['base_url'] = site_url('penjual/order');
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
        $this->load->view('penjual/pesanan', $orders);
        $this->load->view('templates/footer_userdashboard');
    }

    public function order_view($penjual_id)
    {
        $data = $this->order->order_data($penjual_id);
        $items = $this->order->order_items($penjual_id);
        $banks = json_decode(get_settings('payment_banks'));
        $banks = (array) $banks;

        $params['title'] = 'Order #' . $data->order_number;
        $order['data'] = $data;
        $order['items'] = $items;
        $order['delivery_data'] = json_decode($data->delivery_data);
        $order['banks'] = $banks;

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('pesanan/detailpesanan', $order);
        $this->load->view('templates/footer_userdashboard');
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

    public function datapembayaran()
    {
        $params['title'] = 'Kelola Pembayaran';

        $config['base_url'] = site_url('penjual/datapembayaran');
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
        $payments['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('penjual/data_pembayaran', $payments);
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
        $this->form_validation->set_rules('bank_name', 'Nama bank', 'required');
        $this->form_validation->set_rules('name', 'Nama pengirim', 'required');
        $this->form_validation->set_rules('bank_number', 'No. Rekening', 'required');
        $this->form_validation->set_rules('transfer', 'Jumlah transfer', 'required');
        $this->form_validation->set_rules('bank', 'Bank transfer tujuan', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->confirmpayment();
        } else {
            $order_id = $this->input->post('order_id');
            $bank_name = $this->input->post('bank_name');
            $bank_number = $this->input->post('bank_number');
            $transfer = $this->input->post('transfer');
            $name = $this->input->post('name');
            $bank = $this->input->post('bank');

            $config['upload_path'] = './assets/upload/payments/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5096;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('picture')) {
                $data = $this->upload->data();
                $file_name = $data['file_name'];

                $picture_name = $file_name;
            } else {
                show_error($this->upload->display_errors());
            }

            $data = array(
                'transfer_to' => $bank,
                'source' => array(
                    'bank' => $bank_name,
                    'name' => $name,
                    'number' => $bank_number
                )
            );
            $data = json_encode($data);

            $payment = array(
                'order_id' => $order_id,
                'payment_price' => $transfer,
                'payment_date' => date('Y-m-d H:i:s'),
                'picture_name' => $picture_name,
                'payment_data' => $data
            );

            $this->payment->register_payment($order_id, $payment);
            $this->session->set_flashdata('payment_flash', 'error');

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

    public function pembayaran_detail($id)
    {
        $data = $this->payment->payment_data($id);

        $banks = json_decode(get_settings('payment_banks'));
        $banks = (array) $banks;

        $params['title'] = 'Pembayaran Order #' . $data->order_number;

        $payments['banks'] = $banks;
        $payments['payment'] = $data;
        $payments['flash'] = $this->session->flashdata('payment_flash');

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('penjual/detail_pembayaran', $payments);
        $this->load->view('templates/footer_userdashboard');
    }

    public function pesanan_view($id)
    {
        $data = $this->order->order_data($id);
        $items = $this->order->order_items($id);
        $banks = json_decode(get_settings('payment_banks'));
        $banks = (array) $banks;
        $params['title'] = 'Order #' . $data->order_number;
        $order['data'] = $data;
        $order['items'] = $items;
        $order['delivery_data'] = json_decode($data->delivery_data);
        $order['banks'] = $banks;

        $this->load->view('templates/header_userdashboard', $params);
        $this->load->view('penjual/detailpesanan', $order);
        $this->load->view('templates/footer_userdashboard');
    }

    public function process_order($id)
    {
        $buyer = $this->db->get_where('orders', ['order_number' => $id])->row_array();
        $this->db->set('pesanan_status', 2);
        $this->db->where('order_number', $id);
        $this->db->update('orders');

        $this->session->set_flashdata('upload-process', 'berhasil');
        redirect(base_url() . 'penjual/datapesanan/' . $id);
    }

    public function finish_order_cod($id)
    {
        $this->db->set('pesanan_status', 4);
        $this->db->where('order_number', $id);
        $this->db->update('orders');
        $transaction = $this->db->get_where('order_item', ['order_id' => $id]);
        foreach ($transaction->result_array() as $t) {
            $this->db->set('order_item', 'order_item+1', FALSE);
            $this->db->set('produk_kuantitas', 'produk_kuantitas-1', FALSE);
            $this->db->where('produk_nama', $t['produk_nama']);
            $this->db->update('produk');
        }
        $this->session->set_flashdata('upload-finish', 'berhasil');
        redirect(base_url() . 'penjual/datapesanan/' . $id);
    }

    public function sending_order($id)
    {
        $resi = $this->input->post('resi', true);
        if ($resi == NULL) {
            redirect(base_url() . 'penjual/datapesanan');
        }
        $buyer = $this->db->get_where('orders', ['order_number' => $id])->row_array();
        $this->db->set('pesanan_status', 3);
        $this->db->where('order_number', $id);
        $this->db->update('orders');
        $this->db->set('resi', $resi);
        $this->db->where('order_number', $id);
        $this->db->update('orders');


        $this->session->set_flashdata('upload-sending', 'berhasil');
        redirect(base_url() . 'penjual/datapesanan/' . $id);
    }

    public function pesanan_status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');
        $this->order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');
        redirect('penjual/pesanan_view/' . $order);
    }

    public function verifikasi_pembayaran()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');
        $action = $this->input->post('action');
        $redir = $this->input->post('redir');

        if ($action == 1) {
            $status = 2;
            $flash = 'Pembayaran berhasil dikonfirmasi';
        } else if ($action == 2) {
            $status = 3;
            $flash = 'Pembayaran ditandai sebagai tidak ada';
        } else {
            $flash = 'Tidak ada tindakan dilakukan';
        }

        $this->payment->set_payment_status($id, $status, $order);

        $this->session->set_flashdata('payment_flash', $flash);

        if ($redir == 1)
            redirect('penjual/pembayaran_detail/' . $id);

        redirect('penjual/pesanan_view/' . $order . '#payment_flash');
    }

    public function kirim_resi()
    {
        $i         = $this->input;
        $data = array(
            'nomor_resi_order'           => $i->post('nomor_resi_order'),

        );
        $this->order->set_statusresi($data);
        $this->session->set_flashdata('order_flash', '<div class="alert alert-success" role="alert">Resi Berhasil Ditambahkan</div>');
        redirect('penjual/datapesanan');
    }


    public function profile()
    {

        $email = $this->session->userdata('email');
        $penjual = $this->penjual_model->get($email);

        $f = $this->form_validation;
        $f->set_rules(
            'nama',
            'Nama',
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
        if ($f->run()) {
            // Settingan upload Foto
            $config['upload_path']         = './assets/upload/user';
            $config['allowed_types']     = 'gif|jpg|png|jpeg';
            $config['max_size']          = '2400'; // KB
            $config['max_width']          = '3000'; // Pixel
            $config['max_height']          = '3000'; //Pixel
            $this->load->library('upload', $config);
            // Upload Foto
            if ($this->upload->do_upload('foto')) {
                $upload_data                = array('uploads' => $this->upload->data());
                // Image Editor
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/upload/user/' . $upload_data['uploads']['file_name'];
                $config['new_image'] = './assets/upload/user/thumbs/';
                $config['create_thumb'] = TRUE;
                $config['quality'] = "100%";
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 360; // Pixel
                $config['height'] = 360; // Pixel
                $config['x_axis'] = 0;
                $config['y_axis'] = 0;
                $config['thumb_marker'] = '';
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $i = $this->input;
                $this->session->set_userdata('nama', $i->post('nama'));

                $data = array(
                    'nama' => $i->post('nama'),
                    'email' => $email,
                    'tempat_lahir' => $i->post('tempat_lahir'),
                    'tanggal_lahir' => $i->post('tanggal_lahir'),
                    'nama_lengkap' => $i->post('nama_lengkap'),
                    'notelp' => $i->post('notelp'),
                    'alamat' => $i->post('alamat'),
                    'kodepos' => $i->post('kodepos'),
                    'bio' => $i->post('bio'),
                    'foto' => $upload_data['uploads']['file_name'],
                );
                $this->penjual_model->edit($data);
                $this->session->set_flashdata('edit-profil', 'berhasil');
                redirect(base_url('penjual/editprofile'));
            } else {
                $i = $this->input;
                $this->session->set_userdata('nama', $i->post('nama'));
                $data = array(
                    'nama' => $i->post('nama'),
                    'email' => $email,
                    'tempat_lahir' => $i->post('tempat_lahir'),
                    'tanggal_lahir' => $i->post('tanggal_lahir'),
                    'nama_lengkap' => $i->post('nama_lengkap'),
                    'notelp' => $i->post('notelp'),
                    'alamat' => $i->post('alamat'),
                    'kodepos' => $i->post('kodepos'),
                    'bio' => $i->post('bio'),
                );
                $this->penjual_model->edit($data);
                $this->session->set_flashdata('edit-profil', 'berhasil');
                redirect(base_url('penjual/editprofile'));
            }
        }
        $this->session->set_flashdata('edit-profil-failed', 'berhasil');
        $this->_profil($penjual);
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('logout-penjual', 'berhasil');
        redirect('penjual/index_login');
    }
}
