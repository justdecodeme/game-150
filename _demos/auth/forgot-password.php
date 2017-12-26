<<<<<<< HEAD
<?php 
    $page_title = "Password Reset Form";
    include_once "partials/header.php";
    include_once "partials/parseResetPassword.php";
?>    

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

<?php 
    $goBack = true;
    include_once "partials/footer.php"; 
=======
<?php 
    $page_title = "Password Reset Form";
    include_once "partials/header.php";
    include_once "partials/parseResetPassword.php";
?>    

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

<?php 
    $goBack = true;
    include_once "partials/footer.php"; 
>>>>>>> 927d0eab9c8ff50cf23bc2ae44b730c7ff60c789
?>