<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Database connection

$conn = new mysqli('localhost','root','','depart');
if($conn->connect_error)
{
  die("Connection failed: ".$conn->connect_error);
}
else{
  $stmt = $conn->prepare("insert into feedb(name, email, subject, message) values(?,?,?,?)");
  $stmt -> bind_param("ssss",$name,$email,$subject,$message);
  $stmt -> execute();
  echo "Feedback updated succeessfully........";
  $stmt->close();
  $conn->close();
}
?>