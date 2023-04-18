<?php
include 'Jolade_APIData.php';

$database = 'sql9604955'; 
$host = 'sql9.freemysqlhosting.net';

$mysqli = new mysqli($host, $db_user, $db_pass, $database);


if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

$sql = " SELECT * FROM valorant";
$result = $mysqli->query($sql);
$mysqli->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
			*{ font-family: Helvetica;}
			.header{
				color: darkorange;
				text-align: center;
				font-size: 40px;
				position: relative;
				left: 150px;
			}
			table, td, th{
				border: 1px solid black;
				font-weight: bold;
				color: white;
			}
			th{
				color: black;
			}
			table{
				position: relative;
				left: 750px;
			}
			body{
				background-image: url(ValorantWallpaper.jpg);
			}
		</style>
		<title>Capstone Stage 3</title>
	</head>
	
	<body>
		<h1 class = "header">Valorant API Data</h1>
		<table>
			<tr>
				<th>Valorant Agent</th>
				<th>Map</th>
				<th>Gun Skin</th>
				<th>Sprays</th>
			</tr>
			<?php
				while($rows=$result->fetch_assoc())
				{
			?>
			<tr>
				<td><?php echo $rows['agents'];?></td>
				<td><?php echo $rows['maps'];?></td>
				<td><?php echo $rows['skins'];?></td>
				<td><?php echo $rows['sprays'];?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>