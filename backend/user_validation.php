<?php

require "db_connect.php";

if (isset($_POST['btnLogin'])){
    session_start();
    $username = mysqli_real_escape_string($_POST['username']);
    $password = mysqli_real_escape_string($_POST['password']);

    if ( ( empty($username) || empty($password) ) ){
        header('location: ../src/index.php?input=empty');
        echo "<script>alert('Fill in all the fields!');</script>";
        
        exit();
    }

    $query_lookup_user= "SELECT from users where 'username' = '$username'";//sql
     
    $lookup_user= mysqli_query( $connection, $query_lookup_user);

    $row = mysqli_fetch_array($lookup_user);

    $verify_pw = password_verify($password , $row['password']);

    if($row["username"] == $username && $verify_pw == true)
    {
        $_SESSION['username'] = $username;
        header("Location: ../src/home.php?login=succes");
        exit();
    }
    else
    {
        header("Location: ../src/index.php?login=failed");
        exit();
    }
}
?>