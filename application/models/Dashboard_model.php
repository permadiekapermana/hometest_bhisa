<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function get_total_user() {
        return $this->db->count_all('ms_users');
    }

    public function get_total_product() {
        return $this->db->count_all('ms_products');
    }

    public function get_total_supplier() {
        return $this->db->count_all('ms_suppliers');
    }
}