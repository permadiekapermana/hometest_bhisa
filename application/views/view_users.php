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
                <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- Code Here -->
                <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#addUserModal">Add User</button>
                <table id="userTable" class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->fullname ?></td>
                                <td><?= $user->role ?></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="editUser('<?php echo (string) $user->id; ?>')">Edit</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('<?php echo (string) $user->id; ?>')">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal -->
                <!-- Add User Modal -->
                <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addUserForm">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="fullname">Fullname:</label>
                                <input type="text" class="form-control" id="fullname" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="purchasing">Purchasing</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </div>
                </div>
                </div>

                <!-- Edit User Modal -->
                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <input type="hidden" id="edit_id" name="id">
                            <div class="form-group">
                                <label for="edit_username">Username:</label>
                                <input type="text" class="form-control" id="edit_username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="edit_fullname">Fullname:</label>
                                <input type="text" class="form-control" id="edit_fullname" name="fullname">
                            </div>
                            <div class="form-group">
                                <label for="edit_password">Password:</label>
                                <input type="password" class="form-control" id="edit_password" name="password">
                                <span class="red">* empty field if dont want to change password</span>
                            </div>
                            <div class="form-group">
                                <label for="edit_role">Role:</label>
                                <select class="form-control" id="edit_role" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="purchasing">Purchasing</option>
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
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="deleteUserBtn">Delete</button>
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
    $this->load->view('js/user');
    $this->load->view('template/end-footer');

?>