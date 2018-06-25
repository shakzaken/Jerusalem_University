      

<h3 class="admin-degrees-header"><?php echo $data['degree']->name;?></h3>
<div class="admin-form">
    <form action="<?php echo URLROOT; ?>/admindegrees/addCourse/<?php echo $data['degree']->id;?>"
            method="post">  
        <div class="form-group">
            <label for="selectCourse">Course</label>
            <select class="form-control" id="selectCourse" name="course">
                <?php foreach($data['courses'] as $course) : ?>
                    <option value="<?php echo $course->id; ?>"><?php echo $course->name; ?></option>
                <?php endforeach ; ?>
            </select>
        </div>
        <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>
            <input type="submit" value="Add Course" class="admin-form-button">    
        <?php else: ?>
            <input disabled class="admin-form-button" value="   Restricted"></input>
        <?php endif;?>
        
    </form>
</div>
     
  
 