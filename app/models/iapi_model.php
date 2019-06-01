<?php


// $data = array();
// //$data['environment'] = 'DEV';
// $data['connection'] = 'MMCORE';
// $data['procedure'] = 'user_login';
// $data['params']['login'] = 'waghtot@gmail.com';
// $data['params']['password'] = md5('Klamka22k!');

// $request = json_encode($data);
// $res = iapi_model::doIAPI('database', $request);

// error_log('response: '.print_r($res, 1));

// echo "<pre>".print_r($res[0], 1)."</pre>";


class iapi_model{

    public static function doIAPI($iapiName, $jsonString){
    
    $postData = 'request=' . $jsonString;

    $iapiURL = trim("http://iapi-".$iapiName.".dev.com/");
    
    // error_log($iapiURL);

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
    $res = json_decode(curl_exec($ch), true, JSON_UNESCAPED_UNICODE);
    curl_close($ch);

    return $res;
    }
}