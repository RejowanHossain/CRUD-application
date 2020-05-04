<?php
require './db.php';

$service_id = $_GET['service_id'];
$delete_query = "DELETE FROM services WHERE id = $service_id";
mysqli_query($database_connection, $delete_query);
header("location: service_view.php");
?>