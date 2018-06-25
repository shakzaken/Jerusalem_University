
<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT . "/views/admin/inc/navbar.php"; ?>

<div class="admin-grid"> 
    <?php require APPROOT .'/views/admin/inc/sidebar.php'; ?>
    <div class="admin-main">
        <div class="admin-container">
            <?php require APPROOT .'/views/admin/inc/header.php'; ?>
        </div>
        <div class="admin-main-block">
            <?php
                if(count($data) > 0){
                    include APPROOT ."/views/admin/".$data['view'].'.php' ; 
                }
            ?>
        </div>   
    </div>
</div>
<?php require APPROOT .'/views/admin/inc/admin-footer.php';?>

