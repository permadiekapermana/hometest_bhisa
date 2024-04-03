<script>

    $(document).ready(function() {
        $('#productTable').DataTable();
    });

    $("#addProductForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url('product/add'); ?>",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#addProductForm').modal('hide');
                location.reload(); // Refresh page after adding user
            }
        });
    });

    function editProduct(id) {
        // console.log('clicked')
        $.ajax({
            url: "<?php echo base_url('product/edit/'); ?>" + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_product_code').val(response.product_code);
                $('#edit_product_name').val(response.product_name);                    
                $('#edit_price').val(response.price);                    
                $('#edit_description').val(response.description);                    
                $('#edit_unit').val(response.unit);
                $('#editProductModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $("#editProductForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url('product/update'); ?>",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#editProductModal').modal('hide');
                location.reload(); // Refresh page after updating user
            }
        });
    });

    function confirmDelete(id) {
        $('#deleteConfirmationModal').modal('show');
        $('#deleteProductBtn').click(function() {
            $.ajax({
                url: "<?php echo base_url('product/delete/'); ?>" + id,
                type: 'POST',
                success: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                    location.reload(); // Refresh page after deleting product
                }
            });
        });
    }
        
</script>