<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/28/2020
 * Time: 10:14 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
class PaymentController extends Controller
{
    public function index(){
        if(isset($_POST['submit'])){
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];
            if(empty($first_name) || empty($address) || empty($phone)){
                $this->error = "Tên, địa chỉ và số điện thoại không được để trống";
            }
            if(empty($this->error)){
                $order_model = new Order();
                $order_model->first_name = $first_name;
                $order_model->last_name = $last_name;
                $order_model->address = $address;
                $order_model->phone = $phone;
                $order_model->note = $note;
                $price_total = 0;
                foreach ($_SESSION['cart'] AS $cart){
                    $price_item = $cart['price'] * $cart['quantity'];
                    $price_total += $price_item;
                }
                $order_model->price_total = $price_total;
                $order_model->payment_status = 0;
                $order_id = $order_model->insert();
                if($order_id > 0){
                    $order_detail_model = new OrderDetail();
                    $order_detail_model->order_id = $order_id;
                    foreach ($_SESSION['cart'] as $product_id => $cart) {
                        $order_detail_model->product_id = $product_id;
                        $order_detail_model->quantity = $cart['quantity'];
                        $is_insert = $order_detail_model->insert();
                        var_dump($is_insert);
//                        die();
                    }
                    if($method == 0){

                    }else{
                        unset($_SESSION['cart']);
                        header("Location: index.php?controller=payment&action=thank");
                        exit();
                    }
                }
            }
        }
        $this->content = $this->render('views/payments/index.php');
        require_once 'views/layouts/main.php';
    }

    public function thank(){
        $this->content = $this->render('views/payments/thanks.php');
        require_once 'views/layouts/main.php';
    }
}