<!------------------- EDIT user modal ----------------------->
<div class="modal fade" id="editUser<?php echo $row['nip']?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="edit-query.php" method="POST">
                <div class="modal-body">                                                    
                    <div class="form-group row">
                        <div class="col-3">
                            <input class="form-control" type="hidden" name="nip" id="nip" value="<?php echo $row['nip']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-2">Name</label>
                        <div class="col-10">
                            <input class="form-control" type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-2">Position</label>
                        <div class="col-10">
                            <select class="form-control" name="posisi" id="posisi">
                                <option value="<?php echo $row['posisi']; ?>"><?php echo $row['posisi']; ?></option>
                                <option value="Front End">Front End</option>
                                <option value="Back End">Back End</option>
                                <option value="Mobile Apps Developer">Mobile Apps Developer</option>
                                <option value="Data Science">Data Science</option>
                                <option value="IT Support">IT Support</option>
                                <option value="Human Resource">Human Resource</option>
                                <option value="Graphic Design">Graphic Design</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-2">Email</label>
                        <div class="col-10">
                            <input class="form-control" type="email" name="email" id="email" value="<?php echo $row['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-2">Role</label>
                        <div class="col-10">
                            <select class="form-control" name="role" id="role">
                                <option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
                                <option value="superadmin">Superadmin</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-info">Update</a>
                </div>
            </form>
        </div>
    </div>
</div>