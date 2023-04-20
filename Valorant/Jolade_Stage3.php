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

$sql = " SELECT * FROM `Valorant Leaderboards`";
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
				left: 50px;
			}
			table, td, th{
				border: 1px solid black;
				font-weight: bold;
				color: black;
			}
			th{
				color: black;
			}
			table{
				position: relative;
				left: 50px;
			}
			#home{
				font-family: Helvetica;
				text-align: center;
				font-size: 20px;
				position: relative;
				left: 50px;
				bottom: 30px;
			}
			#wallpaper{
				position: absolute;
				left: 600px;
				top: 75px;
			}
			#table-wrap{
				position: relative;
				
			}
			#table-scroll{
				position: relative;
				height:510px;
				overflow:auto;
				right: 0;
			}
			#table-scroll, table {
				
			}
			#table-wrap, table, th, td{
				
			}
		</style>
		<title>Valorant Leaderboards</title>
	</head>
	
	<body>
		<h1 class = "header">Valorant Top 100 NA</h1>
		<br></br>
		<a id="home" href="../index.php">Return to home page</a>
		<img id="wallpaper" src="ValLogo.jpg" alt="Valorant Agents Image" style="width:722.5px;height:540px;">
		<div id="table-wrap">
			<div id="table-scroll">
				<table>
					<tr>
						<th>Player Name</th>
						<th>Rank</th>
						<th>Ranked Rating (RR)</th>
						<th>Wins</th>
					</tr>
					<?php
						while($rows=$result->fetch_assoc())
						{
					?>
					<tr>
						<td><?php echo $rows['gameName'] . "#" . $rows['tagLine'];?></td>
						<td><?php echo $rows['leaderboardRank'];?></td>
						<td><?php echo $rows['rankedRating'];?></td>
						<td><?php echo $rows['numberOfWins'];?></td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>