<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT . "/views/inc/navbar.php" ; ?>

      
<div class="login-body">
<div class="login-card">
    <div class="login-card-header">
        <h3>Login</h3>
    </div>
    <form action="<?php echo URLROOT; ?>/users/login"
            method="post" class="login-form" >
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="userForm" name="email">
        </div>
        <div class="err-msg userForm-email-err">
            <?php if(isset($data['email_err_msg'])) :?>
                <?php echo $data['email_err_msg'];?>
            <?php endif ;?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="userForm" name="password" >
        </div>
        <div class="err-msg userForm-password-err">
        <?php if(isset($data['password_err_msg'])) :?>
            <?php echo $data['password_err_msg'];?>
        <?php endif ;?>
        </div>
        <input type="button" value="Login" class="register-form-button userForm-btn" >
    </form>
    <div class="login-card-footer">
        <p>Jerusalem University</p>
    </div>
</div>
</div>       

<?php require APPROOT .'/views/inc/footer.php'; ?>

<script src="<?php echo URLROOT;?>/js/inputObj.js"></script>
<script src="<?php echo URLROOT;?>/js/users/login.js"></script>