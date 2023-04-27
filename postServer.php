<?php

include "ConnectDatabase.php"; // Set up database connection

// Get form data
$id = 0;

$dateTime = date("Y-m-d H:i:s"); 
$newDateTime = new DateTime($dateTime); 
$newDateTime->setTimezone(new DateTimeZone("UTC")); 
$dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");

// Check topic
if (!isset($_POST["topic"])) die("Missing topic");
$topic = htmlspecialchars($_POST["topic"]);
if (strlen($topic) <= 0) die("Topic empty");

// Check msg
if (!isset($_POST["msg"])) die("Missing msg");
$msg = htmlspecialchars($_POST["msg"]);
if (strlen($msg) <= 0) die("Msg empty");


// Insert data into database
$sql = "INSERT INTO posts (id, post_date, topic, msg)
VALUES ('$id', '$dateTime', '$topic', '$msg')";

if (mysqli_query($conn, $sql)) {
	echo "Data inserted successfully";
    $status = "success";
} else {
    $errorStatus = mysqli_error($conn);
	echo "Error: " . $sql . "<br>" . $errorStatus;
    $status = $errorStatus;
}

// Close database connection
mysqli_close($conn);

// URL to continue to after interaction
$url = 'http://localhost/AnonymousPostingWebsite/forum.php';
$location = "Location: $url" . "?status=" . $status;

if ($postID != null) {
    $location = $location . "#" . $postID . "-anchor";
}

// Go to URL with status and anchor
header( $location );

?>