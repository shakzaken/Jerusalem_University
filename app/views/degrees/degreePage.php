
<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT . "/views/inc/navbar.php" ; ?>



<section class="section-c">
    
    <div>
        <form action="<?php echo URLROOT;?>/students/register/<?php echo $data['degree']->id;?>" method="post" class="c-form">
            <p class="section-c-header"><?php echo $data['degree']->name; ?></p>
            <?php if( isset($_SESSION['user']) && $_SESSION['user']->isRegistered == false) : ?>
                <div class="c-button-container">
                    <button class="c-button">Enroll Now</button>
                </div>
            <?php endif ;?>
            
        </form>
    </div>
    <div class="images-grid">
        <div class="image-1">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($data['degree']->image1)?>" alt="">
        </div>
        <div class="image-2">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($data['degree']->image2)?>" alt="">
        </div>
        <div class="image-3">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($data['degree']->image3)?>" alt="">
        </div>
        
    </div>
</section>


<section class="section-d">
    <div class="container">
        <p><strong>Degree: </strong> <?php echo $data['degree']->full_name;?></p><br>
        <p><strong>Points: </strong> <?php echo $data['degreePoints']; ?> points for completion</p><br>
        <p><strong>Courses: </strong><?php echo $data['coursesCount'] ; ?></p><br>
        <p><strong>Description: </strong><br> <?php echo $data['degree']->description;?> </p>

    </div>
</section>


<section class="section-e">
    <p class="e-header"><i class="fas fa-graduation-cap"></i> Courses:</p>
    <div class="e-grid">
        <?php foreach($data['courses'] as $course) : ?> 
            <div class="e-card">
                <img class="e-card-img" src="data:image/jpeg;base64,<?php echo base64_encode($course->image);?>" alt="">
                <!--<img class="e-card-img" src="<?php echo URLROOT;?>/img/courses/<?php echo $course->image; ?>" alt=""> -->
                <div class="e-card-body">
                    <div class="e-card-header">
                        <?php echo $course->name; ?>
                    </div>
                    <div class="e-card-text">
                        <?php echo $course->instructor;?><br>
                        
                    </div>  
                </div>
                <div class="e-btn-container">
                    <a href="<?php echo URLROOT . '/courses/'.$course->id;?>" class="e-card-button">More Details</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>  
</section>
   

<?php require APPROOT .'/views/inc/footer.php'; ?>
<script src="<?php echo URLROOT;?>/js/degreePage.js"></script>


