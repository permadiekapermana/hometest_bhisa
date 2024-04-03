<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrder_model extends CI_Model {

    public function get_purchase_orders() {
        $this->db->select('tr_po.*, ms_suppliers.supplier_name');
        $this->db->from('tr_po');
        $this->db->join('ms_suppliers', 'tr_po.id_supplier = ms_suppliers.id', 'left');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

}