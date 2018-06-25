
<a href="<?php echo URLROOT;?>/admindegrees/addCourse/<?php echo $data['degree']->id;?>"
     class="admin-form-link">Add Course</a>
<h1 class="admin-degrees-header"><?php echo $data['degree']->name; ?></h1>
<table class="admin-degrees-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?> 
                <th>Delete</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody> 
        <?php foreach($data['courses'] as $course) : ?>
        <tr>
            <td><?php echo $course->id ; ?></td>
            <td><?php echo $course->name;?></td>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <td><a class="text-center"
                    href="<?php echo URLROOT; ?>/admindegrees/deleteCourseFromDegree/
                    <?php echo $course->id; ?>/<?php echo $data['degree']->id; ?>"><i class="fa fa-trash delete-icon"></a>
                </td>
            <?php endif ;?>
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>



