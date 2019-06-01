<?php
class Home
{
    public function __construct($data){
        return $this->$data();
    }

    public function index(){

    }

    public function get_category(){

        error_log('incomming post: '.print_r($_POST, 1));



        $data = array();
        $data['code']='600';
        $data['message']='ok';
        echo json_encode($data);
        // ob_clean();
        // echo json_encode($data);
        error_log('outgoing json: '.print_r(json_encode($data), 1));
        die;

    }

    public function submit_ads(){
        if(isset($_POST)){

            // [dev]
            // Language[] = 616
            // Language[] = 826
            // ProjectID = 3
            // ClientID = 1

            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['client_id'] = self::get_client_id();
            $data['params']['project_id'] = self::get_project_id();
            $data['params']['user_id'] = self::get_user_id();
            $data['params']['language'] = self::get_language_id();
            $data['params']['parent_id'] = self::get_parent_id();
            $data['params']['type'] = $_POST['type'];
            $data['params']['category'] = $_POST['category'];
            $data['params']['title'] = $_POST['title'];
            $data['params']['content'] = $_POST['content'];
            $data['params']['person'] = $_POST['person'];
            $data['params']['phone'] = $_POST['phone'];
            $data['params']['email'] = $_POST['email'];
            $data['params']['www'] = $_POST['www'];
            $data['params']['city'] = $_POST['city'];
            $data['params']['postcode'] = $_POST['postcode'];

            error_log('response from db '.print_r($data, 1));

            // $res = iapi_model::doIAPI('database', json_encode($data));

            // error_log('response from db '.print_r($res, 1));
        }
    }

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
            return null;
        }
    }

    public function get_parent_id(){
        if(isset($_POST['parent_id'])){
            return $_POST['parent_id'];
        }else{
            return null;
        }
    }
}


// if(!empty($inmethod)){
//     $this->$inmethod();
// }