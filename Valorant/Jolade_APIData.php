<?php

$url = 'https://na.api.riotgames.com/val/content/v1/contents?api_key=RGAPI-318f260f-b696-46dc-8226-a75d4e152871';
  
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

	try {
		$db = new PDO($db_host, $db_user, $db_pass);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		print($error_message);
		
		exit();
	}

$getAgent = $response['characters'];
$agent = [];

$getMap = $response['maps'];
$map = [];

$getSkin = $response['chromas'];
$skin = [];

$getSpray = $response['sprays'];
$spray = [];

foreach($getAgent as $names){
	array_push($agent, $names['name']);
}

foreach($getMap as $maps){
	array_push($map, $maps['name']);
}

foreach($getSkin as $skins){
	array_push($skin, $skins['name']);
}

foreach($getSpray as $sprays){
	array_push($spray, $sprays['name']);
}

for($i =0;$i<11; $i++){
	$insertAgent = $agent[$i];
	$insertMap = $map[$i];
	$insertSkin = $skin[$i];
	$insertSpray = $spray[$i];
	//$query = "INSERT INTO valorant (agents, maps, skins, sprays) VALUES ('$insertAgent', '$insertMap', '$insertSkin', '$insertSpray')";
	
	//$db->exec($query);
}