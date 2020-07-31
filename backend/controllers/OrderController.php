<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/30/2020
 * Time: 11:03 PM
 */
require_once "controllers/Controller.php";
require_once "models/Order.php";
require_once "models/OrderDetail.php";
class OrderController extends Controller
{
    public function index(){
        $obj_order = new Order();
        $orders = $obj_order->getAll();
        $this->content = $this->render('views/orders/index.php',
            [
                'orders' => $orders
            ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $order_id = $_GET['id'];
//        echo "<pre>";
//        print_r($order_id);
//        echo "</pre>";
        $obj_order = new Order();
        $order_details = $obj_order->getDetail($order_id);
        $order = $obj_order->getById($order_id);
        $first_name = $order['first_name'];
        $last_name = $order['last_name'];
        $this->content = $this->render('views/orders/detail.php',
            [
                'order_details' => $order_details,
                'first_name' => $first_name,
                'last_name' => $last_name
            ]);
        require_once 'views/layouts/main.php';
    }
}