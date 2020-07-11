<?php

require_once 'controllers/Controller.php';
require_once 'models/ProductCategory.php';
require_once 'models/Product.php';
class ProductController extends Controller
{
    public function index(){
        $product_model = new Product();
        $products = $product_model->getAll();
        $this->content = $this->render('views/products/index.php', [
            'products' => $products
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create(){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if(isset($_POST['submit'])){
            $product_category_id = $_POST['product_category_id'];
            $title = $_POST['title'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
//            $status = $_POST['status'];
            if(empty($title)){
                $this->error = "Chưa nhập tên sản phẩm";
            }else if(empty($price)){
                $this->error = "Chưa nhập giá sản phẩm";
            }else if($_FILES['avatar']['error'] == 0){
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'png', 'jepg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size']/(1024 * 1024);
                $file_size_mb = round($file_size_mb, 2);
                if(!in_array($extension, $arr_extension)){
                    $this->error = "Cần tải lên tệp định dạng ảnh";
                }else if($file_size_mb > 2){
                    $this->error = "Tệp tải lên không được vượt quá dung lượng 2MB";
                }
            }
            if(empty($this->error)){
                $file_name = '';
                if($_FILES['avatar']['error'] == 0){
                    $dir_uploads = __DIR__.'/../assets/uploads';
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $file_name = time().'-product-'.$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads.'/'.$file_name);
                }
                $product_model = new Product();
                $product_model->product_category_id = $product_category_id;
                $product_model->title = $title;
                $product_model->avatar = $file_name;
                $product_model->quantity = $quantity;
                $product_model->price = $price;
                $product_model->summary = $summary;
                $product_model->content = $content;
//                $product_model->status = $status;
                $is_insert = $product_model->insert();
                if($is_insert){
                    $_SESSION['success'] = "Thêm sản phẩm thành công";
                }else{
                    $_SESSION['error'] = "Thêm sản phẩm thất bại";
                }
                header('Location: index.php?controller=product');
                exit();
            }
        }
        $product_category_model = new ProductCategory();
        $product_categories = $product_category_model->getAll();
        $this->content = $this->render('views/products/create.php', ['product_categories' => $product_categories]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Sản phẩm không tồn tại";
            header('Location: index.php?controller=product');
            exit();
        }

        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getProductById($id);
        $this->content = $this->render('views/products/detail.php', ['product' => $product]);
        require_once 'views/layouts/main.php';
    }

    public function update(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Sản phẩm không tồn tại';
            header('Location: index.php?controller=product');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getProductById($id);
        if(isset($_POST['submit'])){
            $product_category_id = $_POST['product_category_id'];
            $quantity = $_POST['quantity'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            if(empty($title)){
                $this->error = "Tên không được để trống";
            }else if($_FILES['avatar']['error'] == 0){
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'png', 'jpeg', 'gift'];
                $file_size_mb = $_FILES['avatar']['size']/(1024 * 1024);
                $file_size_mb = round($file_size_mb,2);
                if(!in_array($extension, $arr_extension)){
                    $this->error = "Cần tải lên file định dạng ảnh";
                }else if($file_size_mb > 2){
                    $this->error = "Dung lượng tệp tải lên cần không quá 2MB";
                }
            }
            if(empty($this->error)){
                $file_name = $product['avatar'];
                if($_FILES['avatar']['error'] == 0){
                    $dir_upload = __DIR__ . '/../assets/uploads';
                    @unlink($dir_upload.'/'.$file_name);
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $file_name = time().'-product-'.$_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_upload.'/'.$file_name);
                }
                $product_model->product_category_id = $product_category_id;
                $product_model->quantity = $quantity;
                $product_model->title = $title;
                $product_model->avatar = $file_name;
                $product_model->price = $price;
                $product_model->summary = $summary;
                $product_model->content = $content;
                $product_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $product_model->update($id);
                if($is_update){
                    $_SESSION['success'] = "Cập nhật thành công";
                }else{
                    $_SESSION['error'] = "Cập nhật thất bại";
                }
                header('Location: index.php?controller=product');
                exit();
            }
        }
        $product_category_model = new ProductCategory();
        $product_categories = $product_category_model->getAll();
        $this->content = $this->render('views/products/update.php', [
            'product_categories' => $product_categories,
            'product' => $product
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Sản phẩm không tồn tại";
            header('Location: index.php?controller=product');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $is_delete = $product_model->delete($id);
        if($is_delete){
            $_SESSION['success'] = "Xóa thành công";
        }else{
            $_SESSION['error'] = "Xóa thất bại";
        }
        header('Location: index.php?controller=product');
        exit();
    }
}