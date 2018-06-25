


<h3 class="admin-users-header">Add User</h3>
<div class="admin-form">
    <form action="<?php echo URLROOT; ?>/adminusers/addUser"
            method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="userForm" name="first_name" >
        </div>
        <div class="err-msg userForm-first_name-err"></div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="userForm" name="last_name" >
        </div>
        <div class="err-msg userForm-last_name-err"></div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="userForm" name="email">
        </div>
        <div class="err-msg userForm-email-err"></div>
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="userForm">
                <option value="student" selected>student</option>
                <option value="instructor">instructor</option>
                <option value="admin">admin</option>
            </select>
        </div>
        <div class="err-msg userForm-role-err"></div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="userForm" name="password" >
        </div>
        <div class="err-msg userForm-password-err"></div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="userForm" name="confirm_password" >
        </div>
        <div class="err-msg userForm-confirm_password-err"></div>
        <div class="form-group-large">
            <div>
                <label for="">Image</label>
                <label for="user-image" class="file-input"><i class="fas fa-cloud-upload-alt img-icon"></i></label>
                <input type="file" id="user-image" class="userForm image-input" name="image">
            </div>
            <div>
                <img src="" alt="" class="show-image">
            </div>  
        </div>
        <div class="err-msg userForm-image-err"></div>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>
            <input  type="button" value="Add User" class="admin-form-button userForm-btn">
        <?php else: ?>
            <input disabled class="admin-form-button" value="   Restricted"></input>
        <?php endif;?>
        
        
    </form>
</div>

<script src="<?php echo URLROOT;?>/js/inputObj.js"></script>
<script src="<?php echo URLROOT;?>/js/admin/user-form.js"></script>