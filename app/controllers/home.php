<?php
class Home extends Master
{

    /*
    Zaczynamy publikowac z tego miejsca widoki przez klase Viwe
    1. Napisac klase View.
    2. Opublikowac pierwszy elementy strony bazujac na konfiguracji z bazy danych.
    3. Ustawic konfiguracje w bazie.
    4. Do 17 Lipca przygotowac podstawe do dalszej pracy z mikroserwisami.
    5. Nie zapomnij zrzucic kopi projektu do zabrania do domu lub przunies plaskiego i przegraj wszystko z basa danych wlacznie. !!! WAZNE !!!
    */
    public function __construct(){
        return self::index();
    }


    public function index(){


        $data = array();
        $data['connection']='MMCONTENT';
        $data['procedure']='get_Ads';
        $data['params']['client_id'] = $_SESSION['constants']['Client_ID'];
        $data['params']['project_id'] = $_SESSION['constants']['Project_ID'];
        $data['params']['language_id'] = $_SESSION['constants']['language']['PL'];
        $res = iapi_model::doIAPI('database', json_encode($data));
        
        return new View(get_called_class(), $res);
    }

    public function get_category(){

        $data = array();
        $data['code']='600';
        $data['message']='ok';
        return $data;

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
            $data['params']['type'] = $_POST['type'];
            $data['params']['category'] = $_POST['category'];
            $data['params']['title'] = $_POST['title'];
            $data['params']['content'] = $_POST['content'];
            $data['params']['person'] = $_POST['person'];
            $data['params']['phone'] = $_POST['phone'];
            $data['params']['email'] = $_POST['email'];
            $data['params']['www'] = $_POST['www'];
            $data['params']['range'] = $_POST['range'];
            $data['params']['postcode'] = $_POST['postcode'];

            $res = iapi_model::doIAPI('database', json_encode($data));
            $odp = self::sanitaze_respons($res);
            $odp['action']='create';

            if(self::get_user_id() !== 0){

                echo json_encode($odp);die;


            }else{

                $user = self::check_if_user_exists();

                $token = self::tokenize($odp);
                error_log('to jest z finda tokenizacja: '.print_r($token, 1));

                // $email = self::get_email_template($user, $token);

                // self::sendEmail();

                // if(self::check_if_user_exists() == true){

                // }else{
                //     echo json_encode($odp);die;
                // }
                // if($odp['code']=='6000'){
                //     $odp['action'] = 'create';

                //     error_log('tokenization result: '.print_r($token, 1));
                // }
            }


        }
    }

    // public function get_language_id(){
    //     return $_SESSION['constants']['language']['PL'];
    // }

    // public function get_client_id(){
    //    return $_SESSION['constants']['Client_ID'];
    // }

    // public function get_project_id(){
    //     return $_SESSION['constants']['Project_ID'];
    // }

    // public function get_user_id(){
    //     if(isset($_SESSION['user'])){
    //         return $_SESSION['user'];
    //     }else{
    //         return 0;
    //     }
    // }

    // public function get_parent_id(){
    //     if(isset($_POST['parent_id'])){
    //         return $_POST['parent_id'];
    //     }else{
    //         return null;
    //     }
    // }

    // public function tokenize(array $data){
        
    //     $res = iapi_model::doIAPI('tokenize', json_encode($data));

    // }
}