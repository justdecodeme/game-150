<?php 
	$page_title = "Registration Form";
	include_once "partials/header.php";
	include_once "partials/parseSignup.php";
?>

<?php if(isset($result)) echo $result; ?>
<?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

<form action="" method='post'>
	<table>
		<tr>
			<td>Email:</td>
			<td><input type="email" value='' name="email" placeholder="email"></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type="text" value='' name="username" placeholder="username"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="Password" value='' name="password" placeholder="password"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name='signup' value="Signup"></td>
		</tr>
	</table>
</form>	

<?php 
	$goBack = true;
	include_once "partials/footer.php"; 
?>