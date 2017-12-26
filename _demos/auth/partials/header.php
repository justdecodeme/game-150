<<<<<<< HEAD
<?php 
	include_once 'resources/session.php';
	include_once 'resources/database.php'; 
	include_once 'resources/utilities.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if(isset($page_title)) echo "User Authentication | $page_title"; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>User Authentication System</h1><hr>
	<header>
		<nav>
			<ul><?php guard(); ?>
				<li><a href="index.php">Home</a></li>
				<?php if((isset($_SESSION['username']) || isCookieValid($db))): ?>
					<li><a href="profile.php">My Profile</a></li>
					<li><a href="logout.php">Log out</a></li>
				<?php else: ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Signup</a></li>
				<?php endif ?>
			</ul>
		</nav>
	</header> <hr>

=======
<?php 
	include_once 'resources/session.php';
	include_once 'resources/database.php'; 
	include_once 'resources/utilities.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php if(isset($page_title)) echo "User Authentication | $page_title"; ?></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>User Authentication System</h1><hr>
	<header>
		<nav>
			<ul><?php guard(); ?>
				<li><a href="index.php">Home</a></li>
				<?php if((isset($_SESSION['username']) || isCookieValid($db))): ?>
					<li><a href="#">My Profile</a></li>
					<li><a href="logout.php">Log out</a></li>
				<?php else: ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Signup</a></li>
				<?php endif ?>
			</ul>
		</nav>
	</header> <hr>

>>>>>>> 927d0eab9c8ff50cf23bc2ae44b730c7ff60c789
	<h2><?php if(isset($page_title)) echo $page_title; ?></h2>	<hr>