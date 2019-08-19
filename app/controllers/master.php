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

    public function activate_ads($token, $signature){
        $data = array();
        $data['connection']='MMCONTENT';
        $data['procedure']=__FUNCTION__;
        $data['params']['token'] = $token;
        $data['params']['signature'] = $signature;

        $res = iapi_model::doIAPI('database', json_encode($data));
        $odp = self::sanitaze_respons($res);

        if($odp['code']=='6000'){
            $email = array();
            $email['email_template'] = 'FMU_WITHOUT_ACCOUNT_02';
            $email['email'] = $odp['Email'];
            $email['replace']['ref'] = $odp['Ref'];
            $email['replace']['person'] = $odp['Person'];
            $email['user_id'] = $odp['User_ID'];                    
            $email['content_id'] = $odp['Content_ID'];
            $email['project_id'] = self::get_project_id();

            return self::sendEmail($email);
        }else{
            return false;
        }
    }

    public function sendEmail($data){
        $res = iapi_model::doIAPI('email', json_encode($data));

        if($res['code']=='6000'){
            error_log('emailhas been sent');
            return $res;
        }else{
            error_log('email error, email failed');
            return false;
        }

    }

    public function getContent(){

        $data = array();
        $data['connection']='MMCONTENT';
        $data['procedure']='get_Ads';
        $data['params']['client_id'] = $_SESSION['constants']['Client_ID'];
        $data['params']['project_id'] = $_SESSION['constants']['Project_ID'];
        $data['params']['language_id'] = $_SESSION['constants']['language']['PL'];
        $res = iapi_model::doIAPI('database', json_encode($data));
        return $res;
    }

    public function getParams(){
        if(!empty($_GET)){
            unset($_GET['params']);
            error_log('return get: '.print_r($_GET, 1));
            return $_GET;
        }else{
            return false;
        }
    }

    public function getTokenFromString(string $data){

        return substr($data, 0, 32);
    }

    public function getSignatureFromString($data){
        return substr($data, -32);
    }


    public function checkGetData(){

        $data = array();
        $alowed ='';

        foreach ($_GET as $key=>$value){
            $data[$key] = $value;
            if(count($_GET) > count($data)){
                if($key == 'params'){
                    $key = $value;
                } 
                $alowed .= $key.":";
            }else{
                $alowed .= $key;
            }
        }


        error_log('getData from Master: '.print_r($data, 1));


        if(!empty($data)){

            $list = Router::getAlowedList('get');

            if(Router::checkOnTheList($alowed, $list)!==false){
                error_log('check on the list if get check data: '.print_r($alowed, 1));
                $getMethodName = $list->$alowed;
                $name = ucfirst($data['params']);
                unset($_GET['params']);
                $data = $name::$getMethodName($_GET);
                return $data;

            }

        }else{
            return false;
        }
    }

    public function create_user(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCORE';
            $data['procedure']=__FUNCTION__;
            $data['params']['client_id'] = $_SESSION['constants']['Client_ID'];
            $data['params']['project_id'] = $_SESSION['constants']['Project_ID'];
            $data['params']['email'] = $_POST['email'];
            $data['params']['password'] = md5($_POST['password']);

            $res = iapi_model::doIAPI('database', json_encode($data));
            return self::sanitaze_respons($res);
        }
    }


    

}