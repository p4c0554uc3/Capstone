<!DOCTYPE html>
<html>
<body style="background-color:orange;">

<h1>Apex Legends Stat Leader</h1>
<img src="apex.jpg" alt="Unlucky" width="500" height="400">
<style>
*{ font-family: Fantasy;}

	
</style>
<?php

require 'database.php';

# The API Key, user, and the platform they play on are split up.
$api_key = '053fa5a2-3abe-4cf2-bf30-4c793788a087';
$user = 'MoonPaku';
$platform = 'psn';

# The variables from earlier are included in the URL to create a valid URL.
$url = "https://public-api.tracker.gg/v2/apex/standard/profile/$platform/$user";
$conn = getDB();

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl,CURLOPT_HTTPHEADER, array(
# The API Key with TRN needs to be passed through the header in order to work
	'TRN-Api-Key: ' . $api_key
));

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);


# Parse the data from the endpoint to print out user information
$username = $data['data']['platformInfo']['platformUserHandle'];
$level = $data['data']['segments'][0]['stats']['level']['value'];
$kills = $data['data']['segments'][0]['stats']['kills']['value'];
//$killspm=$data['data']['segments'][0]['stats']['killsPerMatch']['value'];
$killsaslead=$data['data']['segments'][0]['stats']['killsAsKillLeader']['value'];
$damage = $data['data']['segments'][0]['stats']['damage']['value'];
$revives = $data['data']['segments'][0]['stats']['revives']['value'];
$matchesplayed = $data['data']['segments'][0]['stats']['matchesPlayed']['value'];




// Print the data to the screen
echo "<h2>{$username}</h2>";
echo "<p>Level: {$level}</p>";
echo "<p>Kills: {$kills}</p>";
//echo "<p>Kills Per Match:{$killspm}</p>";
echo "<p>Kills As Leader:{$killsaslead}</p>";
echo "<p>Damage: {$damage}</p>";
echo "<p>Revives: {$revives}</p>";
echo "<p>Matches Played: {$matchesplayed}</p>";
?>
</body>
</html>

