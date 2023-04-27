<?php

/* https://www.geeksforgeeks.org/how-to-append-data-in-json-file-through-html-form-using-php/ */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function get_data($file_name, $postID) {
        
        $array_data; // Declare array data

        $dateTime = date("Y-m-d H:i:s"); 
        $newDateTime = new DateTime($dateTime); 
        $newDateTime->setTimezone(new DateTimeZone("UTC")); 
        $dateTimeUTC = $newDateTime->format("Y-m-d H:i:s");

        // Get JSON file
		if (file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
            echo "file exist<br/>";
        
        // Create JSON file
		} else {
			$array_data=array();
            echo "file not exist<br/>";
        }
        
        $action = $_POST["action"]; // Get selected action
        if ($action == "Post") {
            
            // Check msg 
            if (!isset($_POST["msg"])) die("Missing msg");
            $msg = $_POST["msg"]; 
            if (strlen($msg) <= 0) die("Msg empty");
            
            // Create new post
            $post=array(
                "id"        => count($array_data),
                "user"      => "Anonymous",
                "msg"       => $msg,
                "dateStamp" => $dateTimeUTC,
                "likes"     => 0,
                "comments"  => array(),
            );
            $array_data[] = $post;

        // Comment on excisting post
        } else if ($action == "Comment") {

            // Check comment message
            if (!isset($_POST["cmt-msg"])) die("Missing cmt");
            $cmt = $_POST["cmt-msg"];
            if (strlen($cmt) <= 0) die("Cmt empty");
            
            // Create comment
            $packedCmt = array(
                "cmt-msg"   => $cmt,
                "dateStamp" => $dateTimeUTC,
            );
            echo $array_data;
            
            // Append comment to post
            $array_data[$postID]["comments"][] = $packedCmt;
        
        }

        // Return JSON file
        return json_encode($array_data, JSON_PRETTY_PRINT);
		
    }

	$file_name = 'forum.json'; // JSON file name
    $postID = $_POST["id"]; // Post ID

    // Confirm post success
    if (file_put_contents("$file_name", get_data($file_name, $postID))) {
		echo 'success';
        $status = "success";
	} else {
		echo 'There is some error';	
        $status = "error";
	}

    ob_start(); // Ensures anything dumped out will be caught

    // URL to continue to after interaction
    $url = 'http://localhost/AnonymousPostingWebsite/forum.php';

    echo $postID; // Write post ID

    // Go to URL with status and anchor
    header( "Location: $url" . "?status=" . $status . "#" . $postID . "-anchor");
}
	
?>
