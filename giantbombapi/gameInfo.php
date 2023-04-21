<?php 
require 'includes/auth.php';
require 'includes/database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Game</title>
    <style>
        * { font-family: Helvetica, sans-serif; }
        .header {
            font-size: 40px;
            color: #000080;
			font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #d8e0e8;">
    <div class="header">
        Add Game
    </div>
<?php 
/*
# This webpage extracts information about a video game using the first search result on the
Giantbomb website with the Giantbomb API, storing it into the database.
# Authentication to the API key, cURL requests, and database connection are placed in separate files.
*/
// Checks for validation from the gameSearch form.
if (isset($_POST['gameName'])) {
	$gameName = $_POST['gameName'];
	
	// The URL is from the search results since the game page cannot be immediately accessed yet.
	$url = "https://www.giantbomb.com/api/search/?api_key=$api_key&format=json&resources=game&query=" . urlencode($gameName);
	
	// Make the API request to search for the game
	$response = makecURLrequest($url);
	$data = json_decode($response, true);
	
	// The first index of the search is taken as it would most likely be verbatim to the user's input.
	if (count($data['results']) > 0) {
		$gameID = $data['results'][0]['id'];
		// The URL variable is updated to reflect the game page, and a cURL request is executed again.
		$url =  "https://www.giantbomb.com/api/game/$gameID/?api_key=$api_key&format=json";

		$conn = getDB();

		$response = makecURLrequest($url);
		$data = json_decode($response, true);

		// Information for the game is retrieved from the API.
		$id = $data['results']['id'];
		$name = $data['results']['name'];
		$releaseDate = $data['results']['original_release_date'];

		// The overview for the game.
		$overview = $data['results']['deck'];

		// The platforms the game is on.
		$platforms = '';
		foreach ($data['results']['platforms'] as $platform) {
			$platforms .= $platform['name'] . ', ';
		}
		$platforms = rtrim($platforms, ', ');

		// The developers for the game.
		$developers = '';
		foreach ($data['results']['developers'] as $developer) {
			$developers .= $developer['name'] . ', ';
		}
		$developers = rtrim($developers, ', ');

		// The publishers for the game.
		$publishers = '';
		foreach ($data['results']['publishers'] as $publisher) {
			$publishers .= $publisher['name'] . ', ';
		}
		$publishers = rtrim($publishers, ', ');

		// The game's genre(s).
		$genres = '';
		foreach ($data['results']['genres'] as $genre) {
			$genres .= $genre['name'] . ', ';
		}
		$genres = rtrim($genres, ', ');

		// The franchises that the game is in.
		// If the game does not have a franchise, return N/A.
		$franchises = '';
		if (isset($data['results']['franchises'])){
		foreach ($data['results']['franchises'] as $franchise) {
			$franchises .= $franchise['name'] . ', ';
		}
		$franchises = rtrim($franchises, ', ');
		} else {
			$franchises = 'N/A';
			}
		$imageUrl = $data['results']['image']['original_url'];

		# The information from the API is inserted into the database.
		$stmt = $conn->prepare("INSERT INTO games (id, name, release_date, platforms, developers,
								publishers, overview, genres, franchises, image_url) 
								VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isssssssss", $id, $name, $releaseDate, $platforms, $developers, 
		$publishers, $overview, $genres, $franchises, $imageUrl);

		$stmt->execute();
			if ($franchises === 'N/A') {
			// Notice to the user if there's no franchise.
			echo "Notice: This game does not belong to any franchise.  It will appear as N/A." . "<br>";
		}
			echo $gameName . " successfully added to the favorite games list.";
			}else {
				// Display an error message to the user if no information was found for the game ID
				echo "Unable to retrieve game information. (Does the game exist?)";
			}
			
			echo "<br><br><a href='gameSearch.php'>Go back to search</a> or view your favorite games <a href='favoriteGames.php'>here</a>.";
			echo "<br><br><a href='../index.php'>Return to Homepage</a>";
		} 
?>
</body>
</html>
