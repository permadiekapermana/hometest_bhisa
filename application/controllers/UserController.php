<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('User_model');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $data['users'] = $this->User_model->get_users();
        $this->load->view('view_users', $data);
    }

    public function add_user() {

        $this->load->helper('uuid');

        $data = array(
            'id' => uuid_v4(), // Generate UUID
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        );
        $insert = $this->User_model->add_user($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Failed to add user"));
        }
    }

    public function edit_user($id) {
        $data = $this->User_model->get_user_by_id($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array("error" => "User not found"));
        }
    }

    public function update_user() {
        $id = $this->input->post('id');
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'role' => $this->input->post('role')
        );
    
        // Check if the password field is not null before including it in the data array
        $password = $this->input->post('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }
    
        $this->User_model->update_user($id, $data);
        echo json_encode(array("status" => TRUE));
    }    

    public function delete_user($id) {
        $this->User_model->delete_user($id);
        echo json_encode(array("status" => TRUE));
    }
}