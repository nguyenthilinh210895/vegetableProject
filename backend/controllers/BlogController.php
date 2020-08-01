<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 8:27 AM
 */
require_once "controllers/Controller.php";
require_once "models/Blog.php";
require_once "models/BlogCategory.php";
class BlogController extends Controller
{
    public function index(){
        $obj_blog = new Blog();
        $blogs = $obj_blog->getAll();
        $this->content = $this->render('views/blogs/index.php',
            [
                'blogs' => $blogs
            ]);
        require_once "views/layouts/main.php";
    }

    public function add(){
        $obj_blog_category = new BlogCategory();
        $blog_categories = $obj_blog_category->getAll();
        if(isset($_POST['submit'])){
            $blog_category_id = $_POST['blog_category_id'];
            $title = $_POST['title'];
            $tags = $_POST['tags'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];

            if(empty($title)){
                $this->error = "Chưa nhập tiêu đề";
            }else if ($_FILES['avatar']['error'] == 0){
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'png', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size']/(1024*1024);
                $file_size_mb = round($file_size_mb, 2);
                if(!in_array($extension, $arr_extension)){
                    $this->error = "Cần tải lên file là định dạng ảnh";
                }elseif ($file_size_mb > 2){
                    $this->error = "Tệp tải lên có dung lượng không được quá 2MB";
                }
            }
            if(empty($this->error)){
                $file_name = '';
                if($_FILES['avatar']['error'] == 0){
                    $dir_uploads = __DIR__.'/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $file_name = time().'-blog-'.$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads.'/'.$file_name);
                }
                $blog_model = new Blog();
                $blog_model->blog_category_id = $blog_category_id;
                $blog_model->title = $title;
                $blog_model->tags = $tags;
                $blog_model->summary = $summary;
                $blog_model->avatar = $file_name;
                $blog_model->content = $content;
                $is_insert = $blog_model->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm thành công";
                }else{
                    $_SESSION['error'] = "Thêm thất bại";
                }
                header("Location: index.php?controller=blog&action=index");
                exit();
            }
        }
        $this->content = $this->render('views/blogs/create.php',
            [
                'blog_categories' => $blog_categories
            ]);
        require_once "views/layouts/main.php";
    }

    public function detail(){
        $blog_id = $_GET['id'];
        $blog_model = new Blog();
        $blog = $blog_model->getById($blog_id);
//        echo "<pre>";
//        echo "Blog";
//        print_r($blog);
//        echo "</pre>";
//        die();
        $this->content = $this->render('views/blogs/detail.php',[
            'blog' => $blog
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        $id = $_GET['id'];
        $blog_model = new Blog();
        $blog = $blog_model->getById($id);
        $blog_category_model = new BlogCategory();
        $blog_categories = $blog_category_model->getAll();
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if(isset($_POST['submit'])){
            $blog_category_id = $_POST['blog_category_id'];
            $title = $_POST['title'];
            $tags = $_POST['tags'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $file_name = $blog['name'];
            if(empty($title)){
                $this->error = "Chưa nhập tiêu đề";
            }else if($_FILES['avatar']['error'] == 0){
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];
                $file_size_mb = $_FILES['avatar']['size']/(1024*1024);
                $file_size_mb = round($file_size_mb, 2);
                if(!in_array($extension, $arr_extension)){
                    $this->error = "Cần tải lên tệp định dạng ảnh";
                }elseif ($file_size_mb > 2){
                    $this->error = "Dung lượng tệp tải lên không quá 2MB";
                }
            }
            if(empty($this->error)){
                if($_FILES['avatar']['error'] == 0){
                    $dir_uploads = __DIR__.'/../assets/uploads';
                    @unlink($dir_uploads.'/'.$file_name);
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $file_name = time().'-blog-'.$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads.'/'.$file_name);
                }
                $blog_model->blog_category_id = $blog_category_id;
                $blog_model->title = $title;
                $blog_model->tags = $tags;
                $blog_model->summary = $summary;
                $blog_model->content = $content;
                $blog_model->avatar = $file_name;
                $blog_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $blog_model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Chỉnh sửa thành công";
                }else{
                    $_SESSION['error'] = "Chỉnh sửa thất bại";
                }
                header("Location: index.php?controller=blog&action=index");
                exit();
            }
        }
        $this->content = $this->render('views/blogs/update.php',[
            'blog' => $blog,
            'blog_categories' => $blog_categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        $id = $_GET['id'];
        $blog_model = new Blog();
        $is_delete = $blog_model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
    }
}