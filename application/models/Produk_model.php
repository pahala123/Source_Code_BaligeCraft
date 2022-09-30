<?php

class Produk_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_product_info($data)
    {
        return $this->db->insert('produk', $data);
    }

    // Listing total
    public function total()
    {
        $this->db->select('produk.*, admin.nama');
        $this->db->from('produk');
        // Join dg 2 tabel

        $this->db->join('admin', 'admin.id = produk.produk_id', 'LEFT');
        // End join
        $this->db->where(array(
            'produk.produk_status'    => 1,
        ));
        $this->db->order_by('produk_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function editQty($qty, $id){
        $this->db->where('produk_id', $id);
		$this->db->update('produk', $qty);
    }

    // Listing berita
    public function produk_terbaik($limit, $start)
    {
        $this->db->select('produk.*, admin.nama, kategori.kategori_nama');
        $this->db->from('produk');
        // Join dg 2 tabel
        $this->db->join('kategori', 'kategori.id = produk.produk_kategori', 'LEFT');
        $this->db->join('admin', 'admin.id = produk.produk_id_user', 'LEFT');
        // End join
        $this->db->where(array(
            'produk.produk_status'    => 1,
            'produk.produk_terbaik'    => 1,
        ));
        $this->db->order_by('produk.produk_date', 'ASC');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result();
    }

    // Navigasi profil
    public function list_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where(array(
            'produk.produk_status'    => 1,
        ));
        $this->db->order_by('produk.produk_date', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getOneProduct($id){
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('produk_id', $id);
        $this->db->order_by('produk_id', 'ASC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row();
    }

    public function listing()
    {
        $this->db->select('produk.*, kategori.kategori_nama');
        $this->db->from('produk');
        // Join dg 2 tabel
        $this->db->join('kategori', 'kategori.id = produk.produk_kategori', 'LEFT');
        $this->db->where('produk_user_id = ', $this->session->userdata('penjual_id'));
        // End join
        $this->db->order_by('produk_id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_nama_penjual($id){
        $sql = "SELECT * FROM produk WHERE produk_id = ? LIMIT ?";
        $exec =$this->db->query($sql, array($id, 1));
        $result = $exec->result();
        $query = "SELECT * FROM penjual where penjual_id = ? LIMIT ?";
        $execute = $this->db->query($query, array($result[0]->produk_user_id, 1));
        return $execute->result();
    }

    public function get_all_product()
    {
        $this->db->select('*,produk.produk_status');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id=produk.produk_kategori');
        $this->db->order_by('produk.produk_id', 'ASC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_single_product($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id=produk.produk_kategori');
        $this->db->where('produk.produk_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function get_all_category()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->where('status', 1);
        $info = $this->db->get();
        return $info->result();
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('produk_id', $id);
        $this->db->order_by('produk_id', 'ASC');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_product_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id=produk.produk_kategori');
        $this->db->order_by('produk.produk_id', 'DESC');
        $this->db->where('produk.produk_status', 1);
        $this->db->where('produk.produk_id', $id);
        $info = $this->db->get();
        return $info->row();
    }

    public function published_product_info($id)
    {
        $this->db->set('produk_status', 1);
        $this->db->where('produk_id', $id);
        return $this->db->update('produk');
    }

    public function unpublished_product_info($id)
    {
        $this->db->set('produk_status', 0);
        $this->db->where('produk_id', $id);
        return $this->db->update('produk');
    }

    public function get_ulos_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('order_ulos');
        $this->db->join('model', 'model.id_model=order_ulos.model_ulos');
        $info = $this->db->get();
        return $info->row();
    }

    public function edit($data)
    {
        $this->db->where('produk_id', $data['produk_id']);
        $this->db->join('kategori', 'kategori.id=produk.produk_kategori');
        $this->db->update('produk', $data);
    }

    public function tambah($data)
    {
        $this->db->insert('produk', $data);
    }

    public function tambahreview($data)
    {
        $this->db->where('email', $data['email']);
        $this->db->insert('ulasan', $data);
    }

    public function tambahulos($data)
    {
        $this->db->insert('order_ulos', $data);
    }

    // Delete
    public function delete_product_info($id)
    {
        $this->db->where('produk_id', $id);
        return $this->db->delete('produk');
    }

    public function deleteulos($data)
    {
        $this->db->where('order_id', $data['order_id']);
        $this->db->delete('order_ulos', $data);
    }

    public function data()
    {
        $id = get_current_user_id();

        $data = $this->db->where('id', $id)->get('user')->row();
        return $data;
    }

    public function is_coupon_exist($code)
    {
        return ($this->db->where('code', $code)->get('coupons')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function is_coupon_active($code)
    {
        return ($this->db->where('code', $code)->get('coupons')->row()->is_active == 1) ? TRUE : FALSE;
    }

    public function is_coupon_expired($code)
    {
        $data = $this->db->where('code', $code)->get('coupons')->row();
        $expired_at = $data->expired_date;

        return (strtotime($expired_at) > time()) ? FALSE : TRUE;
    }

    public function get_coupon_credit($code)
    {
        $data = $this->db->where('code', $code)->get('coupons')->row();
        $credit = $data->credit;

        return $credit;
    }

    public function get_coupon_id($code)
    {
        $data = $this->db->where('code', $code)->get('coupons')->row();

        return $data->id;
    }
}
