<?php 
	$page_title = "Home Page";
	include_once "partials/header.php";
 ?>

<?php if(!isset($_SESSION['username'])): ?>
	<img class="main-img" src="img/bg2.jpg" alt="Game 150">
<?php else: ?>
	<a class="link" href="#">New Game</a>
<?php endif ?>

<?php 
	// $goBack = false;
	include_once "partials/footer.php"; 
?>