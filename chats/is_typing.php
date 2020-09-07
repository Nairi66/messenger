<?php
include_once '../reg_log/functions.php';
$from = $_SESSION["username"];
$to = $_POST["to"];

$conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");

$update = mysqli_query($conn, "UPDATE messages SET is_typing = '1' WHERE from_user = '$from' AND to_user = '$to'");
if ($update) {

}else{
        echo $conn->error;
}



?>
