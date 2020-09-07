<?php
	
	if (isset($_GET['verif_key'])) {
		$v_key = $_GET['verif_key'];
		$conn = mysqli_connect("localhost", "root", "", "messenger");
		$result = mysqli_query($conn, "SELECT status, verif_key FROM users WHERE status = 0 AND verif_key = '$v_key' LIMIT 1");

		if ($result->num_rows == 1) {
			$update = mysqli_query($conn, "UPDATE users SET status = 1 WHERE verif_key = '$v_key' LIMIT 1");
			if ($update) {
				echo "<center><h2 style='color: green'>Your account has been verified, you can now log in. Thank You.</h2></center>";
			}else{
				echo $conn->error;
			}
		}else{
			echo "<center><h2 style='color: red'>This account is invalid or already verificated.</h2></center>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>verify</title>
</head>
<body>

</body>
</html>