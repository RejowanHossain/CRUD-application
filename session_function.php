<?php
    function field_required_session($path){
        $_SESSION['required'] = "Fields must not be empty!";
        return $path;
    }

    function register_success_session(){
        $_SESSION['success']= "Registered Successfully";
        header("location: register.php");
    }

    function password_session($password_path){
        $_SESSION['password_error']= "Password doesn't match!";
        return $password_path;
    }
    function password_match($password_match){
        $_SESSION['password_match'] = "Old and New password can't be same!";
        return $password_match;
    }
    function mail_validation_session($mail_path){
        $_SESSION['mail_exist']= "This email already exists";
        return $mail_path;
    }
    function data_added($insert_path){
        $_SESSION['success']= "Data has been added!";
        return $insert_path;
    }
    function data_not_added($add_error){
        $_SESSION['danger']= "Data has not been added!";
        return $add_error;
    }
    function edited_service(){
        $_SESSION['edited']= "Data has been edited!";
        header("location: service_view.php");
    }
    // function service_add_alert(){
    //     $_SESSION['alert']= "Can not add more than 6 !";
    //     header("location: service_view.php");
    // }