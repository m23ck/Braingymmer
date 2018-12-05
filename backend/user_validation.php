<?php
    session_start();

   if(isset($_POST["btn_login"]))
   {
       require "db_connect.php";
       $username = mysqli_real_escape_string($connection , $_POST["username"]);
       $password = mysqli_real_escape_string($connection , $_POST["password"]);
       
       if(empty($username) || empty($password))
       {
           header("Location: ../src/index.php?login=empty");
           exit();
       }
       else
       {
            $query_lookup = "SELECT * from users where `username`='$username';";
            $lookup = mysqli_query($connection , $query_lookup);

            $row = mysqli_fetch_array($lookup);

            $pw_verify = password_verify($password , $row['password']);

            if($row["username"] == $username && $pw_verify == true)
            {
                //login succesfull
                $_SESSION["userid"] = $row["userid"];
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
    }
?>