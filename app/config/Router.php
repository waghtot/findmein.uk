<?php
class Router{

    private $page;
    private $method;
    private $request;

    public function __construct(){
        if ($this->checkRequest() !== false){
            return $this->index();
        };
    }

    public function index(){

        $this->getClass();
        $this->method = $this->getMethod();

        if($this->method !== false){
            $method = $this->method;
            return $this->page::$method();
        }else{
            return $this->page;
        }

    }

    public function checkRequest(){
        if(strlen($_SERVER['REQUEST_URI'])>1 && strtolower($_SERVER['REQUEST_METHOD'])=='post'){

            foreach(explode("/", $_SERVER['REQUEST_URI']) as $key=>$value){

                    if(strlen($value)<1){
                        unset($key);
                    }else{
                        $this->request[] = $value;         
                    }
                }
            error_log('request data: '.print_r($this->request, 1));
            return true;
        }else{
            return false;
        }
    }

    public function getClass(){

        if(isset($this->request[0])){
            if($this->checkIfClassExists(ucwords($this->request[0]))!==false){
                $this->page = ucwords($this->request[0]);
            }else{
                $this->page = '';   
            }
        }else{
            $this->page = '';
        }

    }

    public function getMethod(){
        $data = $this->checkIfMethodExists($this->request[1]);
        // error_log('and the method is:.... '.print_r($data, 1));
        if($data !== false){
            return $data;
        }else{
            return false;
        }
    }

    public function checkIfClassExists($name){
        if (class_exists($name)) {
            return true;
        }else{
            return false;
        }
    }


    public function checkIfMethodExists($name){

        $json = file_get_contents(MET);
        $jsonObj = json_decode($json,true);
        $obj = $jsonObj[0];

        if(array_key_exists($name, $obj)){
            error_log('method: '.print_r($obj[$name], 1));
            return $obj[$name];
        }else{
            return false;
        }

    }

}