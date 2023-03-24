<?php

/* https://www.geeksforgeeks.org/how-to-append-data-in-json-file-through-html-form-using-php/ */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    function get_data($file_name) {

		if (file_exists("$file_name")) {
			$current_data=file_get_contents("$file_name");
			$array_data=json_decode($current_data, true);
							
			$extra=array(
                "id"        => 0,
                "user"      => "Anonymous",
                "msg"       => $_POST["msg"],
                "dateStamp" => 0,
                "likes"     => 0
			);
			$array_data[]=$extra;
			echo "file exist<br/>";
			return json_encode($array_data);
		} else {
			$datae=array();
			$datae[]=array(
                "id"        => 0,
                "user"      => "Anonymous",
                "msg"       => $_POST["msg"],
                "dateStamp" => 0,
                "likes"     => 0
			);
			echo "file not exist<br/>";
			return json_encode($datae);
		}
    }

	$file_name = 'forum'. '.json';

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
