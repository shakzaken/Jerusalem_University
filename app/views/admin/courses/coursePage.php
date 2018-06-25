
<a href="<?php echo URLROOT;?>/admincourses/addTopic/<?php echo $data['course']->id;?>"
     class="admin-form-link">Add Topic</a>
<h1 class="admin-degrees-header"><?php echo $data['course']->name; ?></h1>
<table class="admin-degrees-table">
    <thead>
        <tr>
            <th class="admin-courses-small-col">Id</th>
            <th class="admin-courses-big-col">Name</th>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <th class="admin-courses-small-col">Delete</th>     
            <?php endif;?>
            
        </tr>
    </thead>
    <tbody> 
        <?php foreach($data['topics'] as $topic) : ?>
        <tr>
            <td><?php echo $topic->id ; ?></td>
            <td><?php echo $topic->name;?></td>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <td><a class="text-center"
                    href="<?php echo URLROOT; ?>/admincourses/deleteTopic/
                    <?php echo $topic->id; ?>/<?php echo $data['course']->id; ?>"><i class="fa fa-trash delete-icon"></i></a>
                </td>    
            <?php endif;?>       
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>