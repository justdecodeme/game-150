<?php 
// add external scripts
include_once "resources/database.php";
include_once "resources/utilities.php";

// process the form
if(isset($_SESSION["id"])) {
	$id = $_SESSION['id'];

	// create sql select statement
	$sqlQuery = 'SELECT * FROM users WHERE id = :id';

	// use PDO prepared to sanitize data
	$statement = $db->prepare($sqlQuery);

	// add the data into database
	$statement->execute(array(':id' => $id));

	// check if user exist in database
	while($row = $statement->fetch()) {
		$username = $row['username'];
		$email = $row['email'];
		$date_joined = strftime("%b %d, %Y", strtotime($row["join_date"]));
	}

	$encode_id = base64_encode("encodeuserid{$id}");
}
?>