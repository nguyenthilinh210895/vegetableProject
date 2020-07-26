<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/26/2020
 * Time: 5:39 PM
 */
require_once 'controllers/Controller.php';
class HomeController extends Controller
{
    public function index(){
        $this->content = $this->render('views/homes/index.php');
        require_once 'views/layouts/main.php';
    }
}