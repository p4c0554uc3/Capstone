<?php

require 'includes/database.php';

if (isset($_POST['player_tag'])) { 

    $player_tag = $_POST['player_tag'];
	
	$url = 'https://api.clashroyale.com/v1/players/%23' . urlencode($player_tag);

$conn = getDB();

//  My API token

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjUyNTQ3NDRjLTk5MjctNDJhOC05MzkwLWI2MTMwZDA3NzYxOCIsImlhdCI6MTY4MjAzMjc3OSwic3ViIjoiZGV2ZWxvcGVyLzllYjdlOWE3LTBjOTQtNWY1ZS1kODQ3LTA2ZWMyZTA0NDQ2OSIsInNjb3BlcyI6WyJyb3lhbGUiXSwibGltaXRzIjpbeyJ0aWVyIjoiZGV2ZWxvcGVyL3NpbHZlciIsInR5cGUiOiJ0aHJvdHRsaW5nIn0seyJjaWRycyI6WyIxNTAuMjUwLjkyLjIzMSJdLCJ0eXBlIjoiY2xpZW50In1dfQ.ZWBkfh1NHtiK4BEEPxjrshaZDojQczlP1firB9Yjskv0VKLD01JLzDxotX6K-A-PLZaOIvAzrCFcramPv4qrxQ';
//  cURL request

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer $token"
));
$response = curl_exec($ch);
curl_close($ch);

//  After closing curl request, I echo the JSON in pretty format to Web Page...

$data = json_decode($response, true);


$player_tag = $data["tag"];
$name = $data["name"];
$player_level = $data["expLevel"];
$trophies = $data["trophies"];
$battle_count = $data["battleCount"];
$wins = $data["wins"];
$losses = $data["losses"];
$clan_name = $data["clan"]["name"];

echo "Player Tag: {$player_tag}<br>";
echo "Player Name: {$name}<br>";
echo "Player Level: {$player_level}<br>";
echo "Trophies: {$trophies}<br>";
echo "Battle Count: {$battle_count}<br>";
echo "Wins: {$wins}<br>";
echo "Losses: {$losses}<br>";
echo "Clan Name: {$clan_name}<br>";

			echo $player_tag . " was found! ";
} else {
	echo "Unable to retrieve player information. (Does this player exist?)";
}
	/* Update these to reflect your correct hotlinks to return to your needed pages */
	echo "<br><br><a href='clashSearch.php'>Go back to search</a>";
	echo "<br><br><a href='index.php'>Return to Homepage</a>";
   
?>