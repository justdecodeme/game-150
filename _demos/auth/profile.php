<?php 
	$page_title = "Profile Page";
	include_once "partials/header.php";
	include_once "partials/parseProfile.php";
 ?>

<?php if(!isset($_SESSION['username'])): ?>
<P>You are not authorized to view this page <a href="login.php">Login</a> Not yet a member? <a href="signup.php">Signup</a></P>
<?php else: ?>
	<table border="1" width="300">
		<tr>
			<td>Username: </td>
			<td><?php if(isset($username)) echo $username; ?></td>
		</tr>
		<tr>
			<td>Email: </td>
			<td><?php if(isset($email)) echo $email; ?></td>
		</tr>
		<tr>
			<td>Date Joined: </td>
			<td><?php if(isset($date_joined)) echo $date_joined; ?></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="edit-profile.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>">Edit Profile</a></td>
		</tr>
	</table>
<?php endif ?>

<?php 
	// $goBack = false;
	include_once "partials/footer.php"; 
?>