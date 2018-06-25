<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT .'/views/inc/navbar.php'; ?>




<section class="section-i">
    <div class="i-container">
        <div class="i-grid">
            <div class="i-image-container">
                <img class="i-image" src="data:image/jpeg;base64,<?php echo base64_encode($_SESSION['user']->image);?>" alt="">
            </div>
            <div class="i-student-text">
                <strong>Name: </strong> &nbsp; <?php echo $_SESSION['user']->first_name . ' ' .$_SESSION['user']->last_name;?><br>
                <?php if($_SESSION['user']->isRegistered) : ?>
                    <strong>Degree: </strong>&nbsp; <?php echo $data['degree']->full_name;?><br>
                <?php endif ;?>
                <strong>Email:  </strong> &nbsp;<?php echo $_SESSION['user']->email;?>
            </div>

        </div>
    </div>
</section>


<section class="section-h">
<div class="h-container">
    <h3 class="h-header">My Courses</h3>
    <?php if(!$_SESSION['user']->isRegistered) : ?>
            <br> Register Now to one of our degrees, and get access to our courses.
    <?php endif ;?>
        <?php foreach($data['courses'] as $row) : ?>
        <ul class="h-list">
            <li class="h-list-item">
                <div class="h-image-container">
                    <img class="h-image" src="data:image/jpeg;base64,<?php echo base64_encode($row->image);?>" alt="">
                </div>
                <div class="h-text">
                    <h3><?php echo $row->name ; ?></h3><br>
                    Instructor:&nbsp; <?php echo $row->instructor ; ?><br>
                    Status:&nbsp; <?php echo $row->status ; ?><br>
                    Grade:&nbsp; <?php if($row->grade > 0) : echo $row->grade ; endif;?>
                </div>
                <div class="button">
                    <a href="<?php echo URLROOT;?>/courses/<?php echo $row->course_id;?>" class="h-button">More Info</a>
                </div>
            </li>
        </ul>
        <?php endforeach ; ?>


</div>
</section>









<?php require APPROOT .'/views/inc/footer.php'; ?>
