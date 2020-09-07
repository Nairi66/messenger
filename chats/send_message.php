<?php
include_once '../reg_log/functions.php';

$connect = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");
$to = $_POST['to'];
$from = $_SESSION['username'];
$message = $_POST['send_message'];

$sql = "INSERT INTO messages(from_user, to_user, message_text, date_sended) VALUES('$from', '$to', '$message', NOW())";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';   
}  
 ?>
