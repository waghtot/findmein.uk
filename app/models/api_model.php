<?php
class API_Model{
    public static function doIAPI(string $action, array $params)
    {
        if(!isset($params) || empty($params)){
            return false;
        }

        if(!isset($action) || empty($action)){
            return false;
        }

        $uri = SCHEME.$action;
        $postData = 'request=' . $jsonString;
	
        $uri = trim("http://".APP."/iapi-".$iapiName."/");
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $iapiURL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $res = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $res;
    }
}