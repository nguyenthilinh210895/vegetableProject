<?php

require_once 'controllers/Controller.php';
require_once 'models/BlogCategory.php';
class BlogCategoryController extends Controller
{
    public function index(){
        $blog_category_model = new BlogCategory();
        $blog_categories = $blog_category_model->getAll();
        $this->content = $this->render('views/blogcategories/index.php', [
            'blog_categories' => $blog_categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            if(empty($name)){
                $this->error = "Chưa nhập tên danh mục";
            }
            if(empty($this->error)){
                $blog_category_model = new BlogCategory();
                $blog_category_model->name = $name;
                $blog_category_model->description = $description;
                $is_insert = $blog_category_model->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm thành công";
                }else{
                    $_SESSION['error'] = "Thêm thất bại";
                }
                header('Location: index.php?controller=blogcategory');
                exit();
            }
        }
        $this->content = $this->render('views/blogcategories/create.php');
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Thư mục blog không tồn tại";
            header('Location: index.php?controller=blogcategory&action=index');
            exit();
        }
        $id = $_GET['id'];
        $blog_category_model = new BlogCategory();
        $blog_category = $blog_category_model->getById($id);
        $this->content = $this->render('views/blogcategories/detail.php',[
            'blog_category' => $blog_category
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Blog Category không tồn tại";
            header('Location: index.php?controller=blogcategory&action=index');
            exit();
        }
        $id = $_GET['id'];
        $blog_category_model = new BlogCategory();
        $blog_category = $blog_category_model->getById($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            if(empty($name)){
                $this->error = "Chưa nhập tên danh mục";
            }
            if(empty($this->error)){
                $blog_category_model = new BlogCategory();
                $blog_category_model->name = $name;
                $blog_category_model->description = $description;
                $blog_category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $blog_category_model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                header('Location: index.php?controller=blogcategory&action=index');
                exit();
            }
        }
        $this->content = $this->render('views/blogcategories/update.php',[
            'blog_category' => $blog_category
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Blog Category không tồn tại";
            header('Location: index.php?controller=blogcategory&action=index');
            exit();
        }
        $id = $_GET['id'];
        $blog_category_model = new BlogCategory();
        $is_delete = $blog_category_model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        header('Location: index.php?controller=blogcategory&action=index');
        exit();
    }
}