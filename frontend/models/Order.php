<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/28/2020
 * Time: 10:48 PM
 */
require_once 'models/Model.php';
class Order extends Model
{
    public $first_name;
    public $last_name;
    public $address;
    public $phone;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;

    public function insert(){
        $sql_insert = "INSERT INTO orders(`first_name`, `last_name`, `address`, `phone`, `email`, 
                                          `note`, `price_total`, `payment_status`)
                  VALUES (:first_name, :last_name, :address, :phone, :email, :note, :price_total, :payment_status)
                  ";
        $obj_insert = $this->connection->prepare($sql_insert);
        $arr_insert = [
            ':first_name' => $this->first_name,
            ':last_name' => $this->last_name,
            ':address' => $this->address,
            ':phone' => $this->phone,
            ':email' => $this->email,
            ':note' => $this->note,
            ':price_total' => $this->price_total,
            ':payment_status' => $this->payment_status
        ];
        $obj_insert->execute($arr_insert);
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
}