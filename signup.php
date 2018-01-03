<?php 
	$page_title = "Registration Form";
	include_once "partials/header.php";
	include_once "partials/parseSignup.php";
?>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

<main>
	<form action="" method="post">
		<h1>Create a Game 150 account</h1>

		<label for="email">Email</label>
		<input type="text" id="email" name="email">
		
		<label for="username">Username</label>
		<input type="text" id="username" name="username">
		
		<label for="password">Password</label>
		<input type="text" id="password" name="password">
		
		<input class="transition" type="submit" name="signup" value="Signup">
		<p>Already have an account? <a class="link" href="login.php">Log in</a></p>
	</form>
</main>

<?php include_once "partials/footer.php"; ?>