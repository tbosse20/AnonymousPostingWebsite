<?php

/* https://www.geeksforgeeks.org/how-to-append-data-in-json-file-through-html-form-using-php/ */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function get_data($file_name) {

        $action = $_POST["action"];

		if (file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
            echo "file exist<br/>";
            
		} else {
			$array_data=array();
            echo "file not exist<br/>";

        }

        if ($action == "Post") {
            $extra=array(
                "id"        => count($array_data),
                "user"      => "Anonymous",
                "msg"       => $_POST["msg"],
                "dateStamp" => time(),
                "likes"     => 0,
                "comments"  => array(),
            );
            $array_data[] = $extra;

        } else if ($action == "Comment") {
            $comment = $_POST["cmt-msg"];
            $postID = $_POST["id"];
            
            $array_data[$postID]["comments"][] = $comment;
            
        } else if ($action == "Like") {

        }

        return json_encode($array_data, JSON_PRETTY_PRINT);
		
    }

	$file_name = 'forum.json';

    if (file_put_contents("$file_name", get_data($file_name))) {
		echo 'success';
        $status = "success";
	} else {
		echo 'There is some error';	
        $status = "error";
	}

    ob_start(); // ensures anything dumped out will be caught

    // do stuff here
    $url = 'http://localhost/webDevMiniProject/forum.php'; // this can be set based on whatever

    // no redirect
    header( "Location: $url" . "?status=" . $status);
}
	
?>
