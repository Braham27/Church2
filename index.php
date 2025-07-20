<!-- <?php include 'admin/includes/db.php' ?>

<!DOCTYPE html>
<html>
<head>
<title>ADMIN LOGIN</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Slide Login Form template Responsive, Login form web template, Flat Pricing tables, Flat Drop downs Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	 <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
	</script>
	
	<script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

	<!-- Custom Theme files -->
	<link href="login/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="login/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->

	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
	<!-- //web font -->

</head>
<body>

<!-- main -->
<div class="main"> 
	<div class="bg-layer">
			<h1>NSEMC</h1>
		<div class="header-main">
			<div class="main-icon">
				<img src="login/images/cross.png" alt="">
			</div>

			<div class="header-left-bottom">
				<form action="#" method="post">
					<div class="icon1">
						<span class="fa fa-user"></span>
						<input type="email" placeholder="Email Address" name="email">
					</div>
					<div class="icon1">
						<span class="fa fa-lock"></span>
						<input type="password" placeholder="Password" name="password">
					</div>
					<div class="login-check">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
					</div>
					<div class="bottom">
						<button class="btn" name='signin'>Log In</button>
					</div>
					<!-- <div class="links">
						<p><a href="#">Forgot Password?</a></p>
						<p class="right"><a href="#">New User? Register</a></p>
						<div class="clear"></div>
					</div> -->
				</form>	
			</div>

			<!-- <div class="social">
				<ul>
					<li>or login using : </li>
					<li><a href="#" class="facebook"><span class="fa fa-facebook"></span></a></li>
					<li><a href="#" class="twitter"><span class="fa fa-twitter"></span></a></li>
					<li><a href="#" class="google"><span class="fa fa-google-plus"></span></a></li>
				</ul>
			</div> -->

			<?php
if(isset($_POST['signin'])){
	$signin = $_POST['signin'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	$search_user = "SELECT * FROM users WHERE user_email = '{$email}' AND position = 'pastor'";
	$query_search_user = mysqli_query($conn, $search_user);
	checkQuery($query_search_user);

	$row = mysqli_fetch_array($query_search_user);
	$user_email = $row['user_email'];
	$user_password = $row['user_password'];
	$server_user_firstname = $row['user_firstname'];
	$server_user_lastname = $row['user_lastname'];
	
	// $server_user_username = $row['username'];
	
	$picture_name = $row['user_image'];
	
    $server_user_ministry = $row['user_ministry'];
    $server_user_position = $row['position'];
    $server_user_address = $row['user_address'];
    $server_user_city = $row['user_city'];
    $server_user_state = $row['user_state'];
    $server_user_zip = $row['user_zip'];
    $server_user_description = $row['user_description'];
    $server_user_tel = $row['user_tel'];

	if($password === $user_password && $email === $user_email){
		header('location: admin');

		$_SESSION['email'] = $user_email;
		$_SESSION['picture'] = $picture_name;
		$_SESSION['first'] = $server_user_firstname;
		$_SESSION['last'] = $server_user_lastname;
		$_SESSION['position'] = $server_user_position;
		$_SESSION['ministry'] = $server_user_ministry;
		$_SESSION['address'] = $server_user_address;
		$_SESSION['city'] = $server_user_city;
		$_SESSION['state'] = $server_user_state;
		$_SESSION['zip'] = $server_user_zip;
		$_SESSION['desc'] = $server_user_description;
		$_SESSION['tel'] = $server_user_tel;
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

	} elseif ($password !== $user_password || $email !== $user_email) {
		echo "<br>"."<p style='color:white;text-align:center'>Wrong Password Or Email..</p>";
	}
		
}
?>
		</div>
		
	</div>
</div>	
<!-- //main -->

</body>
</html> -->