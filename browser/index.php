<?php

if( isset($_GET['search']) ) {
    $search_term = urlencode($_GET['search']);
} else {
	echo 'no search';
    die();	
}

if( isset($_GET['api']) ) {
	$api = $_GET['api'];
} else {
	$api = 'spotify';
}

switch ($api) {
    case 'itunes':
        $url = 'https://itunes.apple.com/search?media=music&country=DE&limit=5&term='.urlencode($_GET['search']);
		
        $search_curl = curl_init();
        curl_setopt($search_curl, CURLOPT_URL, $url);
        curl_setopt($search_curl, CURLOPT_CUSTOMREQUEST, 'GET' );
        curl_setopt($search_curl, CURLOPT_RETURNTRANSFER, true);
		
		$response = curl_exec($search_curl);
        curl_close($search_curl);
		
        break;
    case 'spotify':
        require('getAPIToken.php');
        $url = 'https://api.spotify.com/v1/search?type=track%2Cartist&market=DE&limit=5&q='.urlencode($_GET['search']);

        $search_curl = curl_init();
        curl_setopt($search_curl, CURLOPT_URL, $url);
        curl_setopt($search_curl, CURLOPT_CUSTOMREQUEST, 'GET' );
        curl_setopt($search_curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($search_curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $spotify_token));

        $response = curl_exec($search_curl);
        curl_close($search_curl);

        break;
    default:
        exit('unknown api');
}

//$json = json_decode($response, true);
//var_dump($json);

// $resultCount = $json['resultCount'];
// $results = $json['results'];

// echo '<ul>';
// foreach ($results as $result) {
//     echo '<li>'.$result['trackCensoredName'].' - '.$result['artistName'].'</li>';
// }
// echo '</ul>';

?>
