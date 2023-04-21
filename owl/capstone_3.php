<?php

require 'database.php';
require 'auth.php';
?>
<!DOCTYPE html>
<html>
<head>
 <title>Clash Royale Player Information</title>
    <style>
        * { font-family: Helvetica, sans-serif; }
        .header {
            font-size: 40px;
            color: #000080;
            text-align: center;
        }
        img {
            max-width: 600px;
            max-height: 400px;
        }
		body {
		  background-color: #d8e0e8;
		}
		table, td, th{
			border: 1px solid black;
			font-weight: bold;
			color: #000080;
			}
		

    </style>
</head>
<body>
    <h1 class="header">Overwatch League Rankings</h1>
<?php
$url = "https://us.api.blizzard.com/owl/v1/owl2?access_token=USmWZNNLxS8RnI8nJvG7m33HM0l77iyE84";
$conn = getDB();

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $access_token,
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);
$data = json_decode($response, true);
 foreach ($data['players'] as $player) {
      $name = $player['name'];
      $competitions = implode(', ', $player['competitions']);
      $teamId = $player['currentTeam'];
	  $id = $player['id'];
	  $fullName = $player['givenName'] . " " . $player['familyName'];
	  $currentTeam = $player['currentTeam'];
	  $role = $player['role'];
	  $number = $player['number'];

      echo "<table>";
    echo "<tr><th>ID</th><td>" . $id . "</td></tr>";
    echo "<tr><th>Name</th><td>" . $name . "</td></tr>";
    echo "<tr><th>Full Name</th><td>" . $fullName . "</td></tr>";
    echo "<tr><th>Number</th><td>" . $number . "</td></tr>";
    echo "<tr><th>Role</th><td>" . $role . "</td></tr>";
    echo "<tr><th>Competitions</th><td>" . $competitions . "</td></tr>";
    echo "<tr><th>Current Team</th><td>" . $currentTeam . "</td></tr>";
    echo "</table>";
	  
	$stmt = $conn->prepare("INSERT INTO owl_summary (id, name, fullName, number, role,
						competitions, currentTeam) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $id, $name, $fullName, $number, $role, $competitions, $currentTeam);
$stmt->execute();
    }

?>
</body>
</html>