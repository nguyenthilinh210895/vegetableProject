<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/25/2020
 * Time: 5:59 PM
 */
session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller= ucfirst($controller);
$controller .= "Controller";
$path_controller = "controllers/$controller.php";
if(file_exists($path_controller) == false){
    die("Trang bạn tìm không tồn tại");
}

require_once "$path_controller";

$obj = new $controller();
if(method_exists($obj, $action) == false){
    die("Không tồn tại phương thức $action của class $controller");
}
$obj->$action();

