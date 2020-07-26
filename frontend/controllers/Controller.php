<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 7/25/2020
 * Time: 6:10 PM
 */

class Controller
{
    public $error; //chứa thông tin về lỗi validate của form
    public $content; //chứa thông tin của nội dung view theo từng chức năng

    //phương thức dùng để lấy nội dung view động
    //$file: đường dẫn tới file view
    //$variables: mảng của các phần tử, chính là các biến sẽ sử dụng ở trong view
    public function render($file, $variables = []){
        //giả nén mảng $variables
        extract($variables);
        //mở vùng đệm để ghi nhớ nội dung view
        ob_start();
        //nhúng đường dẫn file view
        require_once $file;
        $view = ob_get_clean();
        return $view;
    }
}