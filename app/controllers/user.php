<?php
class User{

    public function index(){
        $data = "To jest user controller";
        return new View(get_called_class(), $data);
    }

}