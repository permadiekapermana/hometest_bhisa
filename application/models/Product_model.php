<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_products() {
        return $this->db->get('ms_products')->result();
    }

    public function add_product($data) {
        $this->db->insert('ms_products', $data);
        return $this->db->insert_id();
    }

    public function get_product_by_id($id) {
        return $this->db->get_where('ms_products', array('id' => $id))->row();
    }

    public function update_product($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ms_products', $data);
    }

    public function delete_product($id) {
        $this->db->where('id', $id);
        $this->db->delete('ms_products');
    }
}