<?php

require_once 'controllers/Controller.php';
require_once 'models/ProductCategory.php';
class ProductCategoryController extends Controller
{
    public function index(){
        $product_category_model = new ProductCategory();
        $product_categories = $product_category_model->getAll();
        $arr_output = [
            'product_categories' => $product_categories
        ];
        $this->content = $this->render('views/productcategories/index.php', $arr_output);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            if(empty($name)){
                $this->error = 'Chưa nhập tên danh  mục';
            }
            if(empty($this->error)){
                $product_category_model = new ProductCategory();
                $product_category_model->name = $name;
                $product_category_model->description = $description;
                $is_insert = $product_category_model->insert();
                if($is_insert){
                    $_SESSION['success'] = 'Thêm mới thành công';
                }else{
                    $_SESSION['error'] = 'Thêm mới thất bại';
                }
                header('Location: index.php?controller=productcategory&action=index');
                exit();
            }
        }else if(isset($_POST['reset'])){
            $name = '';
            $description = '';
        }
        $this->content = $this->render('views/productcategories/create.php');
        require_once 'views/layouts/main.php';
    }
    
    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Bản ghi không tồn tại';
            header('Location: index.php?controller=productcategory');
            exit();
        }
        $id = $_GET['id'];
        $product_category_model = new ProductCategory();
        $product_category = $product_category_model->getProductCategoryById($id);
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $description = $_POST['description'];
            if(empty($name)){
                $this->error = "Chưa nhập tên";
            }
            if(empty($this->error)){
                $product_category_model->name = $name;
                $product_category_model->description = $description;
                $product_category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $product_category_model->update($id);
                if($is_update){
                    $_SESSION['success'] = 'Cập nhật thành công';
                }else{
                    $_SESSION['error'] = 'Cập nhật thất bại';
                }
                header('Location: index.php?controller=productcategory&action=index');
                exit();
            }
        }else if(isset($_POST['reset'])){
            $product_category['name'] = '';
            $product_category['description'] = '';
        }
        $this->content =
            $this->render('views/productcategories/update.php',['product_category' => $product_category]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "ID không hợp lệ";
            header('Location: index.php?controller=productcategories&action=index');
            exit();
        }
        $id = $_GET['id'];
        $product_category_model = new ProductCategory();
        $product_category = $product_category_model->getProductCategoryById($id);
        $this->content = $this->render('views/productcategories/detail.php',[
            'product_category' => $product_category
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "ID không hợp lệ";
            header('Location: index.php?controller=productcategories&action=index');
            exit();
        }
        $id = $_GET['id'];
        $product_category_model = new ProductCategory();
        $is_delete = $product_category_model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        header('Location: index.php?controller=productcategory&action=index');
        exit();
    }
}