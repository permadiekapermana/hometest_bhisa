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
                <h6 class="m-0 font-weight-bold text-primary">Data Suppliers</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- Code Here -->
                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addSupplierModal">Add Supplier</button>
                <table id="supplierTable" class="table">
                    <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th width='100px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suppliers as $supplier): ?>
                            <tr>
                                <td><?= $supplier->supplier_name ?></td>
                                <td><?= $supplier->address ?></td>
                                <td><?= $supplier->phone ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="editSupplier('<?php echo (string) $supplier->id; ?>')">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo (string) $supplier->id; ?>')">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <!-- Add Supplier Modal -->
                <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addSupplierForm">
                            <div class="form-group">
                                <label for="supplier_name">Supplier Name:</label>
                                <input type="text" class="form-control" id="supplier_name" name="supplier_name">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Edit Supplier Modal -->
                <div class="modal fade" id="editSupplierModal" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSupplierModalLabel">Edit Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editSupplierForm">
                            <input type="hidden" id="edit_id" name="id">
                            <div class="form-group">
                                <label for="supplier_name">Supplier Name:</label>
                                <input type="text" class="form-control" id="edit_supplier_name" name="supplier_name">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="edit_address" name="address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="edit_phone" name="phone">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this supplier?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="deleteSupllierBtn">Delete</button>
                    </div>
                    </div>
                </div>
                </div>


            </div>
        </div>
    </div>
</div>

<?php

    $this->load->view('template/footer');
    $this->load->view('js/supplier');
    $this->load->view('template/end-footer');

?>