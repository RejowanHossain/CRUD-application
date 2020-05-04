<?php
    require './db.php';

    $service_id = $_POST['service_id'];
    $service_icon = $_POST['service_icon'];
    $service_title = $_POST['service_title'];
    $service_description = $_POST['service_description'];

    $update_query = "UPDATE services SET service_icon = ' $service_icon' , service_title = '$service_title', service_description = '$service_description' WHERE id = $service_id";
    mysqli_query($database_connection, $update_query);
    header("location: service_view.php");


?>