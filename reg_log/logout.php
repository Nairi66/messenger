<?php
include_once 'functions.php';
$username = $_SESSION['username'];
$conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");

$update = mysqli_query($conn, "UPDATE mes_users SET online_offline = '0' WHERE username = '$username' LIMIT 1");
if ($update) {
				
}else{
	echo $conn->error;
}

session_destroy();
unset($_SESSION['username']);
header('location: /messenger');



?>
