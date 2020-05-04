<?php
session_start();
require './db.php';
require './session_function.php';

$service_icon = $_POST['service_icon'];
$service_title = $_POST['service_title'];
$service_description =$_POST['service_description'];

if(empty($service_icon) || empty($service_title) || empty($service_description)){
    data_not_added(header("location: service_view.php"));
}else{
$insert_query = "INSERT INTO services(service_icon, service_title, service_description) VALUES('$service_icon', '$service_title', '$service_description')";
mysqli_query($database_connection, $insert_query); 
data_added(header("location: service_view.php"));

}

?>