<?php

$url = 'https://na.api.riotgames.com/val/ranked/v1/leaderboards/by-act/9c91a445-4f78-1baa-a3ea-8f8aadf4914d?size=200&startIndex=0&api_key=RGAPI-8ba9eb38-d51b-45cd-bf5e-7b58744d63b5';
  
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$response = json_decode($response, true);
curl_close($curl);

//var_dump($response);

//$dsn = 'mysql:host=localhost;dbname=valorant';
//$username = 'root';
//$password = '';
$db_host = "mysql:host=sql9.freemysqlhosting.net;dbname=sql9604955";
$db_user = "sql9604955";
$db_pass = "hXgfF5mzzg"; 

	/*try {
		$db = new PDO($db_host, $db_user, $db_pass);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		print($error_message);
		
		exit();
	}*/

$getInfo = $response['players'];

$gameName = [];

$tagLine = [];

$leaderboardRank = [];

$rankedRating = [];

$numberOfWins = [];

foreach($getInfo as $names){
	array_push($gameName, $names['gameName']);
}

foreach($getInfo as $tags){
	array_push($tagLine, $tags['tagLine']);
}

foreach($getInfo as $ranks){
	array_push($leaderboardRank, $ranks['leaderboardRank']);
}

foreach($getInfo as $rating){
	array_push($rankedRating, $rating['rankedRating']);
}

foreach($getInfo as $numWins){
	array_push($numberOfWins, $numWins['numberOfWins']);
}

for($i =0;$i<100; $i++){
	$insertName = $gameName[$i];
	$insertTag = $tagLine[$i];
	$insertRank = $leaderboardRank[$i];
	$insertRating = $rankedRating[$i];
	$insertWins = $numberOfWins[$i];
	//$query = "INSERT INTO `Valorant Leaderboards` (gameName, tagLine, leaderboardRank, rankedRating, numberOfWins) VALUES ('$insertName', '$insertTag', '$insertRank', '$insertRating', $insertWins)";
	
	//$db->exec($query);
}