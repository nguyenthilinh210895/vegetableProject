<?php

require_once "controllers/Controller.php";
require_once "models/Category.php";
class CategoryController extends Controller
{
    public function index(){
        $params = [];
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";

        $this->content = $this->render('views/categories/index.php');
        require_once 'views/layouts/main.php';

    }
}