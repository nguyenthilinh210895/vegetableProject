<?php
?>
<div class="container">
    <h2>Đăng ký</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username"
                   value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>"
                   id="username" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" id="password"
                   value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>"
                   class="form-control" />
        </div>
        <div class="form-group">
            <label for="confirm-password">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password"
                   value="<?php echo isset($_POST['confirm_password']) ? $_POST['confirm_password'] : ''; ?>"
                   id="confirm-password" class="form-control" />
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Đăng ký"
                   class="btn btn-primary" />
        </div>
        <a href="index.php?controller=user&action=login">
            Đã có tài khoản, đăng nhập ngay
        </a>
    </form>
</div>