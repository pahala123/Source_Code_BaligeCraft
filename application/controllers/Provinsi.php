<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Provinsi_model', 'provinsi_model');
    }

    function get_kota()
    {
        $id_provinsi = $this->input->post('id', TRUE);
        $data = $this->provinsi_model->get_kota($id_provinsi)->result();
        echo json_encode($data);
    }

    function get_kabupaten()
    {
        $this->load->view('user/ambilkabupaten');
    }

    function get_kurir()
    {
        $this->load->view('user/tabel-ongkir');
    }

    function get_berat()
    {
        $id_kota_tujuan = $this->input->post('id', TRUE);
        $data = $this->provinsi_model->get_berat($id_kota_tujuan)->result();
        echo json_encode($data);
    }

    function get_biaya()
    {
        $id_biaya       = $this->input->post('id', TRUE);
        $data = $this->provinsi_model->get_biaya($id_biaya)->result();
        echo json_encode($data);
    }

    function get_total()
    {
        $id_biaya       = $this->input->post('id', TRUE);
        $data = $this->provinsi_model->get_biaya($id_biaya)->result();
        echo json_encode($data);
    }
}
