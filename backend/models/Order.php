<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/30/2020
 * Time: 11:02 PM
 */
require_once "models/Model.php";
class Order extends Model
{
    public $id;
    public $user_id;
    public $first_name;
    public $last_name;
    public $country;
    public $address;
    public $town_city;
    public $country_state;
    public $postcode;
    public $phone;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT * FROM orders";
        $obj_select = $this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $orders = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
    
    public function getDetail($order_id){
        $sql = "SELECT *, order_detail.quantity AS order_detail_quantity
                FROM (orders INNER JOIN order_detail ON orders.id = order_detail.order_id)
                INNER JOIN products ON products.id = order_detail.product_id
                WHERE order_id = $order_id";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $order_details = $obj->fetchAll(PDO::FETCH_ASSOC);
        return $order_details;
    }

    public function getById($id){
        $sql = "SELECT * FROM orders WHERE id = $id";
        $obj = $this->connection->prepare($sql);
        $obj->execute();
        $order = $obj->fetch(PDO::FETCH_ASSOC);
        return $order;
    }
}