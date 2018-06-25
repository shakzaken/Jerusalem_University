

<h2 class="admin-courses-header">Courses Table</h2>

<table class="admin-courses-table">
    <thead>
        <tr>
            <th class="admin-courses-medium-col">Picture</th>
            <th class="admin-courses-big-col">Name</th> 
            <th class="admin-courses-big-col">Instructor</th>
            <th class="admin-courses-medium-col">Field</th>
            <th class="admin-courses-small-col">Points</th>
            <th class="admin-courses-small-col">Id</th>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <th class="admin-courses-small-col">Delete</th>    
            <?php endif;?>
        </tr>
    </thead>
    <tbody> 
        <?php foreach($data['courses'] as $course) : ?>
        <tr>
            <td> 
                <img class="course-image" src="data:image/jpeg;base64,<?php echo base64_encode($course->image);?>" alt="">          
            </td>
            <td>
                <a href="<?php echo URLROOT;?>/admincourses/coursePage/<?php echo $course->id;?>">
                    <?php echo $course->name; ?>
                </a>
            </td>
            <td><?php echo $course->instructor; ?></td>
            <td><?php echo $course->field; ?></td>
            <td><?php echo $course->points; ?></td>
            <td><?php echo $course->id; ?></td>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <td><a  class="text-center"
                        onclick ="deleteCourse(<?php echo $course->id;?>)">
                        <i class="fa fa-trash delete-icon"></i>
                    </a>
                </td>
            <?php endif;?>
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>

<script src="<?php echo URLROOT;?>/js/admin/courses-list.js"></script>

