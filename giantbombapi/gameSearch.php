<?php

/* This form allows the user to search for a game using Giantbomb's
search index.  This allows the user to easily look for a game without 
modifying the files. */
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Search for a Game</title>
</head>
<body>
	<form action="gameInfo.php" method="post">
		<label for="gameName">Game Name:</label>
		<input type="text" name="gameName" id="gameName">
		<input type="submit" value="Search">
	</form>
</body>
</html>