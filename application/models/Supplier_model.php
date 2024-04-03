<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function get_suppliers() {
        return $this->db->get('ms_suppliers')->result();
    }

    public function add_supplier($data) {
        $this->db->insert('ms_suppliers', $data);
        return $this->db->insert_id();
    }

    public function get_supplier_by_id($id) {
        return $this->db->get_where('ms_suppliers', array('id' => $id))->row();
    }

    public function update_supplier($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ms_suppliers', $data);
    }

    public function delete_supplier($id) {
        $this->db->where('id', $id);
        $this->db->delete('ms_suppliers');
    }
}