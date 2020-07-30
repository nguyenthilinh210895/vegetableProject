<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/30/2020
 * Time: 10:40 PM
 */
require_once "controllers/Controller.php";
class FavoriteController extends  Controller
{
    public function add(){
        $id = $_GET['id'];
        $favorite = [
            'product_id' => $id
        ];
        $_SESSION['favorite'][$id] = $favorite;
        header("Location: index.php?controller=home");
        exit();
    }
}