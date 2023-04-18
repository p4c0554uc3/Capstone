<?php
# Authentification to allow access to the API key as well as the cURL request.

/* The purpose of this file is to store authentication values, such as the API key
and cURL requests into one file, so they can be called through here instead of constant
declarations. */
$api_key = 'e858e4c0f3410c15f33b1d4b84a0c8d791b38eff';

/**
* Retrieve the cURL request using the URL.
*/
function makecURLrequest($url) {
// cURL GET request
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
// A user agent is mandatory or else the request gets blocked by the API host.
	"User-Agent: KyleDev/1.0",
    "Accept: application/json"
));
$response = curl_exec($ch);
curl_close($ch);

return $response; 
}


?>