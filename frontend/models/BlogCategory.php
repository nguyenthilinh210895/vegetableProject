<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 2:49 PM
 */
require_once "models/Model.php";
class BlogCategory extends Model
{
    public function getAll(){
        $sql_select_all = "SELECT * FROM blog_categories";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $blog_categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $blog_categories;
    }

    public function getById($id){
        $sql_select_one = "SELECT * FROM blog_categories WHERE `id` = $id";
        $obj_select = $this->connection->prepare($sql_select_one);
        $obj_select->execute();
        $blog_category = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $blog_category;
    }
}