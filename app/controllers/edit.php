<?php

class Edit extends Master
{

    public function __construct(){
        return $this->index();
    }

    public function index(){
        $data = array();
        if(isset($_SESSION['USER']) && $_SESSION['USER']!=0){

        }else{
            if(self::check_CID()!==false){
                $data['ad'] = 1;
            }else{
                $data['ad'] = 0;
            }
        }

        return new View(get_called_class(), $data);
    }

    public function find_the_ad(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['projectID'] = self::get_project_id();
            $data['params']['ref'] = $_POST['refnum'];
            $data['params']['signature'] = md5($_POST['signature']);

            $res = iapi_model::doIAPI('database', json_encode($data));
            $res = self::sanitaze_respons($res);

            if($res['code']=='6000'){
                $_SESSION['CID'] = $res['CID'];
            }

            echo json_encode($res);
            die;

        }

    }

    public function check_CID(){
        if(isset($_SESSION['CID']) && $_SESSION['CID']!=0){
            return true;
        }else{
            return false;
        }
    }

    public function ad_to_edit(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['ad'] = $_POST['cid'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $res = self::sanitaze_respons($res);
            echo json_encode($res);
            die;
        }else{
            unset($_SESSION['CID']);
            echo json_encode('ok');
            die;
        }
    }

    public function update_ad(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['cid'] = $_SESSION['CID'];
            $data['params']['type'] = $_POST['type'];
            $data['params']['title'] = $_POST['title'];
            $data['params']['content'] = $_POST['content'];
            $data['params']['person'] = $_POST['person'];
            $data['params']['phone'] = $_POST['phone'];
            $data['params']['www'] = $_POST['www'];
            $data['params']['range'] = $_POST['range'];
            $data['params']['postcode'] = $_POST['postcode'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $res = self::sanitaze_respons($res);
            echo json_encode($res);
            die;

        }
    }

    public function ad_about_to_renew(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['clientID'] = self::get_client_id();
            $data['params']['projectID'] = self::get_project_id();
            $data['params']['userID'] = self::get_user_id();
            $data['params']['cid'] = $_SESSION['CID'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $res = self::sanitaze_respons($res);
            error_log('ad about to expiry date: '.print_r($res, 1));
            echo json_encode($res);
            die;
        }
    }

    public function renew_ad(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['clientID'] = self::get_client_id();
            $data['params']['projectID'] = self::get_project_id();
            $data['params']['userID'] = self::get_user_id();
            $data['params']['cid'] = $_SESSION['CID'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $res = self::sanitaze_respons($res);
            error_log('ad about to expiry date: '.print_r($res, 1));
            echo json_encode($res);
            die;
        }
    }

    public function delete_ad(){
        if(isset($_POST) && !empty($_POST)){
            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['clientID'] = self::get_client_id();
            $data['params']['projectID'] = self::get_project_id();
            $data['params']['userID'] = self::get_user_id();
            $data['params']['cid'] = $_SESSION['CID'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $res = self::sanitaze_respons($res);
            if($res['code']== '6000'){
                unset($_SESSION['CID']);
                echo json_encode($res);
                die;
            }
        }
    }
}