<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->model('User_model');
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->User_model->get_user($username);

        if ($user && password_verify($password, $user->password)) {
            $userdata = array(
                'username' => $user->username,
                'fullname' => $user->fullname,
                'role' => $user->role,
                'logged_in' => TRUE
            );

            $this->session->set_userdata($userdata);
            redirect('dashboard'); // Redirect to dashboard or any desired page
        } else {
            // Invalid login
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        }
    }

	public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}
