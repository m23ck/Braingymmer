<?php


$server = "localhost";
$user = "root";
$pw = "";
$db = "braingymmer";

//create the connection to the database
$connection = new mysqli($server, $user, $pw, $db);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
    echo "connection failed";
    echo "<br></br>";
} 
 
else{ 
    
}
?>