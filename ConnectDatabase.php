<?php

// Set up database connection
$host = "localhost";
$user = "root";
$password = "";
$conn = mysqli_connect($host, $user, $password);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

include "CreateDatabase.php";

?>