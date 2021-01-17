<?php

    // $receiver = $_POST["phoneNumber"];
    // $message = $_POST["message"];

    $api_key='64087e0f6455aae0';
    $secret_key = 'YTk0NjQxYzRiZTgzNjM2YmFiNTMxZDgyY2MwZGYzNzI2MWNlODEzNzJmNWM1NGRhNzQ0NGVmYzJiNjhjYzZhZg==';

    // The data to send to the API
    $postData = array(
        'source_addr' => 'INFO',
        'encoding'=>0,
        'schedule_time' => '',
        'message' => $message,
        'recipients' => [array('recipient_id' => '1','dest_addr'=>$receiver)]
        //,array('recipient_id' => '2','dest_addr'=>'255745854660')]
    );
    //.... Api url
    $Url ='https://apisms.bongolive.africa/v1/send';

    // Setup cURL
    $ch = curl_init($Url);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_HTTPHEADER => array(
            'Authorization:Basic ' . base64_encode("$api_key:$secret_key"),
            'Content-Type: application/json'
        ),
        CURLOPT_POSTFIELDS => json_encode($postData)
    ));

    // Send the request
    $response = curl_exec($ch);

    // Check for errors
    if($response === FALSE){
            echo $response;

        die(curl_error($ch));
    }

    //decoding the JSON string
    $result = json_decode($response, true);
    
    //output a human readable SMS summary
    //echo $result['message'] ." (error code #".$result['code'] .")";

    switch ($result['code']){
        case 100:
            echo "<b style='text-align:center; 
                    color:green'>The SMS was successfuly sent</b>";
        break;
        default:
            echo "<b style='text-align:center; color:red'>
            SMS couldn't be sent because ".$result['message'] ." (error code #".$result['code'] .")</b>";
    }

   

/*
 array(2) 
    { 
        ["code"]=> 
        int(115) 
        ["message"]=> string(30) "Destination Number is Missing" 
    }

Twilio sms api

    $receiver = $_POST["phoneNumber"];
    $message = $_POST["message"];
    require __DIR__ . '/vendor/autoload.php';
    use Twilio\Rest\Client;

    // Your Account SID and Auth Token from twilio.com/console
    $account_sid = 'ACe102fd6b84c5af362bf9c63e298b2bcc';
    $auth_token = '7758c62fcf18556a2c7830a14440db00';
    // In production, these should be environment variables. E.g.:
    // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

    // A Twilio number you own with SMS capabilities
    $twilio_number = "+15136665592";

    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        $receiver,
        array(
            'from' => $twilio_number,
            'body' => $message
        )
    );

YTk0NjQxYzRiZTgzNjM2YmFiNTMxZDgyY2MwZGYzNzI2MWNlODEzNzJmNWM1NGRhNzQ0NGVmYzJiNjhjYzZhZg==
*/

