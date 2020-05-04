<?php
require './db.php';
$portfolio_id = $_POST['portfolio_id'];
$portfolio_name = $_POST['portfolio_name'];
$portfolio_information = $_POST['portfolio_information'];

if($_FILES['portfolio_image']['name']){
    // delete old photo
    $photo_from_db = "SELECT portfolio_iamge from portfolios WHERE id = '$portfolio_id'";
    $old_photo_name = mysqli_query($database_connection, $photo_from_db);
    $assoc = mysqli_fetch_assoc($old_photo_name)['portfolio_image'];
    $old_photo_location = 'uploads/portfolio/'. $assoc;
    unlink($old_photo_location);
}else{
    $update_portfolio_query = "UPDATE portfolios SET portfolio_name = '$portfolio_name', portfolio_information = '$portfolio_information' WHERE id = $portfolio_id";
    mysqli_query($database_connection, $update_portfolio_query);
    header("location: portfolio_view.php");
}
?>