<?php
$user_id = $_POST["user"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "isaackuhlmann", "ooK3doYi", "isaackuhlmann");
echo $user_id;
if($mysqli->connect_errno) {
	printf("Failed to Connect: %s\n", $mysqli->connect_error);
	exit();
}

if($user_id == ""){
	echo "<h2>Cannot create blank user</h2>";
}

else {
	$query = "INSERT INTO Users (user_id) VALUES ('" . $user_id . "');";
	if($result = $mysqli->query($query)) {
		echo "<h2>User " . $user_id . " Created!</h2>";
	}
	else {
		echo "<h2>Unable to create " . $user_id . " because it already exists</h2>";
	}
}

$mysqli->close();

?>
