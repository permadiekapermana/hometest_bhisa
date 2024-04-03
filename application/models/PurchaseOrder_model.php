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

    public function get_purchase_order_by_id($id) {
        $this->db->select('tr_po.*, ms_suppliers.supplier_name');
        $this->db->from('tr_po');
        $this->db->join('ms_suppliers', 'tr_po.id_supplier = ms_suppliers.id', 'left');
        $this->db->where('tr_po.id', $id);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
    }

    public function get_detail_product_by_id_po($id) {

        $this->db->select('tr_po_detail_product.*, ms_products.product_name, ms_products.price, (ms_products.price * tr_po_detail_product.qty) AS total');
        $this->db->from('tr_po_detail_product');
        $this->db->join('ms_products', 'tr_po_detail_product.id_product = ms_products.id', 'left');
        $this->db->join('tr_po', 'tr_po_detail_product.id_po = tr_po.po_code', 'left');
        $this->db->where('tr_po.id', $id);
        $query = $this->db->get();
        $result = $query->result();
        return $result;

    }

}