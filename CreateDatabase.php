<?php

if (!isset($conn)) {
    // Set up database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $conn = mysqli_connect($host, $user, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

$database = "forum_posts";

// Create the database if it doesn't already exist
$sql = "CREATE DATABASE IF NOT EXISTS " . $database;
if (mysqli_query($conn, $sql)) {
    //echo "Database created successfully\n";
} else {
    //echo "Error creating database: " . mysqli_error($conn) . "\n";
}

// Select the database
mysqli_select_db($conn, $database);

$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    topic VARCHAR(255) NOT NULL,
    msg TEXT NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    //echo "Table created successfully\n";
} else {
    //echo "Error creating table: " . mysqli_error($conn) . "\n";
}

?>