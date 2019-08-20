<?php

class Router{

    public function __construct(){

        return $this->index();

    }

    public function index(){

        return $this->checkRequest();

    }

    public function checkRequest(){

        switch($this->requestType()){

            case 'get':
                $this->createGetRequest();
            break;

            case 'post':
                $this->createPostRequest();
            break;

            default:
                $this->createGetRequest();
            break;

        }

    }

    public function requestType(){

        return strtolower($_SERVER['REQUEST_METHOD']);

    }

    public function createGetRequest(){

        return $this->checkIfAlowed();

    }

    public function createPostRequest(){

        return $this->checkIfAlowed();

    }

    public function checkIfAlowed(){

        $obj = $this->getAlowedList($this->requestType());
        $request = $this->getRequest();

        if($this->requestType() == 'post'){

            return $this->returnPostResponse($request, $obj);

        }else{

            return $this->returnGetResponse($request, $obj);

        }
    }

    public function getClassName(){
        if($this->requestType() == 'post'){
            $request = explode("/", $this->getRequest());
            return $request[count($request)-2];
        }else{
            if(isset($_GET['params'])){
                return $_GET['params'];
            }else{
                return 'home';
            }
        }



    }

    public function getRequest(){
        if(!isset($_GET['params'])){
            return 'home';
        }else{
            return $_GET['params'];
        }
    }

    public function returnPostResponse($request, $obj){

        if($this->checkOnTheList($request, $obj)!==false){

            $name = ucfirst($this->getClassName());
            error_log('post class name: '.print_r($name, 1));

            $method = $obj->$request;

            echo json_encode($name::$method());

        }else{

            echo json_encode('400 Bad request');

        }

    }

    public function returnGetResponse($request, $obj){
        error_log('method name: ' .print_r($request, 1));
        if($this->checkOnTheList($request, $obj)!==false){

            $name = ucfirst($this->getClassName());
            $method = $obj->$request;

            if(strpos($method, '@')){
                unset($_GET['params']);
                $name = substr($method, 0, strpos($method, '@'));
                $method = substr($method, strpos($method, '@')+1, strlen($method));
                $data = array();
                $data = $name::$method($_GET);
                if(!empty($data) && $data['code']== 6000){
                    $_SESSION['validate'] = $data;
                }

                error_log('data from method before class: '.print_r($data, 1));

                $class = new $name();
                return $class->index();
            }else{
                // error_log('a jesli nie ma at: '.print_r($obj->$request, 1));
                return new $name();
            }
        }else{

            return 'Home';

        }

    }

    public function getAlowedList($type){

        return json_decode(file_get_contents(MET))[0]->$type;

    }

    public function checkOnTheList($request, $obj){

        return array_key_exists($request, $obj);

    }

}
