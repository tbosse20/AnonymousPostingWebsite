<?php

include "ConnectDatabase.php"; // Set up database connection

// Retrieve data from database
$sql = "SELECT * FROM posts ORDER BY post_date DESC";
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