

<h2 class="admin-degrees-header">Academic Degrees Table</h2>

<table class="admin-degrees-table">
    <thead>
        <tr>
            <th class="admin-degrees-medium-col">Image</th> 
            <th class="admin-degrees-medium-col">Name</th>
            <th class="admin-degrees-small-col">Id</th> 
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <th class="admin-degrees-small-col">Delete</th> 
            <?php endif ;?>   
        </tr>
    </thead>
    <tbody> 
        <?php foreach($data['allDegrees'] as $degree) : ?>
        <tr>
            <td>
                <img class="course-image" src="data:image/jpeg;base64,<?php echo base64_encode($degree->image1) ;?>" alt="">          
            </td>
            <td>
                <a class="degree-link" href="<?php echo URLROOT;?>/admindegrees/degreeDetails/
                <?php echo $degree->id;?>"><?php echo $degree->name ; ?></a>
            </td>
            <td><?php echo $degree->id ; ?></td>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <td>
                    <a 
                        class="text-center"
                        onclick="deleteDegree(<?php echo $degree->id; ?>)">
                    <i class="fa fa-trash delete-icon"></i>
                    </a> 
                </td>
            <?php endif ;?>
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>


<script src="<?php echo URLROOT;?>/js/admin/degrees-list.js"></script>