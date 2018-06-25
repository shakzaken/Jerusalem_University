

<h2 class="admin-users-header">Users Table</h2>
<table class="admin-users-table">
    <thead>
        <tr>
            <th class="admin-users-medium-col">Image</th>
            <th class="admin-users-big-col">Name</th>
            <th class="admin-users-big-col">Email</th>
            <th class="admin-users-medium-col">Role</th>
            <th class="admin-users-small-col">Id</th>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <th class="admin-users-small-col">Delete</th>   
            <?php endif ;?> 
        </tr>
    </thead>
    <tbody> 
        <?php foreach($data['allUsers'] as $row) : ?>
        <tr>
            
            <td>
                <img class="user-image" src="data:image/jpeg;base64,<?php echo base64_encode($row->image) ;?>"
                        alt=""> 
            </td>
            
            <td><?php echo $row->first_name ." ". $row->last_name?></td>
            <td><?php echo $row->email ; ?></td>
            <td><?php echo $row->role ; ?></td>
            <td ><?php echo $row->id ; ?></td>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']->role === 'admin') :?>
                <td>
                    <a class="delete-link" 
                        onclick="deleteUser(<?php echo $row->id;?>)">
                        <i class="fa fa-trash delete-icon"></i>
                    </a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endforeach ; ?>
    </tbody>
</table>

<script src="<?php echo URLROOT;?>/js/admin/users-list.js"></script>