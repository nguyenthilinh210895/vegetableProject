<?php
?>
<!--views/users/login.php-->
<form action="" method="post" class="">
    <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text"
               name="username"
               id="username"
               value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password"
               name="password"
               id="password"
               value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"
               class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Đăng nhập"
               class="btn btn-primary" />
    </div>
    <a href="index.php?controller=user&action=signup">
        Chưa có tài khoản? Đăng ký ngay
    </a>
</form>
