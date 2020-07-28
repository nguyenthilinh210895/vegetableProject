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
//        $url_redirect = $_SERVER['SCRIPT_NAME'].'/gio-hang-cua-ban';
        header("Location: index.php?controller=cart&action=index");
        exit();
    }

    public function index(){
        $this->content = $this->render('views/carts/shoping-cart.php');
        require_once 'views/layouts/main.php';
    }
}