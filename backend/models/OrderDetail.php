<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/30/2020
 * Time: 11:06 PM
 */
require_once "models/Model.php";
class OrderDetail extends Model
{
    public $order_id;
    public $product_id;
    public $quantity;
    public $created_at;
    public $updated_at;

    public function getAll(){
        $sql_select_all = "SELECT * FROM order_detail";
        $obj_select = $this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $order_details = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $order_details;
    }

    public function getById($order_id){
        $sql_select = "SELECT * FROM order_detail WHERE order_id = $order_id";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $order_details = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $order_details;
    }
}