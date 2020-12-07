<?php
error_reporting(E_ALL);
ini_set("display_erros", 1);

$user_id = $_POST["user"];
$content = $_POST["content"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "isaackuhlmann", "ooK3doYi", "isaackuhlmann");

if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit();
}

if($content == "") {
	echo "<h2>Post cannot be blank</h2>";
}
else{
	$findUser = "SELECT * FROM Users;";
	$found = false;
	if($userResult = $mysqli->query($findUser)) {
		while($row = $userResult->fetch_assoc()) {
			if($row["user_id"] == $user_id) {
		                $createPost = "INSERT INTO Posts (content, author_id) VALUES ('" . $content . "', '" . $user_id . "');";
	                	if($mysqli->query($createPost)) {
        	                	echo "<h2>Post added to database!</h2>";
                		}
                		else{
                        		echo "<h2>Unable to add post</h2>";
				}
				$found = true;
			}
		}
		$userResult->free();
	}	

	if($found == false) {
		echo "<h2>User does not exist</h2>";
	}	
}
?>
