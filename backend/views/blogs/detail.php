<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 9:41 AM
 */

?>
<h2>Chi tiết Blog #<?php echo $blog['id']; ?></h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td><?php echo $blog['id'];?></td>
    </tr>
    <tr>
        <th>Blog Category</th>
        <td><?php echo $blog['name'];?></td>
    </tr>
    <tr>
        <th>Title</th>
        <td><?php echo $blog['title'];?></td>
    </tr>
    <tr>
        <th>Tags</th>
        <td><?php echo $blog['tags'];?></td>
    </tr>
    <tr>
        <th>Avatar</th>
        <td><?php if(!empty($blog['avatar'])):?>
                <img height="80px" src="assets/uploads/<?php echo $blog['avatar']; ?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <th>Summary</th>
        <td><?php echo $blog['summary'];?></td>
    </tr>
    <tr>
        <th>Content</th>
        <td><?php echo $blog['content'];?></td>
    </tr>
    <tr>
        <th>Created_at</th>
        <td><?php echo !empty($blog['updated_at']) ? date('d-m-Y H:i:s', strtotime($blog['updated_at'])) :'--' ;?></td>
    </tr>
</table>
<a href="index.php?controller=blog&action=index" class="btn btn-primary">Back</a>
