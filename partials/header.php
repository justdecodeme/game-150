<?php 
	include_once 'resources/session.php';
	include_once 'resources/database.php'; 
	include_once 'resources/utilities.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php if(isset($page_title)) echo "Game 150 | $page_title"; ?></title>

	<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">	
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<script defer src="js/fontawesome-all.min.js"></script>
</head>
<body>
	<header>
		<div class="left">
			<a class="transition" href="index.php">Home</a>
			<a class="transition inactive" href="#">Rules</a>
		</div>
		<div class="right">
			<!-- if not logged in and at home page -->
			<?php if(!isset($_SESSION['username']) && $page_title == "Home Page"): ?>
				<a href="signup.php">Signup</a>
				<a href="login.php">Login</a>
			<!-- if logged in -->
			<?php elseif(isset($_SESSION['username'])): ?>
				<a id="userName"><?php echo $_SESSION['username'] ?><span class="fa-icons"><i class="fas fa-caret-down"></i></span></a>
				<ul id="userProfile">
					<li><a class="inactive" href="">Edit Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			<?php endif ?>
		</div>
	</header>
