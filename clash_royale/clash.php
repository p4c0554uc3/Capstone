<?php

require 'includes/database.php';
$conn = getDB();
// Retrieve all data from the database
$result = $conn->query("SELECT * FROM clash_royale");

// Display the data in a table
echo "<table>";
echo "<tr><th>Player Tag</th><th>Name</th><th>Player Level</th><th>Trophies</th><th>Battle Count</th><th>Wins</th><th>Losses</th><th>Clan Name</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["player_tag"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["player_level"] . "</td>";
    echo "<td>" . $row["trophies"] . "</td>";
    echo "<td>" . $row["battle_count"] . "</td>";
    echo "<td>" . $row["wins"] . "</td>";
    echo "<td>" . $row["losses"] . "</td>";
    echo "<td>" . $row["clan_name"] . "</td>";
    echo "</tr>";
}

echo "</table>";

?>
