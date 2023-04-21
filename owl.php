<?php
require 'includes/database.php';
?>

<!DOCTYPE html>
<html>
<head>
	    <title>Overwatch League Top 100</title>
    <style>
        * { font-family: Helvetica, sans-serif; }
        .header {
            font-size: 40px;
            color: #000080;
            text-align: center;
        }
        img {
            max-width: 600px;
            max-height: 400px;
        }
		body {
		  background-color: #d8e0e8;
		}
		table, td, th{
			border: 1px solid black;
			font-weight: bold;
			color: #000080;
			}
		

    </style>
</head>
<body>
    <h1 class="header">Overwatch League Rankings</h1>
<?php
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
</body>
</html>
