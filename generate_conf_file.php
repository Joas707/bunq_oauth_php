<?php
session_start();
$configs = include('config.php');
use bunq\Context\ApiContext;
//use bunq\Context\BunqContext;
use bunq\Util\BunqEnumApiEnvironmentType;
require_once __DIR__ . '/vendor/autoload.php';

//check if the access token is saved by get_api_token.php and if it isn't then show an error.
if(!isset($_SESSION['access_token'])){
  echo "The access token isn't set.";
  exit();
}

//if the access token is saved ask for a device description
if(!isset($_POST['description'])){
echo "<html>
<body>

<form method=\"post\">
Device description: <input type=\"text\" name=\"description\"><br>
<input type=\"submit\">
</form>

</body>
</html>
";
}else{
//make the configuration file according to the readme of bunq
$environmentType = BunqEnumApiEnvironmentType::PRODUCTION(); // Can also be BunqEnumApiEnvironmentType::PRODUCTION();
$apiKey = $_SESSION['access_token']; // Replace with your API key
$deviceDescription = $_POST['description']; // Replace with your device description
$permittedIps = []; // List the real expected IPs of this device or leave empty to use the current IP

$apiContext = ApiContext::create(
    $environmentType,
    $apiKey,
    $deviceDescription,
    $permittedIps
);

//for safety reasons; this program will never try to make a conf file with the same access token twice
unset($_SESSION['access_token']);

//BunqContext::loadApiContext($apiContext);

$fileName = ''. $configs['filepath_for_bunqConf.conf'] .'/bunqConf.conf'; // Replace with your own secure location to store the API context details
$apiContext->save($fileName);
echo "Your configuration file is saved. For security reasons it is not shown where.";
}
