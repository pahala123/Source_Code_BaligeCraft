<?php
class Model_app extends CI_model
{
    public function view($table)
    {
        return $this->db->get($table);
    }

    public function get_ulasan()
    {
        $this->db->from('ulasan');
        $this->db->join('user', 'user.id=ulasan.id_user');
        $this->db->order_by('ulasan.id_ulasan', 'ASC');
        $info = $this->db->get();
        return $info->result();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }
}
