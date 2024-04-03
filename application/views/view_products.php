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
                <h6 class="m-0 font-weight-bold text-primary">Data Products</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- Code Here -->
                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                <table id="productTable" class="table">
                    <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Unit</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th width='100px'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                            <tr>
                                <td><?= $product->product_code ?></td>
                                <td><?= $product->product_name ?></td>
                                <td><?= $product->unit ?></td>
                                <td><?= $product->price ?></td>
                                <td><?= $product->description ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="editProduct('<?php echo (string) $product->id; ?>')">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo (string) $product->id; ?>')">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <!-- Add Product Modal -->
                <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm">
                            <div class="form-group">
                                <label for="product_code">Product Code:</label>
                                <input type="text" class="form-control" id="product_code" name="product_code">
                            </div>
                            <div class="form-group">
                                <label for="product_name">Product Name:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit:</label>
                                <select class="form-control" id="unit" name="unit">
                                    <option value="pcs">Pcs</option>
                                    <option value="dus">Dus</option>
                                    <option value="liter">Liter</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Edit Product Modal -->
                <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editProductForm">
                            <input type="hidden" id="edit_id" name="id">
                            <div class="form-group">
                                <label for="product_code">Product Code:</label>
                                <input type="text" class="form-control" id="edit_product_code" name="product_code">
                            </div>
                            <div class="form-group">
                                <label for="product_name">Product Name:</label>
                                <input type="text" class="form-control" id="edit_product_name" name="product_name">
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="text" class="form-control" id="edit_price" name="price">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="edit_description" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit:</label>
                                <select class="form-control" id="edit_unit" name="unit">
                                    <option value="pcs">Pcs</option>
                                    <option value="dus">Dus</option>
                                    <option value="liter">Liter</option>
                                </select>
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
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="deleteProductBtn">Delete</button>
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
    $this->load->view('js/product');
    $this->load->view('template/end-footer');

?>