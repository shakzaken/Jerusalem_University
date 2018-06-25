
    
    <h3 class="admin-degrees-header">Add Degree</h3>
    <div class="admin-form">
        <form action="<?php echo URLROOT; ?>/admindegrees/addDegree"
                method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="degreeForm" name="name">
            </div>
            <div class="err-msg degreeForm-name-err"></div>
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="degreeForm" name="full_name">
            </div>
            <div class="err-msg degreeForm-full_name-err"></div>
            <div class="form-group">
                <label for="name">Points</label>
                <input type="number" class="degreeForm" name="points">
            </div>
            <div class="err-msg degreeForm-points-err"></div>
            <div class="form-group-large">
                <label for="name">Description</label>
                <textarea  class="form-control-large degreeForm" name="description" ></textarea>
            </div>
            <div class="err-msg degreeForm-description-err"></div>
            <div class="form-group-large">
                <div>
                    <label for="">First Image</label>
                    <label for="degree-image1" class="file-input"><i class="fas fa-cloud-upload-alt img-icon"></i></label>
                    <input type="file" class="degreeForm"  name="image1" id="degree-image1">
                </div>
                <div>
                    <img src="" alt="" class="show-image1">
                </div>
            </div>
            <div class="err-msg degreeForm-image1-err"></div>
            <div class="form-group-large">
                <div>
                    <label for="">Second Image</label>
                    <label for="degree-image2" class="file-input"><i class="fas fa-cloud-upload-alt img-icon"></i></label>
                    <input type="file" class="degreeForm"  name="image2" id="degree-image2">
                </div>
                <div>
                    <img src="" alt="" class="show-image2">
                </div>  
            </div>
            <div class="err-msg degreeForm-image2-err"></div>
            <div class="form-group-large">
                <div>
                    <label for="">Third Image</label>
                    <label for="degree-image3" class="file-input"><i class="fas fa-cloud-upload-alt img-icon"></i></label>
                    <input type="file" class="degreeForm"  name="image3" id="degree-image3">
                </div>
                <div>
                    <img src="" alt="" class="show-image3">
                </div>   
            </div>
            <div class="err-msg degreeForm-image3-err"></div>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') : ?>
                <input type="button" value="Add Degree" class="admin-form-button degree-btn">
            <?php else: ?>
                <input disabled class="admin-form-button" value="   Restricted"></input>
            <?php endif;?>
        </form>
    </div>


<script src="<?php echo URLROOT;?>/js/inputObj.js"></script>  
<script src="<?php echo URLROOT;?>/js/admin/degree-form.js"></script>
   
