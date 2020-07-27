<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/26/2020
 * Time: 5:39 PM
 */
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/ProductCategory.php';
class HomeController extends Controller
{
    public function index(){
        $product_model = new Product();
        $product_category_model = new ProductCategory();
        $products = $product_model->getAll();
        $product_categories = $product_category_model->getAll();
        $this->content = $this->render('views/homes/index.php',[
            'products' => $products,
            'product_categories' => $product_categories
        ]);
        require_once 'views/layouts/main.php';
    }
}
