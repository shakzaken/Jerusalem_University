  

  
<h3 class="admin-courses-header">Add Course</h3>
<div class="admin-form">
    <form action="<?php echo URLROOT; ?>/admincourses/addcourse"
            enctype="multipart/form-data" method="post" class="courseForm-form">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="courseForm" name="name" >
        </div>
        <div class="err-msg courseForm-name-err"></div>
        
        <div class="form-group">
            <label for="points">Points</label>
            <input type="number" class="courseForm" name="points" >
        </div>
        <div class="err-msg courseForm-points-err"></div>
        
        <div class="form-group">
            <label for="field">Field</label>
            <input type="text" class="courseForm" name="field" >
        </div>
        <div class="err-msg courseForm-field-err"></div>
        <div class="form-group">
            <label for="field">Instructor</label>
            <select name="instructor" id="instructor" class="courseForm">
                <?php foreach ($data['instructors'] as $instructor) :?>
                    <?php $ins_name = $instructor->first_name ." " .$instructor->last_name;?>
                    <option value="<?php echo $instructor->id?>,<?php echo $ins_name;?>"><?php echo $ins_name; ?></option>
                <?php endforeach ;?>
            </select>
            <div class="err-msg courseForm-instructor-err"></div>
        </div>
        
        <div class="form-group-large">
            <label for="description">Description</label>
            <textarea name="description" id="" class="courseForm"></textarea>
        </div>
        <div class="err-msg courseForm-description-err"></div>
        
        <div class="form-group-large">
            <div>
                <label for="">Image</label>
                <label for="course-image" class="file-input"><i class="fas fa-cloud-upload-alt img-icon"></i></label>
                <input type="file" id="course-image" class="courseForm image-input"  name="image">
            </div>
            <div>
                <img src="" alt="" class="show-image">
            </div> 
        </div>
        <div class="err-msg courseForm-image-err"></div>
        <?php if( isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>
            <input type="button" value="Add Course" class="admin-form-button courseForm-btn">
        <?php else: ?>
            <input disabled class="admin-form-button" value="   Restricted"></input>
        <?php endif;?>
             
    </form>
</div>
       

<script src="<?php echo URLROOT;?>/js/inputObj.js"></script>
<script src="<?php echo URLROOT;?>/js/admin/course-form.js"></script>