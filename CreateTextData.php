<?php

include "ConnectDatabase.php"; // Set up database connection

// Insert some example rows into the table
$sql = "INSERT INTO posts (topic, msg)
        VALUES ('My first post', 'Hello world! This is my first post on the forum.'),
               ('Question about PHP', 'I am having trouble with a PHP script that I am working on. Can anyone help me?'),
               ('Favorite programming language', 'What is your favorite programming language and why?')";
if (mysqli_query($conn, $sql)) {
    echo "Rows inserted successfully\n";
} else {
    echo "Error inserting rows: " . mysqli_error($conn) . "\n";
}

?>