<script>

    $(document).ready(function() {
        $('#supplierTable').DataTable();
    });

    $("#addSupplierForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url('supplier/add'); ?>",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#addSupplierForm').modal('hide');
                location.reload(); // Refresh page after adding user
            }
        });
    });

    function editSupplier(id) {
        // console.log('clicked')
        $.ajax({
            url: "<?php echo base_url('supplier/edit/'); ?>" + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_supplier_name').val(response.supplier_name);
                $('#edit_address').val(response.address);                    
                $('#edit_phone').val(response.phone);
                $('#editSupplierModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $("#editSupplierForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url('supplier/update'); ?>",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#editSupplierModal').modal('hide');
                location.reload(); // Refresh page after updating user
            }
        });
    });

    function confirmDelete(id) {
        $('#deleteConfirmationModal').modal('show');
        $('#deleteSupllierBtn').click(function() {
            $.ajax({
                url: "<?php echo base_url('supplier/delete/'); ?>" + id,
                type: 'POST',
                success: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                    location.reload(); // Refresh page after deleting supplier
                }
            });
        });
    }
        
</script>