<?php
session_start();
require './db.php';
require './session_function.php';

$new_password = str_replace(" ", "", md5($_POST['new_password']));

// $confirm_password = $_POST['confirm_password'];

// validation of the the form, checking if the fields are empty or not
if(empty($_POST['old_password']) || empty($_POST['new_password']) || empty($_POST['confirm_password'])){
    field_required_session(header("location: profile.php"));
}
// old and new password validation
else if($_POST['old_password'] == $_POST['new_password']){
    password_match(header("location: profile.php"));
}
    // Checking if the new and confirm password matches or not
else if($_POST['new_password'] == $_POST['confirm_password']){
    $old_password = md5($_POST['old_password']);
    $user_email = $_SESSION['user_email'];

    $check_query = "SELECT COUNT(*) AS total FROM users WHERE user_email = '$user_email' AND user_password = '$old_password'";
    $from_db = mysqli_query($database_connection, $check_query);

    // code for checking if the data exists in the database or not
        if(mysqli_fetch_assoc($from_db)['total'] == 1){
            $password_update_query = "UPDATE users SET = user_password = '$new_password' WHERE user_email = '$user_email'";
            mysqli_query($database_connection, $password_update_query);
            data_added(header("location: profile.php"));
        }else{
            data_not_added(header("location: profile.php"));
        }
}else{
        password_session(header("location: profile.php"));
}


?>