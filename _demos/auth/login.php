<?php 
	$page_title = "Login Form";
	include_once "partials/header.php";
	include_once "partials/parseLogin.php";	
?>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

<form action="" method='post'>
	<table>
		<tr>
			<td>Username:</td>
			<td><input type="text" value='' placeholder="username" name="username"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="Password" value='' placeholder="password" name="password"></td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" id="remember" name="remember" value="yes">
				<label for="remember">Remember Me</label>
			</td>
		</tr>
		<tr>
			<td><a href="forgot-password.php">Forgot Password?</a></td>
			<td><input style="float: right;" type="submit" value="Login" name="login"></td>
		</tr>
	</table>
</form>	

<?php 
	$goBack = true;
	include_once "partials/footer.php"; 
?>