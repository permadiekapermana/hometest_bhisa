<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user($username) {
        $query = $this->db->get_where('ms_users', array('username' => $username));
        return $query->row();
    }

    public function get_users() {
        return $this->db->get('ms_users')->result();
    }

    public function add_user($data) {
        $this->db->insert('ms_users', $data);
        return $this->db->insert_id();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('ms_users', array('id' => $id))->row();
    }

    public function update_user($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('ms_users', $data);
    }

    public function delete_user($id) {
        $this->db->where('id', $id);
        $this->db->delete('ms_users');
    }
}