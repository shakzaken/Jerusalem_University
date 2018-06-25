

<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT . "/views/inc/navbar.php" ; ?>

   
<section class="section-a">
    <p class="a-header">In order to succeed, we must first believe that we can.<br> Jerusalem University
    </p>   
</section>

<section class="section-b">   
    <div class="b-grid">
        <?php 
            $length  = count($data['allDegrees']);
            if($length %2 != 0){
                $length --;
            }
        ?>
        <?php $count = 0; foreach($data['allDegrees'] as $degree) :?>
            <?php if($count < $length) : ?>
                <div class="card">
                    <div class="card-img-container">
                        <img class="card-img" src="data:image/jpeg;base64,<?php echo base64_encode($degree->image1);?>" alt="">
                    </div>
                    <div class="card-body">
                        <p class="card-header"><?php echo $degree->name ;?></p>
                        <p class="card-text"><?php echo $degree->des ?></p>
                        <div class="card-button-container">
                            <a class="card-button" href="<?php echo URLROOT . '/degrees/' .$degree->id;?>">More Details</a>
                        </div>
                    </div>
                </div>
            <?php $count++; endif ;?>
        <?php endforeach; ?>
    </div>
</section>



<?php require APPROOT .'/views/inc/footer.php'; ?>



