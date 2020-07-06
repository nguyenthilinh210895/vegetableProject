<?php
class Controller{
    public $error;
    public $content;

    public function render($file, $variables = []){
        extract($variables);
        ob_start();
        require_once $file;
        $views = ob_get_clean();
        return $views;
    }
}
