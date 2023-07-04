<?php

	$url = 'https://itunes.apple.com/search?media=music&country=DE&limit=5&term='.$search_term;
		
	$search_curl = curl_init();
	curl_setopt($search_curl, CURLOPT_URL, $url);
	curl_setopt($search_curl, CURLOPT_CUSTOMREQUEST, 'GET' );
	curl_setopt($search_curl, CURLOPT_RETURNTRANSFER, true);
		
	$response = curl_exec($search_curl);
	curl_close($search_curl);

?>