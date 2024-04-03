<?php

    $this->load->view('template/head');
    $this->load->view('template/sidebar');
    $this->load->view('template/navbar');

?>

<div class="row" id="contentToPrint">

    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Purchase Orders</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
            <form id="addPOForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">Supplier</label>
                            <input type="text" name="supplier" class="form-control" value="<?= $purchase_order->supplier_name; ?>" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">PO#</label>
                            <input type="text" name="po_number" class="form-control" value="<?= $purchase_order->po_code; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                    <table id="po-table" class="table table-striped table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Price</th>
                                <th width="20%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($purchase_order_items as $p): ?>
                                <tr>
                                    <td><?= $p->product_name ?></td>
                                    <td><?= $p->qty ?></td>
                                    <td><?= $p->price ?></td>
                                    <td><?= $p->total ?></td>
                                </tr>
                            <?php endforeach; ?> 
                            <tr>
                                <td colspan="3">Total</td>
                                <td><?= $purchase_order->total ?></td>
                            </tr>                          
                        </tbody>
                    </table>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">Notes</label>
                            <textarea type="text" name="notes" class="form-control" disabled>
                                <?= $purchase_order->notes; ?>
                            </textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button onclick="printDiv('contentToPrint')" class="btn btn-primary btn-block">Print</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php

    $this->load->view('template/footer');
    $this->load->view('js/po_detail');
    $this->load->view('template/end-footer');

?>