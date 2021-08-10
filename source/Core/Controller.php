<?php

namespace Source\Core;

class Controller {

    public function __construct(){}
    
    public function loadTemplate($view, $data = array()){
        include __DIR__ . "/../Views/template.php";
    }

    public function loadViewInTemplate($view, $data){
        extract($data);
        include __DIR__ . "/../Views/$view.php";
    }

}