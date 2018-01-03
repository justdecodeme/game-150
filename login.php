<?php 
	$page_title = "Login Page";
	include_once "partials/header.php";
	include_once "partials/parseLogin.php";	
?>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

<main>
	<form action="" method='post'>
		<h1>Log in to Game 150</h1>

		<label for="username">Username or email</label>
		<input type="text" id="username" name="username">
		
		<label for="password">Password <a class="link" href="reset.php">(reset password)</a></label>
		<input type="password" id="password" name="password"> <br>
		
		<!-- <input type="checkbox" id="remember" name="remember" value="yes"> -->
		<!-- <label for="remember">Remember Me</label> -->

		<input class="transition" type="submit" name="login" value="Login">
		<p>Don’t have an account? <a class="link" href="signup.php">Signup</a></p>
	</form>
</main>

<?php include_once "partials/footer.php"; ?>