<?php 
	$page_title = "Home Page";
	include_once "partials/header.php";
 ?>

<?php if(!isset($_SESSION['username'])): ?>
<P>You are currently not Signed In <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a></P>
<?php else: ?>
<h3>You are logged in as <?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?> <a href="logout.php">Logout</a></h3>
<?php endif ?>

<?php 
	// $goBack = false;
	include_once "partials/footer.php"; 
?>