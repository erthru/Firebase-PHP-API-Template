<?php

  $FIREBASE_SERVER = 'YOUR_FIREBASE_SERVER_KEY';

  function single(){

    // device id / device token
    $devid = $_GET['devid'];
    // message
    $body = $_GET['body'];
    // key / data
    $data = $_GET['data'];

    if(!$devid){
      $response['status']=502;
      $response['message']='Device id required to perform this function';
      echo json_encode($response);
    }else{

      $msg = array
           (
      'body' 	=> $body,
               'icon'	=> 'myicon',
                 'sound' => 'mySound'
           );
      $fields = array
       (
         'to'		=> $devid,
         'notification'	=> $msg,
         'data' => array(
                'key' => $data
             )
       );
       

      $headers = array
       (
         'Authorization: key = '.$FIREBASE_SERVER,
         'Content-Type: application/json'
       );

      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
     
      $result = curl_exec($ch );
      curl_close( $ch );

      echo $result;

    }
  }

  
  function topic(){

    // firebase topic
    $topic = $_GET['topic'];
    // message
    $body = $_GET['body'];
    // key / data
    $data = $_GET['data'];

    if(!$topic){
      $response['status']=502;
      $response['message']='Topic is required to perform this function';
      echo json_encode($response);
    }else{
      $msg = array
           (
      'body' 	=> $body,
               'icon'	=> 'myicon',
                 'sound' => 'mySound'
           );
      $fields = array
       (
         'to'		=> '/topics/'.$topic,
         'notification'	=> $msg,
         'data' => array(
                'key' => $data
             )
       );
       

      $headers = array
       (
         'Authorization: key = '.$FIREBASE_SERVER,
         'Content-Type: application/json'
       );

      $ch = curl_init();
      curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
      curl_setopt( $ch,CURLOPT_POST, true );
      curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
      curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
      curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
      curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
     
      $result = curl_exec($ch );
      curl_close( $ch );

      echo $result;
    }

  }

?>
