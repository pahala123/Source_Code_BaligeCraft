<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
        $this->load->model('auth_model');
    }


    public function index()
    {
        $data                          = array();
        $data['best_products'] = $this->auth_model->get_all_best_products();
        $data['list_products'] = $this->auth_model->get_all_list_products();
        $this->load->view('index', $data);
    }

    public function allproduk()
    {
        $data                          = array();
        $data['best_products'] = $this->auth_model->get_all_best_products();
        $data['list_products'] = $this->auth_model->get_all_list_products();
        $this->load->view('all_produk', $data);
        $this->load->view('templates/header_userdashboard');
        $this->load->view('all_produk', $data);
        $this->load->view('templates/footer_userdashboard');
    }

    public function custom_ulos()
    {
        $data                          = array();
        $data['list_ulos'] = $this->auth_model->get_all_list_ulos();
        $isi['title'] = "Custom Ulos";
        $this->load->view('ulos', $data);
    }

    public function detailulos($id)
    {
        $data                       = array();
        $data['get_detail_ulos'] = $this->produk_model->get_single_ulos($id);
        $isi['title'] = "Detail Produk";
        $this->load->view('model_ulos', $data, $isi);
    }

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
            $data['title'] = "Login";
            $this->load->view('templates/header_login', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer_login');
        } else {
            $this->login();
        }
    }


    private function login()
    {
        $i = $this->input;
        $email = $i->post('email');
        $password = $i->post('password');
        $user = $this->user_model->get($email);
        if ($user) {
            if ($user['active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'username' => $user['username'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('login-user', 'Berhasil!');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Password anda Salah!</div>');
                    redirect('auth/index_login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Anda belum melakukan aktivasi email! </div>');
                redirect('auth/index_login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Akun anda tidak terdaftar!
            </div>');
            redirect('auth/index_login');
        }
    }

    public function register()
    {
        $f = $this->form_validation;
        $f->set_rules('username', 'Username', 'required|trim|min_length[5]', ['required' => 'Username tidak boleh kosong', 'min_length' => 'Username minimal 5 karakter']);
        $f->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['required' => 'Email tidak boleh kosong', 'is_unique' => 'Email anda telah terdaftar', 'valid_email' => 'Email harus dengan format @']);
        $f->set_rules(
            'password',
            'Password',
            'required|trim|min_length[4]|matches[password_confirm]|max_length[12]',
            [
                'matches' => 'Password tidak sama',
                'min_length' => 'Password terlalu pendek',
                'required' => 'Password tidak boleh kosong',
                'max_length' => 'Password terlalu panjang'
            ]
        );
        $f->set_rules('password_confirm', 'Password_Confirm', 'required|trim');
        if ($f->run() == false) {
            $data['title'] = "Register";
            $this->load->view('templates/header_login', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer_login');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'foto' => 'default.png',
                'active' => 0
            ];
            $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
            $verifikasi = '';
            for ($i = 0; $i < 32; $i++) {
                $no = rand(0, strlen($karakter) - 1);
                $verifikasi .= $karakter[$no];
            }
            $user_verifikasi = [
                'email' => $email,
                'verifikasi' => $verifikasi,
                'tanggal_buat' => time()
            ];
            $this->user_model->tambah($data);
            $this->db->insert('user_verifikasi', $user_verifikasi);
            $this->kirimEmail($verifikasi, 'verifikasi', $email);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Akun anda berhasil ditambahkan, harap verifikasi email anda!
            </div>');
            redirect('auth/index_login');
        }
    }

    private function kirimEmail($verifikasi, $tipe, $email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'baligecraft@gmail.com',
            'smtp_pass' => 'lnhljapklgavvgel',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('baligecraft@gmail.com', 'Balige Craft');
        $this->email->to($email);
        if ($tipe == 'verifikasi') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message(
                "Klik link ini untuk Memverifikasi Akun Anda :
                    <a href='" . base_url() . 'auth/verify?email=' . $email . '&verifikasi=' . $verifikasi . "'>Verifikasi</a>"
            );
        } elseif ($tipe == 'lupa_password') {
            $this->email->subject('Lupa Password');
            $this->email->message(
                "Klik link ini untuk Mengatur ulang Kata Sandi :
                <a href='" . base_url() . 'auth/resetpassword?email=' . $email . '&verifikasi=' . $verifikasi . "'>Reset Password</a>"
            );
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $verifikasi = $this->input->get('verifikasi');
        $user = $this->user_model->get($email);
        if ($user) {
            $verifikasi_email = $this->db->get_where('user_verifikasi', ['verifikasi' => $verifikasi])->row_array();
            if ($verifikasi_email) {
                if (time() - $verifikasi_email['tanggal_buat'] < (60 * 60 * 48)) {
                    $this->user_model->setFree($email, 'active', 1);
                    $this->db->delete('user_verifikasi', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    ' . $email . ' berhasil di aktivasi! Silahkan Login </div>');
                    redirect('auth/index_login');
                } else {
                    $this->user_model->hapus($email);
                    $this->db->delete('user_verifikasi', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Kode Verifikasi Anda sudah kadaluarsa </div>');
                    redirect('auth/index_login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Kode Verifikasi anda tidak valid! </div>');
                redirect('auth/index_login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Akun aktifasi anda gagal, Email tidak terdaftar!
            </div>');
            redirect('auth/index_login');
        }
    }

    public function forgot()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => 'Harap isi email Anda',
                'valid_email' => 'Email harus dengan format @'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = "Lupa Password";
            $this->load->view('templates/header_login', $data);
            $this->load->view('auth/lupa_password');
            $this->load->view('templates/footer_login');
        } else {
            $email = $this->input->post('email');
            $user = $this->user_model->get($email);
            if ($user) {
                if ($user['active'] == 1) {
                    $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
                    $verifikasi = '';
                    for ($i = 0; $i < 32; $i++) {
                        $no = rand(0, strlen($karakter) - 1);
                        $verifikasi .= $karakter[$no];
                    }
                    $user_verifikasi = [
                        'email' => $email,
                        'verifikasi' => $verifikasi,
                        'tanggal_buat' => time()
                    ];
                    $this->db->insert('user_verifikasi', $user_verifikasi);
                    $this->kirimEmail($verifikasi, 'lupa_password', $email);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Silahkan cek email Anda untuk mereset password </div>');
                    redirect('auth/forgot');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Email Anda belum diaktivasi </div>');
                    redirect('auth/forgot');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Email Anda tidak terdaftar </div>');
                redirect('auth/forgot');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $verifikasi = $this->input->get('verifikasi');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $verifikasi_email = $this->db->get_where('user_verifikasi', ['verifikasi' => $verifikasi])->row_array();
            if ($verifikasi_email) {
                if (time() - $verifikasi_email['tanggal_buat'] < (60 * 60 * 48)) {
                    $this->session->set_userdata('reset_password', $email);
                    $this->session->set_userdata('token', $verifikasi);
                    $this->ubahPassword();
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_verifikasi', ['email' => $email]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Reset Password gagal, Kode Verifikasi kadaluarsa </div>');
                    redirect('auth/index_login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Reset Password gagal, Kode Verifikasi tidak valid! </div>');
                redirect('auth/index_login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Reset Password gagal, Email tidak terdaftar!
            </div>');
            redirect('auth/index_login');
        }
    }

    public function ubahPassword()
    {
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[4]|max_length[12]',
            [
                'min_length' => 'Password terlalu pendek',
                'required' => 'Password tidak boleh kosong',
                'max_length' => 'Password terlalu panjang'
            ]
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = "Ubah Password";
            $this->load->view('templates/header_login', $data);
            $this->load->view('auth/reset');
            $this->load->view('templates/footer_login');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_password');
            $token = $this->session->userdata('token');
            $this->user_model->setFree($email, 'password', $password);
            $this->db->delete('user_verifikasi', ['verifikasi' => $token]);

            $this->session->unset_userdata('token');
            $this->session->unset_userdata('reset_password');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Password telah diubah, Silahkan Login!
            </div>');
            redirect('auth/index_login');
        }
    }

    public function ongkir()
    {
        $data                          = array();
        $this->load->view('ongkir', $data);
    }
}
