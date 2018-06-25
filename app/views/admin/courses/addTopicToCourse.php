

<h3 class="admin-degrees-header"><?php echo $data['course']->name;?></h3>
<div class="admin-form">
    <form action="<?php echo URLROOT; ?>/admincourses/addTopic/<?php echo $data['course']->id;?>"
            method="post">  
        <div class="form-group">
            <label for="selectCourse">topic</label>
            <input type="text" class="" name = "topic">
        </div>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>
            <input type="submit" value="Add Topic" class="admin-form-button">
        <?php else: ?>
            <input disabled class="admin-form-button" value="   Restricted"></input>
        <?php endif;?>
    </form>
</div>