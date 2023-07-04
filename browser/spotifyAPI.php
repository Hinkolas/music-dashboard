<?php

	require('getAPIToken.php');
	$url = 'https://api.spotify.com/v1/search?type=track%2Cartist&market=DE&limit=5&q='.urlencode($_GET['search']);

	$search_curl = curl_init();
	curl_setopt($search_curl, CURLOPT_URL, $url);
	curl_setopt($search_curl, CURLOPT_CUSTOMREQUEST, 'GET' );
	curl_setopt($search_curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($search_curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $spotify_token));

	$response = curl_exec($search_curl);
	curl_close($search_curl);

?>