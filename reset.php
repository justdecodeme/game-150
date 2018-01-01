<?php 
    $page_title = "Password Reset Form";
    include_once "partials/header.php";
    include_once "partials/parseResetPassword.php";
?>    

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

<main>
	<form action="" method="post">
		<h1>Reset Your Game 150 Password</h1>

		<label for="email">Email</label>
		<input type="text" id="email" name="email">
		
		<label for="password1">New Password</label>
		<input type="password" id="password1" name="new_password">
		
		<label for="password2">Confirm Password</label>
		<input type="password" id="password2" name="confirm_password">
		
		<input class="transition" type="submit" name="password_reset" value="Reset Password">
	</form>
</main>

<?php include_once "partials/footer.php"; ?>