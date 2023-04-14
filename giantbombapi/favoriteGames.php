<?php
require 'includes/database.php';

// Retrieve the list of games from the database
$conn = getDB();
$sql = "SELECT name, release_date, platforms, developers, publishers, overview, genres, franchises, image_url FROM games";
$result = $conn->query($sql);
$games = array();
while ($row = $result->fetch_assoc()) {
    $games[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Favorite Games</title>
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
</head>
<body>
    <h1 class="header">Favorite Games</h1>
    <form method="get">
        <label for="gameSelect">Select a game:</label>
        <select id="gameSelect" name="gameSelect">
            <?php foreach ($games as $game) { ?>
                <option value="<?php echo $game['name']; ?>"><?php echo $game['name']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Submit">
    </form>
    <?php
    // If a game has been selected, display its information

    if (isset($_GET['gameSelect'])) {
        $selectedGame = $_GET['gameSelect'];
        foreach ($games as $game) {
            if ($game['name'] === $selectedGame) {
                echo "<div class='container'>";
                echo "<div class='game-info'>";
                echo "<h2>" . $game['name'] . "</h2>";
				$releaseDate = date("F jS, Y", strtotime($game['release_date']));
				echo "<p>Release Date: " . $releaseDate . "</p>";
                echo "<p>Platforms: " . $game['platforms'] . "</p>";
                echo "<p>Developers: " . $game['developers'] . "</p>";
                echo "<p>Publishers: " . $game['publishers'] . "</p>";
                echo "<p>Overview: " . $game['overview'] . "</p>";
                echo "<p>Genres: " . $game['genres'] . "</p>";
                echo "<p>Franchises: " . $game['franchises'] . "</p>";
				echo "<a href='../index.php'>Return to Homepage</a>";
                echo "</div>";
                echo "<img src='" . $game['image_url'] . "' alt='" . $game['name'] . " Box Art'>";
                echo "</div>";
            }
        }
    }
	else {
		if (count($games) == 0) {
        echo "No favorite games added. Please <a href='gameSearch.php'>add a game</a>.";
		}	    
	}
    ?>
</body>
</html>
