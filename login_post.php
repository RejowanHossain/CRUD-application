<?php
session_start();
require './db.php';
$user_email = $_POST['user_email'];
$user_password = md5($_POST['user_password']);

$login_query = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$user_password'";
$data_from_db = mysqli_query($database_connection, $login_query);

if($data_from_db->num_rows == 1){
    $_SESSION['login'] = 'login Succesful';
    $_SESSION['user_email'] = $user_email;
    header('location: dashboard.php');
}else{
    $_SESSION['wrong'] = 'Your email or password is wrong!';
    header('location: login.php');
}
?>