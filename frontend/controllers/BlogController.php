<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 8/1/2020
 * Time: 2:49 PM
 */
require_once "controllers/Controller.php";
require_once "models/Blog.php";
require_once "models/BlogCategory.php";
class BlogController extends Controller
{
    public function index(){
        $blog_model = new Blog();
        $blogs = $blog_model->getAll();
        $this->content = $this->render('views/blogs/index.php',[
            'blogs' => $blogs
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail(){
        $id = $_GET['id'];
        $blog_model = new Blog();
        $blog = $blog_model->getById($id);
        $this->content = $this->render('views/blogs/detail.php',[
            'blog' => $blog
        ]);
        require_once 'views/layouts/main.php';
    }
}