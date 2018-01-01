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
</head>
<body>
	<header>
		<div class="left">
			<a class="transition inactive" href="#">Rules</a>
		</div>
		<div class="right">
			<a href="login.php">Login</a>
			<a href="signup.php">Signup</a>
		</div>
	</header>
