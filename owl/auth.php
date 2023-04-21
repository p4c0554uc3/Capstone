<?php 


$url = 'https://us.battle.net/oauth/token';
$client_id = 'd6bc5726d4dc43ddb628f33cdc9a783a';
$client_secret = 'wxyEnZ8AFGxRY5hGQ49dPmQcbiwuOB0t';


$data = array(
    'grant_type' => 'client_credentials',
    'client_id' => $client_id,
    'client_secret' => $client_secret,
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$access_token = json_decode($response, true)['access_token'];

?>