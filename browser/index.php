<?php

// $payload = [
//     "term" => "Bohemian+Rhapsody",
//     "media" => "music",
//     "limit" => "5"
// ];

// $options = [
//     "http" => [
//         "method" => "GET",
//         "header" => "Content-type: application/json; charset=UTF-8",
//         "content" => $payload
//     ]
// ];

// $context = stream_context_create($options);

// $data = file_get_contents("https://itunes.apple.com/search", false, $context);

// // ?term=Bohemian+Rhapsody&media=music&limit=5

// var_dump($data);


$url = "https://itunes.apple.com/search?term=Bohemian+Rhapsody&media=music&limit=5";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);
curl_close($curl);
//print_r($response);

header("Content-type: application/json; charset=UTF-8");
echo $response;

?>