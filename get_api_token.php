<?php
session_start();
$configs = include('config.php');
$bunqcode = $_GET['code'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.oauth.bunq.com/v1/token?grant_type=authorization_code&code=". $bunqcode ."&redirect_uri=". $configs['redirect_url_for_api_token'] ."&client_id=". $configs['client_id'] ."&client_secret=". $configs['client_secret'] ."");
curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );
//curl_setopt($ch, CURLOPT_POSTFIELDS,
//            "");

// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close ($ch);
$server_output_readable = json_decode($server_output);
$apikey = $server_output_readable->access_token;
if($apikey != NULL){
  $_SESSION['access_token'] = $server_output_readable->access_token;
  header("location: /generate_conf_file.php");
}else{
  echo "The api key isn't set when asked to bunq. Try again or check the get_api_token.php file to find out why you get this error.";
}
