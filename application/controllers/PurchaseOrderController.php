<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseOrderController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Supplier_model');
        $this->load->model('Product_model');
        $this->load->model('PurchaseOrder_model');
    }

    public function index() {

        $data['purchase_orders'] = $this->PurchaseOrder_model->get_purchase_orders();
        $this->load->view('view_po', $data);

    }

    public function po_add() {

        $data['suppliers'] = $this->Supplier_model->get_suppliers();
        $data['products'] = $this->Product_model->get_products();

        // var_dump($data['suppliers']);

        $this->load->view('view_po_add', $data);

    }

    public function po_save() {

        // Load necessary models
        $this->load->database(); // Load database library

        // Get form data
        $supplier_id = $this->input->post('supplier');
        $total_price = $this->input->post('total_price');
        $notes = $this->input->post('notes');
        $products = $this->input->post('select');
        $quantities = $this->input->post('quantity');
        $prices = $this->input->post('price');

        // Generate PO code (if needed)
        $po_code = 'PO' . date('YmdHis'); // Example format: POYYYYMMDDHHMMSS

        // Start transaction
        $this->db->trans_start();

        // Insert data into tr_po table
        $po_data = array(
            'id' => uuid_v4(), // Generate UUID
            'po_code' => $po_code,
            'id_supplier' => $supplier_id,
            'total' => $total_price,
            'date' => date('Y-m-d'),
            'notes' => $notes
        );
        $this->db->insert('tr_po', $po_data);
        $po_id = $this->db->insert_id(); // Get last inserted ID

        // Insert data into tr_po_detail_product table
        foreach ($products as $key => $product_id) {
            $detail_data = array(
                'id' => uuid_v4(), // Generate UUID
                'id_po' => $po_code,
                'id_product' => $product_id,
                'qty' => $quantities[$key]
            );
            $this->db->insert('tr_po_detail_product', $detail_data);
        }

        // Commit transaction
        $this->db->trans_complete();

        // if ($this->db->trans_status() === FALSE) {
        //     // Transaction failed, handle the error
        //     echo 'Transaction failed!';
        // } else {
        //     // Transaction successful, handle the success
        //     echo 'Transaction successful!';
        // }

        if ($this->db->trans_status() === TRUE) {
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE, "message" => "Failed to add product"));
        }

    }
}