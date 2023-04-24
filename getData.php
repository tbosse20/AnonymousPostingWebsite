<?php

// Set up database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "forum_posts";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from database
$sql = "SELECT * FROM posts";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
	echo json_encode($data, JSON_PRETTY_PRINT);
} else {
	echo "No data found";
}

// Close database connection
mysqli_close($conn);

?>