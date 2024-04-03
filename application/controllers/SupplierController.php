<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supplier_model');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            // Redirect to login page
            redirect('login');
        }
        $data['suppliers'] = $this->Supplier_model->get_suppliers();
        $this->load->view('view_suppliers', $data);
    }

    public function add_supplier() {

        $this->load->helper('uuid');

        $data = array(
            'id' => uuid_v4(), // Generate UUID
            'supplier_name' => $this->input->post('supplier_name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone')
        );
        $insert = $this->Supplier_model->add_supplier($data);
        if ($insert) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Failed to add supplier"));
        }
    }

    public function edit_supplier($id) {
        $data = $this->Supplier_model->get_supplier_by_id($id);
        if ($data) {
            echo json_encode($data);
        } else {
            echo json_encode(array("error" => "Supplier not found"));
        }
    }

    public function update_supplier() {
        $id = $this->input->post('id');
        $data = array(
            'supplier_name' => $this->input->post('supplier_name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone')
        );
    
        $this->Supplier_model->update_supplier($id, $data);
        echo json_encode(array("status" => TRUE));
    }    

    public function delete_supplier($id) {
        $this->Supplier_model->delete_supplier($id);
        echo json_encode(array("status" => TRUE));
    }

}