<<<<<<< HEAD
<?php 
// initialize variables to hold connection parameters
$dsn = 'mysql:host=localhost; dbname=register';
$username = 'root';
$password = '';

try {
	// create an instance of the PDO class with the required parameters
	$db = new PDO($dsn, $username, $password);

	// set PDO error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// display success message
	// echo 'Connected to the register database';
} catch (Exception $e) {
	// display error message
	echo 'Connction failed: ' . $e->getMessage();
=======
<?php 
// initialize variables to hold connection parameters
$dsn = 'mysql:host=localhost; dbname=register';
$username = 'root';
$password = '';

try {
	// create an instance of the PDO class with the required parameters
	$db = new PDO($dsn, $username, $password);

	// set PDO error mode to exception
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// display success message
	// echo 'Connected to the register database';
} catch (Exception $e) {
	// display error message
	echo 'Connction failed: ' . $e->getMessage();
>>>>>>> 927d0eab9c8ff50cf23bc2ae44b730c7ff60c789
}