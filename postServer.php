<?php


// Set up database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "Forum_posts";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$id = 0;
$dateTime = date("Y-m-d H:i:s"); 
$newDateTime = new DateTime($dateTime); 
$newDateTime->setTimezone(new DateTimeZone("UTC")); 
$dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");
$name = "Anonymous";
$msg = $_POST["msg"];
$cmts = "cmts?";


// Insert data into database
$sql = "INSERT INTO posts (id, date, name, msg, cmts) VALUES ('$id', '$dateTime', '$name', '$msg', '$cmts')";

if (mysqli_query($conn, $sql)) {
	echo "Data inserted successfully";
    $status = "success";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    $status = "error";
}

// Close database connection
mysqli_close($conn);

// URL to continue to after interaction
$url = 'http://localhost/webDevMiniProject/forum.php';
$location = "Location: $url" . "?status=" . $status;

if ($postID != null) {
    $location = $location . "#" . $postID . "-anchor";
}

// Go to URL with status and anchor
header( $location );

?>