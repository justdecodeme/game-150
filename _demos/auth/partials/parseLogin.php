<<<<<<< HEAD
<?php 
// add external scripts
include_once "resources/database.php";
include_once "resources/utilities.php";

// process the form
if(isset($_POST["login"])) {
	// initialize an array to store any error message from the form
	$form_errors = array();

    // form validation
    $required_fields = array('username', 'password');

    // call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

	// check if error array is empty, if yes process form data and insert record
	if(empty($form_errors)) {
		// collect form data and store in varibles
		$username = $_POST['username'];
		$password = $_POST['password'];

		isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";

		try {
			// create sql select statement
			$sqlQuery = 'SELECT * FROM users WHERE username = :username';

			// use PDO prepared to sanitize data
			$statement = $db->prepare($sqlQuery);

			// add the data into database
			$statement->execute(array(':username' => $username));

			// echo "<pre>";
			// var_dump($statement->fetch());
			// echo "<pre>";

			// check if user exist in database
			while($row = $statement->fetch()) {
				$username = $row['username'];
				$id = $row['id'];
				$hashed_password = $row['password'];

				if(password_verify($password, $hashed_password)) {
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;
					
					$fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
					$_SESSION['last_active'] = time();
					$_SESSION['fingerprint'] = $fingerprint;

					if($remember === "yes") {
						rememberMe($id);
					}
					// $result = flashMessage("Successfully Loged In!", "Pass");

					// redirect user to home page
					redirectTo("index");		
				} else {
					$result = flashMessage("Invalid username or password");
				}
			}
		} catch (Exception $e) {
			$result = flashMessage("An error occurred: " . $e->getMessage());
		}

	} else {
		$result = flashMessage("There is " . count($form_errors) . " error(s) in the form");
	}
}
=======
<?php 
// add external scripts
include_once "resources/database.php";
include_once "resources/utilities.php";

// process the form
if(isset($_POST["login"])) {
	// initialize an array to store any error message from the form
	$form_errors = array();

    // form validation
    $required_fields = array('username', 'password');

    // call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

	// check if error array is empty, if yes process form data and insert record
	if(empty($form_errors)) {
		// collect form data and store in varibles
		$username = $_POST['username'];
		$password = $_POST['password'];

		isset($_POST['remember']) ? $remember = $_POST['remember'] : $remember = "";

		try {
			// create sql select statement
			$sqlQuery = 'SELECT * FROM users WHERE username = :username';

			// use PDO prepared to sanitize data
			$statement = $db->prepare($sqlQuery);

			// add the data into database
			$statement->execute(array(':username' => $username));

			// echo "<pre>";
			// var_dump($statement->fetch());
			// echo "<pre>";

			// check if user exist in database
			while($row = $statement->fetch()) {
				$username = $row['username'];
				$id = $row['id'];
				$hashed_password = $row['password'];

				if(password_verify($password, $hashed_password)) {
					$_SESSION['id'] = $id;
					$_SESSION['username'] = $username;
					
					$fingerprint = md5($_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
					$_SESSION['last_active'] = time();
					$_SESSION['fingerprint'] = $fingerprint;

					if($remember === "yes") {
						rememberMe($id);
					}
					// $result = flashMessage("Successfully Loged In!", "Pass");

					// redirect user to home page
					redirectTo("index");		
				} else {
					$result = flashMessage("Invalid username or password");
				}
			}
		} catch (Exception $e) {
			$result = flashMessage("An error occurred: " . $e->getMessage());
		}

	} else {
		$result = flashMessage("There is " . count($form_errors) . " error(s) in the form");
	}
}
>>>>>>> 927d0eab9c8ff50cf23bc2ae44b730c7ff60c789
?>