<?php
    require 'includes/header.php'; 
?>
<!DOCTYPE html>
<html>
	<head>
		<style>
		*{ font-family: Helvetica;}
		
		header{
			text-align: center;
			position: relative;
			color: black;
		}
		
		body{
			background-image: url("includes/IndexBackground.jpg");
			font-weight: bold;
		}
		
		a:visited {
			text-decoration: none;
			color: black;
		}
		</style>
	</head>
	
	<body>
		<br><br>
		<br><br><a href="clash_royale/clash.php">Clash Royale API Data</a>
		<br><br><a href="giantbombapi/gameSearch.php">Giantbomb API Add Game</a>
		<br><br><a href="giantbombapi/favoriteGames.php">Giantbomb API Favorite Games List</a>
		<br><br><a href="Valorant/Jolade_Stage3.php">Top 100 Valorant NA</a>
		<br><br><a href="Apex/capstoneseverstyle.php">Apex API Data</a>
		<br><br><a href="owl.php">Overwatch League API Data</a>
	</body>
</html>
 <?php 
    require 'includes/footer.php'; 
?>
