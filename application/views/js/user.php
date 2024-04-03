<script>

    $(document).ready(function() {
        $('#userTable').DataTable();
    });

    $("#addUserForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url('user/add'); ?>",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#addUserModal').modal('hide');
                location.reload(); // Refresh page after adding user
            }
        });
    });

    function editUser(id) {
        // console.log('clicked')
        $.ajax({
            url: "<?php echo base_url('user/edit/'); ?>" + id,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_username').val(response.username);
                $('#edit_fullname').val(response.fullname);
                $('#edit_password').val('');
                $('#edit_role').val(response.role);
                $('#editUserModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $("#editUserForm").submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url('user/update'); ?>",
            type: 'POST',
            data: formData,
            success: function(response) {
                $('#editUserModal').modal('hide');
                location.reload(); // Refresh page after updating user
            }
        });
    });

    function confirmDelete(id) {
        $('#deleteConfirmationModal').modal('show');
        $('#deleteUserBtn').click(function() {
            $.ajax({
                url: "<?php echo base_url('user/delete/'); ?>" + id,
                type: 'POST',
                success: function(response) {
                    $('#deleteConfirmationModal').modal('hide');
                    location.reload(); // Refresh page after deleting user
                }
            });
        });
    }

</script>