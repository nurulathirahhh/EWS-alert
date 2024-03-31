<?php
$host = "127.0.0.1"; // server
$user = "root"; // username
$pass = ""; // password
$database = "usersdb"; // database name
$connection = mysqli_connect($host, $user, $pass, $database);
if(mysqli_connect_errno()){ // check if connection error occur
echo 'Cannot connect to database : '.mysqli_connect_error();
}// if there are errors in connection to database
?>