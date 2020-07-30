<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/28/2020
 * Time: 1:53 PM
 */
require_once "controllers/Controller.php";
require_once "models/Product.php";
class CartController extends Controller
{
    public function add(){
        $id = $_GET['id'];
        $product_model = new Product();
        $product = $product_model->getProductById($id);
        $cart = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            'quantity' => 1
        ];
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'][$id] = $cart;
        }else{
            if(!array_key_exists($id, $_SESSION['cart'])){
                $_SESSION['cart'][$id] = $cart;
            }else{
                $_SESSION['cart'][$id]['quantity']++;
            }
        }
//        $url_redirect = $_SERVER['SCRIPT_NAME'] . '/gio-hang-cua-ban';
//        header("Location: $url_redirect");
        header("Location: index.php?controller=cart&action=index");
        exit();
    }

    public function index(){
        echo "<pre>";
        print_r($_POST);
        print_r($_SESSION);
        echo "</pre>";
        if(isset($_POST['submit'])){
            foreach ($_SESSION['cart'] AS $product_id => $cart){
                $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
            }
            $_SESSION['success'] = "Cập nhật giỏ hàng thành công";
        }
        $this->content = $this->render('views/carts/shoping-cart.php');
        require_once 'views/layouts/main.php';
    }

    public function delete(){
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = "Sản phẩm không tồn tại trong giỏ hàng";
            header("Location: index.php?controller=cart&action=index");
            exit();
        }
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        if(empty($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
        $_SESSION['success'] = "Đã xóa sản phẩm khỏi giỏ hàng";
        header("Location: index.php?controller=cart&action=index");
        exit();
    }
}