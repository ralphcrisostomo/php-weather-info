<?php
header("Content-Type: text/xml");
$ch = curl_init();
$timeout = 30;
$userAgent = $_SERVER['HTTP_USER_AGENT'];
 
$url = $_REQUEST['url'];
$place = $_REQUEST['place'];
 
$fullGoogleWeatherPath = $url . $place;
 
curl_setopt($ch, CURLOPT_URL,$fullGoogleWeatherPath);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
 
$response = curl_exec($ch);
 
if (curl_errno($ch)) {
    echo curl_error($ch);
} else {
    curl_close($ch);
    echo $response;
}
?>