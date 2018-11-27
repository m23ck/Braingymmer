<?php

$server = "localhost";
$username = "root";
$password = "";
$db = "braingymmer";

//create the connection to the database
$connection = new mysqli($server, $username, $password, $db);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

else{ "Connected successfully";
}
?>