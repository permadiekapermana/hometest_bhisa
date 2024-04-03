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
                <h6 class="m-0 font-weight-bold text-primary">New Purchase Orders</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
            <form id="addPOForm">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">Supplier</label>
                            <select name="supplier" class="form-control">
                                <option value="">Select</option>
                                <?php foreach ($suppliers as $supplier): ?>
                                    <option value="<?php echo $supplier->id; ?>"><?php echo $supplier->supplier_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">PO#</label>
                            <input type="text" name="po_number" class="form-control" disabled>
                            <span class="text-danger" style="font-size: 12px;">* Leave blank for auto</span>
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
                                <th width="5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="select[]" class="form-control product-select">
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?php echo $product->id; ?>" data-unit="<?php echo $product->unit; ?>" data-price="<?php echo $product->price; ?>"><?php echo $product->product_name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>                                
                                <td width="10%">
                                    <input type="number" name="quantity[]" value="1" class="form-control quantity">
                                </td>
                                <td width="20%">
                                    <div><input type="number" name="price[]" class="form-control price"></div>
                                </td>
                                <td width="20%">
                                    <div><input type="number" name="total[]" class="form-control total" readonly></div>
                                </td>
                                <td width="5%">
                                    <button type="button" class="btn btn-danger btn-sm delete-row">Delete</button>
                                </td>
                            </tr>                            
                        </tbody>
                        <table class="table table-striped table-bordered table-hover table-responsive">
                            <tbody>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm add-row">Add More</button>
                                    </td>
                                    <td>Total</td>
                                    <td>
                                        <input type="number" name="total_price" class="form-control total-price" readonly>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </table>
                        
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_code">Notes</label>
                            <textarea type="text" name="notes" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Save</button>
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
    $this->load->view('js/po_add');
    $this->load->view('template/end-footer');

?>