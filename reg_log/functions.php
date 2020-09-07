<?php

	// require_once '../index.php';
	session_start();
	$error = NULL;


	function user_exists($username, $email){
		global $error;
		// db connect
		$conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");

		// select users
		$query = "SELECT * FROM mes_users WHERE '$username' = username OR '$email' = email LIMIT 1";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result)>=1) {

		}else{
			return true;
		}
	}


	function insert_user($user, $email, $pswd, $v_key){
		global $error;
		$conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");
		
		$query = "INSERT INTO mes_users (username, email, password, verif_key, status, online_offline, date_added) VALUES ('$user', '$email', '$pswd', '$v_key', 0, '0', NOW())";
		$result = mysqli_query($conn, $query);

		if(strlen($conn->error) == 0){
			return true;
			// header('location: login.php');

		}else{
			echo 'Something went wrond, please try again later.';

		}
	}

	function register(){
		global $error;
		$conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");
		if (isset($_POST['register'])) {
			if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password1'])) {
				if ($_POST['password'] == $_POST['password1']) {
					$username = $_POST['username'];
					$password = $_POST['password'];
					$username = ucwords($username);
					$email = $_POST['email'];
					$v_key = hash("sha256", time().$username);

					$password = hash("sha256", $password);

					if (user_exists($username, $email)) {
							if (insert_user($username, $email, $password, $v_key)) {
							    header('location: /messenger/reg_log/thankyou.php');
								

							}else{
								echo'Something went wrong.';
							}


					}else{
						echo 'Username or email are already exists.';
					}
				}else{
					echo 'Two passwords are do not match.';
				}
			}else{
				echo 'Please fill in all the fields';
			}
		}
	}

	function login(){
		if (isset($_POST['login'])) {
			if (!empty($_POST['log_user']) && !empty($_POST['log_pass'])) {
					$log_user = $_POST['log_user'];
					$log_pass = $_POST['log_pass'];
					$log_pass = hash("sha256", $log_pass);
					if (user_exists($log_user, $log_user)) {
						echo 'This username is not registered yet.';
					}else{
						$conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");

						

						$query = "SELECT * FROM mes_users WHERE username = '$log_user' AND password = '$log_pass' LIMIT 1";

						$result = mysqli_query($conn, $query);

						if (mysqli_num_rows($result)>0) {
							
							$_SESSION['username'] = ucwords($log_user);
							header('location: /messenger');
							echo "You have logged in";
							$update = mysqli_query($conn, "UPDATE mes_users SET online_offline = '1' WHERE username = 'ucwords($log_user)' LIMIT 1");
							if ($update) {
								
							}else{
								echo $conn->error;
							}
							header('location: /messenger/');
						}else{
							echo "Password is incorrect.";
						}

					}

			}else{
				echo 'Please fill in all the fields';
			}
		}
	}

	register();
	login();
?>