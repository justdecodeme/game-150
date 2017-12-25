<?php include_once 'resource/session.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Authentication</title>
</head>
<body>
	<h1>User Authentication System</h1><hr>

	<?php if(!isset($_SESSION['username'])): ?>
	<P>You are currently not Signed In <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a></P>
	<?php else: ?>
	<h3>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a></h3>
	<?php endif ?>	
</body>
</html>