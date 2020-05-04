<?php
session_start();
require './db.php';
require './session_function.php';

$service_id = $_GET['service_id'];

if($_GET['btn'] == 'active'){
    if($after_assoc_active < 6){
        $update_service_query = "UPDATE services SET service_status = 2 WHERE id = $service_id";
    }else{
        $_SESSION['service_error']= "Can not add more than 6 !";
        
    }

}else{
    $update_service_query = "UPDATE services SET service_status = 1 WHERE id = $service_id";
}
mysqli_query($database_connection, $update_service_query);
header("location: service_view.php");

?>