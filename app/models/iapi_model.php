<?php
class IapiModel{
    public static function doIAPI($action, $params)
    {
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    
        curl_setopt($ch, CURLOPT_URL, $iapiURL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_USERPWD, \constants::GETWAPIUSERNAME . ':' . \constants::GETWAPIPASSWORD);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonString);
    
        $res = curl_exec($ch);
    
        // Check if any error occurred and if yes, redirect to maintenance page
        if (curl_errno($ch)) {
            header('Location: /maintenance.php');
        }
      
        curl_close($ch);
      
        $response = json_decode($res, true);
    }
}