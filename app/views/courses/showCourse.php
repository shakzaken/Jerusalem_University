
<?php require APPROOT .'/views/inc/header.php'; ?>
<?php require APPROOT . "/views/inc/navbar.php" ; ?>


<section class="section-f">
    <div class="f-grid">
        <p class="f-header">
            <?php echo $data['course']->name; ?>
        </p>
        <div class="f-pic-container">
            <img class="" src="data:image/jpeg;base64,<?php echo base64_encode($data['course']->image);?>" alt="">
        </div>
        <div class="f-course-overview">
            <strong>Name: </strong><?php echo $data['course']->name; ?> <br>
            <strong>Instructor: </strong><?php echo $data['course']->instructor; ?> <br>
            <strong>Points: </strong><?php echo $data['course']->points; ?><br>
            <strong>Field: </strong><?php echo $data['course']->field; ?><br>
            <strong>Description: </strong>
            <?php echo $data['course']->description; ?>

        </div> 
    </div>
</section>

<section class="section-g">
    <div class="g-grid">
        <div class="g-course-content">
            <p>Course Content</p>
            <ul>
                <?php foreach($data['topics'] as $topic) :?>
                <li><i class="fas fa-arrow-circle-right course-content-icon"></i> &nbsp;  <?php echo $topic->name;?></li>
                <?php endforeach ; ?>
            </ul>
        </div>
        <div class="g-course-comments">
            <p>Course Comments</p>
            <?php foreach($data['comments'] as $comment) :?>
                <div class="g-comment">
                    <div class="g-comment-img">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($comment->image);?>" alt="">
                    </div>
                    <div class="g-comment-header">
                        <?php echo $comment->first_name .' '.$comment->last_name ;?>
                    </div>
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']->email === $comment->email) : ?>
                        <div class="g-delete-icon-container">
                            <a href="<?php echo URLROOT;?>/courses/deleteComment/<?php echo $comment->comment_id;?>"><i class="fas fa-ban g-delete-icon"></i></a>
                        </div>
                    <?php endif ;?>
                    <div class="g-comment-body">
                        <?php echo $comment->body;?>
                    </div>
                </div>
            <?php endforeach ; ?>

            <?php if(isset($_SESSION['user'])) : ?>
                <form method="post" action="<?php echo URLROOT;?>/courses/addComment/<?php echo $data['course']->id;?>" 
                    class="g-comment-form">
                    <h3>Write a Comment</h3>
                    <textarea name="body" id="" class="form-body"></textarea>
                    <button type="submit" class="form-button">Save</button>
                </form>
            <?php endif ;?>
        </div>
    </div>
</section>


<?php require APPROOT .'/views/inc/footer.php'; ?>