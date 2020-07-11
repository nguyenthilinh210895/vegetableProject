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
        unset($_SESSION['user']);
        $_SESSION['success'] = "Đăng xuất thành công";
        header('Location: index.php?controller=user&action=login');
        exit();

    }
}