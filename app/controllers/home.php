<?php
class Home extends Master
{

    public function __construct(){
        return self::index();
    }


    public function index(){
        $data = array();
        $data = self::getContent();
        if(Master::checkGetData()['code'] == 6000){
            $data['ads'] = 1;
        }

        return new View(get_called_class(), $data);

    }

    public function get_category(){

        $data = array();
        $data['code']='600';
        $data['message']='ok';
        return $data;

    }

    public function submit_ads(){
        if(isset($_POST)){

            $data = array();
            $data['connection']='MMCONTENT';
            $data['procedure']=__FUNCTION__;
            $data['params']['client_id'] = self::get_client_id();
            $data['params']['project_id'] = self::get_project_id();
            $data['params']['user_id'] = self::get_user_id();
            $data['params']['language'] = self::get_language_id();
            $data['params']['type'] = $_POST['type'];
            $data['params']['category'] = $_POST['category'];
            $data['params']['title'] = $_POST['title'];
            $data['params']['content'] = $_POST['content'];
            $data['params']['person'] = $_POST['person'];
            $data['params']['phone'] = $_POST['phone'];
            $data['params']['email'] = strtolower($_POST['email']);
            $data['params']['www'] = $_POST['www'];
            $data['params']['range'] = $_POST['range'];
            $data['params']['postcode'] = $_POST['postcode'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $odp = self::sanitaze_respons($res);
            $odp['action']='create';

            if(self::get_user_id() !== 0){

                echo json_encode($odp);
                die;


            }else{

                $user = self::check_if_user_exists();
                if($user['UserID'] != 0){

                }else{
                    $token = self::sanitaze_respons(self::tokenize($odp));

                    if($token['code']=='6000'){

                        $data = array();
                        $data['email_template'] = 'FMU_WITHOUT_ACCOUNT_01'; 
                        $data['replace']['token'] = $token['Token'];
                        $data['email'] = $_POST['email'];
                        $data['project_id'] = self::get_project_id();

                        self::sendEmail($data);

                    }

                }

            }

        }
    }

    public function confirm_ads($data){

        $newdata = array();

        foreach($data as $value){
            $newdata=$value;
        }

        $token = self::getTokenFromString($newdata);
        $signature = self::getSignatureFromString($newdata);

        $res = self::activate_ads($token, $signature);
        return $res;
    }

    function show_ads($category, $type, $data){
        foreach ($data AS $value){
            if(isset($value['Category_ID']) && $value['Category_ID'] == $category &&  $value['Type_ID'] == $type){
                View::partial('card_small', $value);
            }
        }
    }

    public function login(){
        if(isset($_POST) && !empty($_POST)){
            $user = self::check_if_user_exists();
            if($user['UserID'] == 0){
                $rsp = self::create_user();
                
                echo json_encode(self::create_user());
                die;
            }else{
                echo json_encode($user);
                die;
                error_log('from login window: '.print_r($user, 1));
            }
        }
    }

    public function forgoten_password(){
        error_log('forgoten password: '.print_r($_POST, 1));
        echo json_encode('ok');
        die;
    }

}