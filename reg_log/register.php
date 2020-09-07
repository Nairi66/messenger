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
	<h1 class="heading">Registration</h1>
	<form action="functions.php" method="post">
		<div class="col-sm-6 container">
			<div class="form-group">
				<label for="username">Username</label>
				<input class="form-control" id="username" name="username" placeholder="Enter username."></input>
			</div>
			<div class="form-group">
			  <label for="email">Email address</label>
			  <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email." aria-describedby="emailHelp">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" placeholder="Enter password" id="password">
			</div>
			<div class="form-group">
				<label for="password1">Re-Password</label>
				<input type="password" class="form-control" name="password1" placeholder="Enter password" placeholder="Re-type password" id="password1">
			</div>
		</div>
		<input type="submit" id="register" name="register" value="Register" class="btn btn-primary">
	</form>
	<br><hr>
</body>