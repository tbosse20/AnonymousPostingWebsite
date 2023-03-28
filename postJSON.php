<?php

/* https://www.geeksforgeeks.org/how-to-append-data-in-json-file-through-html-form-using-php/ */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $postID = $_POST["id"];

    function get_data($file_name, $postID) {


		if (file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
            echo "file exist<br/>";
            
		} else {
			$array_data=array();
            echo "file not exist<br/>";

        }
        
        $action = $_POST["action"];
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
            
            $array_data[$postID]["comments"][] = $comment;
            
        } else if ($action == "Like") {

        }

        return json_encode($array_data, JSON_PRETTY_PRINT);
		
    }

	$file_name = 'forum.json';

    if (file_put_contents("$file_name", get_data($file_name, $postID))) {
		echo 'success';
        $status = "success";
	} else {
		echo 'There is some error';	
        $status = "error";
	}

    ob_start(); // ensures anything dumped out will be caught

    $url = 'http://localhost/webDevMiniProject/forum.php';

    echo $postID;
    header( "Location: $url" . "?status=" . $status . "#" . $postID . "-anchor");
}
	
?>
