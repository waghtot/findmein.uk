<?php
require_once "../../../models/iapi_model.php";
if(isset($_GET)){

    error_log('this is request from ajax');
    $data = array();
    $data['connection']='MMTEMPLATE';
    $data['procedure']='get_Option_List';
    $data['params']['client_id'] = '3';
    $data['params']['list_id'] = '1';
    $data['params']['in_language'] = '616';

    $res = iapi_model::doIAPI('database', json_encode($data));
    // $list = '';

    error_log('res list: '.print_r($res, 1));

    // $new_list=array();
    // $end_list=array();

    // $end_list = array_merge($new_list, $res);

    // error_log('new list: '.print_r($end_list, 1));


    // foreach ($res as $value){
    //     if(is_array($value)){
    //         foreach($value as $key=>$option){
    //             $new_list[][$key] = $option;
    //         }            
    //     }
    // }

    // foreach ($new_list as $key=>$value){
    //     if($key == 'Option_List_Order_ID'){
    //         $id = $value;
    //     }
    //     if($key == 'Name'){
    //         $name = $value;
    //     }
    //     $list.='<option value="'.$id.'" id="'.$id.'">'.$name.'</option>\n';
    // }

    // error_log('koniec na dzisiaj: '.print_r($list, 1));



    // error_log('new list: '.print_r($new_list, 1));

    /*
    foreach ($res as $key=>$value){
        error_log($key. ' '.$value);
        $new_list = $value;
    }
    // error_log('new list: '.print_r($new_list, 1));

    foreach ($new_list as $value){
        $end_list[] = $value;
    }
    // error_log('end list: '.print_r($end_list, 1));
*/
    /*
    foreach ($value as $key=>$option){
        error_log('one :'.print_r($key.' '.$option, 1));
        if($key == 'Option_List_Order_ID'){
            $id = $option;
        }
        if($key == 'Name'){
            $name = $option;
        }
        $list.='<option value="'.$id.'" id="'.$id.'">'.$name.'</option>\n';
    }

    $data = array();
    $data['list']=$list; 
    echo json_encode($data);
    error_log('database response: '.print_r($list, 1));
*/
}

?>