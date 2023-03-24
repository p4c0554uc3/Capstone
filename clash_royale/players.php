<?php

require 'includes/database.php';

//  My API endpoint for payers with specific player tag for testing
//  # have to be encoded to %23 for URLs

$url = 'https://api.clashroyale.com/v1/players/%238YJJVJGJ';

$conn = getDB();

//  My API token

$token = '';
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

//  Insert into database

$stmt = $conn->prepare("INSERT INTO players (player_tag, name, player_level, trophies, battle_count, wins, losses, clan_name) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $player_tag, $name, $player_level, $trophies, $battle_count, $wins, $losses, $clan_name);

$stmt->execute();

?>
