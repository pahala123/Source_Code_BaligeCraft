<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Corak_model', 'corak_model');
    }

    function get_model()
    {
        $id_model = $this->input->post('id', TRUE);
        $data = $this->corak_model->get_biaya($id_model)->result();
        echo json_encode($data);
    }
}
