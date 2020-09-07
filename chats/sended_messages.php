<?php
include_once '../reg_log/functions.php';
$to = $_POST['to'];
$from = $_SESSION['username'];
$connect = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");

$sql = "SELECT * FROM messages ORDER BY date_sended";
$output = '';
$result = mysqli_query($connect, $sql);
$rows = mysqli_num_rows($result);
if($rows > 0)  
{
    while($rows = mysqli_fetch_assoc($result))  
    {
    	if ($rows['from_user'] == $from && $rows['to_user'] == $to) {
    		$output .= '
    			<div class="message_from_me">
					<p class="from_me">'.$rows["message_text"].'</p>
					<p class="date_time from_me">'.$rows["date_sended"].'</p><hr>
				</div>';
    	}else if ($rows['from_user'] == $to && $rows['to_user'] == $from) {
    		$output .= '
    			<div class="message_to_me">
					<hr><p class="to_me">'.$rows["message_text"].'</p>
					<p class="date_time to_me">'.$rows["date_sended"].'</p><hr>
				</div>';
    	}
		// $output .= ''.(($rows['from_user'] == $from) ?
		//  		'<div class="message_from_me">
		// 			<p class="from_me">'.$rows["message_text"].'</p>
		// 			<p class="date_time to_me">'.$rows["date_sended"].'</p><hr>
		// 		</div>' 
		//  : ($rows["from_user"] == $to) ?
		// 		'<div class="message_to_me">
		// 			<hr><p class="to_me">'.$rows["message_text"].'</p>
		// 			<p class="date_time to_me">'.$rows["date_sended"].'</p><hr>
		// 		</div>'
		// 		 : '');
	}
}




echo $output;

?>