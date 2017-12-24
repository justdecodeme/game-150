<?php 
// add our database connection script
include_once 'resource/database.php';

// process the form
if(isset($_POST['submit'])) {
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

		if($statement->rowCount() == 1) {
			$result = '<p style="padding: 20px; color: green;">Registration Successful</p>';
		}
	} catch (Exception $e) {
		$result = '<p style="padding: 20px; color: red;">An error occurred: ' . $e->getMessage() . '</p>';
	}

	echo $result;
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
				<td><input type="submit" name='submit' value="signup"></td>
			</tr>
		</table>
	</form>	

	<h4><a href="index.php">Back</a></h4>
</body>
</html>