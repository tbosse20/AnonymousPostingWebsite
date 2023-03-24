<?php 
$servername="localhost";
$dbname="mysql";
$username="root";
$password="";

try {
    $conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "success";
} catch(PDOException $e) {
    echo "error".$e->getMessage();
}

$id=0;
$user="awd";
$msg=$_POST["msg"];
$dateStamp=0;
$likes=0;

$sql="INSERT INTO test (id, user, msg, dateStamp, likes) VALUES ('$id','$user','$msg','$dateStamp','$likes')";
$conn->exec($sql);

$data['message']="success";
$data['status']="ok";

echo json_encode($data);

?>