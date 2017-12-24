<?php 
// add external scripts
include_once "resource/database.php";
include_once "resource/utilities.php";

// process the form
if(isset($_POST["signup"])) {
	// initialize an array to store any error message from the form
	$form_errors = array();

    // form validation
    $required_fields = array('email', 'username', 'password');

    // call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    // fields that requires checking for minimum length
    $fields_to_check_length = array('username' => 4, 'password' => 6);

    // call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    // email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

	// check if error array is empty, if yes process form data and insert record
	if(empty($form_errors)) {
		// collect form data and store in varibles
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		// hashing the password
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		try {
			// create sql insert statement
			$sqlInsert = 'INSERT INTO users (username, email, password, join_date) VALUES (:username, :email, :password, now())';

			// use PDO prepared to sanitize data
			$statement = $db->prepare($sqlInsert);

			// add the data into database
			$statement->execute(array(':username' => $username, ':email' => $email, ':password' => $hashed_password));

			// check if one new row is created
			if($statement->rowCount() == 1) {
				$result = "<p style='padding: 10px; color: green; border: 1px solid green;'>Registration Successful</p>";
			}
		} catch (Exception $e) {
			$result = "<p style='padding: 10px; color: red;'>An error occurred: " . $e->getMessage() . "</p>";
		}

	} else {
		$result = "<p style='color: red;'>There is " . count($form_errors) . " error(s) in the form<br></p>";
	}

}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register Page</title>
</head>
<body>
	<h1>User Authentication System</h1>
	<hr>
	<h2>Registration Form</h2>
	<hr>

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
				<td><input type="submit" name='signup' value="signup"></td>
			</tr>
		</table>
	</form>	

	<h4><a href="index.php">Back</a></h4>
</body>
</html>