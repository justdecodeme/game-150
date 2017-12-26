<?php 
// add external scripts
include_once "resources/database.php";
include_once "resources/utilities.php";

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

	// collect form data and store in varibles
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];

    if(checkDuplicateEntries("users", "email", $email, $db)) {
    	$result = flashMessage("<b>$email</b> (email) is already taken, please try another one");
    } else if(checkDuplicateEntries("users", "username", $username, $db)) {
    	$result = flashMessage("<b>$username</b> (username) is already taken, please try another one");
    } else if(empty($form_errors)) { // check if error array is empty, if yes process form data and insert record
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
				$result = flashMessage("Registration Successful", "Pass");
			}
		} catch (Exception $e) {
			$result = flashMessage("An error occurred: " . $e->getMessage());
		}

	} else {
		$result = flashMessage("There is " . count($form_errors) . " error(s) in the form");
	}
}
?>
