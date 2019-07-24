<?php

class Master
{
    public function get_language_id(){
        return $_SESSION['constants']['language']['PL'];
    }

    public function get_client_id(){
       return $_SESSION['constants']['Client_ID'];
    }

    public function get_project_id(){
        return $_SESSION['constants']['Project_ID'];
    }

    public function get_user_id(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            return 0;
        }
    }

    public function get_parent_id(){
        if(isset($_POST['parent_id'])){
            return $_POST['parent_id'];
        }else{
            return 0;
        }
    }

    public function tokenize(array $data){
        
        $res = iapi_model::doIAPI('tokenize', json_encode($data));
        return $res;

    }

    public function sanitaze_respons(array $data){
        $clean = array();
        foreach($data as $key=>$value){
            if(is_array($value)){
                foreach($value as $key=>$value){
                    $clean[$key] = $value; 
                }
            }else{
                $clean[$key] = $value;
            }
        }
        return $clean;
    }

    public function check_if_user_exists(){

        $data = array();
        $data['connection']='MMCORE';
        $data['procedure']=__FUNCTION__;
        $data['params']['client_id'] = self::get_client_id();
        $data['params']['project_id'] = self::get_project_id();
        $data['params']['User_Email'] = $_POST['email'];

        $res = iapi_model::doIAPI('database', json_encode($data));
        $odp = self::sanitaze_respons($res);
        return $odp;

    }

    public function sendEmail($data){
        $res = iapi_model::doIAPI('email', json_encode($data));
        return $res;
    }

}