<?php

require 'database.php';

//  My API endpoint for players with specific player tag for testing
//  # have to be encoded to %23 for URLs

$url = 'https://api.clashroyale.com/v1/players/%23';

$conn = getDB();

//  My API token

$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImEwNTE0OTY0LWJlYjktNGYxYi1iY2U1LTQ3OTliYjNhMTg0ZCIsImlhdCI6MTY4MDA0MTU4Mywic3ViIjoiZGV2ZWxvcGVyLzllYjdlOWE3LTBjOTQtNWY1ZS1kODQ3LTA2ZWMyZTA0NDQ2OSIsInNjb3BlcyI6WyJyb3lhbGUiXSwibGltaXRzIjpbeyJ0aWVyIjoiZGV2ZWxvcGVyL3NpbHZlciIsInR5cGUiOiJ0aHJvdHRsaW5nIn0seyJjaWRycyI6WyIxNTAuMjUwLjkwLjE0NyJdLCJ0eXBlIjoiY2xpZW50In1dfQ.tLrgfPEKC_r9rgUOj2ttVzKc0JKh5RijZb6r10xkUqiwADqHSsTTuXzj2_3_gIWcW8AZjUzkc15IZXmBIfqHSw';

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
// var_dump($data);

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

//  Insert into database
/*
$stmt = $conn->prepare("INSERT INTO clash_royale (player_tag, name, player_level, trophies, battle_count, wins, losses, clan_name) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $player_tag, $name, $player_level, $trophies, $battle_count, $wins, $losses, $clan_name);

$stmt->execute();
*/

?>