<?php
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="avatar">Avatar</label>
        <input type="file" name="avatar" id="avatar"
               value=""
               class="form-control"/>
        <?php if(!empty($user['avatar'])): ?>
        <img height="150px" src="assets/uploads/<?php echo $user['avatar'];?>"/>
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name"
               value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : $user['first_name'];?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name"
               value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : $user['last_name'];?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="number" name="phone" id="phone"
               value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : $user['phone'];?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" id="address"
               value="<?php echo isset($_POST['address']) ? $_POST['address'] : $user['address'];?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"
               value="<?php echo isset($_POST['email']) ? $_POST['email'] : $user['email'];?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="jobs">Jobs</label>
        <input type="text" name="" id=""
               value=""
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="facebook">Link Facebook</label>
        <input type="text" name="facebook" id="facebook"
               value="<?php echo isset($_POST['facebook']) ? $_POST['facebook'] : $user['facebook'];?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=profile" class="btn btn-default">Back</a>
    </div>
</form>
