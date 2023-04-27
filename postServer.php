<?php

include "ConnectDatabase.php"; // Set up database connection

// Get form data
$id = 0;

// Check topic
if (!isset($_POST["topic"])) die("Missing topic");
$topic = htmlspecialchars($_POST["topic"]);
if (strlen($topic) <= 0) die("Topic empty");

// Check msg
if (!isset($_POST["msg"])) die("Missing msg");
$msg = htmlspecialchars($_POST["msg"]);
if (strlen($msg) <= 0) die("Msg empty");

// Insert data into database
$sql = "INSERT INTO posts (id, topic, msg)
VALUES ('$id', '$topic', '$msg')";

if (mysqli_query($conn, $sql)) {
    echo "Post successfull!";
} else {
    echo "Post error: " . $sql . "<br>" . $mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);

?>