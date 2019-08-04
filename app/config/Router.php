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

        $obj = $this->getAlowedList($this->requestType());
        $request = $this->getRequest();

        if($this->requestType() == 'post'){

            return $this->returnPostResponse($request, $obj);

        }else{

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

        if($this->checkOnTheList($request, $obj)!==false){

            $name = ucfirst($this->getClassName());
            $method = $obj->$request;

            echo json_encode($name::$method());

        }else{

            echo json_encode('400 Bad request');

        }

    }

    public function returnGetResponse($request, $obj){

        if($this->checkOnTheList($request, $obj)!==false){

            return $obj->$request;

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