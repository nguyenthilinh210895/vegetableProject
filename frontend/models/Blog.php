<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 2:49 PM
 */
require_once "models/Model.php";
class Blog extends Model
{
    public function getAll(){
        $sql_select = "SELECT blogs.*, blog_categories.name FROM blogs
                      INNER JOIN blog_categories
                      ON blogs.blog_category_id = blog_categories.id
                      ORDER BY id
                      ";
        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();
        $blogs = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $blogs;
    }

    public function getById($id){
        $sql = "SELECT blogs.*, blog_categories.name
                      FROM blogs
                      INNER JOIN blog_categories
                      ON blogs.blog_category_id = blog_categories.id
                      WHERE blogs.id = $id";
        $obj_select = $this->connection->prepare($sql);
        $obj_select->execute();
        $blog = $obj_select->fetch(PDO::FETCH_ASSOC);
        return $blog;
    }
}