<?php

require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller
{
    public function signup(){
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if(empty($username) || empty($password)){
                $this->error = "Chưa nhập Tên đăng nhập hoặc Mật khẩu";
            }else if($password != $confirm_password){
                $this->error = "Mật khẩu chưa khớp nhau";
            }
            if(empty($this->error)){
                $user_model = new User();
                $user =  $user_model->getUser($username);
                if(!empty($user)){
                    $this->error = "Trùng tên đăng nhập";
                }else{
                    $user_model->username = $username;
                    $user_model->password = md5($password);
                    $is_register = $user_model->register();
                    if($is_register){
                        $_SESSION['success'] = "Đăng ký thành công";
                        header('Location: index.php?controller=user&action=login');
                        exit();
                    }else{
                        $_SESSION['error'] = "Đăng ký thất bại";
                        header('Location: index.php?controller=user&action=signup');
                        exit();
                    }
                }
            }
        }
        $this->content = $this->render('views/users/signup.php');
        require_once 'views/layouts/main_login.php';
    }

    public function login(){
        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            if(empty($username) || empty($password)){
                $this->error = "Chưa nhập Tên đăng nhập hoặc Mật khẩu";
            }
            if(empty($this->error)){
                $user_model = new User();
                $password = md5($password);
                $user = $user_model->getUserLogin($username, $password);
                if(empty($user)){
                    $_SESSION['error'] = "Sai Tên đăng nhập hoặc Mật khẩu";
                    header('Location: index.php?controller=user&action=login');
                    exit();
                }else{
                    $_SESSION['success'] = "Đăng nhập thành công";
                    $_SESSION['user'] = $user;
                    header('Location: index.php?controller=productcategory&action=index');
                    exit();
                }
            }
        }
        $this->content = $this->render('views/users/login.php');
        require_once 'views/layouts/main_login.php';
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            $id = $_SESSION['user']['id'];
            $user_model = new User();
            $user_model->last_login = date('Y-m-d H:i:s');
            $user_model->last_login($id);
        }
        unset($_SESSION['user']);
        $_SESSION['success'] = "Đăng xuất thành công";
        header('Location: index.php?controller=user&action=login');
        exit();
    }

    public function profile(){
        if(isset($_SESSION['user'])){
            $username = $_SESSION['user']['username'];
            $user_model = new User();
            $user = $user_model->getUser($username);
            $this->content= $this->render('views/users/detail.php',
                ['user' => $user]);
            require_once 'views/layouts/main.php';
        }
    }

    public function update(){
        if(isset($_SESSION['user'])){
            $username = $_SESSION['user']['username'];
            $user_model = new User();
            $user = $user_model->getUser($username);
            if(isset($_POST['submit'])){
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $facebook = $_POST['facebook'];
                $avatar = $user['avatar'];

                if($_FILES['avatar']['error'] == 0){
                    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                    $extension = strtolower($extension);
                    $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];
                    $file_size_mb = $_FILES['avatar']['size']/(1024 * 1024);
                    $file_size_mb = round($file_size_mb, 2);
                    if(!in_array($extension, $arr_extension)){
                        $this->error = "Cần upload file định dạng ảnh";
                    }else if($file_size_mb > 2){
                        $this->error = "File upload không được quá 2MB";
                    }
                }
                if(empty($this->error)){
                    if($_FILES['avatar']['error'] == 0){
                        $dir_upload = __DIR__.'/../assets/uploads';
                        @unlink($dir_upload.'/'.$avatar);
                        if(!file_exists($dir_upload)){
                            mkdir($dir_upload);
                        }
                        $avatar = time().'-avatar-'.$_FILES['avatar']['name'];
                        move_uploaded_file($_FILES['avatar']['tmp_name'],$dir_upload.'/'.$avatar);
                    }
                    $user_model->first_name = $first_name;
                    $user_model->last_name = $last_name;
                    $user_model->phone = $phone;
                    $user_model->address = $address;
                    $user_model->email = $email;
                    $user_model->facebook = $facebook;
                    $user_model->avatar = $avatar;
                    $is_update = $user_model->update($username);
                    if($is_update){
                        $_SESSION['success'] = "Update thành công";
                    }else{
                        $_SESSION['error'] = "Update thất bại";
                    }
                    header('Location: index.php?controller=user&action=profile');
                    exit();
                }
            }
            $this->content = $this->render('views/users/update.php',
                ['user' => $user]);
            require_once 'views/layouts/main.php';
        }
    }
}