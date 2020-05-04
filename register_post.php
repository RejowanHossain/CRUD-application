<?php
session_start();
require './db.php';
require './session_function.php';

$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$user_password =md5($_POST['user_password']);
$confirm_password = md5($_POST['confirm_password']);

// Query If the same email exists in the database 
$check_query = "SELECT * FROM users WHERE user_email = '$user_email'";
$data_from_db = mysqli_query($database_connection, $check_query);

// validating the field if it's empty or not
if(empty($user_name) || empty($user_email) || empty($user_password) || empty($confirm_password)){
    field_required_session(header("location: register.php"));
  }elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    field_required_session(header("location: register.php"));
  } else{
// checking if the similar email exists or not
if($data_from_db->num_rows == 1){
    mail_validation_session(header("location: register.php"));
}else{
        // confirm password validation
    if($user_password === $confirm_password){
        // Insert the data into database after checking password and similar email exists or not
    $insert_query = "INSERT INTO users(user_name, user_email, user_password) VALUES('$user_name', '$user_email', '$user_password')";
    mysqli_query($database_connection, $insert_query);
    register_success_session();
    }else{
        password_session(header("location: register.php"));
    }

}

  }

?>