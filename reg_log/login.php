<?php
	include_once 'functions.php';
	if (isset($_SESSION['username'])) {
		header('location: /messenger/index.php');
	}else{

	}
?>
<head>
	<title>Messenger</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
	<script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-M9KW84"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

</head>

<body class="text-center">
	<br><hr>
	<h1 class="heading">Login</h1>
	<form action="functions.php" method="post">
		<div class="col-sm-6 container">
			<div class="form-group">
			  <label for="exampleInputEmail1">Username</label>
			  <input type="username" class="form-control" name="log_user" placeholder="Enter Your Username" id="exampleInputEmail1" aria-describedby="emailHelp">
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword1">Password</label>
			  <input type="password" name="log_pass" class="form-control" placeholder="Enter Your password" id="exampleInputPassword1">
			</div>
		</div>
		<input type="submit" value="Login" name="login" class="btn btn-primary">
	</form>
	<br><hr>
</body>