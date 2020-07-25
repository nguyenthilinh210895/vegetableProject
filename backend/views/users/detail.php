<?php
?>
<h2>Thông tin người dùng</h2>
<table class="table table-borderless">
    <tr>
        <td>Avatar</td>
        <td>
            <?php if(!empty($user['avatar'])): ?>
                <img height="150px" src="assets/uploads/<?php echo $user['avatar'];?>"/>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>Username</td>
        <td><?php echo $user['username'];?></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><?php echo $user['password'];?></td>
    </tr>
    <tr>
        <td>First Name</td>
        <td><?php echo $user['first_name'];?></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?php echo $user['last_name'];?></td>
    </tr>
    <tr>
        <td>Phone Number</td>
        <td><?php echo $user['phone'];?></td>
    </tr>
    <tr>
        <td>Address</td>
        <td><?php echo $user['address'];?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $user['email'];?></td>
    </tr>
    <tr>
        <td>Jobs</td>
        <td><?php echo $user['jobs'];?></td>
    </tr>
    <tr>
        <td>Facebook</td>
        <td><?php echo $user['facebook'];?></td>
    </tr>
</table>
<a href="index.php?controller=user&action=update" class="btn btn-primary">Cập nhật thông tin</a>