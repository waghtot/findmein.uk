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
                $this->createGetRequest()::index();
            break;

            case 'post':
                $this->createPostRequest();
            break;

            default:
                $this->createGetRequest()::index();
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

        $type = $this->requestType();
        $obj = json_decode(file_get_contents(MET))[0]->$type;
        $request = $this->getRequest();

        if($type == 'post'){

            return $this->returnPostResponse($request, $obj);

        }else{
            error_log('GET response: '.print_r($this->returnGetResponse($request, $obj)));
            return $this->returnGetResponse($request, $obj);

        }
    }

    public function getClassName(){
        $request = explode("/", $this->getRequest());
        return $request[count($request)-2];
    }

    public function getRequest(){
        return substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']));
    }

    public function returnPostResponse($request, $obj){

        if(array_key_exists($request, $obj)){

            $name = ucfirst($this->getClassName());
            $method = $obj->$request;

            echo json_encode($name::$method());

        }else{
            echo json_encode('400 Bad request');
        }

    }

    public function returnGetResponse($request, $obj){
        error_log('request obj: '.print_r($this->findUpdateRequest($request)));
        if(array_key_exists($request, $obj)){
            return $obj->$request;
        }else{
            return 'Home';
        }
    }

    public function findUpdateRequest($data){
        if(strpos($data, "?")){
            $variables = array();
            $varSet = array();
            $variables = $this->explodeThis($data, "?");
            $varSet = $this->collectKeyAndValue($variables[1]);
        }
        error_log('request from data: '.print_r($data, 1));
    }

    public function collectKeyAndValue($data){
        $keyValue = array();
        if(strops($data, "&")){
            $keyValue = $this->explodeThis($data, "&");
        }else{

        }
    }

    public function explodeThis($data, $separator){
        return explode($separator, $data);
    }

}