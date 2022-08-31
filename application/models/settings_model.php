<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    public function general()
    {
        return $this->db->get('general')->row_array();
    }
}
