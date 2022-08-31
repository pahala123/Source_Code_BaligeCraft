<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi_model extends CI_Model
{
    //load database
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    function get_provinsi()
    {
        $query = $this->db->get('provinsi');
        return $query;
    }

    function get_kota($id_provinsi)
    {
        $query = $this->db->get_where('kota', array('id_provinsi' => $id_provinsi));
        return $query;
    }

    function get_berat($id_kota_tujuan)
    {
        $query = $this->db->get_where('biaya_pengiriman', array('id_kota_tujuan' => $id_kota_tujuan));
        return $query;
    }

    function get_biaya($id_biaya)
    {
        $query = $this->db->get_where('biaya_pengiriman', array('id_biaya' => $id_biaya));
        return $query;
    }

    function get_ongkir($biaya)
    {
        $query = $this->db->get_where('biaya_pengiriman', array('biaya' => $biaya));
        return $query;
    }

    function get_total($id_biaya)
    {
        $query = $this->db->get_where('biaya_pengiriman', array('biaya' => $id_biaya));
        return $query;
    }
}
