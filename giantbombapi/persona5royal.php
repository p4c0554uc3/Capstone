<?php 
require 'includes/auth.php';
require 'includes/database.php';

# This webpage retrieves information about a video game using it's ID as well as
# prints it out on a webpage.
# Authentication to the API key, cURL requests, and database connection are placed in separate files.
# The video game I used to demonstrate this operation is Persona 5 Royal.

/* The purpose of this file is to demonstrate the functionality of the program, as well as what
values will be inserted into the database. */

// API Endpoint
$gameID = '3030-72602';
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
$franchises = '';
foreach ($data['results']['franchises'] as $franchise) {
    $franchises .= $franchise['name'] . ', ';
}
$franchises = rtrim($franchises, ', ');

$imageUrl = $data['results']['image']['original_url'];

# The information from the API is inserted into the database.
$stmt = $conn->prepare("INSERT INTO games (id, name, release_date, platforms, developers,
						publishers, overview, genres, franchises, image_url) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssssss", $id, $name, $releaseDate, $platforms, $developers, 
$publishers, $overview, $genres, $franchises, $imageUrl);

$stmt->execute();

/* Display the information about the game. */
echo "ID: {$id}<br>";
echo "Name: {$name}<br>";
echo "Release Date: {$releaseDate}<br>";
echo "Platforms: {$platforms}<br>";
echo "Developers: {$developers}<br>";
echo "Publishers: {$publishers}<br>";
echo "Overview: {$overview}<br>";
echo "Genres: {$genres}<br>";
echo "Franchise(s): {$franchises}<br>";
echo "<img src='$imageUrl'>";

?>