<?php
include_once 'reg_log/functions.php';
	if (!isset($_SESSION['username'])) {
		
		
	}else{
		$username = $_SESSION['username'];
        $conn = mysqli_connect("localhost:3306", "nairi_nairi", "Nairi.host2004", "nairi_link_shortener");
        
        $update = mysqli_query($conn, "UPDATE mes_users SET online_offline = '1' WHERE username = '$username' LIMIT 1");
        if ($update) {
        				
        }else{
        	echo $conn->error;
        }
// 		header('location: /messenger/index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Messenger</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">
	<script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-M9KW84"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <meta name="viewport" content="width=device-width">

</head>

<body class="text-center">
	<!-- header start -->

		<?php // include_once 'assets/contents/header.php'; ?>

	<!-- header end -->
	<!-- functions -->
	<reg_log_functions style='display: none;'>
		
	</reg_log_functions>
	<!-- functions end -->
	<div class="container" id="full">
		<div class="reg_log">
			<a href="reg_log/login.php">Login</a><hr>
			<a href="reg_log/register.php">Register</a>
		</div>
		<div class="out" style="display: none">
			<a href="reg_log/logout.php">Logout</a>
		</div>
		<?php
		if (isset($_SESSION['username'])) {
			echo "<h1>Welcome, ".ucwords($_SESSION['username'])."</h1><br>";
		}else{
			echo "<h1>Welcome, Guest</h1>";
		}
		?>
	</div>
	<?php
	if (isset($_SESSION['username'])) {
		?>
		<div id="users_container">
			
		</div>
		<div id="message_container">
			
			<div id="messages">
				<div id="user_info">
					<a href="/messenger"><img src="assets/img/back.ico" alt="" class="back"></a>
					<h4 class="user_name"><?php echo $_GET['message']; ?></h4>
				</div>
				<div id="sended_messages">
					<!-- <p class="to_me">barev</p>

					<p class="from_me">barev</p>
					<em class="from_me">2020-09-05 21:09:16</em>

					<p class="to_me">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<p class="from_me">barev</p>
					<em class="from_me">2020-09-05 21:09:16</em>

					<p class="to_me">barev</p>

					<p class="from_me">barev</p>
					<em class="from_me" style="font-size: 10px;">2020-09-05 21:09:16</em> -->

				</div>
				<!-- <div id="recived_messages">
					
				</div> -->
			</div>
			<div id="send_message">
				<input type="text" name="message" id="message" class="form-control col-sm-11" placeholder="Enter Your message">
				<input type="button" name="send_message" id="send" class="col-sm-1 form-control btn-primary" value="Send">
			</div>
		</div>
	<?php
		}
	?>
	<script type="text/javascript" src="assets/js/js.js"></script>
	<script>
	$(document).ready(function(){

    function fetch_data()  
    {  
        $.ajax({  
            url:"chats/select_users.php",  
            method:"POST",  
            success:function(data){  
				$('#users_container').html(data);  
            }  
        });  
    } 
    fetch_data();
    setInterval(function (){
    	fetch_data();
    },2000)

    function fetch_sended_messages()  
    {  
    	var to = $('.user_name').text()
        $.ajax({  
            url:"chats/sended_messages.php",  
            method:"POST",  
            data:{to:to},
            success:function(data){  
		$('#sended_messages').html(data);
            }  
        });  
    } 
    fetch_sended_messages();
    setInterval(function (){
    	fetch_sended_messages();
    },200)
    

    $(document).on('click', '#send', function send_message(){  
        var message = $('#message').val();  
        var to = $('.user_name').text()

        if(message == '')  
        {  
            alert("Please Enter message");  
            return false;  
        }  
        

        $.ajax({  
            url:"chats/send_message.php",  
            method:"POST",  
            data:{send_message:message, to:to},  
            dataType:"text",  
            success:function(data)  
            {  
            	$('#message').val('');

                // alert(data);
                // fetch_data();  
            }  
        })  
    }); 

	
    $('body').on('change', '#message', function () {
	if($('#message').val() == 0){

	    alert('barev')
	
	}

    })



    $(document).on('keypress',function(e) {
	    if(e.which == 13) {
	    	var message = $('#message').val();  
        	var to = $('.user_name').text()

	        if(message == '')  
	        {  
	            alert("Please Enter message");  
	            return false;  
	        }  
	        

	        $.ajax({  
	            url:"chats/send_message.php",  
	            method:"POST",  
	            data:{send_message:message, to:to},  
	            dataType:"text",  
	            success:function(data)  
	            {  
	            	$('#message').val('');
	                // alert(data);
	                // fetch_data();  
	            }  
	        })  
	    }
	});
    
    
	})
	</script>
</body>
</html>

<?php
if (isset($_SESSION['username'])) {
	?>
	<script>
		$('.reg_log').css('display', 'none');
		$('.out').css('display', 'block');
	</script>
	<?php
}

if (isset($_GET['message'])) {

		?>
		<script>
		    $('#users_container').css('display', 'none')
		    $('#message_container').css('display', 'block')
		</script>
		<?php
	}
?>
