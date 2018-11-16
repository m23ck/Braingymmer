<?php

include "../backend/db_connect.php";

if (isset($_POST['btnLogin'])){
    session_start();
    $username = mysqli_real_escape_string($_POST['username']);
    $password = mysqli_real_escape_string($_POST['password']);


    $user_validation_query = "SELECT from users where 'username' = '$username'";
     

$query= mysqli_query( $db, $user_validation_query);
$query = mysqli_query($connection , $sql);
$row = mysqli_fetch_array($query);

$verify_pw = password_verify($password , $row['password']);

if($row["username"] == $username && $verify_pw == true)
{
    $_SESSION['username'] = $username;
    header("Location: home.php?login=succes");
    exit();
}
else
{
    header("Location: index.php?login=failed");
    exit();
}
}
?>