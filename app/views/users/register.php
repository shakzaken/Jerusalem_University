

<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT . "/views/inc/navbar.php" ; ?>

<div class="register-body">
<div class="register-card">
    <div class="register-card-header">
        <h3>Register</h3>
    </div>
    <div class="register-form">
        <form>
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
                    <label for="user-image" class="register-file-input"><i class="fas fa-cloud-upload-alt img-icon"></i></label>
                    <input type="file" id="user-image" class="userForm image-input" name="image">
                </div>
                <div>
                    <img src="" alt="" class="show-image">
                </div>  
            </div>
            <div class="err-msg userForm-image-err"></div>
            <input type="button" value="Register" class="register-form-button userForm-btn" >
        </form>
    </div>
    <div class="register-card-footer">
        <p>Jerusalem University</p>   
    </div>
</div>
</div>

<?php require APPROOT .'/views/inc/footer.php'; ?> 
<script src="<?php echo URLROOT;?>/js/inputObj.js"></script>
<script src="<?php echo URLROOT;?>/js/users/register.js"></script>
