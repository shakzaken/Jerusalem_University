

<h2 class="admin-courses-header">Comments Table</h2>

<table class="admin-comments-table">
    <thead>
        <tr>
            <th class="admin-courses-tiny-col"></th>
            <th class="admin-courses-medium-col">Details</th> 
            <th class="admin-courses-big-col">Comment</th>
            <th class="admin-courses-tiny-col"></th>
        </tr>
    </thead>
    <tbody> 
        <?php foreach($data['comments'] as $comment) : ?>
        <tr class="comments-tr">
            <td></td>
            <td>
                <strong>id: </strong> <?php echo $comment->comment_id; ?><br>
                <strong>Name: </strong><?php echo $comment->first_name ." ". $comment->last_name; ?><br>
                <strong>Course: </strong><?php echo $comment->course_name; ?>
            </td>
            <td><?php echo $comment->body; ?></td>
            <td></td>
        </tr>
        
        <?php endforeach ; ?>
    </tbody>
</table>

<script src="<?php echo URLROOT;?>/js/admin/courses-list.js"></script>

