<?php
class View{

    public function __construct($page, $data){
        require_once TEMPLATES;
    }

    public function page($page, $data){
        require_once PAGE.$page.".php";
    }

    public function partial($partial, $data){
        require PARTIAL.$partial.".php";
    }
}