<?php
// add external scripts
include_once 'resource/Database.php';
include_once 'resource/utilities.php';

//process the form if the reset password button is clicked
if(isset($_POST['password_reset'])){
    //initialize an array to store any error message from the form
    $form_errors = array();

    //Form validation
    $required_fields = array('email', 'new_password', 'confirm_password');

    //call the function to check empty field and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //Fields that requires checking for minimum length
    $fields_to_check_length = array('new_password' => 6, 'confirm_password' => 6);

    //call the function to check minimum required length and merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    //check if error array is empty, if yes process form data and insert record
    if(empty($form_errors)){
        //collect form data and store in variables
        $email = $_POST['email'];
        $password1 = $_POST['new_password'];
        $password2 = $_POST['confirm_password'];

        //check if new password and confirm password is same
        if($password1 != $password2){
            $result = flashMessage("New password and confirm password does not match");
        }else{
            try{
                //create SQL select statement to verify if email address input exist in the database
                $sqlQuery = "SELECT email FROM users WHERE email =:email";

                //use PDO prepared to sanitize data
                $statement = $db->prepare($sqlQuery);

                //execute the query
                $statement->execute(array(':email' => $email));

                //check if record exist
                if($statement->rowCount() == 1){
                    //hash the password
                    $hashed_password = password_hash($password1, PASSWORD_DEFAULT);

                    //SQL statement to update password
                    $sqlUpdate = "UPDATE users SET password =:password WHERE email=:email";

                    //use PDO prepared to sanitize SQL statement
                    $statement = $db->prepare($sqlUpdate);

                    //execute the statement
                    $statement->execute(array(':password' => $hashed_password, ':email' => $email));

                    $result = flashMessage("Password Reset Successful", "Pass");
                }
                else{
                    $result = flashMessage("The email address provided does not exist in our database, please try again");
                }
            }catch (PDOException $e){
                $result = flashMessage("An error occurred: " . $e->getMessage());
            }
        }
    }
    else{
      $result = flashMessage("There is " . count($form_errors) . " error(s) in the form");
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Password Reset Page</title>
</head>
<body>
    <h1>User Authentication System</h1> <hr>
    
    <h2>Password Reset Form</h2> <hr>

    <?php if(isset($result)) echo $result; ?>
    <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>

    <form method="post" action="">
        <table>
            <tr>
                <td>Email:</td>
                <td><input type="text" value="" name="email"></td>
            </tr>
            <tr>
                <td>New Password:</td>
                <td><input type="password" value="" name="new_password"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" value="" name="confirm_password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input style="float: right;" type="submit" name="password_reset" value="Reset Password"></td>
            </tr>
        </table>
    </form>

    <h4><a href="index.php">Back</a></h4>
</body>
</html>