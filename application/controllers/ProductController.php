<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $data['products'] = $this->Product_model->get_products();
        $this->load->view('view_products', $data);
    }

    public function add_product() {

        $this->load->helper('uuid');

        $data = array(
            'id' => uuid_v4(), // Generate UUID
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'unit' => $this->input->post('unit'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );
        $insert = $this->Product_model->add_product($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Failed to add product"));
        }
    }

    public function edit_product($id) {
        $data = $this->Product_model->get_product_by_id($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array("error" => "Product not found"));
        }
    }

    public function update_product() {
        $id = $this->input->post('id');
        $data = array(
            'product_code' => $this->input->post('product_code'),
            'product_name' => $this->input->post('product_name'),
            'unit' => $this->input->post('unit'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price')
        );
    
        $this->Product_model->update_product($id, $data);
        echo json_encode(array("status" => TRUE));
    }    

    public function delete_product($id) {
        $this->Product_model->delete_product($id);
        echo json_encode(array("status" => TRUE));
    }

}