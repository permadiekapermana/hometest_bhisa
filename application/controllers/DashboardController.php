<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function index() {

        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }

        $data['total_products'] = $this->Dashboard_model->get_total_product();
        $data['total_users'] = $this->Dashboard_model->get_total_user();
        $data['total_suppliers'] = $this->Dashboard_model->get_total_supplier();
        
        $this->load->view('view_dashboard', $data);

    }

}