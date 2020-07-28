<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/26/2020
 * Time: 6:30 PM
 */
require_once 'models/Model.php';
class Product extends Model
{
    public function getAll(){
        $sql_select_all = "SELECT products.*, product_categories.name AS product_category_name
                    FROM products
                    INNER JOIN product_categories
                    ON products.product_category_id = product_categories.id
                    ";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function getProductById($id){
        $sql_select = "SELECT * FROM products WHERE id = $id";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $product = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $product;
    }
}