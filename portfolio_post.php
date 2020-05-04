<?php
session_start();
require './db.php';

if($_FILES['portfolio_image']['name']){
    $file_name = $_FILES['portfolio_image']['name'];
    $after_explode = explode(".", $file_name);
    $file_extension = end($after_explode);

    $accepted_files = array('jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG');
   
    //Code for checking if the extension exists or not
    if(in_array($file_extension, $accepted_files)){
        // Code for checking the image size
        if($_FILES['portfolio_image']['size'] <= 1000000){

            // Inserting datas in database
            $portfolio_name = $_POST['portfolio_name'];
            $portfolio_information = $_POST['portfolio_information'];

            $insert_query = "INSERT INTO portfolios(portfolio_name, portfolio_information) VALUES('$portfolio_name', '$portfolio_information')";
            mysqli_query($database_connection, $insert_query);
            
            //fetching the id number from database 
            $last_id = mysqli_insert_id($database_connection);

            // code for creating a new name for image
            $new_file_name = $last_id.".".$file_extension;

            // moving the uploaded image from temp path to project folder
            $old_location = $_FILES['portfolio_image']['tmp_name'];
            $new_location = "uploads/portfolio/".$new_file_name;
            move_uploaded_file($old_location, $new_location);

            // Final database update with new image name and extension
            $portfolio_update_query = "UPDATE portfolios SET portfolio_image = '$new_file_name' WHERE id = $last_id";
            mysqli_query($database_connection, $portfolio_update_query);
            header("location: portfolio_view.php");

        }else{
            $_SESSION['size_error'] = 'Image size is bigger';
            header("location: portfolio_view.php");
        }
        
    }else{
        $_SESSION['file_error'] = 'File format is not supported';
        header("location: portfolio_view.php");
    }
}else{
    $_SESSION['file_empty'] = 'Please attach a photo';
    header("location: portfolio_view.php");
}
?>