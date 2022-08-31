<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model(array(
            'order_model' => 'order',
            'payment_model' => 'payment'
        ));
    }

    // Halaman Dashboard
    public function index()
    {
        $this->_profil_('Dashboard', 'dashboard');
    }

    // Konfigurasi Tambahan
    private function _profil_($title, $view)
    {
        $l = $this->load;
        $email = $this->session->userdata('email');
        $data = $this->admin_model->get($email);
        $kelas['admin'] = $this->admin_model->get($email);
        $kelas['produk'] = $this->produk_model->listing();
        $kelas['kategori'] = $this->kategori_model->listing();
        $data['title'] = $title;
        $l->view('templates/header_admin', $data);
        $l->view('admin/' . $view, $kelas);
        $l->view('templates/footer_admin');
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
            $data['title'] = "Login Admin";
            $this->load->view('templates/header_userdashboard', $data);
            $this->load->view('auth/login_admin');
            $this->load->view('templates/footer_userdashboard');
        } else {
            $this->login();
        }
    }


    // Login Admin
    private function login()
    {
        $i = $this->input;
        $email = $i->post('email');
        $password = $i->post('password');
        $admin = $this->admin_model->get($email);
        if ($admin) {
            if ($admin) {
                if (password_verify($password, $admin['password'])) {
                    $data = [
                        'email' => $admin['email'],
                        'nama' => $admin['nama'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login-admin', 'Berhasil!');
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Password anda Salah!</div>');
                    redirect('admin/index_login');
                }
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Akun anda tidak terdaftar!
            </div>');
            redirect('admin/index_login');
        }
    }

    // Halaman Data Produk
    public function dataproduk()
    {
        $this->_profil_('Data Produk', 'data_produk');
    }

    // Edit Produk
    public function edit($id)
    {
        $l = $this->load;
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
        $valid->set_rules('produk_nama', 'Nama Produk', 'trim|required');
        $valid->set_rules('produk_harga', 'Harga Produk', 'trim|required');
        $valid->set_rules('produk_kuantitas', 'Product Quantity', 'trim|required');
        $valid->set_rules('produk_kategori', 'Kategori Produk', 'trim|required');
        $valid->set_rules('produk_terbaik', 'Product Terbaik', 'trim');

        if ($valid->run()) {

            if (!empty($_FILES['produk_gambar']['name'])) {

                $config['upload_path']   = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '12000'; // KB  
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('produk_gambar')) {

                    $l->view('templates/header_admin', $isi);
                    $l->view('admin/edit_produk', $isi);
                    $l->view('templates/footer_admin');
                } else {
                    $upload_data                = array('uploads' => $this->upload->data());
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

                    //Hapus gambar
                    if ($produk->produk_gambar != "") {
                        unlink('./assets/upload/image/' . $produk->produk_gambar);
                        unlink('./assets/upload/image/thumbs/' . $produk->produk_gambar);
                    }
                    // End hapus

                    $i         = $this->input;

                    $data = array(
                        'produk_id'                 => $id,
                        'produk_kategori'           => $i->post('produk_kategori'),
                        'produk_nama'               => $i->post('produk_nama'),
                        'produk_deskripsi_pendek'   => $i->post('produk_deskripsi_pendek'),
                        'produk_deskripsi_panjang'  => $i->post('produk_deskripsi_panjang'),
                        'produk_status'             => $i->post('produk_status'),
                        'produk_harga'              => $i->post('produk_harga'),
                        'produk_kuantitas'          => $i->post('produk_kuantitas'),
                        'produk_terbaik'            => $i->post('produk_terbaik'),
                        'produk_gambar'             => $upload_data['uploads']['file_name'],
                    );
                    $this->produk_model->edit($data);
                    $this->session->set_flashdata('edit-produk-success', 'berhasil');
                    redirect(base_url('admin/dataproduk'));
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
                    'produk_harga'              => $i->post('produk_harga'),
                    'produk_kuantitas'          => $i->post('produk_kuantitas'),
                    'produk_terbaik'            => $i->post('produk_terbaik'),

                );

                $this->produk_model->edit($data);
                $this->session->set_flashdata('edit-produk-success', 'berhasil');
                redirect(base_url('admin/dataproduk'));
            }
        }
        // End masuk database

        $l->view('templates/header_admin', $isi);
        $l->view('admin/edit_produk', $isi);
        $l->view('templates/footer_admin');
    }

    public function tambah()
    {

        $l = $this->load;
        $kategori = $this->kategori_model->listing();

        $isi = array(
            'title'            => 'Tambah Produk',
            'kategori'        => $kategori,
        );

        $this->session->set_userdata('upload_image_file_manager', true);
        // Validasi
        $valid = $this->form_validation;
        $valid->set_rules('produk_nama', 'Nama Produk', 'trim|required');
        $valid->set_rules('produk_harga', 'Harga Produk', 'trim|required');
        $valid->set_rules('produk_kuantitas', 'Product Quantity', 'trim|required');
        $valid->set_rules('produk_kategori', 'Kategori Produk', 'trim|required');
        $valid->set_rules('produk_terbaik', 'Product Terbaik', 'trim');


        if ($valid->run()) {

            if (!empty($_FILES['produk_gambar']['name'])) {

                $config['upload_path']   = './assets/upload/image/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '12000'; // KB  
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('produk_gambar')) {
                    // End validasi
                    $l->view('templates/header_admin', $isi);
                    $l->view('admin/add_produk', $isi);
                    $l->view('templates/footer_admin');

                    // Masuk database
                } else {
                    $upload_data                    = array('uploads' => $this->upload->data());
                    // Image Editor
                    $config['image_library']        = 'gd2';
                    $config['source_image']         = './assets/upload/image/' . $upload_data['uploads']['file_name'];
                    $config['new_image']            = './assets/upload/image/';
                    $config['create_thumb']         = TRUE;
                    $config['quality']              = "100%";
                    $config['maintain_ratio']       = TRUE;
                    $config['width']                = 360; // Pixel
                    $config['height']               = 360; // Pixel
                    $config['x_axis']               = 0;
                    $config['y_axis']               = 0;
                    $config['thumb_marker']         = '';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $i         = $this->input;

                    $data = array(
                        'produk_kategori'           => $i->post('produk_kategori'),
                        'produk_nama'               => $i->post('produk_nama'),
                        'produk_deskripsi_pendek'   => $i->post('produk_deskripsi_pendek'),
                        'produk_deskripsi_panjang'  => $i->post('produk_deskripsi_panjang'),
                        'produk_status'             => $i->post('produk_status'),
                        'produk_harga'              => $i->post('produk_harga'),
                        'produk_kuantitas'          => $i->post('produk_kuantitas'),
                        'produk_terbaik'            => $i->post('produk_terbaik'),
                        'produk_gambar'             => $upload_data['uploads']['file_name'],
                    );
                    $this->produk_model->tambah($data);
                    $this->session->set_flashdata('add-produk-success', 'berhasil');
                    redirect(base_url('admin/dataproduk'));
                }
            } else {
                $i         = $this->input;

                $data = array(
                    'produk_kategori'           => $i->post('produk_kategori'),
                    'produk_nama'               => $i->post('produk_nama'),
                    'produk_deskripsi_pendek'   => $i->post('produk_deskripsi_pendek'),
                    'produk_deskripsi_panjang'  => $i->post('produk_deskripsi_panjang'),
                    'produk_status'             => $i->post('produk_status'),
                    'produk_harga'              => $i->post('produk_harga'),
                    'produk_kuantitas'          => $i->post('produk_kuantitas'),
                    'produk_terbaik'            => $i->post('produk_terbaik'),
                );
                $this->produk_model->tambah($data);
                $this->session->set_flashdata('add-produk-success', 'berhasil');
                redirect(base_url('admin/dataproduk'));
            }
        }
        // End masuk database
        $l->view('templates/header_admin', $isi);
        $l->view('admin/add_produk', $isi);
        $l->view('templates/footer_admin');
    }

    public function published_product($id)
    {
        $result = $this->produk_model->published_product_info($id);
        if ($result) {
            $this->session->set_flashdata('publish-produk-success', 'Published Product Sucessfully');
            redirect('admin/dataproduk');
        } else {
            $this->session->set_flashdata('publish-produk-failed', 'Published Product  Failed');
            redirect('admin/dataproduk');
        }
    }
    public function unpublished_product($id)
    {
        $result = $this->produk_model->unpublished_product_info($id);
        if ($result) {
            $this->session->set_flashdata('unpublish-produk-success', 'UnPublished Product Sucessfully');
            redirect('admin/dataproduk');
        } else {
            $this->session->set_flashdata('unpublish-produk-success', 'UnPublished Product  Failed');
            redirect('admin/dataproduk');
        }
    }


    public function kirim_resi()
    {
        $i         = $this->input;
        $data = array(
            'nomor_resi_order'           => $i->post('nomor_resi_order'),
        );
        $this->order->set_statusresi($data);
        $this->session->set_flashdata('order_flash', '<div class="alert alert-success" role="alert">Resi Berhasil Ditambahkan</div>');
        redirect('admin/datapesanan');
    }

    public function datapesanan()
    {
        $params['title'] = 'Kelola Order';
        $config['base_url'] = site_url('admin/datapesanan');
        $config['total_rows'] = $this->admin_model->count_all_orders();
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

        $orders['orders'] = $this->admin_model->get_all_orders($config['per_page'], $page);
        $orders['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header_admin', $params);
        $this->load->view('admin/data_pesanan', $orders);
        $this->load->view('templates/footer_admin');
    }

    public function datapembayaran()
    {
        $params['title'] = 'Kelola Pembayaran';
        $config['base_url'] = site_url('admin/datapembayaran');
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

        $this->load->view('templates/header_admin', $params);
        $this->load->view('admin/data_pembayaran', $payments);
        $this->load->view('templates/footer_admin');
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
        $order['order_flash'] = $this->session->flashdata('order_flash');
        $order['payment_flash'] = $this->session->flashdata('payment_flash');
        $this->load->view('templates/header_admin', $params);
        $this->load->view('admin/detailpesanan', $order);
        $this->load->view('templates/footer_admin');
    }

    public function pesanan_status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');
        $this->order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');
        redirect('admin/pesanan_view/' . $order);
    }

    public function pembayaran_view($id)
    {
        $data = $this->payment->payment_data($id);

        $banks = json_decode(get_settings('payment_banks'));
        $banks = (array) $banks;

        $params['title'] = 'Pembayaran Order #' . $data->order_number;

        $payments['banks'] = $banks;
        $payments['payment'] = $data;
        $payments['flash'] = $this->session->flashdata('payment_flash');

        $this->load->view('templates/header_admin', $params);
        $this->load->view('admin/detailpembayaran', $payments);
        $this->load->view('templates/footer_admin');
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
            redirect('admin/pembayaran_view/' . $id);

        redirect('admin/pesanan_view/' . $order . '#payment_flash');
    }


    // Logout Admin
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('logout-user', 'berhasil');
        redirect('auth');
    }
}
