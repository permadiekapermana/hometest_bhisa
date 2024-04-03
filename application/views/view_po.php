<?php

    $this->load->view('template/head');
    $this->load->view('template/sidebar');
    $this->load->view('template/navbar');

?>

<div class="row">

    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Purchase Orders</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- Code Here -->
                <a href="<?= base_url('purchase-orders/add') ?>">
                    <button class="btn btn-sm btn-primary mb-3">Add Purchase Orders</button>
                </a>
                <table id="productTable" class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>PO Code</th>
                            <th>Supplier</th>
                            <th>Total</th>
                            <th>Notes</th>
                            <th width='100px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($purchase_orders as $po): ?>
                            <tr>
                                <td><?= $po->date ?></td>
                                <td><?= $po->po_code ?></td>
                                <td><?= $po->supplier_name ?></td>
                                <td><?= $po->total ?></td>
                                <td><?= $po->notes ?></td>
                                <td>
                                    <a href="<?= base_url('purchase-orders/detail/' . $po->id) ?>">
                                        <button class="btn btn-primary btn-sm">Detail</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<?php

    $this->load->view('template/footer');
    $this->load->view('js/product');
    $this->load->view('template/end-footer');

?>