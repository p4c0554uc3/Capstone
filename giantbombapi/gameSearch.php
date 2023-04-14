<?php

/* This form allows the user to search for a game using Giantbomb's
search index.  This allows the user to easily look for a game without 
modifying the files. */
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add a Game</title>
    <style>
        * { font-family: Helvetica, sans-serif; }
        .header {
            font-size: 40px;
            color: darkorange;
            text-align: center;
        }
        img {
            max-width: 600px;
            max-height: 400px;
        }
		.game-info {
            flex: 1;
            margin-right: 20px;
        }
		.container {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
        }

    </style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	    <h1 class="header">Game Search</h1>
	<title>Search for a Game</title>
	
</head>
<body>
	<form action="gameInfo.php" method="post">
		<label for="gameName">Game Name:</label>
		<input type="text" name="gameName" id="gameName">
		<input type="submit" value="Search">
	</form>
	<?php echo "<a href='../index.php'>Return to Homepage</a>"; ?>
</body>
</html>