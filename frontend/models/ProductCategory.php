<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/27/2020
 * Time: 12:25 PM
 */
require_once 'models/Model.php';
class ProductCategory extends Model
{
    public function getAll(){
        $sql_select_all = "SELECT * FROM product_categories";
        $obj_select = $this->connection->prepare($sql_select_all);
        $obj_select->execute();
        $product_categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $product_categories;
    }
}