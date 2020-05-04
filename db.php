<?php
define('HOSTNAME', 'localhost');
define("USERNAME", 'root');
define('PASSWORD', '');
define('DBNAME', 'login_system');

$database_connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DBNAME);
?>