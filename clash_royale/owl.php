<?php
require 'includes/database.php';

$conn = getDB();

// Retrieve all data from the database
$result = $conn->query("SELECT id, name, fullName, number, role, competitions, currentTeam FROM owl_summary");

// Display the data in a table
echo "<table>";
echo "<tr><th>Player ID</th><th>Player Name</th><th>Full Name</th><th>Number</th><th>Role</th><th>Competitions</th><th>Current Team</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["fullName"] . "</td>";
    echo "<td>" . $row["number"] . "</td>";
    echo "<td>" . $row["role"] . "</td>";
    echo "<td>" . $row["competitions"] . "</td>";
    echo "<td>" . $row["currentTeam"] . "</td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>
