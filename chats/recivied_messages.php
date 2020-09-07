<?php
include_once '../reg_log/functions.php';
$to = $_POST['to'];
$from = $_SESSION['username'];
$connect = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener"); 

$sql = "SELECT message_text FROM messages WHERE from_user = '$to' AND to_user = '$from' ORDER BY date_sended";
$output = ''; 
$result = mysqli_query($connect, $sql);
$rows = mysqli_num_rows($result);
if($rows > 0)  
{
    while($rows = mysqli_fetch_assoc($result))  
    {
		$output .= '
			<p class="to_me">'.$rows['message_text'].'</p>
		';
	}
}




echo $output;

?>