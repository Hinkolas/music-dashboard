<?php

    $client_id = '771b5f3a5dd34749b4bbe37164588153';
    $client_secret = 'ae52bce703084833bf0db24f62caa6cd';

    $token_curl = curl_init();
    curl_setopt($token_curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
    curl_setopt($token_curl, CURLOPT_POST, 1);
    curl_setopt($token_curl, CURLOPT_POSTFIELDS, 'grant_type=client_credentials&client_id='.$client_id.'&client_secret='.$client_secret);
    curl_setopt($token_curl, CURLOPT_RETURNTRANSFER, 1);
        
    $response = json_decode(curl_exec($token_curl),true);
    curl_close($token_curl);

    $spotify_token = $response['access_token'];
    //echo $spotify_token;

?>  