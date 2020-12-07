<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "isaackuhlmann", "ooK3doYi", "isaackuhlmann");

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT * FROM Users";

if($result = $mysqli->query($query)) {
	$display = "";
	while($row = $result->fetch_assoc()) {
		$display = $display . "<tr><td>" . $row["user_id"] . "</td></tr>";
	}

	echo "<table><tr><th>Users</th></tr>" . $display . "</table>";
	$result->free();
}

$mysqli->close();

?>
