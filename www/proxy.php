<?php
$address = $_GET['address'];
$url = $address . json_decode($_GET['path'])[0];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $url;
echo $response;