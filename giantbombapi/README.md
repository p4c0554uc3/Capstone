Author: Kyle Osbourne

Project: Giantbomb API Video Game Retrieval

Purpose: This project retrieves information about video games from the Giantbomb API and stores it into a MySQL database. The PHP script gameSearch.php processes a search query entered by the user, retrieves the game information from the API, and inserts it into the database using the gameInfo.php file.

Files:
includes/auth.php: Used to hold authentication information in one file.

includes/database.php: Used to hold database information.

includes/localhostdatabase.php: Used to hold localhost database information.

gameInfo.php: Used to extract information about a video game and store it into a database, if there is a nonexistent value, the process is cancelled.

testdatabaseconn.php: Used to test the database connection.

persona5royal.php: Used to extract information about the video game "Persona 5 Royal", used for testing purposes.

gameSearch.php: Used to search for a video game using the Giantbomb API.

favoriteGames.php: Displays the list of games taken from the games database.  This is how the user will view the data they inserted.