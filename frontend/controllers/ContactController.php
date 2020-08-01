<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 8:05 AM
 */
require_once "controllers/Controller.php";
class ContactController extends Controller
{
    public function index(){
        $this->content = $this->render('views/contacts/index.php');
        require_once "views/layouts/main.php";

    }
}